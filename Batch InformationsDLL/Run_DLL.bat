@echo off
FOR /f "tokens=1,2,3 delims= " %%a IN (list.txt) DO (
echo open %%a> ftp.txt
echo Paul>> ftp.txt
echo pipoma>> ftp.txt
echo cd /ddc>> ftp.txt
echo mkdir InformationsDLL>> ftp.txt
echo cd InformationsDLL>> ftp.txt
echo bin >> ftp.txt
echo put InformationsDLL.exe>> ftp.txt
echo bye>> ftp.txt
ftp -i -s:ftp.txt
psexec -u Administrateur -p inf0 \\%%a C:\InformationsDLL\InformationsDLL.exe
echo open %%a> ftp_get.txt
echo Paul>> ftp_get.txt
echo pipoma>> ftp_get.txt
echo cd ddc/InformationsDLL/>> ftp_get.txt
echo bin>> ftp_get.txt
echo get InformationsDLL.csv>> ftp_get.txt
echo bye>> ftp_get.txt
ftp -i -s:ftp_get.txt
if exist InformationsDLL_%%b_%%c.csv del InformationsDLL_%%b_%%c.csv
rename InformationsDLL.csv InformationsDLL_%%b_%%c.csv
move InformationsDLL_%%b_%%c.csv ResultatsDLL
)
php -f "script.php"
pause