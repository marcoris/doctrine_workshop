<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        #footer {
            position:absolute;
            bottom:0;
            width:100%;
            height:60px;   /* Height of the footer */
            background:#6cf;
        }
    </style>
    <title>Doctrine Blogpost</title>
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
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
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-8">
            <div class="jumbotron">
                <h1 class="display-1">Willkommen beim Doctrine Blogpost</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            </div>
        <?php
        require_once "bootstrap.php";
        require_once "blog.php";

        $em = getEntityManager();

        //$category = new \App\Entities\Category();
        //$category->setName("Category 1");
        //
        //$comment = new \App\Entities\Comment();
        //$comment->setComment("This is my first comment");
        //$comment->setAuthorName("Marco");
        //$comment->setAuthorEmail("marco.ris@risdesign.ch");
        //$comment->setAuthorUrl("risdesign.ch");
        //
        //$em->persist($comment);
        //$em->flush();

        //$comment = $em->getRepository(\App\Entities\Comment::class)->find(1);
        //echo $comment->getAuthorName() . "<br>";
        //echo $comment->getAuthorEmail() . "<br>";
        //echo $comment->getAuthorUrl() . "<br>";
        //echo $comment->getComment();
        ?>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        </div>
        <footer class="footer bg-primary">
            <!-- Copyright -->
            <div class="text-center p-3 text-white">
                © <?php echo date("Y"); ?> by Ocram
            </div>
            <!-- Copyright -->
        </footer>
    </div>
</div>
</body>
</html>


