<?php

class DelayedTicket {
  var $ticket;

  function is_valid_ticket() {
    $ticket = new EncryptedCookie('delayed_ticket');
    $current_cookie = $ticket->get_decrypted_cookie();
    if ($current_cookie && $current_cookie[0] < time() && time() < $current_cookie[1]) {
      return true;
    } else {
      $ticket = new EncryptedCookie('delayed_ticket', array($this->active_from(), $this->active_to()));
      $ticket->set_encrypted_cookie();
      include('ticket_count_back.php');
      return false;
    }
  }

  protected function delay() {
    return((defined('DELAY_SHIELD_DELAY_IN_SECONDS')) ? DELAY_SHIELD_DELAY_IN_SECONDS : 20);
  }

  protected function valid_seconds() {
    return((defined('DELAY_SHIELD_OPEN_IN_SECONDS')) ? DELAY_SHIELD_OPEN_IN_SECONDS : 120);
  }

  protected function active_from() {
    return(time() + $this->delay());
  }

  protected function active_to() {
    return(time() + $this->delay() + $this->valid_seconds());
  }
}

?>
