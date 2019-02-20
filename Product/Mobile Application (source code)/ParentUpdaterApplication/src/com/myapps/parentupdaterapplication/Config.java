package com.myapps.parentupdaterapplication;

/**
 * This class is used to store the required sripts and
 * any keys that will be used to send the request to php scripts,
 * as well as the JSON tags
 * @author Cheok Li Li
 */
public class Config {

	public static String ipAddress = "192.168.113.1";
	
	// Address of the required scripts
	public static final String register_url =
		"http://" + ipAddress + "/pus/register.php";
	
	public static final String login_url =
		"http://" + ipAddress + "/pus/login.php";
	
	public static final String getSecurityQuestion_url =
		"http://" + ipAddress + "/pus/getSecurityQuestion.php?contactNumber=";
	
	public static final String matchSecurityAnswer_url =
		"http://" + ipAddress + "/pus/matchSecurityAnswer.php";
	
	public static final String updatePassword_url =
		"http://" + ipAddress + "/pus/updatePassword.php";
	
	public static final String getAnnouncement_url =
		"http://" + ipAddress + "/pus/getAnnouncement.php";
	
	public static final String GCM_REGISTER_URL =
		"http://"+ ipAddress + "/pus/gcm_register.php";
	
	public static final String getUserName_url =
		"http://" + ipAddress + "/pus/getUserName.php";
	
	public static final String getChildCount_url =
		"http://" + ipAddress + "/pus/count_children.php";
	
	public static final String getChildListId_url =
		"http://" + ipAddress + "/pus/get_child_ids.php";
	
	public static final String getChildrenInfo_url =
		"http://" + ipAddress + "/pus/get_student.php";
	
	public static final String getChildExamSubject_url =
		"http://" + ipAddress + "/pus/get_exam_subject.php";
	
	public static final String getChildExamGrade_url =
		"http://" + ipAddress + "/pus/get_exam_grade.php";
	
	// Keys that will be used to send the request to php scripts
	public static final String KEY_CONTACTNO = "parent_contactNo";
	public static final String KEY_PASSWORD = "parent_password";
	public static final String KEY_TOKEN = "gcm_token";
	
	// JSON tags
	public static final String TAG_JSON_ARRAY = "result";
	public static final String TAG_PARENT_NAME = "parent_name";
	public static final String TAG_QUESTION = "security_question";
	public static final String TAG_PUBLISHER_NAME = "publisher_school_admin";
	public static final String TAG_WORKING_PLACE = "working_place";
	public static final String TAG_APPROVED_DATETIME = "a_created";
	public static final String TAG_ANNOUCEMENT_TITLE = "a_title";
	public static final String TAG_ANNOUCEMENT_DESCRIPTION = "a_description";
	public static final String TAG_APPROVER_NAME = "Approver_Name";
	public static final String TAG_APPROVER_POSITION = "Approver_Position";
	public static final String TAG_CHILD_COUNT ="count";
	
	// Variables that to pass with intent
	public static final String CONTACT_NO = "contactNo";
	
	public static final String PICTURE_NAME="pic.png";
	public static final int PICK_FROM_CAMERA = 1;
	public static final int CROP_FROM_CAMERA = 2;
	public static final int PICK_FROM_FILE = 3;
	
	public static final int PLAY_SERVICES_RESOLUTION_REQUEST = 9000;
	public static final String TAG_MAINACTIVITY = "MainActivity";

}