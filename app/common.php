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

    $hours = floor($number_of_seconds/3600);
    $minutes = floor(($number_of_seconds - ($hours*3600))/60);
    $seconds = $number_of_seconds - $hours*3600 - $minutes*60;

    // $rounded_minutes should be .00, .25, .50, or .75
    $rounded_minutes = 15 * ceil($minutes/15);

    $quarter = 0;

    switch ($rounded_minutes) {

      case '15':
        $quarter = 25;
        break;

      case '30':
        $quarter = 50;
        break;

      case '45':
        $quarter = 75;
        break;

      case '60':
        $quarter = 0;
        $hours++;
        break;

    }

    $quarter = sprintf('%02d', $quarter);

    return($hours . "." . $quarter);

  }

?>
