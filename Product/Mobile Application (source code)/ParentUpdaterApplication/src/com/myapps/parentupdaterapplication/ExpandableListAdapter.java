package com.myapps.parentupdaterapplication;

import java.util.List;
import java.util.Map;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseExpandableListAdapter;
import android.widget.ImageView;
import android.widget.TextView;
 
@SuppressLint("InflateParams")
public class ExpandableListAdapter extends BaseExpandableListAdapter {
 
    private Activity context;
    private Map<String, List<String>> listMenu;
    private List<String> children;
 
    public ExpandableListAdapter(Activity context, List<String> children,
            Map<String, List<String>> listMenu) {
        this.context = context;
        this.listMenu = listMenu;
        this.children = children;
    }
 
    public Object getChild(int groupPosition, int childPosition) {
        return listMenu.get(children.get(groupPosition)).get(childPosition);
    }
 
    public long getChildId(int groupPosition, int childPosition) {
        return childPosition;
    }
    
    public View getChildView(final int groupPosition, final int childPosition,
            boolean isLastChild, View convertView, ViewGroup parent) {
        final String child = (String) getChild(groupPosition, childPosition);
        LayoutInflater inflater = context.getLayoutInflater();
         
        if (convertView == null) {
            convertView = inflater.inflate(R.layout.child_item, null);
        }
         
        TextView item = (TextView) convertView.findViewById(R.id.tvChild);
         
        item.setText(child);
        return convertView;
    }
 
    public int getChildrenCount(int groupPosition) {
        return listMenu.get(children.get(groupPosition)).size();
    }
 
    public Object getGroup(int groupPosition) {
        return children.get(groupPosition);
    }
 
    public int getGroupCount() {
        return children.size();
    }
 
    public long getGroupId(int groupPosition) {
        return groupPosition;
    }
 
    public View getGroupView(int groupPosition, boolean isExpanded,
            View convertView, ViewGroup parent) {
        String child = (String) getGroup(groupPosition);
        if (convertView == null) {
            LayoutInflater infalInflater = (LayoutInflater) context
                    .getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = infalInflater.inflate(R.layout.group_item, null);
        }
        
        ImageView indicator = (ImageView) convertView.findViewById(R.id.ivIndicator);
        if(getChildrenCount(groupPosition)==0){
        	indicator.setImageDrawable(null);
        }else{
        	if(isExpanded){
        		indicator.setImageResource(R.drawable.ic_arrow_up);
        	}else{
        		indicator.setImageResource(R.drawable.ic_arrow_down);
        	}
        }
        
        ImageView icon = (ImageView) convertView.findViewById(R.id.ivIcon);
        if(groupPosition == 0){
        	icon.setImageResource(R.drawable.announcement);
		}else if(groupPosition == 1){
			icon.setImageResource(R.drawable.student);
		}else if(groupPosition == 2){
			icon.setImageResource(R.drawable.about);
		}else if(groupPosition == 3){
			icon.setImageResource(R.drawable.logout);
		}
        TextView item = (TextView) convertView.findViewById(R.id.tvChildren);
        item.setText(child);
        return convertView;
        
    }
 
    public boolean hasStableIds() {
        return true;
    }
 
    public boolean isChildSelectable(int groupPosition, int childPosition) {
        return true;
    }
}
