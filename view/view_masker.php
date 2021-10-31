<?php
// import module
require_once "../conn.php";
require_once "../__function/query_function.php";
/// style untuk item
$List_Item = "width: 12.5rem;min-height: 320px;max-height: 400px;overflow: hidden;";

/// query fungsi get_spesific_data() berdasarkan tabel item dengan spesifik id_kategori
$items = get_spesific_data('item', 'id_kategori', '1');
?>
<div class="list-product-body d-flex flex-row bd-highlight flex-wrap ">
    <?php foreach ($items as $i) : ?>
        <div class="justify-content-sm-center">
            <a href="item.php?id_item=<?= $i['id']; ?>" target="_blank" class="card m-2 shadow-sm text-decoration-none text-dark" style="<?= $List_Item; ?>">
                <img src="public\img\<?= $i['picture'] ?>" width="300" class="card-img-top" alt="...">
                <div class="card-body pt-2 border-top" style="font-size: 14px;">
                    <p class="card-text mb-1" style="min-height: 50px; height: 65px;max-height: 75px;overflow: hidden;text-overflow: clip;"><?= $i['nama']; ?></p>
                    <p class="fw-bold">Rp <?= number_format($i['harga'], 0, ',', '.'); ?></p>
                    <div class="d-flex justify-content-between">
                        <button class="px-4 btn btn-sm btn-outline-info">View</button>
                        <button class="px-4 btn btn-sm btn-outline-success" style="z-index: 300;" href="__function/attach_item.php">Buy</button>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>