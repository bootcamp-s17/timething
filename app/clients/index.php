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
  <link rel="icon" type="../image/png" href="rainbow_heart.png">
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

<p><a href="/">Home</a></p>

<h1 class="text-center">Manage Clients</h1>

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
?>

<form method="get" class="form-inline pb-3">

  <label class="sr-only" for="clientName">Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="clientName" name="name" value="<?=$client['name'];?>">

  <input type="hidden" name="id" value="<?=$client['id'];?>">

  <button type="submit" class="btn btn-primary mr-2" name="submit" value="save"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>

  <button type="submit" class="btn btn-success mr-2" name="submit" value="edit_categories"><i class="fa fa-list" aria-hidden="true"></i></button>

  <button type="submit" class="btn btn-danger" name="submit" value="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

</form>

<?php

    $categories = getCategories($client['id']);

    global $active_client;
    if ($active_client == $client['id']) {
      include('../components/category_list.php');
    }

  }

?>
  
<footer>
  <nav class="text-center d-inline-block navbar fixed-bottom">
    <a href="/clients/"><h4>Manage Clients</h4></a>
    <a class="pl-5 pr-5">&copy;2017&nbsp;The&nbsp;Oreons</a>
    <a class="pl-5 pr-5">About</a>
    <a class="pl-5 pr-5">Contact</a>
  </nav>
</footer>

</div>

</body>
</html>