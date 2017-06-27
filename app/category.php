<?php

// var_dump($_GET);

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
      case 'save_category':
      //   if (strlen($safeNewName) > 0) {
          saveCategory($safeCategoryId, $safeNewName, $safeNewRate);
      //   }
      //   else {
      //     global $status_message;
      //     $status_message['text'] = "Name must be at least one character.";
      //     $status_message['style'] = 'alert-danger';
      //   }
      //   break;
      // case 'edit_categories':
        
        
        break;
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
    $results = pg_fetch_all($request);
    if ($results) {
      return $results;
    }
    return array();
  };  

  function addCategory($client_id, $name, $rate) {
    global $status_message;
    $stmt = "INSERT INTO categories (client_id, name, rate) VALUES ($client_id, '$name', $rate)";
    pg_query(getDb(), $stmt);
    $status_message['text'] = "Category added!";
  }

  function deleteCategory($category_id) {
    global $status_message;
    $stmt = 'DELETE FROM categories WHERE id=' . $category_id;
    pg_query(getDb(), $stmt);
    $status_message['text'] = "Category deleted!";
  }

  function saveCategory($category_id, $new_name, $new_rate) {
    global $status_message;
    $stmt = "UPDATE categories SET name='$new_name', rate=$new_rate, last_update=now() WHERE id=$category_id";
    pg_query(getDb(), $stmt);
    $status_message['text'] = 'Category updated!';
  }

?>