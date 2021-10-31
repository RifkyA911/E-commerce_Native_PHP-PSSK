<nav class="navbar navbar-light navbar-expand-lg bg-dark fixed-top ">
    <div class="container-fluid mx-2">
        <a href="index.php" class="text-decoration-none"><span class="navbar-brand text-light"><i class="fa fa-fw fa-store text-success"></i> Toko Sehat</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#Navbar_Toko" aria-controls="Navbar_Toko">
            <span class="navbar-toggles"><i class="bi bi-list fw-bold text-light"></i></span>
        </button>
        <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="Navbar_Toko" aria-labelledby="Navbar_TokoLabel">
            <div class="offcanvas-header text-light">
                <h5 class="offcanvas-title text-light" id="Navbar_TokoLabel"><i class="fa fa-fw fa-store text-success"></i> Toko Sehat</h5>
                <button type="button" class="text-reset btn btn-outline-danger btn-sm text-light" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fas fa-fw fa-times"></i></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <div class="responsive-navbar-btn">
                        <li class="nav-item mx-2">
                            <a href="cart.php" class="nav-link text-light btn btn-sm btn-outline-primary px-3 position-relative"><i class="fa fa-fw fa-shopping-cart"></i></a>
                        </li>
                    </div>
                    <li class="nav-item border-end mx-2"></li>
                    <!-- apabila user belum melakukan login -->
                    <?php if (!isset($_SESSION['username'])) : ?>
                        <div class="responsive-navbar-btn">
                            <li class="nav-item mx-2">
                                <a href="login.php" class="nav-link px-3 btn btn-sm btn-outline-success text-light responsive-navbar-btn">Masuk</a>
                            </li>
                        </div>
                        <div class="responsive-navbar-btn">
                            <li class="nav-item mx-2">
                                <a href="register.php" class="nav-link px-3 btn btn-sm btn-light text-dark responsive-navbar-btn">Daftar</a>
                            </li>
                        </div>
                        <!-- apabila user telah melakukan login -->
                    <?php else : ?>
                        <div class="responsive-navbar-btn">
                            <li class="nav-item mx-2">
                                <a href="__function/session_out.php" class="nav-link px-3 btn btn-sm btn-outline-danger text-light responsive-navbar-btn">Keluar</a>
                            </li>
                        </div>
                    <?php endif; ?>
                </ul>
            </div>
            <div class=" d-flex"></div>
        </div>
    </div>
</nav>