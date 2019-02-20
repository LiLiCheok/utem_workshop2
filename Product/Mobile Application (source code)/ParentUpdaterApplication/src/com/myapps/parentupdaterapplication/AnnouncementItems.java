package com.myapps.parentupdaterapplication;

/**
 * This class works as a Model to save the JSON data and then providing that
 * data back to the Customized ListView.
 * @author Li Li
 */
public class AnnouncementItems {

	private String publisherName;
	private String workingPlace;
	private String approvedDate;
	private String announcementTitle;
	private String announcementInfo;
	private String approverName;
	private String approverPosition;
	
	public AnnouncementItems(){}

	public String getPublisherName() {
		return publisherName;
	}

	public void setPublisherName(String publisherName) {
		this.publisherName = publisherName;
	}

	public String getPublishDate() {
		return approvedDate;
	}

	public void setPublishDate(String publishDate) {
		this.approvedDate = publishDate;
	}

	public String getAnnouncementTitle() {
		return announcementTitle;
	}

	public void setAnnouncementTitle(String announcmentTitle) {
		this.announcementTitle = announcmentTitle;
	}

	public String getAnnouncementInfo() {
		return announcementInfo;
	}

	public void setAnnouncementInfo(String announcementInfo) {
		this.announcementInfo = announcementInfo;
	}

	public String getApproverName() {
		return approverName;
	}

	public void setApproverName(String approverName) {
		this.approverName = approverName;
	}

	public String getApproverPosition() {
		return approverPosition;
	}

	public void setApproverPosition(String approverPosition) {
		this.approverPosition = approverPosition;
	}

	public String getWorkingPlace() {
		return workingPlace;
	}

	public void setWorkingPlace(String workingPlace) {
		this.workingPlace = workingPlace;
	}
	
}
