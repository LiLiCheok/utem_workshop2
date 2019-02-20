package com.myapps.parentupdaterapplication;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

import android.annotation.SuppressLint;
import android.annotation.TargetApi;
import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Build;
import android.view.LayoutInflater;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup;
import android.view.WindowManager;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.PopupWindow;
import android.widget.TextView;

/**
 * This class customize the ListView and insert the JSON data in the ListView.
 * @author Li Li
 */
@SuppressLint("InlinedApi")
@TargetApi(Build.VERSION_CODES.ICE_CREAM_SANDWICH)
public class AnnouncementItemsAdapter extends ArrayAdapter<AnnouncementItems> implements OnClickListener, OnItemClickListener {

	ArrayList<AnnouncementItems> annoucementList;
	LayoutInflater li;
	int Resource;
	ViewHolder holder;
	Context context;

	String popUpContents[];
	PopupWindow popupWindowDogs;
	
	public AnnouncementItemsAdapter(Context context, int resource,
			ArrayList<AnnouncementItems> objects) {
		
		super(context, resource, objects);
		
		li = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
		Resource = resource;
		annoucementList = objects;
		this.context = context;

		li = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);

		// initialize pop up window items list
        
        // add items on the array dynamically
        // format is DogName::DogID
		List<String> dogsList = new ArrayList<String>();
        dogsList.add("Save to Calendar::1");
		
        // convert to simple array
        popUpContents = new String[dogsList.size()];
        dogsList.toArray(popUpContents);
        
        // initialize pop up window
        popupWindowDogs = popupWindowDogs();
		
	}
	
	@Override
	public View getView(int position, View convertView, ViewGroup parent) {
		
		// The first list item will be recycle and attached after the last list item
		if(convertView == null) {
			
			convertView = li.inflate(Resource, null);
			holder = new ViewHolder();
			
			holder.tvPublisher = (TextView) convertView.findViewById(R.id.tvPublisher);
			holder.tvWorkingPlace = (TextView) convertView.findViewById(R.id.tvWorkingPlace);
			holder.tvApprovedDate = (TextView) convertView.findViewById(R.id.tvApprovedDate);
			holder.tvAnnouncementTitle = (TextView) convertView.findViewById(R.id.tvAnnouncementTitle);
			holder.tvAnnouncementInfo = (TextView) convertView.findViewById(R.id.tvAnnouncementInfo);
			holder.tvApproverName = (TextView) convertView.findViewById(R.id.tvApprover);
			holder.tvApproverPosition = (TextView) convertView.findViewById(R.id.tvApproverPosition);
			
			holder.imgShowDropDown = (ImageView) convertView.findViewById(R.id.ivDropdownCalendar);
			
			convertView.setTag(holder);
			
		} else {
			
			holder = (ViewHolder) convertView.getTag();
			
		}
		
		holder.tvPublisher.setText(annoucementList.get(position).getPublisherName());
		holder.tvWorkingPlace.setText(annoucementList.get(position).getWorkingPlace());
		holder.tvApprovedDate.setText(annoucementList.get(position).getPublishDate());
		holder.tvAnnouncementTitle.setText(annoucementList.get(position).getAnnouncementTitle());
		holder.tvAnnouncementInfo.setText(annoucementList.get(position).getAnnouncementInfo());
		holder.tvApproverName.setText(annoucementList.get(position).getApproverName());
		holder.tvApproverPosition.setText(annoucementList.get(position).getApproverPosition());
		
		holder.imgShowDropDown.setOnClickListener(this);
		
		return convertView;
	}

	/**
	 * This class declare the variables name in announcement_feeds.xml
	 */
	private static class ViewHolder {
		
		public TextView tvPublisher;
		public TextView tvWorkingPlace;
		public TextView tvApprovedDate;
		public TextView tvAnnouncementTitle;
		public TextView tvAnnouncementInfo;
		public TextView tvApproverName;
		public TextView tvApproverPosition;
		
		public ImageView imgShowDropDown;
		
	}

	@Override
	public void onClick(View v) {
		
		switch (v.getId()) {
		 
        case R.id.ivDropdownCalendar:
        	
            // show the list view as dropdown
            popupWindowDogs.showAsDropDown(v, -5, 0);
            
            break;
            
        }
		
	}
	
	private PopupWindow popupWindowDogs() {
		
		// initialize a pop up window type
        PopupWindow popupWindow = new PopupWindow(context);
 
        // the drop down list is a list view
        ListView listViewDogs = new ListView(context);
         
        // set our adapter and pass our pop up window contents
        listViewDogs.setAdapter(dogsAdapter(popUpContents));
         
        listViewDogs.setOnItemClickListener(this);
        
        // some other visual settings
        popupWindow.setFocusable(true);
        popupWindow.setWidth(250);
        popupWindow.setHeight(WindowManager.LayoutParams.WRAP_CONTENT);
        
        // set the list view as pop up window content
        popupWindow.setContentView(listViewDogs);
 
        return popupWindow;
        
	}
	
	/**
     * adapter where the list values will be set
     */
	private ArrayAdapter<String> dogsAdapter(String dogsArray[]) {
		 
        ArrayAdapter<String> adapter = new ArrayAdapter<String>(context, android.R.layout.simple_list_item_1, dogsArray) {
 
            @Override
            public View getView(int position, View convertView, ViewGroup parent) {
 
                // setting the ID and text for every items in the list
                String item = getItem(position);
                String[] itemArr = item.split("::");
                String text = itemArr[0];
                String id = itemArr[1];
 
                // visual settings for the list item
                TextView listItem = new TextView(context);
 
                listItem.setText(text);
                listItem.setTag(id);
                listItem.setTextSize(15);
                listItem.setPadding(10, 10, 10, 10);
                listItem.setTextColor(Color.WHITE);
                 
                return listItem;
            }
        };
         
        return adapter;
    }

	@TargetApi(Build.VERSION_CODES.ICE_CREAM_SANDWICH)
	@SuppressLint("InlinedApi")
	@Override
	public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

		// get the context and main activity to access variables
		@SuppressWarnings("unused")
		Context mContext = view.getContext();
         
        // add some animation when a list item was clicked
        Animation fadeInAnimation = AnimationUtils.loadAnimation(view.getContext(), android.R.anim.fade_in);
        fadeInAnimation.setDuration(10);
        view.startAnimation(fadeInAnimation);
         
        // dismiss the pop up
        popupWindowDogs.dismiss();
        
//	    // get the id
//        String selectedItemTag = ((TextView) view).getTag().toString();
//        Toast.makeText(mContext, "Dog ID is: " + selectedItemTag + position, Toast.LENGTH_SHORT).show();
        
	    if (position == 0) {
	    	
	    	Calendar cal = Calendar.getInstance();     
	        Intent intent = new Intent(Intent.ACTION_EDIT);
	        intent.setType("vnd.android.cursor.item/event");
	        intent.putExtra("beginTime", cal.getTimeInMillis());
	        intent.putExtra("allDay", true);
	        intent.putExtra("rrule", "FREQ=YEARLY");
	        intent.putExtra("endTime", cal.getTimeInMillis()+60*60*1000);
	        intent.putExtra("title", holder.tvAnnouncementTitle.getText());
	        intent.putExtra("description", holder.tvAnnouncementInfo.getText());
	        intent.putExtra("eventLocation", "");
	        intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
	        getContext().startActivity(intent);
	        
		}
        
	}
	
}
