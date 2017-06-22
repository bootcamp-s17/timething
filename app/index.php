<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Timething</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/png" href="rainbow_heart.png">
</head>
<body>

<?php 
  include('client.php');
  include('activity.php');
  include('category.php');
?>

<div class="container">

<h1 class="text-center">Timething</h1>



  <form method="get" action="">
    <div class="form-inline">
      <label for="clientSelect" class="sr-only">Select a Client</label>
      <select class="form-control form-control mb-2 mr-sm-2 mb-sm-0" id="clientSelect" name="clientId">
<?php 
  foreach (getClients() as $client) {
    print '<option value="' . $client['id'] . '">' . $client['name'] . "</option>\n";
  }
?>
      </select>
    </div>
  </form>


  <form method="get" action="">
    <div class="form-inline">
      <label for="categorySelect" class="sr-only">Select a Category</label>
      <select class="form-control form-control mb-2 mr-sm-2 mb-sm-0" id="categorySelect" name="categoryId">
<?php 
  foreach (getCategories(42) as $category) {
    print '<option value="' . $category['id'] . '">' . $category['name'] . "</option>\n";
  }
?>
      </select>
    </div>
  </form>


<div class="form-group">
  <label for="starttime" class="col-form-label">Start Date and time</label>
  <div class="col-10">
    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="starttime">
  </div>
</div>

<div class="form-group">
  <label for="endtime" class="col-form-label">End Date and time</label>
  <div class="col-10">
    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="endtime">
  </div>
</div>



<form>
  <textarea type="textarea"></textarea>
</form>


  
<footer>
  <nav class="text-center d-inline-block navbar fixed-bottom">
    <a class="pl-5 pr-5">&copy; 2017 The Oreons</a>
    <a class="pl-5 pr-5">About</a>
    <a class="pl-5 pr-5">Contact</a>
  </nav>
</footer>

</div>

</body>
</html>