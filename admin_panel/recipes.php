<?php
require_once "includes/header.php";
?>

<div class="main-panel">
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class=" container-fluid  ">
            <div class="container">
                <div class="row">
                    <!-- Add Recipe Button -->
                    <input type="button" id="open_modal" value="Add Recipe">
                </div>
            </div>
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
            <div class="collapse navbar-collapse justify-content-end" id="navigation">

            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Add new recipe info -->
    <div class="row">
        <div class="col-md-12 recipe_form" style="display:none">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Recipe</h4>
                </div>
                <div class="card-body recipes_inner">
                </div>
            </div>
        </div>
    </div>
    <!-- Displaying Exist Recipe List -->
    <div class="row">
        <div class="col-md-4 recipes" style="margin:auto">
        </div>

    </div>
</div>

<script src="../js/recipes.js"></script>
