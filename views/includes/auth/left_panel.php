<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?= URL; ?>"><?= BRAND_NAME; ?></a>
            <a class="navbar-brand hidden" href="<?= URL; ?>"><?= SHORT_BN; ?></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="<?= URL; ?>admin"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">Menu</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Di Tích</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="<?= URL; ?>historic_site">Xem Toàn Bộ</a></li>
                        <li><i class="fa fa-plus"></i><a href="<?= URL; ?>historic_site/create">Thêm Mới</a></li>
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-file-image-o"></i>Slides</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="<?= URL; ?>slides">Xem Danh sách</a></li>
                        <li><i class="fa fa-plus"></i><a href="<?= URL; ?>slides/create">Thêm Mới</a></li>
                    </ul>
                </li>

                <h3 class="menu-title">Thống kê</h3><!-- /.menu-title -->

                <li>
                    <a href="<?= URL; ?>chart"> <i class="menu-icon fa fa-line-chart"></i>Lượng Truy Cập </a>
                </li>
                <li>
                    <a href="<?= URL; ?>chart"> <i class="menu-icon fa fa-area-chart"></i>Các Bài Viết </a>
                </li>

                <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="#">Login</a></li>
                        <li><i class="menu-icon fa fa-sign-in"></i><a href="#">Register</a></li>
                        <li><i class="menu-icon fa fa-paper-plane"></i><a href="#">Forget Pass</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->