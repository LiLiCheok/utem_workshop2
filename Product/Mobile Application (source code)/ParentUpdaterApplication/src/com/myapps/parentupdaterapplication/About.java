package com.myapps.parentupdaterapplication;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup;
import android.widget.TextView;

public class About extends Fragment implements OnClickListener {

	private TextView tvEmail;
	Intent intent = null;
	Intent chooser = null;
	
	@Override
	public void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
	}

	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
			Bundle savedInstanceState) {
		
		View view = inflater.inflate(R.layout.activity_about, container, false);
		
		tvEmail = (TextView) view.findViewById(R.id.tvEmailLink);
		tvEmail.setOnClickListener(this);
		
		return view;
	}

	@Override
	public void onClick(View v) {
		
		if (v == tvEmail) {
			
			intent = new Intent(Intent.ACTION_SEND);
			intent.setData(Uri.parse("mailto:"));
			String [] to = {"Workshop2Group16@gmail.com"};
			intent.putExtra(Intent.EXTRA_EMAIL, to);
			intent.putExtra(Intent.EXTRA_SUBJECT, "Feedback from User");
			intent.putExtra(Intent.EXTRA_TEXT, "");
			intent.setType("message/rfc822");
			chooser = Intent.createChooser(intent, "Send Email");
			startActivity(chooser);
			
		}
		
	}
	
}
