<!-- Start of new_category_form.php -->

<form method="get" class="form-inline pb-3">

<?php global $active_client; ?>

  <input type="hidden" name="client_id" value="<?=$active_client;?>">

  <label class="sr-only" for="categoryName">Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="categoryName" name="category_name" value="<?=$safeNewCategoryName;?>" placeholder="New category name...">

  <label class="sr-only" for="categoryRate">Rate</label>
  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="categoryRate" name="rate" value="<?=$safeNewRate;?>" placeholder="75">

  <button type="submit" class="btn btn-outline-primary mr-2" name="submit" value="add_category"><i class="fa fa-plus" aria-hidden="true"></i></button>

</form>

<!-- End of new_category_form.php -->

