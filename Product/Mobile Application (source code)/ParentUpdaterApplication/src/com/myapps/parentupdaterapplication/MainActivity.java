package com.myapps.parentupdaterapplication;

import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.GooglePlayServicesUtil;
import com.myapps.databasehandler.GetRequestHandler;
import com.myapps.service.RegistrationIntentService;

import android.annotation.SuppressLint;
import android.app.AlertDialog;
import android.content.ActivityNotFoundException;
import android.content.ComponentName;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.ResolveInfo;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.telephony.TelephonyManager;
import android.util.Log;
import android.view.KeyEvent;
import android.view.LayoutInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.ArrayAdapter;
import android.widget.ExpandableListView;
import android.widget.ExpandableListView.OnChildClickListener;
import android.widget.ExpandableListView.OnGroupClickListener;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

@SuppressLint("NewApi")
public class MainActivity extends AppCompatActivity {

	private Toolbar mToolbar;
	private DrawerLayout mDrawerLayout;
	private MyDrawerToggle mDrawerToggle;
	private List<String> groupList;
    private List<String> childList;
    private Map<String, List<String>> listMenu;
    private ExpandableListView expListView;
    private TextView tvUsername;
    private ImageView profile_picture;
	private Bitmap bmp;
	private Uri mImageCaptureUri;
	private Fragment mCurrentFragment;
	private Announcement mAnnouncement;
	private ChildrenInfo mChildrenInfo;
	private About mAbout;
	private FileOutputStream fos;
	private static final String FILENAME = "LogCheck";
	private static final String FILEFORIDS = "ids";
    private TelephonyManager tManager;
    private String phoneNo = "";
    private int childCount;
    private String[] childIDs;
    
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		if (checkPlayServices()) {
            // Start IntentService to register this application with GCM.
            Intent intent = new Intent(this, RegistrationIntentService.class);
            startService(intent);
        }
		
		childCount = getChildCount();
		getChildIdList();
		
		profile_picture = (ImageView)findViewById(R.id.profile_pic);
		
		mAnnouncement = new Announcement();
		mChildrenInfo = new ChildrenInfo(null);
		mAbout = new About();

		mDrawerLayout = (DrawerLayout) findViewById(R.id.drawer_layout);
		mToolbar = (Toolbar) findViewById(R.id.toolbar);

		setSupportActionBar(mToolbar);

		FragmentManager fragManager = getSupportFragmentManager();
		FragmentTransaction trans = fragManager.beginTransaction();
		trans.add(R.id.fragment_container, mAnnouncement, "Announcement");
		trans.commit();

		mCurrentFragment = mAnnouncement;
		
        createGroupList();
 
        createCollection();
 
        expListView = (ExpandableListView) findViewById(R.id.left_drawer);
        final ExpandableListAdapter expListAdapter = new ExpandableListAdapter(
                this, groupList, listMenu);
        addHeader();
        expListView.setAdapter(expListAdapter);
        expListView.setOnGroupClickListener(new OnGroupClickListener(){

			@Override
			public boolean onGroupClick(ExpandableListView parent, View v,
					int groupPosition, long id) {
				
				if (groupPosition==0 ) {
					
					replaceFragment(mAnnouncement);
					mDrawerLayout.closeDrawer(expListView);
					
					return true;
					
				} else if (groupPosition==1) {
					
					return false;
					
				} else {
					
					switch(groupPosition) {
					
					case 2:
						replaceFragment(mAbout);
						mDrawerLayout.closeDrawer(expListView);
						break;
						
					case 3:
						
						confirmLogout();
						mDrawerLayout.closeDrawer(expListView);
						break;
						
					}
					
					return true;
					
				}
				
			}
        	
        });
        
        expListView.setOnChildClickListener(new OnChildClickListener() {
 
            public boolean onChildClick(ExpandableListView parent, View v,
                    int groupPosition, int childPosition, long id) {
            	
            	mChildrenInfo = new ChildrenInfo(childIDs[childPosition]);
            	//mChildrenInfo = new ChildrenInfo("1");
				replaceFragment(mChildrenInfo);
    			mDrawerLayout.closeDrawer(expListView);
    				
                parent.collapseGroup(groupPosition);
                return true;
                
            }
            
        });

		mDrawerToggle = new MyDrawerToggle(this, mDrawerLayout, mToolbar,
				R.string.drawer_open, R.string.drawer_close);

		mDrawerToggle.setDrawerIndicatorEnabled(true);
		mDrawerLayout.setDrawerListener(mDrawerToggle);
		mDrawerToggle.syncState();

