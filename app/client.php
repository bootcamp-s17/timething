<?php

  if (isset($_GET['submit'])) {

    $safeSubmit = htmlentities($_GET['submit']);
    $safeId = '';
    if (isset($_GET['id'])) {
      $safeId = htmlentities($_GET['id']);
    }
    $safeNewName = htmlentities($_GET['name'], ENT_QUOTES);

    switch ($safeSubmit) {
      case 'save':
        if (strlen($safeNewName) > 0) {
          saveClient($safeId, $safeNewName);
        }
        else {
          global $status_message;
          $status_message['text'] = "Name must be at least one character.";
          $status_message['style'] = 'alert-danger';
        }
        break;
      case 'edit_categories':
        global $active_client;
        $active_client = $safeId;
        break;
      case 'delete':
        deleteClient($safeId);
        break;
      case 'add':
        if (strlen($safeNewName) > 0) {
          addClient($safeNewName);
        }
        else {
          global $status_message;
          $status_message['text'] = "Name must be at least one character.";
          $status_message['style'] = 'alert-danger';
        }
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
    $stmt = 'UPDATE clients SET name=\'' . $new_name . '\', last_update=now()WHERE id=' . $id;
    pg_query(getDb(), $stmt);
    $status_message['text'] = "Client name changed!";
  };

  function deleteClient($id) {
    global $status_message;
    $stmt = 'DELETE FROM clients WHERE id=' . $id;
    pg_query(getDb(), $stmt);
    $status_message['text'] = "Client deleted!";
  };

  function addClient($name) {
    global $status_message;
    $stmt = "INSERT INTO clients (name) VALUES ('$name')";
    pg_query(getDb(), $stmt);
    $status_message['text'] = "Client added!";
  }

?>