package com.myapps.parentupdaterapplication;

import java.util.HashMap;

import com.myapps.databasehandler.RegisterUserClass;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.telephony.TelephonyManager;
import android.text.method.HideReturnsTransformationMethod;
import android.text.method.PasswordTransformationMethod;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.CompoundButton.OnCheckedChangeListener;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

public class Register extends AppCompatActivity implements OnCheckedChangeListener,
OnClickListener {

	// Create variables for storing it's object
		private Button btnSignUp;
		private Button btnCancel;
		private CheckBox cbShowPassword;
		private EditText etIcNo;
		private EditText etCurrContactNo;
		private EditText etPassword;
		private EditText etConfirmPassword;
		private Spinner etSecurityQuestion;
		private EditText etSecurityAnswer;
		
		private TelephonyManager tManager;
		
		private static final String TITTLE="Register for an account";
		private Toolbar mToolbar;
		
		@Override
		protected void onCreate(Bundle savedInstanceState) {
			
			super.onCreate(savedInstanceState);
			setContentView(R.layout.activity_register);
			
			mToolbar = (Toolbar) findViewById(R.id.toolbar);
			setSupportActionBar(mToolbar);
			getSupportActionBar().setTitle(TITTLE);
			
			// Make the variables' object
			btnSignUp = (Button) findViewById(R.id.btnSignUp);
			btnCancel = (Button) findViewById(R.id.btnCancel);
			cbShowPassword = (CheckBox) findViewById(R.id.cbShowPassword);
			etIcNo = (EditText) findViewById(R.id.etIcNo);
			etCurrContactNo = (EditText) findViewById(R.id.etContactNo);
			etPassword = (EditText) findViewById(R.id.etNewPassword);
			etConfirmPassword = (EditText) findViewById(R.id.etConfirmPassword);
			etSecurityQuestion = (Spinner) findViewById(R.id.snSecurityQuestion);
			etSecurityAnswer = (EditText) findViewById(R.id.etAnswer);
			
			tManager = (TelephonyManager) getSystemService
					(Context.TELEPHONY_SERVICE);
			
			// get phone number
			etCurrContactNo.setText(tManager.getLine1Number());
			
			// add data
			btnSignUp.setOnClickListener(this);
			
			// cancel operation
			btnCancel.setOnClickListener(this);
			
			// show or hide password
			cbShowPassword.setOnCheckedChangeListener(this);
			
		}
		
		/**
		 * Show password if check box is checked,
		 * otherwise hide if it is unchecked.
		 */
		@Override
		public void onCheckedChanged(CompoundButton buttonView,
				boolean isChecked) {
			
			if(!isChecked) {
				// show password
				
				etPassword.setTransformationMethod(
					PasswordTransformationMethod.getInstance());
				
			} else {
				// hide password
				
				etPassword.setTransformationMethod(
					HideReturnsTransformationMethod.getInstance());
				
			}
		
		}

		/**
		 * All button click event in this method.
		 */
		@Override
		public void onClick(View v) {

			if(v == btnSignUp) {
				// Go this block if Sign Up button is clicked
				
				if(etIcNo.getText().toString().length() == 0) {
					
					etIcNo.setError("Please enter your Ic No.");
				
				} else if(etPassword.getText().toString().length() == 0) {
					
					etPassword.setError("Please enter your new password.");
					
				} else if(etConfirmPassword.getText().toString().length() == 0) {
					
					etConfirmPassword.setError("Please re-enter your password.");
					
				} else if(!(etPassword.getText().toString().equals(
					etConfirmPassword.getText().toString()))) {
					
					etConfirmPassword.setError("Password not match.");
					
				} else if(etSecurityAnswer.getText().toString().length() == 0) {
					
					etSecurityAnswer.setError("Please enter your security answer.");
					
				} else {
					
					registerUser();
				
				}
					
			} else if(v == btnCancel) {
				
				// Go this block if Cancel button is clicked
				actionCancel();
				
			}

		}

		private void actionCancel() {
			
			AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(
					this);
			
			// set title
			alertDialogBuilder.setTitle("Cancel");
			
			// set dialog message
			alertDialogBuilder.setMessage("Are you sure that you want to cancel?");
			
			alertDialogBuilder.setPositiveButton("Yes", new DialogInterface.
					OnClickListener() {
				
				// close current activity if this button is clicked
				@Override
				public void onClick(DialogInterface dialog, int which) {
					
					// Close Register page
					Register.this.finish();
					startActivity(new Intent(Register.this, OpeningActivity.class));
				}
				
			});
			
			alertDialogBuilder.setNegativeButton("No", new DialogInterface.
					OnClickListener() {
				
				/*
				 * close dialog box if this button is clicked
				 */
				@Override
				public void onClick(DialogInterface dialog, int which) {
					
					dialog.cancel();
					
				}
				
			});
			
			// show it
			alertDialogBuilder.show();
			
		}

		private void registerUser() {
			
			// Get the variables from EditText field
			String icNo = etIcNo.getText().toString().trim();
			String contactNo = etCurrContactNo.getText().toString().trim();
			String password = etPassword.getText().toString().trim();
			String question = etSecurityQuestion.getSelectedItem().toString().trim();
			String answer = etSecurityAnswer.getText().toString().trim();
			
			// Pass the variables to register method
			register(icNo, contactNo, password, question, answer);
			
		}

		private void register(String contactNo, String icNo,
				String password, String question, String answer) {
	        
			class RegisterUser extends AsyncTask<String, Void, String> {

				ProgressDialog loading;
				RegisterUserClass ruc = new RegisterUserClass();
				
				@Override
				protected void onPreExecute() {
					
					super.onPreExecute();
					loading = ProgressDialog.show(Register.this, "Please Wait",
							null, true, true);
					
				}
				
				@Override
				protected void onPostExecute(String s) {
					
					super.onPostExecute(s);
					loading.dismiss();

					// Display message whether it is successfully registered or not
					Toast.makeText(getApplicationContext(), s, Toast.LENGTH_LONG).
						show();
					
					if(s.equalsIgnoreCase("your ic number does not exist in the system.")) {
						
						
					} else if (s.equalsIgnoreCase("successfully registered")) {
					
						// Open Login page
						Intent openLogin = new Intent(Register.this, Login.class);
						startActivity(openLogin);
						finish();
						
					}
					
				}
				
				@Override
				protected String doInBackground(String... params) {
					
					// A HashMap is created
					HashMap<String, String> data = new HashMap<String, String>();
					
					// Put elements to HashMap
	                data.put("parent_id",params[0]);
	                data.put("parent_contactNo",params[1]);
	                data.put("parent_password",params[2]);
	                data.put("security_question",params[3]);
	                data.put("security_answer",params[4]);
	 
	                String result = ruc.sendPostRequest(Config.register_url, data);
	 
	                return  result;
	            
				}
				
			}
			
			RegisterUser ru = new RegisterUser();
			ru.execute(contactNo, icNo, password, question, answer);
			
		}
		
		/**
		 * This method prompts user to confirm exit this apps or stay on
		 */
		@Override
		public void onBackPressed() {
			
			actionCancel();
			
		}
}
