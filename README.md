# Apache2-PHP-MySQL-WebStore
Small code example requested by an employer

Requirements:  
1. Set up the environment  
```
apt install apache2 php mysql-server php-mysql php-mysqlnd
service apache2 start
```  
2. Copy files to serving directory /var/www/html/  
3. Create the database and table  
```
CREATE DATABASE store;
CREATE TABLE products (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, pname VARCHAR(30) NOT NULL, pprice FLOAT(20, 2) NOT NULL);
```  
4. Create a user and fill in the variables in the PHP Code ($usarname, $password). I have used the following:
```
CREATE USER 'webapp'@'localhost' IDENTIFIED BY 'Complexity1!';
GRANT INSERT, DELETE, SELECT on store.products TO 'webapp'@'localhost';
FLUSH PRIVILEGEs;
```
