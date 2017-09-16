<?php
require_once 'applicationfactory.php';
require_once dirname(__FILE__).'/../thirdparty/bucket/lib/bucket.inc.php';
date_default_timezone_set('Europe/Paris');
function create_container() {
  $factory = new ApplicationFactory();
  $container = new bucket_Container($factory);
  $factory->pdo_dsn = "sqlite:" . dirname(dirname(__FILE__)) . "/var/database.sqlite";
  $factory->pdo_attributes = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
  return $container;
}