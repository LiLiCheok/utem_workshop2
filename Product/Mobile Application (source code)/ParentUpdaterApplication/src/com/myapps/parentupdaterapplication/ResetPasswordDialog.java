package com.myapps.parentupdaterapplication;

import java.util.HashMap;

import com.myapps.databasehandler.GetRequestHandler;

import android.annotation.SuppressLint;
import android.app.AlertDialog;
import android.app.Dialog;
import android.app.DialogFragment;
import android.app.ProgressDialog;
import android.os.AsyncTask;
import android.os.Bundle;
import android.text.method.HideReturnsTransformationMethod;
import android.text.method.PasswordTransformationMethod;
import android.view.LayoutInflater;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.CompoundButton;
import android.widget.CompoundButton.OnCheckedChangeListener;
import android.widget.EditText;
import android.widget.Toast;

@SuppressLint("InflateParams")
public class ResetPasswordDialog extends DialogFragment implements
	OnClickListener, OnCheckedChangeListener {

	AlertDialog.Builder builder;
	private LayoutInflater inflater;
	private View v;
	
	private EditText etResetNewPass;
	private EditText etConfirmNewPass;
	private Button btnReset;
	private Button btnNo1;
	private CheckBox cbViewPassword;
	
	@Override
	public Dialog onCreateDialog(Bundle savedInstanceState) {
		
		inflater = getActivity().getLayoutInflater();
		v = inflater.inflate(R.layout.activity_reset_password, null);
		builder = new AlertDialog.Builder(getActivity());
		builder.setTitle("Reset Password");
		builder.setView(v);
		
		etResetNewPass = (EditText) v.findViewById(R.id.etResetNewPass);
		etConfirmNewPass = (EditText) v.findViewById(R.id.etConfirmNewPass);
		btnReset = (Button) v.findViewById(R.id.btnReset);
		btnNo1 = (Button) v.findViewById(R.id.btnNo1);
		cbViewPassword = (CheckBox) v.findViewById(R.id.cbViewPassword);
		
		btnReset.setOnClickListener(this);
		btnNo1.setOnClickListener(this);
		cbViewPassword.setOnCheckedChangeListener(this);
		
		return builder.create();
	}

	@Override
	public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {

		if(!isChecked) {
			// show password
			
			etResetNewPass.setTransformationMethod(
				PasswordTransformationMethod.getInstance());
			
		} else {
			// hide password
			
			etResetNewPass.setTransformationMethod(
				HideReturnsTransformationMethod.getInstance());
			
		}
		
	}
	
	@Override
	public void onClick(View v) {
		
		if(v == btnReset) {
			
			if(etResetNewPass.getText().toString().length() == 0) {
				
				etResetNewPass.setError("Empty");
				
			} else if(etConfirmNewPass.getText().toString().length() == 0) {
				
				etConfirmNewPass.setError("Empty");
				
			} else if(!(etResetNewPass.getText().toString().equals(
				etConfirmNewPass.getText().toString()))) {
				
				etConfirmNewPass.setError("Password not match.");
					
			} else {
				
				reset();
				
			}
			
		} else if(v == btnNo1) {
			
			ResetPasswordDialog.this.dismiss();
			
		}
		
	}

	private void reset() {
		
		String contactNumber = Login.contactNumber;
		String newPassword = etResetNewPass.getText().toString().trim();
		
		resetPassword(contactNumber, newPassword);
		
	}

	private void resetPassword(final String contactNumber, final String
		newPassword) {
		
		class ResetPasswordClass extends AsyncTask<String, Void, String> {

			ProgressDialog loading;
			
			@Override
			protected void onPreExecute() {
				
				super.onPreExecute();
				loading = ProgressDialog.show(getActivity(), "Please Wait ...",
						"Loading ...", true, true);
				
			}

			@Override
			protected void onPostExecute(String result) {
				
				super.onPostExecute(result);
				
				loading.dismiss();
				
				if(result.equalsIgnoreCase("password changed")) {
				
					Toast.makeText(getActivity(), result, Toast.LENGTH_LONG).show();
					
					ResetPasswordDialog.this.dismiss();
					
				} else {
					
					Toast.makeText(getActivity(), result, Toast.LENGTH_LONG).show();
					
				}
				
			}

			@Override
			protected String doInBackground(String... params) {

				HashMap<String, String> data = new HashMap<String, String>();
				
				data.put(Config.KEY_CONTACTNO, params[0]);
				data.put(Config.KEY_PASSWORD, params[1]);
				
				GetRequestHandler fprh = new GetRequestHandler();
				
				String result = fprh.sendPostRequest(Config.updatePassword_url,
					data);
				
				return result;
			}
			
		}
		
		ResetPasswordClass ulc = new ResetPasswordClass();
		ulc.execute(contactNumber, newPassword);
		
	}

}
