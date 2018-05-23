<?php
include('src/database.php');
include('src/inc.php');
include('src/navbar.php');
require('src/productsList.php');
require('src/product.php');

session_start();

$listProducts = new ProductsList();
$table = $listProducts->getProducts();
?>

<div class="banner">
    <img src="img/webshop.png">
</div>
<div class="container">
        <div class="row">    
        <h2 class="center title-padding">All products</h2>
    </div>
    <div class="row">
        <div class="card-deck">

            <?php foreach ($table as $product) { ?>
                <div class="card mb-4">
                    <img class="card-img-top img-fluid" src="//placehold.it/500x280" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?= $product->getName() ?></h4>
                        <p class="card-text"><?= $product->getDescription() ?></p>
                        <p class="card-text"><small class="text-muted"><?= $product->getCat_id() ?></small></p>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</div>