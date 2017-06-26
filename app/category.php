<?php


   if (isset($_GET['submit'])) {

    $safeSubmit = htmlentities($_GET['submit']);
    $safeId = '';
    if (isset($_GET['id'])) {
      $safeId = htmlentities($_GET['id']);
    }
    $safeNewName = htmlentities($_GET['name'], ENT_QUOTES);
    $safeNewRate = '';
    if (isset($_GET['rate'])) {
      $safeNewRate = htmlentities($_GET['rate']);
    }

    switch ($safeSubmit) {
      // case 'save':
      //   if (strlen($safeNewName) > 0) {
      //     saveClient($safeId, $safeNewName);
      //   }
      //   else {
      //     global $status_message;
      //     $status_message['text'] = "Name must be at least one character.";
      //     $status_message['style'] = 'alert-danger';
      //   }
      //   break;
      // case 'edit_categories':
        



        
      //   break;
      // case 'delete':
      //   deleteClient($safeId);
      //   break;
      case 'add_category':
        // if (strlen($safeNewName) > 0) {
          addCategory($active_client, $safeNewName, $safeNewRate);
        // }
        // else {
        //   global $status_message;
        //   $status_message['text'] = "Name must be at least one character.";
        //   $status_message['style'] = 'alert-danger';
        // }
        break;
    }

  }













 function getCategories($id) {
    $stmt = "SELECT * FROM categories WHERE client_id=$id ORDER BY name ASC";
    $request = pg_query(getDb(), $stmt);
    return pg_fetch_all($request);
  };  

  function addCategory($client_id, $name, $rate) {
    $stmt = "INSERT INTO categories (client_id, name, rate) VALUES ($client_id, '$name', $rate)";
    pg_query(getDb(), $stmt);





  }



?>