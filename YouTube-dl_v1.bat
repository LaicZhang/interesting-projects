@echo off
:start
set /p dir=请输入保存路径：
set dir=%dir:/=\%
pushd %dir%
if /i not %dir%==%cd% goto :start
echo 保存路径：%cd%
:download
set /p input=请输入视频链接：
set input=%input:&=^^^&%
youtube-dl -F %input%
if errorlevel 1 goto :download
set /p code=请输入视频格式编号：
youtube-dl -f %code% %input%
goto :download
