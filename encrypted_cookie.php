<?php

class EncryptedCookie {
  var $value;
  var $name;

  public function __construct($name, $value = null) {
    $this->name = $name;
    $this->value = $value;
  }

  public function get_decrypted_cookie() {
    if (isset($_COOKIE[$this->name])) {
      return $this->deserialized_value();
    } else {
      return false;
    }
  }

  public function set_encrypted_cookie() {
     setcookie($this->name, $this->signed_value($this->value));
  }

  public function signature($value = null) {
    if ($value === null) $value = $this->serialized_value();
    return sha1($this->name . $value . $this->secret_key());
  }

  protected function deserialized_value() {
    list($value, $signature) = $this->parse_cookie();

    if ($this->is_valid_signature($value, $signature)) {
      return unserialize(base64_decode($_COOKIE[$this->name]));
    } else {
      return false;
    }
  }

  protected function is_valid_signature($value, $signature) {
    return $this->signature($value) == $signature;
  }

  protected function parse_cookie() {
    return(explode('|', $_COOKIE[$this->name]));
  }

  protected function serialized_value() {
    return base64_encode(serialize($this->value));
  }

  protected function signed_value() {
    $value = $this->serialized_value();
    return $value . '|' . $this->signature($value);
  }

  protected function secret_key() {
    return DELAY_SHIELD_SECRET_KEY;
  }
}

?>
