<?php

  $status_message = array(
    'text' => '',
    'style' => 'alert-info'
  );

  $active_client = 12;

  function getDb() {
    $db = pg_connect("host=localhost port=5432 dbname=timedb_dev user=timeuser password=time");
    return $db;
  }

?>