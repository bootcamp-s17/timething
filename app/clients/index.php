<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manage Clients | Timething</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../style.css">
  <link rel="icon" type="image/jpeg" href="../stopwatch.jpeg">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php 
  include('../common.php');
  include('../client.php');
  //include('activity.php');
  include('../category.php');
?>

<div class="container">

<h1 class="text-center mt-0 mb-5">Manage Clients</h1>

<?php 
  if ($status_message['text']) {
?>

<div class="alert <?php echo $status_message['style']; ?>" role="alert">
  <strong>Heads up!</strong> <?=$status_message['text'];?>
</div>

<?php 
  }
?>

<?php include('../components/new_client_form.php'); ?>

<?php 
  foreach (getClients() as $client) {

    // When there are categories, btn-outline-danger disabled
    // No categories, btn-danger

    $client['delete_button_classes'] = 'btn btn-danger';
    $client['delete_disabled_state'] = '';

    if ($client['count'] > 0) {
      $client['delete_button_classes'] = 'btn btn-outline-danger';
      $client['delete_disabled_state'] = 'disabled';
    }

?>

<form method="get" class="form-inline pb-3">

  <label class="sr-only" for="clientName">Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="clientName" name="name" value="<?=$client['name'];?>">

  <input type="hidden" name="id" value="<?=$client['id'];?>">

  <button type="submit" class="btn btn-primary mr-2" name="submit" value="save"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>

  <button type="submit" class="btn btn-success mr-2" name="submit" value="edit_categories"><i class="fa fa-list" aria-hidden="true"></i></button>

  <a class="btn btn-warning mr-2" href="/clients/invoices/index.php?id=<?=$client['id'];?>"><i class="fa fa-usd" aria-hidden="true"></i></a>

  <button type="submit" class="<?=$client['delete_button_classes'];?>" name="submit" value="delete" <?=$client['delete_disabled_state'];?>><i class="fa fa-trash-o" aria-hidden="true"></i></button>

</form>

<?php

    $categories = getCategories($client['id']);

    global $active_client;
    if ($active_client == $client['id']) {
      include('../components/category_list.php');
    }

  }

?>
  
<?php include('../components/footer.php'); ?>

</div>

</body>
</html>