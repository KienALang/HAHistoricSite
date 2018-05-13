<nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URL; ?>index">Web Technology</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                if (Session::get('loggedIn')) {
                    $user = Session::get('user');
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo URL; ?>admin"><?php echo $user['fullname']; ?><span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>authentication/logout">Log Out</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>authentication">Login</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>

</nav>