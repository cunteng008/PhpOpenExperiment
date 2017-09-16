<?php
class ContactsGateway {
  protected $db;
  function __construct(PDO $db) {
    $this->db = $db;
  }
  function save($contact) {
    $statement = $this->db->prepare(
    "update contacts set
       first_name = :first_name,
       last_name = :last_name,
       email = :email
     where short_name = :short_name");
    $statement->execute(
      array(
        ':first_name' => $contact->first_name(),
        ':last_name' => $contact->last_name(),
        ':email' => $contact->email(),
        ':short_name' => $contact->short_name()));
  }
  function fetchByName($short_name) {
    $statement = $this->db->prepare("select * from contacts where short_name = :short_name");
    $statement->execute(array(':short_name' => $short_name));
    return new Contact($statement->fetch(PDO::FETCH_ASSOC));
  }
  function all() {
    $statement = $this->db->prepare("select * from contacts");
    $statement->execute();
    $result = array();
    foreach ($statement as $row) {
      $result[] = new Contact($row);
    }
    return $result;
  }
}