<?php
  $ENV = parse_ini_file('env.ini');

  date_default_timezone_set('America/Kentucky/Louisville');

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

  // https://stackoverflow.com/questions/2480637/round-minute-down-to-nearest-quarter-hour
  function roundToQuarterHour($start_seconds, $end_seconds) {

    $number_of_seconds = ($end_seconds - $start_seconds);

    $minutes = date('i', $number_of_seconds);
    return $minutes - ($minutes % 15);



  }

?>
