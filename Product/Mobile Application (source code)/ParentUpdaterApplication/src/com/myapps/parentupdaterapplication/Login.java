package com.myapps.parentupdaterapplication;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.HashMap;

import com.myapps.databasehandler.RegisterUserClass;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.Paint;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.telephony.TelephonyManager;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class Login extends AppCompatActivity implements OnClickListener {

	private Button btnLogin;
	private EditText etPassword;
	private TextView lblForgotPassword;
	private TextView tvContactNo;
	
	private TelephonyManager tManager;
	
	public static String contactNumber;
	
	private Toolbar mToolbar;
	private FileOutputStream fos;
	private static final String PICTURE_NAME="pic.png";
	private static final String FILENAME = "LogCheck";
	private static final String FILEFORCOUNT = "children";
	private static final String FILEFORIDS = "ids";
	private static final String TITTLE="Login to your account";
	
	private String phoneNo;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_login);
		
		mToolbar = (Toolbar) findViewById(R.id.toolbar);
		setSupportActionBar(mToolbar);
		getSupportActionBar().setTitle(TITTLE);
		
		// Assign object with it's id in xml file
		btnLogin = (Button) findViewById(R.id.btnLogin);
		etPassword = (EditText) findViewById(R.id.etPassword);
		lblForgotPassword = (TextView) findViewById
				(R.id.lblForgotPassword);
		tvContactNo = (TextView) findViewById(R.id.lblCurrContactNo);
		
		tManager = (TelephonyManager) getSystemService
				(Context.TELEPHONY_SERVICE);
		
		// Underline the link label
		lblForgotPassword.setPaintFlags(lblForgotPassword.getPaintFlags()
				| Paint.UNDERLINE_TEXT_FLAG);
		
		lblForgotPassword.setTextColor(Color.BLUE);
		
		// Get contact number
		phoneNo = tManager.getLine1Number();
		
		// Set phone number
		tvContactNo.setText(phoneNo);
		
		btnLogin.setOnClickListener(this);
		lblForgotPassword.setOnClickListener(this);
		
		// Pass contact number to dialog
		Bundle bundle = new Bundle();
		bundle.putString(Config.CONTACT_NO, phoneNo);
		contactNumber = bundle.getString(Config.CONTACT_NO).trim();
        
	}

	@Override
	public void onClick(View v) {

		if(v == btnLogin) {
		
			if(etPassword.getText().toString().length() == 0) {
				
				etPassword.setError("Please enter your password.");
				
			} else {
				
				login();
				
			}
			
		} else if(v == lblForgotPassword) {
			
			// Open a dialog to answer the security question
			ForgotPasswordDialog dialog = new ForgotPasswordDialog();
			dialog.show(getFragmentManager(), "forgot_password_dialog");
			
		}
		
	}

	private void login() {
		
		String username = tvContactNo.getText().toString().trim();
		String password = etPassword.getText().toString().trim();
		
		userLogin(username, password);
		
	}

	private void userLogin(final String username, final String password) {
				
		class UserLoginClass extends AsyncTask<String, Void, String> {

			ProgressDialog loading;
			
			@Override
			protected void onPreExecute() {
				
				super.onPreExecute();
				loading = ProgressDialog.show(Login.this, "Please Wait ...",
						"Loading ...", true, true);
				
			}

			@Override
			protected void onPostExecute(String s) {
				
				super.onPostExecute(s);
				
				loading.dismiss();
				
				if(s.equalsIgnoreCase("login successful")) {
					
					Toast.makeText(Login.this, s, Toast.LENGTH_SHORT).show();
					postLogin(true);
					getChildrenNumber();
					
				} else {
					postLogin(false);
					Toast.makeText(Login.this, s, Toast.LENGTH_SHORT).show();
				}
			}

			@Override
			protected String doInBackground(String... params) {

				HashMap<String, String> data = new HashMap<String, String>();
				
				data.put(Config.KEY_CONTACTNO, params[0]);
				data.put(Config.KEY_PASSWORD, params[1]);
				
				RegisterUserClass ruc = new RegisterUserClass();
				
				String result = ruc.sendPostRequest(Config.login_url, data);
				
				return result;
			}
			
		}
		
		UserLoginClass ulc = new UserLoginClass();
		ulc.execute(username, password);
		
	}

	public void postLogin(boolean b) {
		if(b==true){
			
			String logged = "in";
			try {
				
				fos = openFileOutput(FILENAME, Context.MODE_PRIVATE);
				fos.write(logged.getBytes());
				fos.close();
				
			} catch (FileNotFoundException e) {
				e.printStackTrace();
			} catch (IOException e) {
				e.printStackTrace();
			}
			
		}else{
			
		}
	}

	public void getChildListId() {
		
		phoneNo = tManager.getLine1Number();

        String urlSuffix = "?parent_contactNo="+phoneNo;
        
        class GetChildListId extends AsyncTask<String, Void, String>{

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
            }

            @Override
            protected void onPostExecute(String s) {
            	
            	try {
        			FileOutputStream fos = openFileOutput(FILEFORIDS, Context.MODE_PRIVATE);
        			fos.write(s.getBytes());
        			fos.close();
        		} catch (FileNotFoundException e) {
        			e.printStackTrace();
        		} catch (IOException e) {
        			e.printStackTrace();
        		}
            	
            	File data = getApplicationContext().getFileStreamPath(PICTURE_NAME);
				
				if(!data.exists()) {
					startActivity(new Intent(Login.this, UserProfile.class));
					Login.this.finish();
				}else{
					startActivity(new Intent(Login.this, MainActivity.class));
					Login.this.finish();
				}
            }

            @Override
            protected String doInBackground(String... params) {
                String s = params[0];
                BufferedReader bufferedReader = null;
                try {
                    URL url = new URL(Config.getChildListId_url+s);
                    HttpURLConnection con = (HttpURLConnection) url.openConnection();
                    bufferedReader = new BufferedReader(new InputStreamReader(con.getInputStream()));
                    StringBuilder sb = new StringBuilder();

                    String result;
                    String line = null;
                    while ((line = bufferedReader.readLine()) != null)
                    {
                        sb.append(line + "\n");
                    }
                    result = sb.toString();
                    return result;
                }catch(Exception e){
                    return null;
                }
            }
        }

        GetChildListId gcli = new GetChildListId();
        gcli.execute(urlSuffix);
	}
	
	private void getChildrenNumber() {
		
		phoneNo = tManager.getLine1Number();

        String urlSuffix = "?parent_contactNo="+phoneNo;
        class GetChildrenCount extends AsyncTask<String, Void, String>{

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
            }

            @Override
            protected void onPostExecute(String s) {
            	try {
        			FileOutputStream fos = openFileOutput(FILEFORCOUNT, Context.MODE_PRIVATE);
        			fos.write(s.getBytes());
        			fos.close();
        		} catch (FileNotFoundException e) {
        			e.printStackTrace();
        		} catch (IOException e) {
        			e.printStackTrace();
        		}
            	getChildListId();
            }

            @Override
            protected String doInBackground(String... params) {
                String s = params[0];
                BufferedReader bufferedReader = null;
                try {
                    URL url = new URL(Config.getChildCount_url+s);
                    HttpURLConnection con = (HttpURLConnection) url.openConnection();
                    bufferedReader = new BufferedReader(new InputStreamReader(con.getInputStream()));

                    String result;
                    result = bufferedReader.readLine();
                    return result;
                }catch(Exception e){
                    return null;
                }
            }
        }
        GetChildrenCount gcc = new GetChildrenCount();
        gcc.execute(urlSuffix);
    }

	/**
	 * This method prompts user to confirm exit this apps or stay on
	 */
	@Override
	public void onBackPressed() {
		
		AlertDialog.Builder builder = new AlertDialog.Builder(this);
		
		builder.setTitle("Cancel");
		builder.setMessage("Are you sure that you want to cancel?");
		
		builder.setPositiveButton("Yes",new DialogInterface.OnClickListener() {
		
			@Override
			public void onClick(DialogInterface dialog, int which) {
			
			    startActivity(new Intent(Login.this, OpeningActivity.class));
				Login.this.finish();
			
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
