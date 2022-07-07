# Human Resources Management System

This information system is meant for use in human resources specific business processes.
The project is still under development but is expected to have the following features:
- Full CRUD (Create, Read, Update, Delete) functionality for employee information
- Automatic calculations for changes in rates
- Individual profile view for presenting complete employee information
- Export tables to Excel format
- Print or save displayed table/information page
- Docker deployment

To view the project's progress, check the repository's **Projects** tab or click on [this link](https://github.com/siruthesiru/HRDB/projects/1).

<hr>

## Deployment

<p style="color:darkorange; font-weight: bold">NOTE: As the project is still in development, Docker deployment is still unavailabe.</p>

Do the following steps to deploy/run the project:

### Windows

1. Install **[PHP](https://www.php.net/downloads/)**
2. Install **[Composer](https://getcomposer.org/download/)**
3. Install **[NPM/Node.js](https://nodejs.org/en/download/)**
4. Install **[XAMPP](https://www.apachefriends.org/)**
5. Clone the repository
6. Rename *.env.backup* file to *.env*
7. Open your installed XAMPP program and start Apache and MySQL services.
8. Open your browser and go to the **[phpmyadmin](http://localhost/phpmyadmin)** page.
9. Create a database named *hrdb*.
10. Open a terminal in the repository's root and run `php artisan key:generate`
11. Run `npm remove node-sass && npm install sass`
12. Run `npm install`
13. Run `composer update`
14. Run `php artisan migrate`
15. Run `php artisan serve`

<br>

### Linux

1. Open a terminal and install the following packages as root: `php composer npm `
2. Install **[MySQL](https://dev.mysql.com/doc/mysql-shell/8.0/en/mysql-shell-install-linux-quick.html)**
3. Open a terminal and run `sudo service mysql start`
4. Run `sudo mysql`
5. In the MySQL prompt, run `CREATE DATABASE [IF NOT EXISTS] hrdb`
6. Clone the repository
7. Open a terminal in the repository's root and run `php artisan key:generate`
8. Run `npm remove node-sass && npm install sass`
9. Run `npm install`
10. Run `composer update`
11. Run `php artisan migrate`
12. Run `php artisan serve`

*Optional: Install dbeaver-ce for MySQL interface*

<br>

### MacOS
<p style="color:lightgray; font-style: italic">Can't really afford any Apple products so...</p>

<hr>

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Gerald Silverio via `sirutonin@gmail.com`. All security vulnerabilities will be promptly addressed.

<hr>

## License

This project is open-source and is therefore available under the **[MIT License](https://choosealicense.com/licenses/mit/)**.
<hr>
