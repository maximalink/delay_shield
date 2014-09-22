delay_shield
============

This PHP library periodically delays HTTP requests using a special cookie and responses a count back interface during delay time.


## Install

Go to install derectory. And clone the repostitory. If you want to use it in more php application (eg. virtual host environment) you should install it to /usr/share/php/ path.

```bash
cd /usr/share/php
git clone https://github.com/nyjt/delay_shield
```

## Usage

On your file that you want to protect. (eg. the most common is index.php)

```php
<?php
// ... your code is here, that bootstrap your application
// ... delay_shield settings (see Configuration).
include('delay_shield/delay_shield.php');
// ... and more code is here, that would generate the main content that you want to protect
?>
```

## Configuration

All the settings must be defined before the include the delay_shield.php file.
You should define a SECRET_KEY constant. It should be a string that contains random characters. The more complex string, the better.

```
define('SECRET_KEY', 'VeRyComPlEX5ECR3Tk3y....#####$$$$%%%%....');
```
