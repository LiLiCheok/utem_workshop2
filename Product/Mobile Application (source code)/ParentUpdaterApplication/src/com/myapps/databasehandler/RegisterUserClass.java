package com.myapps.databasehandler;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.HashMap;
import java.util.Map;

import javax.net.ssl.HttpsURLConnection;

public class RegisterUserClass {

	/**
	 * This method is used to send httpPostRequest
	 * @param requestURL
	 * @param postDataParams
	 * @return response
	 */
	public String sendPostRequest(String requestURL, HashMap<String, String>
		postDataParams) {

		// Creating a url
		URL url;
		String response = "";
		
		try {
			
			// Initializing url
			url = new URL(requestURL);
			
			// Creating an httmlurl connection
			HttpURLConnection conn = (HttpURLConnection) url.openConnection();
			
			// Configuring connection properties
			conn.setReadTimeout(15000);
			conn.setConnectTimeout(15000);
			conn.setRequestMethod("POST");
			conn.setDoInput(true);
			conn.setDoOutput(true);
			
			// Creating an output stream
			OutputStream os = conn.getOutputStream();
			
			// Writing parameters to the request
			BufferedWriter writer = new BufferedWriter(new OutputStreamWriter(
				os, "UTF-8"));
			
			writer.write(getPostDataString(postDataParams));
			writer.flush();
			writer.close();
			
			os.close();
			
			int responseCode=conn.getResponseCode();
			
			if (responseCode == HttpsURLConnection.HTTP_OK) {
				
				BufferedReader br = new BufferedReader(new InputStreamReader(
						conn.getInputStream()));
				response = br.readLine();
				
			} else {
				
				response = "Error Registering";
				
			}
			
		} catch (Exception e) {
			
			e.printStackTrace();
			
		}
		
		return response;
	}
		
	private String getPostDataString(HashMap<String, String> params) throws
		UnsupportedEncodingException {
		
		StringBuilder result = new StringBuilder();
		boolean first = true;
		
		for(Map.Entry<String, String> entry : params.entrySet()){
		
			if (first) {
				
				first = false;
			
			} else {
				
				result.append("&");
			
			}
			
			result.append(URLEncoder.encode(entry.getKey(), "UTF-8"));
			result.append("=");
			result.append(URLEncoder.encode(entry.getValue(), "UTF-8"));
		}
		
		return result.toString();
		
	}
	
}

