delay_shield
============

This PHP library periodically delays HTTP requests using a special cookie and responses a count back interface during delay time.
It is an ideal solution for shareware or demo subscriptions. You can notify you users it is demo. You force to read the message until the delay time ended.
After it they can use the web application until the open session is not expired.

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
$is_open = include('delay_shield/delay_shield.php');
// use $is_open boolean variable to decide if the server
// keep on responding. At this point the count back page is printed out.
// ... and more code is here, that would generate
// the main content that you want to protect
?>
```

## Configuration

All the settings must be defined before the include the delay_shield.php file.

### DELAY_SHIELD_SECRET_KEY

You should define a DELAY_SHIELD_SECRET_KEY constant. It should be a string that contains random characters. The more complex string, the better.
This constant is mandatory.

```php
define('DELAY_SHIELD_SECRET_KEY', 'VeRyComPlEX5ECR3Tk3y....#####$$$$%%%%....');
```

### DELAY_SHIELD_DELAY_IN_SECONDS

Optional integer constant. It defines the time in seconds your user have to wait for the real content.
Default value: 20

```php
define('DELAY_SHIELD_DELAY_IN_SECONDS', 20);
```

### DELAY_SHIELD_OPEN_IN_SECONDS

Optional integer constant. It defines the time in seconds your user can browse without any delay. Every open session opens after after a delay session.
Default value: 120

```php
define('DELAY_SHIELD_OPEN_IN_SECONDS', 120);
```

### DELAY_SHIELD_BRAND_LEFT

Optional string constant. It defines the brand that show on the left of navbar.
It has no default value.

```php
define('DELAY_SHIELD_BRAND_LEFT', 'MyCompany');
```

### DELAY_SHIELD_BRAND_RIGHT

Optional string constant. It defines the brand that show on the left of navbar.
It has no default value.

```php
define('DELAY_SHIELD_BRAND_LEFT', 'MyWebApp');
```

### DELAY_SHIELD_MESSAGE

Optional but recommended string constant. It defines the message that shows up on counter page.
Default value: 'You have been delayed. See the counter and click the button.'

```php
define('DELAY_SHIELD_MESSAGE', 'Your credit card has been expired. Please renew it as soon as possible.');
```

### DELAY_SHIELD_CLOSE_BUTTON

Optional string constant. It defines the label of close button.
Default value: 'Close and continue >>'

```php
define('DELAY_SHIELD_CLOSE_BUTTON', 'Close the message');
```

