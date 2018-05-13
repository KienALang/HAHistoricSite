<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 5/6/2018
 * Time: 20:13
 */
require 'views/includes/head.php';
require 'views/includes/top_nav.php'; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1 class="display-4">Edit User</h1>
        <p class="lead">Edit the following user.</p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($userToEdit) && $userToEdit != null) { ?>
                <form name="edit-user" action='<?php echo URL ?>admin/doUpdate' method="post">
                    <div class="form-group">
                        <label>User Id</label>
                        <input type="text" name="userId" class="form-control" readonly
                               value="<?php echo $userToEdit['user_id'] ?>">
                    </div>

                    <div class="form-group">
                        <label>User name</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $userToEdit['username'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $userToEdit['email'] ?>">
                    </div>

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullName" class="form-control" value="<?php echo $userToEdit['fullname'] ?>">
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success" value="Update">
                    </div>
                </form>

            <?php } ?>
        </div>
    </div>
</div>

<?php require 'views/includes/footer.php' ?>