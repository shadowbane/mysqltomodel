[![Build Status](https://travis-ci.org/shadowbane/mysqltomodel.svg?branch=master)](https://travis-ci.org/shadowbane/mysqltomodel)
[![Total Downloads](https://poser.pugx.org/shadowbane/mysqltomodel/downloads)](https://packagist.org/packages/shadowbane/mysqltomodel)
[![Built For Laravel](https://img.shields.io/badge/built%20for-laravel-blue.svg)](http://laravel.com)
[![Latest Stable Version](https://poser.pugx.org/shadowbane/mysqltomodel/v/stable)](https://packagist.org/packages/shadowbane/mysqltomodel)
[![Latest Unstable Version](https://poser.pugx.org/shadowbane/mysqltomodel/v/unstable)](https://packagist.org/packages/shadowbane/mysqltomodel)
#MySQL To Model
Create easy model from MySQL / MariaDB Databases. This packages helps you create models from existing database tables & columns

###Features
  - Specify which connection & database to use
  - Set namespace for generated models
  - Specify if there's timestamp in tables when migrating

###Installing
```sh
composer require --dev shadowbane/mysqltomodel
```

Then, add line below to config/app.php:
```
Shadowbane\MySQLModel\MySQLModelServiceProvider::class,
```
###Running
```sh
php artisan mysqltomodel:make --help
Usage:
  mysqltomodel:make [options] [--] <connection> <database>

Arguments:
  connection                   The Connection defined in config/database.php
  database                     Database Name

Options:
      --namespace[=NAMESPACE]  Namespace to use. Defaulted using Connection Name
  -T, --timestamps             Whether the generated model should use timestamp
  -h, --help                   Display this help message
  -q, --quiet                  Do not output any message
  -V, --version                Display this application version
      --ansi                   Force ANSI output
      --no-ansi                Disable ANSI output
  -n, --no-interaction         Do not ask any interactive question
      --env[=ENV]              The environment the command should run under.
  -v|vv|vvv, --verbose         Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Help:
  Generate Models from existing databases
```
###Authors
[Adly Shadowbane]
###License
This project is licensed under the GNU General Public License v3.0

[//]: #
[Adly Shadowbane]: <mailto:adly.shadowbane@gmail.com>