<?php

  if (isset($_GET['submit'])) {

    $safeSubmit = htmlentities($_GET['submit']);
    $safeId = htmlentities($_GET['id']);
    $safeNewName = htmlentities($_GET['name']);

    switch ($safeSubmit) {
      case 'save':
        saveClient($safeId, $safeNewName);
        break;
      case 'edit_categories':
        // ???
        break;
      case 'delete':
        deleteClient($safeId);
        break;
    }

  }

  function getClients() {
    $stmt = 'SELECT * FROM clients ORDER BY name ASC';
    $request = pg_query(getDb(), $stmt);
    return pg_fetch_all($request);
  };

  function saveClient($id, $new_name) {
    global $status_message;
    $stmt = 'UPDATE clients SET name=\'' . $new_name . '\' WHERE id=' . $id;
    pg_query(getDb(), $stmt);
    $status_message = "Client name changed!";
  };

  function deleteClient($id) {
    global $status_message;
    $stmt = 'DELETE FROM clients WHERE id=' . $id;
    pg_query(getDb(), $stmt);
    $status_message = "Client deleted!";
  };

?>