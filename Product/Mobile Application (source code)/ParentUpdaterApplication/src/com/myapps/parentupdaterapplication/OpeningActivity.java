package com.myapps.parentupdaterapplication;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.TextView;

public class OpeningActivity extends AppCompatActivity implements OnClickListener {

	TextView tvLogin;
	Button bRegister;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_opening);
		
		tvLogin = (TextView)findViewById(R.id.tvlogin);
		bRegister = (Button)findViewById(R.id.bregister);
		tvLogin.setOnClickListener(this);
		bRegister.setOnClickListener(this);

	}

	@Override
	public void onClick(View v) {
		
		if(v==tvLogin){

			Intent i = new Intent(OpeningActivity.this, Login.class);
			startActivity(i);
			OpeningActivity.this.finish();
		}
		else if(v==bRegister){

			Intent i = new Intent(OpeningActivity.this, Register.class);
			startActivity(i);
			OpeningActivity.this.finish();
		}
	}
	
	/**
	 * This method prompts user to confirm exit this apps or stay on
	 */
	@Override
	public void onBackPressed() {
		
		AlertDialog.Builder builder = new AlertDialog.Builder(this);
		
		builder.setTitle("Confirm Exit");
		builder.setMessage("Do you want to exit this application?");
		
		builder.setPositiveButton("Yes",new DialogInterface.OnClickListener() {
		
			@Override
			public void onClick(DialogInterface dialog, int which) {
			
				finish();
			
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
	
}
