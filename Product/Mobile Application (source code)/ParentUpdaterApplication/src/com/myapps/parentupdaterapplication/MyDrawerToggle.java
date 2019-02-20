package com.myapps.parentupdaterapplication;

import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarActivity;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;

@SuppressWarnings("deprecation")
public class MyDrawerToggle extends ActionBarDrawerToggle{

	ActionBarActivity mActivity;
	int openDrawer;
	int closeDrawer;
	
	public MyDrawerToggle(AppCompatActivity mainActivity, DrawerLayout drawerLayout,
			Toolbar toolbar, int openDrawerContentDescRes,
			int closeDrawerContentDescRes) {
		super(mainActivity, drawerLayout, toolbar, openDrawerContentDescRes,
				closeDrawerContentDescRes);
		// TODO Auto-generated constructor stub
	}

	@Override
	public void onDrawerClosed(View drawerView) {
		// TODO Auto-generated method stub
		super.onDrawerClosed(drawerView);
	}

	@Override
	public void onDrawerOpened(View drawerView) {
		// TODO Auto-generated method stub
		super.onDrawerOpened(drawerView);
	}

	@Override
	public void onDrawerSlide(View drawerView, float slideOffset) {
		// TODO Auto-generated method stub
		super.onDrawerSlide(drawerView, slideOffset);
	}
	
	

}
