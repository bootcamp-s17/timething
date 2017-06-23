<?php

  function getClients() {
    $stmt = 'SELECT * FROM clients ORDER BY name ASC';
    $request = pg_query(getDb(), $stmt);
    return pg_fetch_all($request);
  };

?>