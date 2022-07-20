<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Les DZ à Sidi Abdellah- HOME</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">Les DZ à Sidi Abdellah</div>
    <div class="address-bar">B 10 N 20 | ZERALDA, SIDI ABDELLAH | ALGER , ALGERIE</div>

    <?php 
    if (isset($_GET["logout"])) {
        if ($_GET["logout"]==true) {?>
            
            <div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>You have been logged out of the system. See you Soon <?php echo $_GET["name"];?></strong>
			</div> 
    <?php         
        }
    }
    ?>

    <!-- Navigation -->
   <?php require_once "nav.php"?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/adel" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/mahdi" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/zaki" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/ishak" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/pino" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">Les DZ à Sidi Abdellah</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By
                            <strong>Zakaria BRAHIMI</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>THE TEAM</strong>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="img/team.jpg" alt="">
                    <hr class="visible-xs">
                    <p>  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget hendrerit velit. Donec tempus vehicula ipsum, scelerisque tincidunt odio tempus eget. Maecenas accumsan faucibus placerat. Maecenas accumsan est a justo lacinia pharetra. Morbi aliquet felis dui, sed cursus nisl egestas eu. Aliquam imperdiet tempus eros, a porttitor neque iaculis eu. Nulla ac finibus ex. Nam massa nisi, molestie eget neque eget, ullamcorper porttitor urna. Phasellus vitae massa laoreet, interdum tortor sit amet, scelerisque justo. Curabitur dapibus diam a tincidunt gravida. Nulla molestie tristique lorem eu fermentum.</p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <?php require_once "footer.php" ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 2000 //changes the speed
    })
    </script>

</body>

</html>
