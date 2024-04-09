# php-mvc-curd
<----- for linux ------->
go to /etc/apache2/sites-available/000-default.conf
add these line 
<Directory /var/www/html>
Options Indexes FollowSymLinks MultiViews
AllowOverride All
Require all granted
</Directory>

then,restart your apache server
sudo systemctl restart apache2

create a .htaccess file in 
/var/www/html/.htaccess
add these lines 
RewriteEngine on

download zip and extract in /var/www/html/
run the project 

<-------- running this online as a root directory ----------->

then add .htaccess file in root folder 
upload all the files and then 
go to public/index.php file
$base_uri = '/mvc_startup';
change this line into your website link 
$base_uri = 'yourwebsitelink/';


<-------- database ------->
create a database named mvc
then copy and paste the mvc.sql file data into sql query 
then change the username and password in config/database.php file


then run your website
