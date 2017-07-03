<?php
  $ENV = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/../env.ini');

  date_default_timezone_set('America/Kentucky/Louisville');

  $status_message = array(
    'text' => '',
    'style' => 'alert-info'
  );

  $active_client = 0;

  function getDb() {
    global $ENV;
    $db = pg_connect("host=$ENV[HOST] port=$ENV[PORT] dbname=$ENV[DB] user=$ENV[UN] password=$ENV[PW]");
    return $db;
  }

  // https://stackoverflow.com/questions/2480637/round-minute-down-to-nearest-quarter-hour

      function roundToQuarterHour($start_seconds, $end_seconds) {
        $number_of_seconds = ($end_seconds - $start_seconds);
        $rounded_minutes = (ceil(($number_of_seconds / 60) / 15)) * 15;
        return(sprintf("%.2f", $rounded_minutes / 60));
      }


?>
