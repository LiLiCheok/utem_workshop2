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

public class GetRequestHandler {

	/**
	 * This method is used to send the get request to server.
	 * @param requestURL
	 * @param contactNumber
	 * @return specific column data from database
	 */
    public String sendGetRequestParam(String requestURL, String contactNumber) {
    	
        StringBuilder sb = new StringBuilder();
        
        try {
        	
            URL url = new URL(requestURL + contactNumber);
            
            HttpURLConnection con = (HttpURLConnection) url.openConnection();
            
            BufferedReader bufferedReader = new BufferedReader(
            	new InputStreamReader(con.getInputStream()));
 
            String s = null;
            
            while((s = bufferedReader.readLine()) != null) {
            	
                sb.append(s + "\n");
                
            }
            
        } catch(Exception e) {}
        
        return sb.toString();
        
    }
	
	/**
	 * Method to send httpPostRequest.
	 * Two argument took:
	 * First argument is the script's url to which we will send the request
	 * Other is an HashMap with name value pairs containing the data to be send
	 * with the request 
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
				
				response = "Error Updating";
				
			}
			
		} catch (Exception e) {
			
			e.printStackTrace();
			
		}
		
		return response;
	}

	private String getPostDataString(HashMap<String, String> params)
		throws UnsupportedEncodingException {
	    
		StringBuilder result = new StringBuilder();
	    boolean first = true;
	    
	    for (Map.Entry<String, String> entry : params.entrySet()) {
	    	
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
