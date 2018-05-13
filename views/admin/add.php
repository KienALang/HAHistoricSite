<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/6/2018
 * Time: 20:39
 */
require 'views/includes/head.php';
require 'views/includes/top_nav.php'; ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Add New User</h1>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($error) && $error != null) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error ?>
                    </div>
                <?php } ?>
                <form name="edit-user" action='<?php echo URL ?>admin/doAdd' method="post">
                    <div class="form-group">
                        <label>User name</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Email">
                    </div>

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullName" class="form-control" placeholder="Enter Full Name">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm-password" class="form-control" placeholder="Enter Confirm Password">
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require 'views/includes/footer.php' ?>