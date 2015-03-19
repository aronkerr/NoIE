NoIE
=======

Introduction
------------
A ZF2 module that keeps users from accessing an application if they are using Internet Explorer. If a user using Internet Explorer attempts to access the application a status code 406 will be returned and a custom 406 error template will be displayed. The message returned is designed to look like exactly like the normal IE errors and explains that IE doesn't properly support internet standards. The user is given to options to correct the error, go back or download Google Chrome.

Requirements
------------
* [Zend Framework 2](https://github.com/zendframework/zf2) (latest master)

Features / Goals
----------------
* Keep users who use Internet Explorer for accessing the application [COMPLETE]

Installation
------------
### Main Setup

#### By cloning project
1. Clone this project into your `./vendor/` directory.

#### With composer
1. Add this project in your composer.json:

  ```json
  "require": {
    "aronkerr/no-ie": "dev-master"
  }
  ```
  
2. Now tell composer to download NoIE by running the command:

  ```bash
  $ php composer.phar update
  ```
  
#### Post Installation
1. Move the files contained in this projects public directory to your `./public` directory.
2. Enable the module in your `applicatiion.config.php` file.

  ```php
  <?php
  return array(
    'modules' => array(
      // ...
      'NoIE'
    ),
    // ...
  );
  ```
