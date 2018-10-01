<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/create'); ?>
  <div class="form-group ">
    <label for="first_name">Title </label>
    <input type="text" class="form-control" name="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="last_name">Body</label>
    <textarea class="form-control"  name="body" placeholder="Post goes here"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>