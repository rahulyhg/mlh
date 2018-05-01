package com.test;

import java.util.List;

public class LatestNotificationServiceBean {
  private List<LatestNotify> latestNotify;
  public List<LatestNotify> getLatestNotify() { return latestNotify; }
  public void setLatestNotify(List<LatestNotify> latestNotify) { this.latestNotify = latestNotify; }
  public class LatestNotify {
   private String notifyId;
   private String userId;
   private String fromId;
   private String notifyHeader;
   private String notifyTitle;
   private String notifyMsg;
   private String notifyType;
   private String notifyURL;
   private String notifyTs;
   private String watched;
   private String popup;
   private String reqAccepted;
   private String calEvent;
   public String getNotifyId() { return notifyId; }
   public void setNotifyId(String notifyId) { this.notifyId = notifyId; }
   public String getUserId() { return userId; }
   public void setUserId(String userId) { this.userId = userId; }
   public String getFromId() { return fromId; }
   public void setFromId(String fromId) { this.fromId = fromId; }
   public String getNotifyHeader() { return notifyHeader; }
   public void setNotifyHeader(String notifyHeader) { this.notifyHeader = notifyHeader; }
   public String getNotifyTitle() { return notifyTitle; }
   public void setNotifyTitle(String notifyTitle) { this.notifyTitle = notifyTitle; }
   public String getNotifyMsg() { return notifyMsg; }
   public void setNotifyMsg(String notifyMsg) { this.notifyMsg = notifyMsg; }
   public String getNotifyType() { return notifyType; }
   public void setNotifyType(String notifyType) { this.notifyType = notifyType; }
   public String getNotifyURL() { return notifyURL; }
   public void setNotifyURL(String notifyURL) { this.notifyURL = notifyURL; }
   public String getNotifyTs() { return notifyTs; }
   public void setNotifyTs(String notifyTs) { this.notifyTs = notifyTs; }
   public String getWatched() { return watched; }
   public void setWatched(String watched) { this.watched = watched; }
   public String getPopup() { return popup; }
   public void setPopup(String popup) { this.popup = popup; }
   public String getReqAccepted() { return reqAccepted; }
   public void setReqAccepted(String reqAccepted) { this.reqAccepted = reqAccepted; }
   public String getCalEvent() { return calEvent; }
   public void setCalEvent(String calEvent) { this.calEvent = calEvent; }
  }
}