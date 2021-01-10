<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us </title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon"  alt="go Home"  type="image/x-icon" href="assets/img/LOGO.png">

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
            <?php require_once './includes/sidenav.php';?>
        </div>
    </header>

    <!-- HERO SECTION  -->
    <div class="site-hero-contact" style="background-image: url(assets/img/reasons.jpg)">
        <div class="section-overlay"></div>
        <div class="page-title">
            <h2 class="mb-50">Contact Us</h2>
            <p class="module-subtitle">If you have any question,Please contact us and we will reply as fast as we can</p>

        </div>
    </div>

    <section class="contact_brick">
        <div class="container mt-50">
            <div class="row mt-50">
                <!--contact info-->
                <div class="col-md-6 col-sm-6 text-center wow slideInUp">
                    <div class="detail">
                        <i class="lnr lnr-phone"></i>
                        <!--Phone-->
                        <i class="lnr lnr-phone"></i>
                        <h4><span>Phone:</span></h4>
                        <p>0542114444</p>
                    </div>
                </div>
                <!--end contact info-->

                <!--Email-->
                <div class="col-md-6 col-sm-6 text-center wow slideInRight">
                    <div class="detail">
                        <i class="lnr lnr-envelope"></i>
                        <h4><span>Email:</span></h4>

                        <p>
                            LoveCooking18@gmail.com
                        </p>
                    </div>
                </div>
            </div>
            
            
            <!-- CONTACT FORM -->
            <div class="contact-form bottom">
                <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <!---name-->
                            <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <!---Email-->
                            <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">


                        <div class="form-group">
                            <!---Text area-->
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Text"></textarea>
                        </div>
                        <div class="form-group">
                            <!---Send Button-->
                            <button id="submit_btn" class="default-btn gray-btn"> Send <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php require_once "includes/includes.php"; ?>


    <script type="text/javascript">
        $(window).load(function() {

            // initialize isotope
            var $container = $('.portfolio_container');
            $container.isotope({
                filter: '*',
            });

            $('.portfolio_filter a').click(function() {
                $('.portfolio_filter .active').removeClass('active');
                $(this).addClass('active');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 500,
                        animationEngine: "jquery"
                    }
                });
                return false;
            });
        });

    </script>
</body>
<?php require_once './includes/footer.php';?>

</html>
