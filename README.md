Yii 2 Basic Project Template
============================

Yii 2 Basic Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
rapidly creating small projects.

The template contains the basic features including user login/logout and a contact page.
It includes all commonly used configurations that would allow you to focus on adding new
features to your application.

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-basic/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-basic/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-basic.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-basic)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install this project template using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:^1.2.0"
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-basic basic
~~~

Now you should be able to access the application through the following URL, assuming `basic` is the directory
directly under the Web root.

~~~
http://localhost/basic/web/
~~~


### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `basic` that is directly under the Web root.

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

You can then access the application through the following URL:

~~~
http://localhost/basic/web/
~~~


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.
- Check and edit the other files in the `config/` directory to customize your application as required.
- Refer to the README in the `tests` directory for information specific to basic application tests.



TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
By default there are 3 test suites:

- `unit`
- `functional`
- `acceptance`

Tests can be executed by running

```
composer exec codecept run
``` 

The command above will execute unit and functional tests. Unit tests are testing the system components, while functional
tests are for testing user interaction. Acceptance tests are disabled by default as they require additional setup since
they perform testing in real browser. 


### Running  acceptance tests

To execute acceptance tests do the following:  

1. Rename `tests/acceptance.suite.yml.example` to `tests/acceptance.suite.yml` to enable suite configuration

2. Replace `codeception/base` package in `composer.json` with `codeception/codeception` to install full featured
   version of Codeception

3. Update dependencies with Composer 

    ```
    composer update  
    ```

4. Download [Selenium Server](http://www.seleniumhq.org/download/) and launch it:

    ```
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ``` 

5. (Optional) Create `yii2_basic_tests` database and update it by applying migrations if you have them.

   ```
   tests/bin/yii migrate
   ```

   The database configuration can be found at `config/test_db.php`.


6. Start web server:

    ```
    tests/bin/yii serve
    ```

7. Now you can run all available tests

   ```
   # run all available tests
   composer exec codecept run

   # run acceptance tests
   composer exec codecept run acceptance

   # run only unit and functional tests
   composer exec codecept run unit,functional
   ```

### Code coverage support

By default, code coverage is disabled in `codeception.yml` configuration file, you should uncomment needed rows to be able
to collect code coverage. You can run your tests and collect coverage with the following command:

```
#collect coverage for all tests
composer exec codecept run -- --coverage-html --coverage-xml

#collect coverage only for unit tests
composer exec codecept run unit -- --coverage-html --coverage-xml

#collect coverage for unit and functional tests
composer exec codecept run functional,unit -- --coverage-html --coverage-xml
```

You can see code coverage output under the `tests/_output` directory.

Installation
-------

The most straightforward way to get started with Yii2 is to use the basic application template provided by the Yii2 team. This template is also available through the Composer tool.

Step 1 − Find a suitable directory in your hard drive and download the Composer PHAR (PHP archive) via the following command.

curl -sS https://getcomposer.org/installer | php

Step 2 − Then move this archive to the bin directory.

mv composer.phar /usr/local/bin/composer

Step 3 − With the Composer installed, you can install Yii2 basic application template. Run these commands.

composer global require "fxp/composer-asset-plugin:~1.1.1"
composer create-project --prefer-dist yiisoft/yii2-app-basic helloworld

The first command installs the composer asset plugin, which manages npm and bower dependencies. The second command installs Yii2 basic application template in a directory called helloworld.

Step 4 − Now open the helloworld directory and launch the web server built into PHP.

php -S localhost:8080 -t web

Step 5 − Then open http://localhost:8080 in your browser. You can see the welcome page.



Database dump
-------

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema university
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `university2` DEFAULT CHARACTER SET utf8 ;
USE `university2` ;

-- -----------------------------------------------------
-- Table `university`.`students`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `university2`.`students` (
  `idstudents` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`idstudents`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `university`.`courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `university2`.`courses` (
  `idcourses` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `start_date` TIMESTAMP NUll DEFAULT CURRENT_TIMESTAMP,
  `end_date` TIMESTAMP NULL,
  PRIMARY KEY (`idcourses`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `university`.`users`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `university2`.`users` (
  `idusers` INT NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `auth_key` VARCHAR(45) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `created_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusers`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `university`.`students_has_courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `university2`.`students_has_courses` (
  `students_idstudents` INT NOT NULL,
  `courses_idcourses` INT NOT NULL,
  PRIMARY KEY (`students_idstudents`, `courses_idcourses`),
  INDEX `fk_students_has_courses_courses1_idx` (`courses_idcourses` ASC),
  INDEX `fk_students_has_courses_students_idx` (`students_idstudents` ASC),
  CONSTRAINT `fk_students_has_courses_students`
    FOREIGN KEY (`students_idstudents`)
    REFERENCES `university2`.`students` (`idstudents`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_students_has_courses_courses1`
    FOREIGN KEY (`courses_idcourses`)
    REFERENCES `university2`.`courses` (`idcourses`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`idcourses`, `title`) VALUES
(1, 'Math'),
(2, 'Programming'),
(3, 'Training'),
(4, 'English'),
(5, 'Tech'),
(6, 'Test Automation'),
(7, 'QA'),
(8, 'Web technology'),
(9, 'Java'),
(10, 'PHP'),
(11, 'Mobile development');

-- --------------------------------------------------------


--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idstudents`, `name`, `address`, `phone`) VALUES
(1, 'Ivan Ivanov', 'AAAA1', '256789004'),
(2, 'Igor Petrov', 'BBBB8', '123456789'),
(3, 'Mary Smirnova', 'ZZZZ1', '392456700'),
(4, 'Anna Johnson', 'PPPP9', '948329040');

-- --------------------------------------------------------


--
-- Dumping data for table `students_has_courses`
--

INSERT INTO `students_has_courses` (`students_idstudents`, `courses_idcourses`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2);