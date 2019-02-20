package com.myapps.parentupdaterapplication;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import android.annotation.SuppressLint;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.view.ViewGroup.LayoutParams;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemSelectedListener;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.SpinnerAdapter;
import android.widget.TextView;

public class ChildrenInfo extends Fragment {

	private static final String TAG_INFO="info";
    private static final String TAG_NAME = "student_name";
    private static final String TAG_IC ="student_ic";
    private static final String TAG_CLAS = "student_class";
    private static final String TAG_DC_TYPE ="student_descipline_type";
    private static final String TAG_DC_CASE ="student_descipline_case";
        
    private View view;

    private String exam_type, exam_category;
    private ListView lvSubject, lvGrade;
    //private ArrayAdapter<String> mListAdapter1, mListAdapter2;
    
    private TextView tvName, tvIC, tvClass, tvDisciplineCase, tvDisciplineDesc;
    private Spinner sExamType, sExamCategory;
    private SpinnerAdapter listExamTypeAdapter, listExamCategoryAdapter;
    private ArrayList<String> listExamType, listTest, listExam, listSubject, listGrade;
    private String childId = null;

	public ChildrenInfo(String data) {
		childId = data;
	}

	@SuppressLint("NewApi")
	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container,
			Bundle savedInstanceState) {
		view = inflater.inflate(R.layout.activity_children_info, container, false);
		
		tvName = (TextView) view.findViewById(R.id.student_name);
		tvIC = (TextView) view.findViewById(R.id.student_ic);
		tvClass = (TextView) view.findViewById(R.id.student_class);
		tvDisciplineCase = (TextView) view.findViewById(R.id.discipline_type);
		tvDisciplineDesc = (TextView) view.findViewById(R.id.dicipline_desc);
		sExamType = (Spinner) view.findViewById(R.id.exam_type);
		sExamCategory = (Spinner) view.findViewById(R.id.exam_category);

		lvSubject = (ListView)view.findViewById(R.id.lvSubject);
		lvGrade = (ListView)view.findViewById(R.id.lvGrade);

		getData();
		generateList();
				
		listExamTypeAdapter = new ArrayAdapter<String>(getActivity(),
				android.R.layout.simple_spinner_dropdown_item, listExamType);
		sExamType.setAdapter(listExamTypeAdapter);
		sExamType.setOnItemSelectedListener(new OnItemSelectedListener(){

			@Override
			public void onItemSelected(AdapterView<?> parent, View view,
					int position, long id) {
				if(position == 0){
					exam_type = "exam";
					listExamCategoryAdapter = new ArrayAdapter<String>(getActivity(),
							android.R.layout.simple_spinner_dropdown_item, listExam);
					sExamCategory.setAdapter(listExamCategoryAdapter);
				}else if(position == 1){
					exam_type = "test";
					listExamCategoryAdapter = new ArrayAdapter<String>(getActivity(),
							android.R.layout.simple_spinner_dropdown_item, listTest);
					sExamCategory.setAdapter(listExamCategoryAdapter);
				}
			}

			@Override
			public void onNothingSelected(AdapterView<?> parent) {				
			}
			
		});
		sExamCategory.setOnItemSelectedListener(new OnItemSelectedListener(){

			@Override
			public void onItemSelected(AdapterView<?> parent, View view,
					int position, long id) {
				if(position == 0){
					if(exam_type.equalsIgnoreCase("exam")){
						exam_category = "mid_year";
					}else if(exam_type.equalsIgnoreCase("test")){
						exam_category = "test1";
					}
					getSubject();
					getGrade();
				}else if(position ==1){
					if(exam_type.equalsIgnoreCase("exam")){
						exam_category = "end_year";
					}else if(exam_type.equalsIgnoreCase("test")){
						exam_category = "test2";
					}
					getSubject();
					getGrade();
				}
				
			}

			@Override
			public void onNothingSelected(AdapterView<?> parent) {
			}
			
		});

		return view;
	}

	private void getGrade() {

    	String urlSuffix = 
    			"?student_id="+childId+"&exam_type="+exam_type
    			+"&exam_category="+exam_category;
    	
        class GetGradeFromJSON extends AsyncTask<String, Void, String>{
        	
            @Override
            protected String doInBackground(String... params) {
            	
            	String s = params[0];
                BufferedReader bufferedReader = null;
                try {
                    URL url = new URL(Config.getChildExamGrade_url+s);
                    HttpURLConnection con = (HttpURLConnection) 
                    		url.openConnection();
                    bufferedReader = new BufferedReader(
                    		new InputStreamReader(con.getInputStream()));
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

            @Override
            protected void onPostExecute(String result){
            	
                fetchGrade(result);
            }
        }
        GetGradeFromJSON g = new GetGradeFromJSON();
        g.execute(urlSuffix);
	}

	public void fetchGrade(String result) {
		try {
			
            JSONObject jsonObj = new JSONObject(result);
            JSONArray info = jsonObj.getJSONArray("result");
            listGrade = new ArrayList<String>();
            
            for(int i=0; i<info.length(); i++){
                
            	JSONObject c = info.getJSONObject(i);
            	listGrade.add(c.getString("result_grade"));
                
            }
    		
    		int totalItem2 = listGrade.size();
    		LayoutParams lp2 = (LayoutParams)lvGrade.getLayoutParams();
    		lp2.height = totalItem2*96;
    		lvGrade.setLayoutParams(lp2);
    		lvGrade.setAdapter(new ArrayAdapter<String>(getContext(), android.R.layout.simple_list_item_1,
    				listGrade));
            
        } catch (JSONException e){
            e.printStackTrace();
        }
	}

	private void getSubject() {
		
    	String urlSuffix = 
    			"?student_id="+childId+"&exam_type="+exam_type
    			+"&exam_category="+exam_category;
    	
        class GetSubjectFromJSON extends AsyncTask<String, Void, String>{
        	
            @Override
            protected String doInBackground(String... params) {
            	
            	String s = params[0];
                BufferedReader bufferedReader = null;
                try {
                    URL url = new URL(Config.getChildExamSubject_url+s);
                    HttpURLConnection con = (HttpURLConnection) 
                    		url.openConnection();
                    bufferedReader = new BufferedReader(
                    		new InputStreamReader(con.getInputStream()));
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

            @Override
            protected void onPostExecute(String result){
            	
                fetchSubject(result);
            }
        }
        GetSubjectFromJSON g = new GetSubjectFromJSON();
        g.execute(urlSuffix);
	}

	public void fetchSubject(String result) {
		try {
			
            JSONObject jsonObj = new JSONObject(result);
            JSONArray info = jsonObj.getJSONArray("result");
            listSubject = new ArrayList<String>();
            
            for(int i=0; i<info.length(); i++){
                
            	JSONObject c = info.getJSONObject(i);
            	listSubject.add(c.getString("subject_name"));
                
            }
    		
    		int totalItem = listSubject.size();
    		LayoutParams lp = (LayoutParams)lvSubject.getLayoutParams();
    		lp.height = totalItem*96;
    		lvSubject.setLayoutParams(lp);
    		lvSubject.setAdapter(new ArrayAdapter<String>(getContext(), android.R.layout.simple_list_item_1,
    				listSubject));
            
        } catch (JSONException e){
            e.printStackTrace();
        }
	}

	private void generateList() {
		
		listExamType = new ArrayList<String>();
		listExamType.add("Exam");
		listExamType.add("Test");
		
		listExam = new ArrayList<String>();
		listExam.add("Mid Year Exam");
		listExam.add("End Year Exam");
		
		listTest = new ArrayList<String>();
		listTest.add("Test 1");
		listTest.add("Test 2");
	}

    public void getData(){
    	
    	String urlSuffix = "?student_id="+childId;
    	
        class GetDataJSON extends AsyncTask<String, Void, String>{
        	
            @Override
            protected String doInBackground(String... params) {
            	
            	String s = params[0];
                BufferedReader bufferedReader = null;
                try {
                    URL url = new URL(Config.getChildrenInfo_url+s);
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

            @Override
            protected void onPostExecute(String info){
                fetchData(info);
            }
        }
        GetDataJSON g = new GetDataJSON();
        g.execute(urlSuffix);
    }

	protected void fetchData(String myJSON){
	    
	    String name = "name";
	    String ic = "ic";
	    String clas = "class";
	    String dcType = "discipline1";
	    String dcCase = "discipline2";
	    
        try {
            JSONObject jsonObj = new JSONObject(myJSON);
            JSONArray info = jsonObj.getJSONArray(TAG_INFO);

            for(int i=0; i<info.length(); i++){
                
            	JSONObject c = info.getJSONObject(i);
                name = c.getString(TAG_NAME);
                ic = c.getString(TAG_IC);
                clas = c.getString(TAG_CLAS);
                dcType = c.getString(TAG_DC_TYPE);
                dcCase = c.getString(TAG_DC_CASE);
                
            }

            tvName.setText(name);
            tvIC.setText(ic);
            tvClass.setText(clas);
            tvDisciplineCase.setText(dcType);
            tvDisciplineDesc.setText(dcCase);
            
        } catch (JSONException e) {
            e.printStackTrace();
        }

    }
}
