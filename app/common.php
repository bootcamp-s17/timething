<?php

  function getDb() {
    $db = pg_connect("host=localhost port=5432 dbname=timedb_dev user=timeuser password=time");
    return $db;
  }

?>