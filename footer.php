<footer class="py-2 bg-dark shadow-lg">
    <div class="container pt-2">
        <div class="col-3 mb-3">
            <img class="" src="public\img\logo\toko_kesehatan.png" width="30" alt="logo">
            <a href="index.php" class="text-decoration-none">
                <i class="fa fa-fw fa-store text-success"></i>
                <span class="text-light"> Toko Sehat @2021</span>
            </a>
        </div>
        <p class="text-light">
            <?php $ref_link = "#"; ?>
            Social media :
            <a class="text-light text-decoration-none" type="button" href="<?= $ref_link; ?>">
                <i class="fab fa-fw fa-github"></i>
            </a>
            <a class="text-light text-decoration-none" type="button" href="<?= $ref_link; ?>">
                <i class="fab fa-fw fa-facebook"></i>
            </a>
            <a class="text-light text-decoration-none" type="button" href="<?= $ref_link; ?>">
                <i class="fab fa-fw fa-twitter"></i>
            </a>
            <a class="text-light text-decoration-none" type="button" href="<?= $ref_link; ?>">
                <i class="fab fa-fw fa-youtube"></i>
            </a>
            <!-- <img class="" src="Public\icon\android-chrome-192x192.png" alt="" width="28" height="28"></a> -->
        </p>
    </div>
</footer>
</body>
<script src="vendor\jquery\jquery-3.6.0.min.js"></script>
<!-- <script src="vendor\bootstrap5\js\bootstrap.min.js"></script> -->
<script src="vendor\bootstrap5\js\bootstrap.bundle.min.js"></script>
<!-- <script src="vendor\bootstrap\dist\js\bootstrap.min.js"></script> -->
<?php require "ajax.php" ?>