<?php
class Contact {
  protected $row;
  function __construct($row) {
    $this->row = $row;
  }
  function full_name() {
    return $this->first_name() . " " . $this->last_name();
  }
  function short_name() {
    return $this->row['short_name'];
  }
  function first_name() {
    return $this->row['first_name'];
  }
  function last_name() {
    return $this->row['last_name'];
  }
  function email() {
    return $this->row['email'];
  }
}