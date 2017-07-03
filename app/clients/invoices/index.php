<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manage Invoices | Timething</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../style.css">
  <link rel="icon" type="image/jpeg" href="../../stopwatch.jpeg">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php 
  include('../../common.php');
  include('../../client.php');
  include('../../activity.php');
  include('../../category.php');
  include('../../invoice.php');


  $safeClientId = $active_client;
  if (isset($_GET['id'])) {
    $safeClientId = intval(htmlentities($_GET['id']));
  }

  $clientName = getClientName($safeClientId);

?>

<div class="container">

<h1 class="text-center mt-0">Manage Invoices</h1>
<h2 class="text-center mt-0 mb-5"><?=$clientName;?></h2>

<?php 
  if ($status_message['text']) {
?>

<div class="alert <?php echo $status_message['style']; ?>" role="alert">
  <strong>Heads up!</strong> <?=$status_message['text'];?>
</div>

<?php 
  }
?>

<p>TODO: list of past invoices</p>




<h4>Uninvoiced Activities</h4>

<br />

<table class="table">
<thead>
  <tr>
    <th>[&nbsp;]</th>
    <th>Activity</th>
    <th>Date</th>
    <th>Hours</th>
    <th>Rate</th>
    <th>Total</th>
  </tr>
</thead>
<tbody>

<?php foreach(getUninvoicedActivities($safeClientId) as $activity) { ?>

<tr>
<td>[&nbsp;]</td>
<td><?=$activity['category_name'];?><br /><?=$activity['activity_comment'];?></td>
<td>
<?=date("m/d/y", $activity['starttime']);?> 
</td>
<td><?php

  $activity['rounded_time'] = roundToQuarterHour($activity['starttime'], $activity['endtime']);

  echo $activity['rounded_time'];

?></td>
<td>$<?=$activity['rate'];?>/hr</td>
<td class="pull-right">$<?php

  $total = $activity['rounded_time'] * $activity['rate'];

  echo sprintf('%.02f', $total);

?>

</td>
</tr>

<?php } ?>

</tbody>
</table>


<?php include('../../components/footer.php'); ?>

</div>
</body>
</html>
