@ECHO OFF
:label
java -Xmx4G -Xms2G -jar mlh-categories.jar jdbc:mysql://192.168.1.4:3306/mlh_basic root -  C:/wamp/www/mlh/android-admin/mlh-admin/web/data categories.json 
