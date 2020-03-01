# crud_v1
moCrud
heres some crud and chit
readthischit

<br>$> git clone https://github.com/aljamima/phpSqlMonitoring 
<br>$> cd phpSqlMonitoring
<br>$> sudo apt install mysql-server apache2 php php-mysql php-mysqli phpmyadmin libapache2-mod-php

<br>$> mysql_secure_installation # probably as sudo
<br>$> mysql -u root -p # to login to sql console
<br>mysql> create database jquery_crud; # then hit enter
<br>mysql> exit
<br>$> mysql -u root -p jquery_crud < jquery_crud.sql # this inserts our tables into the jquery database
<br>should now be ready to copy all files into 
<br>$> sudo cp -r * /var/www/html
<br>$> sudo service apache2 restart
<br>and set your browser to view 'localhost' or 127.0.0.1
# magical
