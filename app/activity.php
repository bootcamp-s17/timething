<?php

  if (isset($_GET['submit'])) {

    $safeSubmit = htmlentities($_GET['submit']);
    $safeClientId = intval(htmlentities($_GET['client_id']));
    $safeCategoryId = intval(htmlentities($_GET['category_id']));
    $safeStartTime = strtotime(htmlentities($_GET['starttime']));
    $safeEndTime = strtotime(htmlentities($_GET['endtime']));
    $safeComments = htmlentities($_GET['comments']);

    switch ($safeSubmit) {

      case 'add_activity':
        global $status_message;
        addActivity($safeClientId, $safeCategoryId, $safeStartTime, $safeEndTime, $safeComments);
        break;

    }

  }



  function addActivity($client, $cat, $start, $end, $comment) {

    var_dump($client);
    var_dump($cat);
    var_dump($start);
    var_dump($end);
    var_dump($comment);


  }







?>