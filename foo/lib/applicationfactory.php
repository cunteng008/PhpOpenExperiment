<?php
/**
  * Provides class dependency wiring for this application
  */
class ApplicationFactory {
  public $pdo_dsn;
  public $pdo_username;
  public $pdo_password;
  public $pdo_attributes = array();
  function new_PDO($c) {
    return new PDO($this->pdo_dsn, $this->pdo_username, $this->pdo_password, $this->pdo_attributes);
  }
}