<?php


   if (isset($_GET['submit'])) {

    $safeSubmit = htmlentities($_GET['submit']);
    $safeClientId = 0;
    if (isset($_GET['client_id'])) {
      $safeClientId = intval(htmlentities($_GET['client_id']));
      global $active_client;
      $active_client = $safeClientId;
    }
    $safeNewName = htmlentities($_GET['name'], ENT_QUOTES);
    $safeNewRate = '';
    if (isset($_GET['rate'])) {
      $safeNewRate = htmlentities($_GET['rate']);
    }
    $safeCategoryId = 0;
    if (isset($_GET['category_id'])) {
      $safeCategoryId = intval(htmlentities($_GET['category_id']));
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
      case 'delete_category':
        deleteCategory($safeCategoryId);
        break;
      case 'add_category':
        // if (strlen($safeNewName) > 0) {


          addCategory($safeClientId, $safeNewName, $safeNewRate);
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

  function deleteCategory($category_id) {
    $stmt = 'DELETE FROM categories WHERE id=' . $category_id;
    pg_query(getDb(), $stmt);
  }



?>