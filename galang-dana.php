<?php
// Variabel
$title = $description = $target_funding = $target_end = $image = "";
$titleErr = $descriptionErr = $target_fundingErr = $target_endErr = $imageErr = "";

// Validasi Input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $titleErr = "Judul tidak boleh kosong";
    } else {
        $title = test_input($_POST["title"]);
    }

    if (empty($_POST["description"])) {
        $descriptionErr = "Deskripsi tidak boleh kosong";
    } else {
        $description = test_input($_POST["description"]);
    }

    if (empty($_POST["target_funding"])) {
        $target_fundingErr = "Target Pendanaan tidak boleh kosong";
    } else {
        $target_funding = test_input($_POST["target_funding"]);
    }

    if (empty($_POST["target_end"])) {
        $target_endErr = "Target Berakhir tidak boleh kosong";
    } else {
        $target_end = test_input($_POST["target_end"]);
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $imageErr =  "File harus gambar";
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    ) {
        $imageErr =  "File hanya boleh berekstensi JPG,PNG,JPEG";
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 2000000) {
        $imageErr = "File tidak boleh lebih dari 2MB";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $imageErr = "File gagal diupload";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_dir . htmlspecialchars(basename($_FILES["image"]["name"]));
            $uploadOk = 1;
        } else {
            $imageErr = "File gagal diupload";
            $uploadOk = 0;
        }
    }

    $result = '';
    if (!empty($_POST["title"]) & !empty($_POST["description"]) & !empty($_POST["target_funding"]) & !empty($_POST["target_end"]) &  $uploadOk == 1) {

        // Create database connection using config file
        include_once("config.php");

        // Insert galang dana data into table
        $result = mysqli_query($mysqli, "INSERT INTO donasi(title,description,target_funding,target_end,image) VALUES('$title','$description','$target_funding','$target_end','$image')");

        header("Location: index.php");
    } else {

    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Telkom Bisa</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>


<body>

    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="index.php">Telkom Bisa</a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="index.php"></a></li>
                                                <!-- <li><a href="about.html">About</a></li>
                                                <li><a href="program.html">latest causes</a></li>
                                                <li><a href="events.html">social events </a></li>
                                                <li><a href="blog.html">Blog</a>
                                                    <ul class="submenu">
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="blog_details.html">Blog Details</a></li>
                                                        <li><a href="elements.html">Element</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html">Contact</a></li> -->
                                            </ul>
                                        </nav>
                                    </div>
                                    <!-- Header-btn -->
                                    <div class="header-right-btn d-none d-lg-block ml-20">
                                        <a href="#donasi" class="btn header-btn">Galang Dana</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>

        <!-- slider Area Start-->
        <div class="slider-area">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInUp" data-delay=".6s">Galang Dana Sekarang</h1>
                                    <!-- <P data-animation="fadeInUp" data-delay=".8s">Website untuk galang dana secara online dan transparan untuk membantu teman-teman kita.</P> -->
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="form1" enctype="multipart/form-data">
                                        <div class="form-group" data-animation="fadeInLeft" data-delay=".8s">
                                            <div class="input-group mb-3">
                                                <input class="form-control" name="title" id="title" type="text" placeholder="Isi judul..">
                                            </div>
                                            <h5> <?php echo $titleErr; ?></h5>
                                        </div>
                                        <div class="form-group" data-animation="fadeInLeft" data-delay=".8s">
                                            <div class="input-group mb-3">
                                                <textarea class="form-control w-100" name="description" id="description" cols="30" rows="9" placeholder="Tulis Deskripsi.."></textarea>
                                            </div>
                                            <h5 class="error"> <?php echo $descriptionErr; ?></h5>
                                        </div>
                                        <div class="form-group" data-animation="fadeInLeft" data-delay=".8s">
                                            <div class="input-group mb-3">
                                                <input class="form-control" min="100000" name="target_funding" id="target_funding" type="number" placeholder="Isi Nominal Target Pendanaan..">
                                            </div>
                                            <h5 class="error"> <?php echo $target_fundingErr; ?></h5>
                                        </div>
                                        <div class="form-group " data-animation="fadeInLeft" data-delay=".8s">
                                            <div class="input-group mb-3">
                                                <input class="form-control datepicker" name="target_end" id="target_end" type="text" placeholder="Target Berakhir..">
                                            </div>
                                            <h5 class="error"> <?php echo $target_endErr; ?></h5>
                                        </div>
                                        <div class="form-group mt-10" data-animation="fadeInLeft" data-delay=".8s">
                                            <h4>Masukkan Foto</h4>
                                            <div class="input-group mb-3">
                                                <input type="file" name="image" id="image">
                                            </div>
                                            <h5 class="error"> <?php echo $imageErr; ?></h5>
                                        </div>
                                        <div class="border-top-0 d-flex justify-content-center" data-animation="fadeInLeft" data-delay=".8s">
                                            <button class="w-100 btn hero-btn mb-10" type="submit" name="Submit" value="Add">Kirim Galang Dana</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-wrapper section-bg2" data-background="assets/img/gallery/footer_bg.png">
            <!-- Footer Top-->

            <!-- footer-bottom -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-xl-10 col-lg-9 ">
                                <div class="footer-copy-right">
                                    <p>
                                        Website ini dibuat untuk tugas mata kuliah Workshop Pemrograman Internet
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="col-xl-2 col-lg-3">
                                <div class="footer-social f-right">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fas fa-globe"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="./assets/js/jquery.barfiller.js"></script>

    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

</body>

</html>