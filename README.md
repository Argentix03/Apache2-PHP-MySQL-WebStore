# Apache2-PHP-MySQL-WebStore
Small code example requested by an employer

Requirements:
  ```apt nstall apache2 php mysql-server php-mysql php-mysqlnd```
  Copy files to serving directory /var/www/html/
  ```
  CREATE DATABASE store;
  CREATE TABLE products (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, pname VARCHAR(30) NOT NULL, pprice FLOAT(20, 2) NOT NULL);
  ```
  Create a user and fill in the variables in the PHP Code ($usarname, $password). I have used the following:
  ```
    GRANT INSERT, DELETE, SELECT on store.products TO 'webapp'@'localhost' WITH GRANT OPTIONS;
    FLUSH PRIVILEGEs;
  ```
