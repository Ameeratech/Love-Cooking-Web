<!DOCTYPE html>
<html lang="en">

<head>
 <title>Love Cooking </title>
 <!-- META TAGS -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <link rel="shortcut icon" type="image/x-icon" href="images/LOGO.png">

 <!-- STYLES -->
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <link rel="stylesheet" href="assets/css/flexslider.css">
 <link rel="stylesheet" href="assets/css/animsition.min.css">
 <link rel="stylesheet" href="assets/css/style.css">
 <link rel="stylesheet" href="assets/css/owl.carousel.css">
 <link rel="stylesheet" href="assets/css/owl.theme.css">

 <!-- Fontawesome -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
 <script src="js/jquery-3.3.1.min.js"></script>
 <script src="js/index.js"></script>
</head>

<body class="animsition">
 <!-- Border -->
 <span class="frame-line top-frame visible-lg"></span>
 <span class="frame-line right-frame visible-lg"></span>
 <span class="frame-line bottom-frame visible-lg"></span>
 <span class="frame-line left-frame visible-lg"></span>
 <!-- HEADER  -->
 <header class="main-header">
  <div class="container-fluid">
   <!-- Border -->
   <span class="frame-line top-frame visible-lg"></span>
   <span class="frame-line right-frame visible-lg"></span>
   <span class="frame-line bottom-frame visible-lg"></span>
   <span class="frame-line left-frame visible-lg"></span>
  </div>
 </header>
 <!-- HEADER  -->
 <header class="main-header">
  <div class="container-fluid">
   <?php require_once './includes/sidenav.php';?>
  </div>
 </header>
 <!-- box-intro -->
 <section class="box-intro bg-film">
  <div class="table-cell">

   <h3 class="box-headline letters rotate-2">
    <span class="box-words-wrapper">
     <b class="is-visible">FAST &nbsp;&amp;&nbsp;TASTY.</b>
     <b>&nbsp;HEALTHY &nbsp;&amp;&nbsp; FUN.</b>
    </span>
   </h3>
   <h1>LOVE COOKING </h1>

  </div>

  <!-- Down Arrow -->
  <div class="mouse">
   <div class="scroll"></div>
  </div>
 </section>
 <!-- end box-intro -->

 <!-- Search Section -->
 <section>
  <div class="container">
   <div class="row center">
    <div class="col-md-8 col-md-offset-2">
     <div class="section-title-parralax">
      <div class="process-numbers">01</div>
      <h2>Search</h2>
     </div>
    </div>
   </div>
   <img src="images/chef_srch.jpg" alt="Chefs" width="300"><br>
   <div class="input-group">
    <input type="text" class="form-control searchInput" placeholder="Search..." aria-describedby="basic-addon2">
    <!-- Search options -->
    <select class="form-control searchCategory">
     <option value="0">Choose what to search for</option>
     <option value="1">Category</option>
     <option value="2">Recipe</option>
     <option value="3">Ingredients</option>
    </select>
   </div>
   <div>
    <ul class="searchResults">
     <!-- Search Results -->
    </ul>
   </div>
   <br><!-- description text -->
   <h5 class="lead">Find recipes for speedy weeknight dinners, quick and easy meals, kid-pleasing snacks and desserts, and more!</h5>
  </div>
 </section>

 <!-- Statistics-->
 <div id="facts" class="facts mt-100 mbr-box mbr-section mbr-section--relative">
  <div class="container">
   <div class="row text-center statistics">
   </div>
  </div>
 </div>

 <!-- Categories -->
 <section id="team">
  <svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
   <path d="M0 0 L50 100 L100 0 Z" fill="#ffeedb" stroke="#ffeedb"></path>
  </svg>
  <div class="container">
   <div class="col-md-8 col-md-offset-2 col-sm-12">
    <div class="row center">
     <div class="section-title mb-100">
      <div class="section-title-parralax">
       <div class="process-numbers">02</div>
       <h2 id="ctg">Our Categories</h2>
       <p class="module-subtitle">Here you can look for recipes of any kind and kitchen</p>
      </div>
     </div>
    </div>
   </div>
   <!-- Categories Pictures -->
   <div class="col-md-12">
    <div class="row Categories_container"></div>
    <!-- end row -->
   </div>
  </div>
 </section>
 <!-- FEATURES -->
 <div id="features" class="features mbr-box mbr-section mbr-section--relative">
  <div class="container">
   <div class="row center">

    <!-- End features-item -->
    <div class="feature-item">
     <div class="col-md-4 col-sm-6">
      <div class="item-head">
       <i class="lnr lnr-magic-wand"></i>
      </div>
      <h6>well organized</h6>
      <p>Take a moment to explore LoveCooking and you’ll find a whole bunch of chefs and their brilliant ideas to lift you out of any eating or cooking rut.
       <br>There are features, recipes and fun contests, brought together. cooking and eating well brings families together and makes us healthier and happier.</p>
     </div>
    </div>
    <!-- End features-item1 -->
    <div class="feature-item">
     <div class="col-md-4 col-sm-6">
      <div class="item-head">
       <i class="lnr lnr-dinner"></i>
      </div>
      <h6>easy to customize</h6>
      <p>If you want to take yourself or a loved one back to quality basics (and beyond) in the kitchen, you’ll find everything you need on here.
       <br>Our site is full of sensible advice and techniques and clever video tutorials and pictures.</p>
     </div>
    </div>
    <!-- End features-item2 -->
    <div class="feature-item">
     <div class="col-md-4 col-sm-6">
      <div class="item-head">
       <i class="lnr lnr-envelope"></i>
      </div>
      <h6>support 24/7</h6>
      <p>If you have any question or advice for us,you can contacts us by an email and we reply to your meseege in any time.</p>
     </div>
    </div>
    <!-- End features-item3 -->
   </div>
  </div>
 </div>

 <!-- Log in/Sign up -->
 <section id="Log in " class="Log in  mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" style="background-image: url(images/1.jpg);">
  <div class="section-overlay"></div>
  <div>
   <div class="row center">
    <div class="col-md-8 col-md-offset-2 col-sm-12">
     <div class="section-title-parralax">
      <div class="process-numbers">03</div>
      <h2 id="login1">Log in/ sign up </h2>

     </div>
    </div>
   </div>
   <div class="cotn_principal">
    <div class="cont_centrar">
     <a id="login" name="id"></a>
     <div class="cont_login">
      <div class="cont_info_log_sign_up">
       <div class="col_md_login">
        <div class="cont_ba_opcitiy">
         <h2>Log in</h2>
         <button href="../user/examples/User-Profile.php" class="btn_login" onclick="cambiar_login()">Login</button>
        </div>
       </div>
       <div class="col_md_sign_up">
        <div class="cont_ba_opcitiy">
         <h2>Sign Up</h2>
         <button class="btn_sign_up" onclick="cambiar_sign_up()">Sign Up</button>
        </div>
       </div>
      </div>
      <!-- Background image for box(sign/log) -->

      <div class="cont_back_info">
       <div class="cont_img_back_grey">
        <img src="images/login.jpg" alt="" />
       </div>
      </div>
      <div class="cont_forms">
       <div class="cont_img_back_">
        <img src="images/login.jpg" alt="" />
       </div>
       <!-- Log in -->
       <div class="cont_form_login">
        <a href="user/examples/User-Profile.php" onclick="ocultar_login_sign_up()"><i class="lnr lnr-cross"></i></a>
        <h4>Sign in</h4>
        <input type="text" id="log_email" placeholder="Email" />
        <input type="password" id="log_pass" placeholder="Password" /><br>
        <span id="forgot_password" style="cursor:pointer">Forgot Password?</span><br>
        <img src="images/loader.gif" style="display:none" id="preload"><br>
        <button class="btn_login">Login</button>
        <div id="errlog"></div>
       </div>
       <!-- sign up -->
       <div class="cont_form_sign_up">
        <a href="user/examples/User-Profile.php" onclick="ocultar_login_sign_up()"><i class="lnr lnr-cross"></i></a>
        <h4>Sign up</h4>
        <input type="text" id="reg_email" placeholder="Email" />
        <input type="text" id="reg_user" placeholder="User Name" />
        <input type="password" id="reg_pass" placeholder="Password" />
        <input type="password" id="reg_repass" placeholder="Verify Password" />
        <button class="btn_sign_up">SIGN UP</button>
        <div id="err" style="color:black"></div>
        <div style="clear:both"></div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </section>

 <!-- Our Team -->
 <section>
  <div class="top-right-separator hidden-xs"></div>
  <div class="container">
   <div class="col-md-8 col-md-offset-2 col-sm-12">
    <div class="row center mb-100">
     <div class="section-title-parralax">
      <div class="process-numbers">04</div>
      <h2 id="team1">Our Team</h2>
      <p class="module-subtitle">Hello! We are so glad you’re here. Love Cooking is a food site, created by us, Luzan Zedan & Ameera Hamdan. Here you’ll find recipes that are easy-to-make, worth your time and that you’ll want to make over and over again. Simply put, Inspired Taste is a collection of recipes we’ve collected from many kitchens. if you’re looking for food that you love. After eating it, do you want more? Was it easy and more importantly fun to make? Did it make you smile, reach in for more and were you still talking about it hours after finishing? If it’s a YES, then we reached our goal and we're so glad.
      </p>
     </div>
    </div>
   </div>
   <div class="row">
    <!-- Luzan member -->
    <div class="team-member col-md-4 col-sm-4 text-center">
     <div class="member-thumb">
      <div class="cover">
       <div class="cover-inner-left"></div>
      </div>
      <img src="images/team/member-1.jpg" alt="Team Member" class="img-responsive">
      <div class="team_cover">
       <div class="team_cover_inner"></div>
      </div>
      <div class="overlay">
       <h6>Nice to meet! </h6>
       <p>Luzan Zedan.....</p>
       <div class="social-links">
        <a href=""><i class="fa fa-instagram"></i></a>
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-google"></i></a>
       </div>
      </div>
     </div>
     <h6>Luzan Zedan</h6>
     <span>Managing Director</span>
    </div>
    <!-- end single member -->
    <!-- Our Chefs -->
    <div class="team-member col-md-4 col-sm-4 text-center">
     <div class="member-thumb">
      <div class="cover">
       <div class="cover-inner-middle"></div>
      </div>
      <img src="images/chefs_team.png" alt="Team Member" class="img-responsive">
      <div class="team_cover">
       <div class="team_cover_inner"></div>
      </div>
      <div class="overlay">
       <a href="chefs.php">
        <h6>Show our chefs </h6>
       </a>
      </div>
     </div>
     <h6>How we came as a team?</h6>
    </div>
    <!-- end Our Chefs -->

    <!-- Ameera Member -->
    <div class="team-member col-md-4 col-sm-4 text-center ">
     <div class="member-thumb">
      <div class="cover">
       <div class="cover-inner-right"></div>
      </div>
      <img src="images/team/member-3.jpg" alt="Team Member" class="img-responsive">
      <div class="team_cover">
       <div class="team_cover_inner"></div>
      </div>
      <div class="overlay">
       <h6>HI FRIEND! </h6>
       <p>Ameera Hamdan</p>
       <div class="social-links">
        <a href=""><i class="fa fa-instagram"></i></a>
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-google"></i></a>
       </div>
      </div>
     </div>
     <h6>Ameera Hamdan</h6>
    </div>
    <!-- end Ameera Member -->
   </div>
  </div>
 </section>


 <!-- Most Popular(liked) Recipes -->
 <div id="clients" class="clients mt-100 mbr-box mbr-section mbr-section--relative">
  <svg preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" version="1.1" xmlns="http://www.w3.org/2000/svg">
   <path d="M0 0 L50 100 L100 0 Z" fill="#fff" stroke="#fff"></path>
  </svg>
  <div class="container">
   <div class="row">
    <div class="col-md-12">
    </div>
    <h2 class="fa fa-star"> Most Popular Recipes</h2>
    <h2 class="fa fa-star"></h2>
    <div id="owl-demo" class="most_liked">
     <div class="item"><img src="assets/img/clients/1.png" alt="Owl Image"></div>
     <div class="item"><img src="assets/img/clients/2.png" alt="Owl Image"></div>
     <div class="item"><img src="assets/img/clients/3.png" alt="Owl Image"></div>
     <div class="item"><img src="assets/img/clients/1.png" alt="Owl Image"></div>
     <div class="item"><img src="assets/img/clients/2.png" alt="Owl Image"></div>
     <div class="item"><img src="assets/img/clients/3.png" alt="Owl Image"></div>
    </div>
   </div>
  </div>
 </div>
 <!-- end Most Popular(liked) Recipes -->

 <!-- Testimonials -->
 <section id="testimonials" class="testimonials mt-100 mb-100 mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted mbr-parallax-background" style="background-image: url(assets/img/reasons.jpg);">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
     <div class="flexslider">
      <h2> Reasons TO LOVE Cooking</h2>
      <ul class="slides">
       <li>
        <h5>Trying out new things There are so many different types of food belonging to different cuisines all over the world. Many different recipes are available online for every one to download and share as well. You can even add your own personal touch to these recipes and try out different styles and versions of them.</h5>
       </li>
       <li>
        <h5>Having fun Whether you cook for your family, friends or just for yourself, you will always enjoy it. Seeing how different veggies, meat and spices combine to give those gorgeous flavor, makes you really happy. You will enjoy every bit of the process, starting from chopping to baking.</h5>
       </li>
       <li>
        <h5>Getting praised and comments When others enjoy what you have cooked and give you comments about the food, you feel overjoyed, proud and accomplished. Especially when words of praise come along, deep down you are definitely enjoying the moment.</h5>
       </li>
       <li>
        <h5> Healthy living Incorporating fresh ingredients into your meals makes them healthier than having processed food. You can include more fresh fruits and veggies to your diet by cooking your own meals. This gives you a good opportunity to learn about the various nutrients available in what you eat.</h5>
       </li>
      </ul>
     </div>
    </div>
   </div>
  </div>
 </section>

 <?php require_once "includes/includes.php"; ?>

 <script type="text/javascript" src="js/authenticate.js"></script>

 <?php require_once './includes/footer.php';?>

</body>

</html>
