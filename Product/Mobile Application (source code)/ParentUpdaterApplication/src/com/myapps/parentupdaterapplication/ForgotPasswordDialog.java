package com.myapps.parentupdaterapplication;

import java.util.HashMap;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.myapps.parentupdaterapplication.R;
import com.myapps.databasehandler.GetRequestHandler;

import android.annotation.SuppressLint;
import android.app.AlertDialog;
import android.app.Dialog;
import android.app.DialogFragment;
import android.app.ProgressDialog;
import android.content.Context;
import android.os.AsyncTask;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RelativeLayout;
import android.widget.RelativeLayout.LayoutParams;
import android.widget.TextView;
import android.widget.Toast;

@SuppressLint("InflateParams")
public class ForgotPasswordDialog extends DialogFragment implements OnClickListener {

	AlertDialog.Builder builder;
	private LayoutInflater inflater;
	private View v;

	private TelephonyManager tManager;
	private String userPhoneNumber;
	private TextView tvQuestion;
	private TextView tvShowQuestion;
	private TextView tvEnterAns;
	private EditText etAnswer;
	private Button btnOk;
	private Button btnNo;
	
	@Override
	public Dialog onCreateDialog(Bundle savedInstanceState) {
		
		inflater = getActivity().getLayoutInflater();
		v = inflater.inflate(R.layout.activity_forgot_password, null);
		builder = new AlertDialog.Builder(getActivity());
		builder.setTitle("Security Question");
		builder.setView(v);
		
		tvQuestion = (TextView) v.findViewById(R.id.tvQuestion);
		tvShowQuestion = (TextView) v.findViewById(R.id.tvShowQuestion);
		tvEnterAns = (TextView) v.findViewById(R.id.tvEnterAnswer);
		etAnswer = (EditText) v.findViewById(R.id.etEnterAnswer);
		btnOk = (Button) v.findViewById(R.id.btnOk);
		btnNo = (Button) v.findViewById(R.id.btnNo);
		
		tManager = (TelephonyManager) getActivity().getSystemService
				(Context.TELEPHONY_SERVICE);
		
		btnOk.setOnClickListener(this);
		btnNo.setOnClickListener(this);
		
		userPhoneNumber = tManager.getLine1Number();
		
		getQuestion(userPhoneNumber);
		
		return builder.create();
	}

	private void getQuestion(final String contactNo) {
		
		class GetQuestion extends AsyncTask<String, Void, String> {

			@Override
			protected void onPostExecute(String s) {
				
				super.onPostExecute(s);
				
				
				if(s.substring(0, 17).equalsIgnoreCase("questionRetrieved")) {
					
					String json = s.substring(17);
					
					showQuestion(json);
					
				} else {
					
					showError();
					
				}
				
			}

			@Override
			protected String doInBackground(String... params) {

				HashMap<String, String> data = new HashMap<String, String>();
				
				data.put(Config.KEY_CONTACTNO, params[0]);
				
				GetRequestHandler rpc = new GetRequestHandler();
				
				String s = rpc.sendPostRequest(
						Config.getSecurityQuestion_url, data);
				
				return s;
			}
			
		}
		
		GetQuestion gq = new GetQuestion();
		gq.execute(contactNo);
		
	}

	private void showQuestion(String json) {
		
		try {
			
			JSONObject jo = new JSONObject(json);
			JSONArray ja = jo.getJSONArray(Config.TAG_JSON_ARRAY);
			JSONObject c = ja.getJSONObject(0);
			String question = c.getString(Config.TAG_QUESTION).trim();
			
			tvShowQuestion.setText(question);
			
		} catch(JSONException je) {
			
			je.printStackTrace();
			
		}
		
	}
	
	public void showError() {
		
		tvShowQuestion.setText("No Question as this account is Invalid.");
		
		tvQuestion.setVisibility(View.GONE);
		tvEnterAns.setVisibility(View.GONE);
		etAnswer.setVisibility(View.GONE);
		btnOk.setVisibility(View.GONE);
		
		btnNo.setText("OK");
		RelativeLayout.LayoutParams params = 
			new RelativeLayout.LayoutParams(btnNo.getLayoutParams()
				.width = 250, LayoutParams.WRAP_CONTENT);
		params.addRule(RelativeLayout.ALIGN_PARENT_RIGHT);
		btnNo.setLayoutParams(params);
		
	}

	@Override
	public void onClick(View v) {
		
		if(v == btnOk) {
			
			if(etAnswer.getText().toString().length() == 0) {
				
				etAnswer.setError("Please enter your answer.");
				
			} else {
				
				answer();
				
			}
			
		} else if(v == btnNo) {
			
			ForgotPasswordDialog.this.dismiss();
			
		}
		
	}
	
	private void answer() {
		
		String phoneNumber = userPhoneNumber;
		String answer = etAnswer.getText().toString().trim();
		
		userAnswer(phoneNumber, answer);
		
	}

	private void userAnswer(final String phoneNumber, final String answer) {
		
		class UserAnswerClass extends AsyncTask<String, Void, String> {
			
			ProgressDialog loading;
			
			@Override
			protected void onPreExecute() {
				
				super.onPreExecute();
				loading = ProgressDialog.show(getActivity(), "Please Wait ...",
						"Matching ...", true, true);
				
			}

			@Override
			protected void onPostExecute(String result) {
				
				super.onPostExecute(result);
				loading.dismiss();
				
				if(result.equalsIgnoreCase("answer matched")) {
					
					Toast.makeText(getActivity(), result, Toast.LENGTH_SHORT).
						show();
					
					// Open a dialog to reset password
					ResetPasswordDialog dialog = new ResetPasswordDialog();
					dialog.show(getFragmentManager(), "reset_password_dialog");
					
					ForgotPasswordDialog.this.dismiss();
					
				} else {
					
					Toast.makeText(getActivity(), result, Toast.LENGTH_SHORT).
						show();
					
					etAnswer.setText("");
					
				}
				
			}

			@Override
			protected String doInBackground(String... params) {

				HashMap<String, String> data = new HashMap<String, String>();
				
				data.put("parent_contactNo", params[0]);
				data.put("security_answer", params[1]);
				
				GetRequestHandler rpc = new GetRequestHandler();
				
				String result = rpc.sendPostRequest(Config.
						matchSecurityAnswer_url, data);
				
				return result;
				
			}
			
		}
		
		UserAnswerClass uac = new UserAnswerClass();
		uac.execute(phoneNumber, answer);
		
	}

}
