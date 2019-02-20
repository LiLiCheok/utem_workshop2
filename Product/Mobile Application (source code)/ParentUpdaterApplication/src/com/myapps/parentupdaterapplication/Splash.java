package com.myapps.parentupdaterapplication;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;

@SuppressWarnings("unused")
@SuppressLint("NewApi")
public class Splash extends AppCompatActivity {
	
	private static final String FILENAME = "LogCheck";
	private String collected = null;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.splash);
			
		// Thread for displaying the Splash Screen
		Thread splashTimer = new Thread() {

			@Override
			public void run() {
				try {
					sleep(1000);
				} catch (InterruptedException e) {
					e.printStackTrace();
				}
			}
		};
		
		Thread checkSignIn = new Thread() {

			@Override
			public void run() {
				
				checkSignIn();
				
			}
			
		};
		checkSignIn.start(); 
		//splashTimer.start();
		//checking();
				
	}
	
	private void checkSignIn() {
		
		File data = getApplicationContext().getFileStreamPath(FILENAME);
		if(!data.exists()){
			Intent i = new Intent(Splash.this, OpeningActivity.class);
			startActivity(i);
		}else{
			try {
				FileInputStream fis = openFileInput(FILENAME);
				byte[] dataArray = new byte[fis.available()];
				while(fis.read(dataArray)!= -1){
					collected = new String(dataArray);
				}
			} catch (FileNotFoundException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			} finally {
				if(collected.equals("in")){

					Intent i = new Intent(Splash.this, MainActivity.class);
					startActivity(i);
					
				}else{

					Intent i = new Intent(Splash.this, OpeningActivity.class);
					startActivity(i);
				}
			}
		}
	}
	
	private void checking() {
		
        class CheckSignIn extends AsyncTask<String, Void, String>{

            @Override
            protected void onPreExecute() {
                
                File data = getApplicationContext().getFileStreamPath(FILENAME);
        		if(!data.exists()){
        			Intent i = new Intent(Splash.this, OpeningActivity.class);
        			startActivity(i);
        		}else{
        			try {
        				FileInputStream fis = openFileInput(FILENAME);
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
            }

            @Override
            protected void onPostExecute(String s) {
            	if(collected.equals("in")){

					Intent i = new Intent(Splash.this, MainActivity.class);
					startActivity(i);
					
				}else{

					Intent i = new Intent(Splash.this, OpeningActivity.class);
					startActivity(i);
				}
            }

            @Override
            protected String doInBackground(String... params) {
            	Thread splashTimer = new Thread() {

        			@Override
        			public void run() {
        				try {
        					sleep(3000);
        				} catch (InterruptedException e) {
        					e.printStackTrace();
        				}
        			}
        		};
        		splashTimer.start();
            	
				return null;
            }
        }
        CheckSignIn csi = new CheckSignIn();
        csi.execute();
    }

	@Override
	protected void onPause() {
		super.onPause();
		finish();
	}
}
