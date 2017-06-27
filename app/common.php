<?php
  $ENV = parse_ini_file('env.ini');

  $status_message = array(
    'text' => '',
    'style' => 'alert-info'
  );

  $active_client = 0;

  function getDb() {
    global $ENV;
    $db = pg_connect("host=$ENV[HOST] port=$ENV[PORT] dbname=$ENV[DB_NAME] user=$ENV[USERNAME] password=$ENV[PWD]");
    return $db;
  }

?>
