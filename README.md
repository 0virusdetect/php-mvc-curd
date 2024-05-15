## **Hi there , My Name is Abhishek**
I'm a software engineer who is passionate about making contributing to open-source more approachable, creating technology to elevate people, and building community.
## **Skills and Experience**
* HTML
* CSS
* PHP


## **I have created a PHP CRUD Operation using MVC Sturcture**
I made this project just for fun, it allows you to create nice and simple PHP MVC CRUD Operation that you can copy/paste and use in your Project.

## **Databse setup**
* Create a Database named mvc
* Then copy and paste the mvc.sql File Data into sql Query 
* Then change the Username and Password in config/database.php file
  
## **For Linux users**

**Run the below code**

	sudo a2enmod rewrite
 
**Go to Directory -** /etc/apache2/sites-available/000-default.conf and add these code inside <VirtualHost *:80>

    <Directory /var/www/html>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Require all granted
    </Directory>

**Add the above code in that File**

**Then,Restart your apache Server** 

    sudo systemctl restart apache2

## **Create a .htaccess file**
**Go to Directory -** /var/www/html/.htaccess

**then, add these lines**

    RewriteEngine on

## **For Windows users**
**Go to Directory -** C:\Apache24\conf

**Find -** rewrite_module

    #LoadModule rewrite_module modules/mod_rewrite.so
    remove # from the beginning

**Find -** <Directory<Directory /> /> (in the same file - C:\Apache24\conf)

    <Directory />
	AllowOverride all
	Options Indexes FollowSymLinks MultiViews
	Require all granted
	</Directory>
 Replace whole Directory code with the above code

 **Find -** AllowOverride none - set to **AllowOverride all** (every AllowOveride none)

**To utilize the provided code, you have two options:**
1. Download the Zip File:

>Simply download the provided Zip file and extract its contents.

2. Clone the Repository:

>Alternatively, you can clone the repository using Git. Execute the following command in your terminal:
    git clone [repository URL]

Once you have the code on your local machine, you can run it effortlessly. Use the following command:

    php -S localhost:2343

to run this you need to remove public in header.php and footer.php files

header.php in layout folder(simply remove public/)

	<link rel="stylesheet" href="public/css/style.css">

footer.php in layout folder(simply remove public/)

	<script src="public/js/script.js"></script>
 
or

    localhost/php-mvc-crud/

**-Thankyou**
