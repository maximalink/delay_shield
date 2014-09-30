<?php

include('config.php');

if (!defined('DELAY_SHIELD_SECRET_KEY')) {
  throw new Exception('There is no DELAY_SHIELD_SECRET_KEY defined. Please define it before use delay_shield.php');
}

default_value('DELAY_SHIELD_DELAY_IN_SECONDS', 20);
default_value('DELAY_SHIELD_OPEN_IN_SECONDS', 120);
default_value('DELAY_SHIELD_CLOSE_BUTTON', 'Close and continue &gt;&gt;');
default_value('DELAY_SHIELD_MESSAGE', 'You have been delayed. See the counter and click the button.');

function default_value($name, $value) {
  if (!defined($name)) {
    define($name, $value);
  }
}

require_once 'encrypted_cookie.php';
require_once 'delayed_ticket.php';

$ticket = new DelayedTicket();
return $ticket->is_valid_ticket();
?>
