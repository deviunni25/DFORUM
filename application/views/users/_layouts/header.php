<!DOCTYPE html>
<html lang="en">
<head>
  <title> Discussion Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link href="<?=base_url() ?>assets/users/css/style.css" rel="stylesheet">
<script src="<?=base_url() ?>assets/users/js/script.css"></script>
<script src="<?=base_url() ?>assets/users/js/bootstrap.min.js"></script>
</head>


  <header id="#top">
  <div class="large-12 small-12 forum-category rounded top lpad" style="margin-bottom: 3%;">
        <span><h3>Forum</h3>
  
        </span>

<div class="row">
      <div class="col-md-12">
        <select name="category_id" id="select_category" class="form-control col-md-3" style="border: none; outline: none; background: #46bbe2; float: right;">
        <option value="<?=magicfunction('0','e') ?>">--Select a category--</option>
          <?php foreach($category as $categories): ?>
              <option value="<?= magicfunction($categories->c_id,'e') ?>"><?=$categories->category_name ?></option>
            <?php endforeach; ?>
        </select>
        <nav class="menu">
          <a href="#" class="current">Home</a>
          <a href="#" class="add_question">Add New Question</a>
          <a href="#" class="my_profile" data-id="<?=$this->session->userdata('user_id') ?>">My Profile</a>


          <a href="<?=base_url() ?>Auth/logout">Logout</a>
        </nav>    
</div>
            </div>
      </div>
  </header>
<body>


