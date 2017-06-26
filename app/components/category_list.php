<div class="card mb-3 ml-3">
  <div class="card-block bg-faded">

<?php 
  include('new_category_form.php'); 
?>

<?php foreach ($categories as $category) { ?>

  <form method="get" class="form-inline pb-3">

    <input type="hidden" name="client_id" value="<?=$category['client_id'];?>">

    <label class="sr-only" for="clientName">Name</label>
    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="clientName" name="name" value="<?=$category['name'];?>">

    <label class="sr-only" for="clientRate">Rate</label>
    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="clientRate" name="name" value="<?=$category['rate'];?>">

    <button type="submit" class="btn btn-primary mr-2" name="submit" value="save"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>

    <button type="submit" class="btn btn-danger" name="submit" value="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>

  </form>

<?php } ?>

  </div>
</div>