package com.myapps.parentupdaterapplication;

import java.io.IOException;
import java.util.ArrayList;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.util.EntityUtils;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.annotation.TargetApi;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.support.v4.app.Fragment;
import android.support.v4.widget.SwipeRefreshLayout;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.Toast;

@TargetApi(Build.VERSION_CODES.ICE_CREAM_SANDWICH)
public class Announcement extends Fragment {

	private View v;
	private ListView list;
	private AnnouncementItemsAdapter adapter;
	private ArrayList<AnnouncementItems> announcementList;
	
	@SuppressWarnings("deprecation")
	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
			Bundle savedInstanceState) {
		
		v = inflater.inflate(R.layout.activity_announcement, container, false);

		list = (ListView) v.findViewById(R.id.list);
		announcementList = new ArrayList<AnnouncementItems>();

		new AnnouncementAsynTask().execute(Config.getAnnouncement_url);
		
		final SwipeRefreshLayout swipe = (SwipeRefreshLayout) v.findViewById(R.id.swipeLayout);
		
		swipe.setColorScheme(android.R.color.holo_blue_dark, android.R.color.background_light,
				android.R.color.holo_green_light, android.R.color.holo_green_dark);
		swipe.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
			
			@Override
			public void onRefresh() {
				
				if (adapter == null) {
					
					Toast.makeText(getActivity(), "No Announcement to be displayed.", Toast.LENGTH_LONG).show();;
					
				} else {
					
					adapter.clear();
					
					swipe.setRefreshing(false);
					Log.d("Swipe", "Refreshing Announcement");
					
					( new Handler()).postDelayed(new Runnable() {

						@Override
						public void run() {
							
							new AnnouncementAsynTask().execute(Config.getAnnouncement_url);
							
						}
						
					}, 3000);
					
				}
				
				swipe.setRefreshing(false);
				
			}
		});
		
		return v;
		
	}

	public class AnnouncementAsynTask extends AsyncTask<String, Void, Boolean> {

		@Override
		protected Boolean doInBackground(String... params) { // params = url
			
			try {
				
				HttpClient client = new DefaultHttpClient();
				
				// params[0], the url result is an array
				HttpPost post = new HttpPost(params[0]);
				
				HttpResponse response = client.execute(post);
				
				// If the status is OK, thats mean we have receive a response from the server
				int status = response.getStatusLine().getStatusCode();
				
				// If we have receive some data
				if(status == 200) {

					HttpEntity entity = response.getEntity();
					String data = EntityUtils.toString(entity);
					
					JSONObject jObj = new JSONObject(data);
					JSONArray jArray = jObj.getJSONArray(Config.TAG_JSON_ARRAY);
					
					for(int i = 0; i < jArray.length(); i++) {
						
						AnnouncementItems announcement = new AnnouncementItems();
						
						JSONObject jRealObject = jArray.getJSONObject(i);
						
						announcement.setPublisherName(jRealObject.getString(Config.TAG_PUBLISHER_NAME));
						announcement.setWorkingPlace(jRealObject.getString(Config.TAG_WORKING_PLACE));
						announcement.setPublishDate(jRealObject.getString(Config.TAG_APPROVED_DATETIME));
						announcement.setAnnouncementTitle(jRealObject.getString(Config.TAG_ANNOUCEMENT_TITLE));
						announcement.setAnnouncementInfo(jRealObject.getString(Config.TAG_ANNOUCEMENT_DESCRIPTION));
						announcement.setApproverName(jRealObject.getString(Config.TAG_APPROVER_NAME));
						announcement.setApproverPosition(jRealObject.getString(Config.TAG_APPROVER_POSITION));
						
						// parse announcement to announcementList
						announcementList.add(announcement);
						
					}
					
					return true;
					
				}
				
			} catch (ClientProtocolException e) {
				
				e.printStackTrace();
				
			} catch (IOException e) {
			
				e.printStackTrace();
				
			} catch (JSONException e) {
				
				e.printStackTrace();
			}
			
			// Nothing is fetched
			return false;
			
		}

		/**
		 * This method will run after doInBackground method.
		 */
		@Override
		protected void onPostExecute(Boolean result) {
			
			super.onPostExecute(result);
			
			if(result == false) {
				
				// show message that data was not parsed
				
			} else {
				
				adapter = new AnnouncementItemsAdapter(
					getActivity().getApplicationContext(),
					R.layout.announcement_feeds, announcementList);
				list.setAdapter(adapter);
				
				adapter.notifyDataSetChanged();
				
			}
			
		}
		
	}
	
}
