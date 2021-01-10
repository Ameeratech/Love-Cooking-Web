<?php
require_once "./header.php";
?>
<script src="../../js/user_profile.js"></script>
<div class="wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="text" class="form-control" readonly id="email" value="<?php echo $_SESSION['user123dsfdfdsf']['email']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" id="password" maxlength="8" class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <span id="update_err"></span>
                                <button type="button" class="btn btn-info btn-fill pull-right update_user_profile">Update</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
</div>