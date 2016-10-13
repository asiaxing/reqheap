# reqheap

Thursday, October 13, 2016

I'm tring to revive reqheap.

Most of the github projects didn't give a detailed description about how to setup the development envrionment. Now I'll show a sample.

## For Developers
###1. Setup Development Environment at Ubuntu 16.04
####1.1 Install apache2
        #apt-get install apache2
        #apt-get install libapache2-mod-php7.0
####1.2 Install PHP7.0
        #apt-get install php7.0
        #apt-get install php7.0-cli
        #apt-get install php7.0-cgi
        #apt-get install php7.0-fpm
        #apt-get install php7.0-gd
        #apt-get install php7.0-json
        #apt-get install php7.0-curl
        #apt-get install php7.0-mysql
        #apt-get install php7.0-readline
####1.3 Install MySql
        #apt-get install mysql-server
        #apt-get install mysql-client
        #apt-get install libmysqlclient-dev
####1.4 Check Environment
#####1.4.1 login mysql
        #mysql -u root -p
        mysql>show databases;
        mysql>quit
#####1.4.2 configure web service root
        #gedit /etc/apache2/apache2.conf
        #gedit /etc/apache2/sites-available/000-default.conf
       