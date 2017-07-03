<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Timething</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/jpeg" href="stopwatch.jpeg">
  <script src="main.js"></script>
</head>
<body>

<?php 
  include('common.php');
  include('client.php');
  include('activity.php');
  include('category.php');
?>

<div class="container">

<h1 class="text-center mt-0 mb-5">Timething</h1>

<?php 
  if ($status_message['text']) {
?>

<div class="alert <?php echo $status_message['style']; ?>" role="alert">
  <strong>Heads up!</strong> <?=$status_message['text'];?>
</div>

<?php 
  }
?>

<form method="get" action="">

  <div class="form-group pb-2">
    <label for="clientSelect" class="sr-only">Select a Client</label>
    <select class="form-control form-control mb-2 mr-sm-2 mb-sm-0" id="clientSelect" name="client_id" onchange="clientChange(this);">
      <?php 
        foreach (getClients() as $client) {
          if ($client['count'] > 0) {
            print '<option value="' . $client['id'] . '">' . $client['name'] . "</option>\n";       
          }
        }
      ?>
    </select>
  </div>

  <div class="form-group pb-1">
    <label for="categorySelect" class="sr-only">Select a Category</label>
    <select class="form-control form-control mb-2 mr-sm-2 mb-sm-0" id="categorySelect" name="category_id">
      <?php 
        foreach (getCategories(42) as $category) {
          print '<option value="' . $category['id'] . '">' . $category['name'] . "</option>\n";
        }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="starttime" class="col-form-label">Start Date and Time</label>
    <div class="col-10">
      <input class="form-control" type="datetime-local" value="" id="starttime" name="starttime">
    </div>
  </div>

  <div class="form-group">
    <label for="endtime" class="col-form-label">End Date and Time</label>
    <div class="col-10">
      <input class="form-control" type="datetime-local" value="" id="endtime" name="endtime">
    </div>
  </div>

  <div class="form-group">
    <label for="comments" class="col-form-label">Comments</label>
    <div class="col-10">
      <textarea name="comments" type="textarea" class="form-control mb-3"></textarea>
    </div>
  </div>

  <button type="submit" class="mt-2 btn btn-primary" name="submit" value="add_activity">Add Activity</button>

  </form>
  
<?php include('components/footer.php'); ?>

</div>

</body>
</html>