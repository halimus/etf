
# Test assignment
1.  Parse Top 10 Holdings, Country Weights and Sector Weights, ETF name and fund description
information for ETFs requested by the user from State Street ETF page (http://spdrs.com) and 
store it in a database. Display results to the user as HTML table and provide download link to 
CSV file. If the same symbol is requested again, retrieve it from local database instead of parsing 
the site again. For testing purposes only use ETFs found under Global/International Equities and 
US Equities sections of spdrs.com website.
      
      a.  Display charts for top 10 holdings (bar chart), Country and Sector Weights (pie charts) 
       along with the table.

2.  Protect the page with a login (username and password). Login information is stored in a 
    database. 
    
      a.  Create a page for adding new users (information requested: username, password, 
        name, email)
   
      b.  Store requested symbols for each user in a database, encrypt passwords. Display history 
        of requested symbols to the user. 

## Assignment details and clarification
Sample State Street ETF page: https://www.spdrs.com/product/fund.seam?ticker=SPY (top holdings are 
located under Holdings tab)

User input should be accepted via web (create a simple form where user can supply ETF symbol)

## Technology:
- Programming language: PHP with a framework (Laravel is preferred but any framework is ok)

- Database: MySQL is preferred but not required

- Charts: building charts using D3, AmCharts or similar library

- Use of HTML parsing libraries, CSS and frameworks are allowed

It is preferred if the completed assignment is presented as a working page online. Code and database 
export will need to be presented as well, along with installation and compilation instructions.



## My Solution:
This application is created for a Test Assignment purpose 2017.

Technologies used:

- [PHP Laravel Framework (5.4)](https://laravel.com/).
- [MySQL Database](https://www.mysql.com/).
- [CSS Bootstrap](http://getbootstrap.com/).
- [jQuery](https://jquery.com/).
- [Highcharts](https://www.highcharts.com/).
- [amCharts](https://www.amcharts.com/).

**Features:**
- Responsive & Beautiful custom template
- Export data to CSV
- Manage users
- Log actions
- Easy to switch between 2 types of chart ([Highcharts](https://www.highcharts.com/) or [amCharts](https://www.amcharts.com/))

## Demo : 
https://demo.halimlardjane.com/etf

**The credentials infos:**<br>
Email address: admin@domain.com<br>
Password: 123456

## Database schema: 

![alt tag](https://github.com/halimus/etf/blob/master/public/images/mpd.png)


## Installation: 
*This application is developed with Laravel Framework 5.4.<br>
So, maybe you need to have the requirement in your computer before install this application.<br>
For more informations about the requirement, please check in [Laravel documention](https://laravel.com/docs/5.4#server-requirements).<br>*

**1- Pull up the application to your machine:**

    git clone https://github.com/halimus/etf.git

![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/1.jpg)

**2- Use Composer to install dependencies:**

    composer install

![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/2.jpg)



**3- Create a new file .env (This file is copy of .env.example):**
<br>

    cp .env.example .env

![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/3.jpg)


**4- Update the cresentials of database in the .env file:**
<br>

![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/4.jpg)
    

**5- Generate a Laravel key:**

    php artisan key:generate

![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/5.jpg)

**6- Create a MySQL database and choose a name as you want (This name should match with the name in the .env file):**

![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/6.jpg)


**7- Run migration to migrate the database structure:**

    php artisan migrate

![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/7.jpg)


**8- Run database seeder to populate database with 2 users by default:**

    php artisan db:seed

![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/8.jpg)


**9- Run the server:**

    php artisan serve

![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/9.jpg)


## Screenshots: 

![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/10.jpg)


![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/11.jpg)


![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/12.jpg)


![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/13.jpg)


![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/14.jpg)


![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/export.jpg)


![alt tag](https://github.com/halimus/etf/blob/master/public/images/install/15.jpg)



## License

This application is open-source licensed under [My license](http://halim.lardjane.com/).
