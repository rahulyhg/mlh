@echo off
cls
START C:\wamp\wampmanager.exe
echo MyLocalHook Notification Service Started
:start
SET SERVER_PATH=C:\wamp\www\mlh\android-web\backend\php\cj\
SET FILE_PATH=%SERVER_PATH%\cron.notification.service.automate.php
SET LOG_PATH=%SERVER_PATH%\user_notify_service.log
php -f %FILE_PATH% >> %LOG_PATH%
echo DONE SERVICE
timeout 1 > NUL
goto start