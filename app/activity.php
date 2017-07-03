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

    global $status_message;
    $stmt = "INSERT INTO activities (starttime, endtime, comment) VALUES ($start, $end, '$comment') RETURNING id";
    $request = pg_query(getDb(), $stmt);
    $results = pg_fetch_all($request);

    $activity_id = $results[0]['id'];

    $stmt2 = "INSERT INTO activity_category (activity_id, category_id) VALUES ($activity_id, $cat)";
    pg_query(getDb(), $stmt2);

    $status_message['text'] = "Activity added!";    

  }







?>