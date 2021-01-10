<?php
require_once "includes/header.php";
?>
<div class="main-panel">
 <style>
  a.btn:hover {
   -webkit-transform: scale(1.1);
   -moz-transform: scale(1.1);
   -o-transform: scale(1.1);
  }

  .container {
   left: auto;
   margin-top: 20px;
  }

  a.btn {
   -webkit-transform: scale(0.8);
   -moz-transform: scale(0.8);
   -o-transform: scale(0.8);
   -webkit-transition-duration: 0.5s;
   -moz-transition-duration: 0.5s;
   -o-transition-duration: 0.5s;
  }

 </style>
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg " color-on-scroll="500">
  <div class=" container-fluid  ">
   <div class="container">
    <div class="row">
     <input type="button" id="open_modal" value="Add Category">
    </div>
   </div>

   <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-bar burger-lines"></span>
    <span class="navbar-toggler-bar burger-lines"></span>
    <span class="navbar-toggler-bar burger-lines"></span>
   </button>
   <div class="collapse navbar-collapse justify-content-end" id="navigation">

    <ul class="navbar-nav ml-auto">

     <li class="nav-item">
      <a class="nav-link" href="includes/header.php?logout=1">
       <span class="no-icon">Log out</span>
      </a>
     </li>
    </ul>
   </div>
  </div>
 </nav>
 <!-- End Navbar -->

 <div class="row">
  <div class="col-md-offset-4 col-md-4 cat_form" style="display:none">
   <div class="col-md-12 px-1">
    <div class="form-group">
     <label>Category name</label>
     <input type="text" id="cat_name" class="form-control" value="" placeholder="category name">
    </div>
   </div>

   <div class="col-md-12 px-1">
    <div class="form-group">
     <label>Category image</label>
     <input type="text" id="cat_image" class="form-control" value="" placeholder="Category image link http://www.yourlink.com">
    </div>
   </div>

   <div class="catErr"></div>

   <button type="button" class="btn btn-info btn-fill pull-right manage_chef" data-id="0">Add Category</button>
   <div class="clearfix"></div>
  </div>
 </div>

 <div class="row">
  <div class="col-md-4 categories" style="margin:auto">
  </div>

 </div>


 <script src="../js/categories.js"></script>
 </body>

 </html>
