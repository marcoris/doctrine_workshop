<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Doctrine Blogpost</title>
</head>
<body class="mb-5">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Doctrine Blogpost</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="<?php echo _("Search..."); ?>" aria-label="Search">
                <button class="btn btn-primary" type="submit"><?php echo _("Search"); ?></button>
            </form>
        </div>
    </div>
</nav>
<div class="d-flex justify-content-center p-3 mt-5">
    <div class="container">
        <div class='row'>
            <div class='col-12'>
                <div class="jumbotron">
                    <h1 class="display-1"><?php echo _("Welcome to the doctrine blogpost"); ?></h1>
                    <p class="lead"><?php echo _("This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information."); ?></p>
                </div>
            </div>
            <div class="col-9">
                <?php
                require_once "bootstrap.php";
                $em = getEntityManager();

//                $pRepo = $em->getRepository(\App\Entities\Product::class);
//                $cRepo = $em->getRepository(\App\Entities\ProductCategory::class);
//                $cartRepo = $em->getRepository(\App\Entities\Cart::class);

                // Add product to cart decrement stock
//                $product = $pRepo->findOneById(1);
//                $cart = new \App\Entities\Cart();
//                $cart->addProduct($product);
//                $em->persist($cart);
//                $em->flush();


                // Remove product from cart increment stock
//                $cart = $cartRepo->findOneById(1);
//                $productCollection = $cart->getProducts();
//                $removeProduct = $productCollection->get(0);
//                $cart->getProducts()->removeElement($product);
//
//                $em->persist($cart);
//                $em->flush();

//                $cat = $cRepo->findOneById(1);
//                $categories = $pRepo->getAvailableProducts($cat);
//
//                $product = $pRepo->getProductsForPriceRange(1, 100);
//                foreach ($product as $pro)
//                    echo $pro->getName() . "<br>";
//                echo "<hr>";
//                foreach ($categories as $category)
//                    echo $category->getName() . "<br>";
                // Add author
//                $author = new \App\Entities\Author();
//                $author->setName("Dieter");
////                $author->setAge(48);
//                $author->setEmail("dieter@hans.ch");
//                $em->persist($author);
//                $em->flush();

                //$comment->setComment("This is my first comment");
                //$comment->setAuthorName("Marco");
                //$comment->setAuthorEmail("marco.ris@risdesign.ch");
                //$comment->setAuthorUrl("risdesign.ch");

//                require_once "cart.php";
//                require_once "posts.php";
//                require_once "post.php";
//                require_once "author.php";
                require_once "authors.php";
                ?>
                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            </div>
            <div class="col-3 bg-light p-2">
                <h3 class="display-6 text-center"><?php echo _('Archive'); ?></h3>
                <ul>
                    <li><a href="#">Januar 2022</a></li>
                </ul>
            </div>
        </div>
    </div>
    <footer class="footer bg-primary" style="position:fixed;height:50px;bottom:0;left:0;right:0;margin-bottom:0;">
        <!-- Copyright -->
        <div class="text-center p-3 text-white">
            © <?php echo date("Y"); ?> by Ocram
        </div>
        <!-- Copyright -->
    </footer>
</div>
</body>
</html>


