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
    $safeNewCategoryName = '';
    if (isset($_GET['category_name'])) {
      $safeNewCategoryName = htmlentities($_GET['category_name'], ENT_QUOTES);
    }
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
        global $status_message;
        if (strlen($safeNewCategoryName) == 0) {
          $status_message['text'] .= "Name must be at least one character. ";
          $status_message['style'] = 'alert-danger';
        }
        if (strlen($safeNewRate) == 0) {
          $status_message['text'] .= "Rate must not be blank. ";
          $status_message['style'] = 'alert-danger';
        }
        if (strlen($status_message['text']) == 0) {
          saveCategory($safeCategoryId, $safeNewCategoryName, $safeNewRate);
          rebuildDataFile();
        }
        $safeNewCategoryName = '';
        $safeNewRate = '';
        break;
      case 'edit_categories':
        // Don't need to do anything here,
        // the form is displayed elsewhere.
        break;
      case 'delete_category':
        deleteCategory($safeCategoryId);
        rebuildDataFile();
        $safeNewCategoryName = '';
        $safeNewRate = '';
        break;
      case 'add_category':
        global $status_message;
        if (strlen($safeNewCategoryName) == 0) {
          $status_message['text'] .= "Name must be at least one character. ";
          $status_message['style'] = 'alert-danger';
        }
        if (strlen($safeNewRate) == 0) {
          $status_message['text'] .= "Rate must not be blank. ";
          $status_message['style'] = 'alert-danger';
        }
        if (strlen($status_message['text']) == 0) {
          addCategory($safeClientId, $safeNewCategoryName, $safeNewRate);
          rebuildDataFile();
          $safeNewCategoryName = '';
          $safeNewRate = '';
        }
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

  function rebuildDataFile() {

    $data = array();

    $file = $_SERVER['DOCUMENT_ROOT'] . '/' . 'data.json';

    $stmt = 'SELECT * FROM clients ORDER BY name';
    $request = pg_query(getDb(), $stmt);
    $clients = pg_fetch_all($request);

    // Now we have a list of all our clients. 

    foreach ($clients as $client) {

      $stmt2 = 'SELECT * FROM categories WHERE client_id=' . $client['id'] . ' ORDER BY name asc';
      $request2 = pg_query(getDb(), $stmt2);
      $categories = pg_fetch_all($request2);


var_dump($categories);

      $data[$client['id']] = $categories;

    }

    $json = json_encode($data);

    file_put_contents($file, $json);

  }

?>