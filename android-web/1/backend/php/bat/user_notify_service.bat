@echo off
cls
START C:\wamp\wampmanager.exe
echo MyLocalHook Notification Service Started
:start
php -f C:\wamp\www\publicIP.php>>C:\wamp\www\mylocalhook\backend\php\bat\logs\user_notify_service.log
goto start