<?php






  function getUninvoicedActivities($client) {

    $stmt = "SELECT  
    activities.id AS activity_id,
    activities.starttime AS starttime,
    activities.endtime AS endtime,
    activities.comment AS activity_comment,
    categories.name AS category_name,
    categories.rate AS rate
FROM activities
JOIN activity_category ON activities.id = activity_category.activity_id
JOIN categories ON activity_category.category_id = categories.id
WHERE categories.client_id = $client
AND endtime IS NOT NULL
ORDER BY starttime";

//var_dump($stmt);


    $request = pg_query(getDb(), $stmt);
    $results = pg_fetch_all($request);

    return $results;


  }


?>