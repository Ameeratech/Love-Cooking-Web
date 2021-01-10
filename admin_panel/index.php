<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="images/admin-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>User profile</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	
	<script src="../js/admin_auth.js"></script>   
</head>

<body>
    <div class="wrapper">
              <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4" style="margin:30px auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Admin Login</h4>
                                </div>
                                <div class="card-body">
                                   
                                        <div class="row">                                         
                                           
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address</label>
                                                    <input type="email" id="log_email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                              <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Password</label>
                                                    <input type="password" id="log_pass" class="form-control" placeholder="password">
                                                </div>
                                            </div>
                                        </div>                                     
                                      <div id="errlog"></div>
                                        
                                        <input type="button" class="btn btn-info btn-fill pull-right admin_login" value="Admin Login">
                                       <a href="../index.php">Back to home page</a>
									   <div class="clearfix"></div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
</body>



<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
</html>