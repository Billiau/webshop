<?php
//require __DIR__.'/vendor/autoload.php';
include('src/database.php');
include('src/inc.php');
include('src/navbar.php');
session_start();
$db = new Database();
if (isset($_SESSION['user_id'])) {
    $userlist = new UserList();
    //use method getUserInfo in Class Userlist to get user info by passing the session ['user_id'] parameter
    $user = $userlist->getUserInfo($_SESSION['user_id']);
    $welcome = 'Logged in';
}
?>

<div class="banner">
    <img src="img/webshop.png">
    <a href="products_view.php"><button class="btn">All Products</button></a>
</div>
<div class="container">
    <div class="row">    
        <h2 class="center title-padding">New in stock</h2>
    </div>
    <div class="row">

        <div class="card-deck">
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="//placehold.it/500x280" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">1 Card title</h4>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">CATEGORY</small></p>
                </div>
            </div>
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="//placehold.it/500x280" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">2 Card title</h4>
                    <p class="card-text">This is a longer card little bit longer.</p>
                    <p class="card-text"><small class="text-muted">CATEGORY</small></p>
                </div>
            </div>
            <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="//placehold.it/500x280" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">3 Card title</h4>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">CATEGORY</small></p>
                </div>
            </div>
            <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="//placehold.it/500x280" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">4 Card title</h4>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">CATEGORY</small></p>
                </div>
            </div>   
        </div>
    </div>
    <div class="row">    
        <h2 class="center title-padding">Other products</h2>
    </div>
    <div class="row">
        <div class="card-deck">
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="//placehold.it/500x280" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">1 Card title</h4>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">CATEGORY</small></p>
                </div>
            </div>
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="//placehold.it/500x280" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">2 Card title</h4>
                    <p class="card-text">This is a longer card little bit longer.</p>
                    <p class="card-text"><small class="text-muted">CATEGORY</small></p>
                </div>
            </div>
            <div class="w-100 d-none d-sm-block d-md-none"><!-- wrap every 2 on sm--></div>
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="//placehold.it/500x280" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">3 Card title</h4>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">CATEGORY</small></p>
                </div>
            </div>
            <div class="w-100 d-none d-md-block d-lg-none"><!-- wrap every 3 on md--></div>
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="//placehold.it/500x280" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">4 Card title</h4>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">CATEGORY</small></p>
                </div>
            </div>   
        </div>
    </div>
</div>
</body>
</html>