		getSupportActionBar().setHomeButtonEnabled(true);
		getSupportActionBar().setDisplayHomeAsUpEnabled(true);
		
	}

	private int getChildCount() {
		String collected = null;
		File data = getApplicationContext().getFileStreamPath("children");
		if(data.exists()){
			try {
				FileInputStream fis = openFileInput("children");
				byte[] dataArray = new byte[fis.available()];
				while(fis.read(dataArray)!= -1){
					collected = new String(dataArray);
				}
			} catch (FileNotFoundException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			} 
		}
		return Integer.parseInt(collected);
				
	}

	private void getChildIdList() {

		String listId = "";
		File data = getApplicationContext().getFileStreamPath(FILEFORIDS);
		if(data.exists()){
			try {
				
				FileInputStream fis = openFileInput(FILEFORIDS);
				byte[] dataArray = new byte[fis.available()];
				while(fis.read(dataArray)!= -1){
					listId = new String(dataArray);
				}
				String jsonKey = "result";
				JSONObject jsonObj = new JSONObject(listId);
		        JSONArray ids = jsonObj.getJSONArray(jsonKey);
		        
		        childIDs = new String[childCount];
		        for(int i=0;i<ids.length();i++){
		            JSONObject c = ids.getJSONObject(i);
		            childIDs[i] = c.getString("student_id");
		        }
			} catch (FileNotFoundException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			} catch (JSONException e) {
				e.printStackTrace();
			}
		}
		
	}

	protected void confirmLogout() {
		
		AlertDialog.Builder builder = new AlertDialog.Builder(MainActivity.this);
		
		builder.setTitle("Logout");
		builder.setMessage("Are you sure that you want to logout?");
		
		builder.setPositiveButton("Yes",new DialogInterface.OnClickListener() {
		
			@Override
			public void onClick(DialogInterface dialog, int which) {
				logout();
				MainActivity.this.finish();
			}
			
		});
		
		builder.setNegativeButton("No",new DialogInterface.OnClickListener() {
		
		    @Override
		    public void onClick(DialogInterface dialog, int which) {
		        
		        dialog.cancel();
		
		    }
		    
		});
		
		AlertDialog alert = builder.create();
		alert.show();
		
	}

	private void addHeader() {
		
    	LayoutInflater inflater = getLayoutInflater();
        View header = inflater.inflate(R.layout.header_listview, expListView, false);
    	expListView.addHeaderView(header);
    	profilePicture();

    	tvUsername = (TextView) findViewById(R.id.tvUserName);
		tManager = (TelephonyManager) getSystemService
				(Context.TELEPHONY_SERVICE);
		phoneNo = tManager.getLine1Number();
    	
    	getUserName(phoneNo);
    	
	}
	
	private void getUserName(final String contactNo) {
		
		class GetUserName extends AsyncTask<String, Void, String> {

			@Override
			protected void onPostExecute(String s) {
				
				super.onPostExecute(s);
				
				
				if(s.substring(0, 13).equalsIgnoreCase("nameRetrieved")) {
					
					String json = s.substring(13);
					
					showName(json);
					
				} else {
					
					Toast.makeText(MainActivity.this, "No Name is retrieved.", Toast.LENGTH_SHORT).show();
					
				}
				
			}

			@Override
			protected String doInBackground(String... params) {

				HashMap<String, String> data = new HashMap<String, String>();
				
				data.put(Config.KEY_CONTACTNO, params[0]);
				
				GetRequestHandler rpc = new GetRequestHandler();
				
				String s = rpc.sendPostRequest(
						Config.getUserName_url, data);
				
				return s;
			}
			
		}
		
		GetUserName gq = new GetUserName();
		gq.execute(contactNo);
		
	}

	private void showName(String json) {
		
		try {
			
			JSONObject jo = new JSONObject(json);
			JSONArray ja = jo.getJSONArray(Config.TAG_JSON_ARRAY);
			JSONObject c = ja.getJSONObject(0);
			String name = c.getString(Config.TAG_PARENT_NAME).trim();
			
			tvUsername.setText(name);
			
		} catch(JSONException je) {
			
			je.printStackTrace();
			
		}
		
	}

	private void profilePicture() {

		profile_picture = (ImageView)findViewById(R.id.profile_pic);
		File pic = getApplicationContext().getFileStreamPath(Config.PICTURE_NAME);
		if(pic.exists()){
			try {
				FileInputStream streamIn = new FileInputStream(pic);
				bmp = BitmapFactory.decodeStream(streamIn);
				profile_picture.setImageBitmap(bmp);
			} catch (FileNotFoundException e) {
				e.printStackTrace();
			}
		}
		profile_picture.setOnClickListener(new OnClickListener(){

			@Override
			public void onClick(View v) {

				selectPic();
			}
		});
	}

	protected void selectPic() {
		
        final String [] items = new String [] {"Take from camera", "Select from gallery"};				
		ArrayAdapter<String> adapter = new ArrayAdapter<String> (this, 
				android.R.layout.select_dialog_item,items);
		AlertDialog.Builder builder	= new AlertDialog.Builder(this);
		
		builder.setTitle("Set Profile Picture");
		builder.setAdapter( adapter, new DialogInterface.OnClickListener() {
			public void onClick( DialogInterface dialog, int item ) { //pick from camera
				if (item == 0) {
					Intent intent 	 = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
					
					mImageCaptureUri = Uri.fromFile(new File(Environment.getExternalStorageDirectory(),
									   "tmp_avatar_" + String.valueOf(System.currentTimeMillis()) + ".png"));

					intent.putExtra(android.provider.MediaStore.EXTRA_OUTPUT, mImageCaptureUri);

					try {
						intent.putExtra("return-data", true);
						
						startActivityForResult(intent, Config.PICK_FROM_CAMERA);
					} catch (ActivityNotFoundException e) {
						e.printStackTrace();
					}
				} else { //pick from file
					Intent intent = new Intent();
					
	                intent.setType("image/*");
	                intent.setAction(Intent.ACTION_GET_CONTENT);
	                
	                startActivityForResult(Intent.createChooser(intent, "Complete action using"), 
	                		Config.PICK_FROM_FILE);
				}
			}
		} );
		
		final AlertDialog dialog = builder.create();
		
		dialog.show();
	}
    
    @Override
	protected void onActivityResult(int requestCode, int resultCode, Intent data) {
	    if (resultCode != RESULT_OK) return;
	   
	    switch (requestCode) {
		    case Config.PICK_FROM_CAMERA:
		    	doCrop();
		    	
		    	break;
		    	
		    case Config.PICK_FROM_FILE: 
		    	mImageCaptureUri = data.getData();
		    	
		    	doCrop();
	    
		    	break;	    	
	    
		    case Config.CROP_FROM_CAMERA:	    	
		        Bundle extras = data.getExtras();
	
		        if (extras != null) {	        	
		            Bitmap photo = extras.getParcelable("data");
		            bmp = extras.getParcelable("data");
		            savePicture();
		            profile_picture.setImageBitmap(photo);
		        }
	
		        File f = new File(mImageCaptureUri.getPath());            
		        
		        if (f.exists()) f.delete();
	
		        break;

	    }
	}
    
    private void savePicture() {
    	
		ByteArrayOutputStream bytes = new ByteArrayOutputStream();
		bmp.compress(Bitmap.CompressFormat.PNG, 100, bytes);
		try {
			FileOutputStream fos = getApplicationContext().openFileOutput(Config.PICTURE_NAME, 
					Context.MODE_PRIVATE);
			
			fos.write(bytes.toByteArray());
			fos.close();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	private void doCrop() {
		final ArrayList<CropOption> cropOptions = new ArrayList<CropOption>();
    	
    	Intent intent = new Intent("com.android.camera.action.CROP");
        intent.setType("image/*");
        
        List<ResolveInfo> list = getPackageManager().queryIntentActivities( intent, 0 );
        
        int size = list.size();
        
        if (size == 0) {	        
        	Toast.makeText(this, "Can not find image crop app", Toast.LENGTH_SHORT).show();
        	
            return;
        } else {
        	intent.setData(mImageCaptureUri);
            
            intent.putExtra("outputX", 200);
            intent.putExtra("outputY", 200);
            intent.putExtra("aspectX", 1);
            intent.putExtra("aspectY", 1);
            intent.putExtra("scale", true);
            intent.putExtra("return-data", true);
            
        	if (size == 1) {
        		Intent i 		= new Intent(intent);
	        	ResolveInfo res	= list.get(0);
	        	
	        	i.setComponent( new ComponentName(res.activityInfo.packageName, res.activityInfo.name));
	        	
	        	startActivityForResult(i, Config.CROP_FROM_CAMERA);
        	} else {
		        for (ResolveInfo res : list) {
		        	final CropOption co = new CropOption();
		        	
		        	co.title 	= getPackageManager().getApplicationLabel(res.activityInfo.applicationInfo);
		        	co.icon		= getPackageManager().getApplicationIcon(res.activityInfo.applicationInfo);
		        	co.appIntent= new Intent(intent);
		        	
		        	co.appIntent.setComponent( new ComponentName(res.activityInfo.packageName, 
		        			res.activityInfo.name));
		        	
		            cropOptions.add(co);
		        }
	        
		        CropOptionAdapter adapter = new CropOptionAdapter(getApplicationContext(), cropOptions);
		        
		        AlertDialog.Builder builder = new AlertDialog.Builder(this);
		        builder.setTitle("Choose Crop App");
		        builder.setAdapter( adapter, new DialogInterface.OnClickListener() {
		            public void onClick( DialogInterface dialog, int item ) {
		                startActivityForResult( cropOptions.get(item).appIntent, Config.CROP_FROM_CAMERA);
		            }
		        });
	        
		        builder.setOnCancelListener( new DialogInterface.OnCancelListener() {
		            @Override
		            public void onCancel( DialogInterface dialog ) {
		               
		                if (mImageCaptureUri != null ) {
		                    getContentResolver().delete(mImageCaptureUri, null, null );
		                    mImageCaptureUri = null;
		                }
		            }
		        } );
		        
		        AlertDialog alert = builder.create();
		        
		        alert.show();
        	}
        }
	}
	
	private void createGroupList() {
    	
        groupList = new ArrayList<String>();
        groupList.add("Announcement");
        groupList.add("Children");
        groupList.add("About");
        groupList.add("Logout");
    }
 
    private void createCollection() {
        // preparing children list
        String[] blank = {};

        String[] children = new String [childCount];
        for(int i=0; i<childCount; i++){
        	
        	children[i] = "Child "+(i+1);
        	
       	}
        
        listMenu = new LinkedHashMap<String, List<String>>();
 
        for (String laptop : groupList) {
        	if (laptop.equals("Announcement")) {
                loadChild(blank);
            } else if (laptop.equals("Children")) {
                loadChild(children);
            } else if (laptop.equals("About")) {
                loadChild(blank);
            } else if (laptop.equals("Logout")) {
                loadChild(blank);
            }
                listMenu.put(laptop, childList);
        }
    }
 
    private void loadChild(String[] laptopModels) {
        childList = new ArrayList<String>();
        for (String model : laptopModels)
            childList.add(model);
    }

	private void logout() {
		
		String logged = "out";
		try {
			fos = openFileOutput(FILENAME, Context.MODE_PRIVATE);
			fos.write(logged.getBytes());
			fos.close();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e) {
			e.printStackTrace();
		}
		startActivity(new Intent(MainActivity.this, OpeningActivity.class));
		MainActivity.this.finish();
		
	}

	private void replaceFragment(Fragment fragment) {
		
		if(fragment.isVisible()){
			return;
		}
		
		FragmentManager fragManager = getSupportFragmentManager();
		FragmentTransaction trans = fragManager.beginTransaction();
		
		trans.setCustomAnimations(R.anim.abc_grow_fade_in_from_bottom, 0);
		trans.replace(R.id.fragment_container, fragment);
		trans.addToBackStack(null);
		trans.commit();
		
		mCurrentFragment = fragment;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		if (mDrawerToggle.onOptionsItemSelected(item))
			return true;
		return super.onOptionsItemSelected(item);
	}

	@Override
	protected void onPostCreate(Bundle savedInstanceState) {
		
		super.onPostCreate(savedInstanceState);
		mDrawerToggle.syncState();
	}
	
	@Override
	public void onBackPressed() {

		boolean isDrawerOpen = mDrawerLayout.isDrawerOpen(expListView);
		if (!isDrawerOpen) {	
			if(mCurrentFragment == mAnnouncement){
				this.finish();
			}else{
				replaceFragment(mAnnouncement);
			}
		} else {
			mDrawerLayout.closeDrawer(expListView);
		}
	    
	}

	@Override
	public boolean onKeyDown(int keyCode, KeyEvent event) {
		
		if (keyCode == KeyEvent.KEYCODE_MENU) {
			boolean isDrawerOpen = mDrawerLayout.isDrawerOpen(expListView);
			if (!isDrawerOpen) {
				mDrawerLayout.openDrawer(expListView);
			} else {
				mDrawerLayout.closeDrawer(expListView);
			}
		}
		return super.onKeyDown(keyCode, event);
	}
 
	@Override
	public void onPause() {
		
//      LocalBroadcastManager.getInstance(this).unregisterReceiver(mRegistrationBroadcastReceiver);
		super.onPause();
      
	}

	@Override
	public void onResume() {
		
		super.onResume();
//      LocalBroadcastManager.getInstance(this).registerReceiver(mRegistrationBroadcastReceiver,
//              new IntentFilter(QuickstartPreferences.REGISTRATION_COMPLETE));
		
	}

    private boolean checkPlayServices() {
    	
        int resultCode = GooglePlayServicesUtil.isGooglePlayServicesAvailable(this);
        
        if (resultCode != ConnectionResult.SUCCESS) {
        	
            if (GooglePlayServicesUtil.isUserRecoverableError(resultCode)) {
            	
                GooglePlayServicesUtil.getErrorDialog(resultCode, this,
                        Config.PLAY_SERVICES_RESOLUTION_REQUEST).show();
                
            } else {
            	
                Log.i(Config.TAG_MAINACTIVITY, "This device is not supported.");
                finish();
                
            }
            
            return false;
            
        }
        
        return true;
        
    }
	
}

