<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Telkom Bisa</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/hamburgers.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
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
                                        <a href="#donasi" class="btn header-btn">Donasi</a>
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
        <!--? Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <a>Telkom<br> Bisa</a>
                    </div>
                </div>
            </div>
        </div>

        <!--? Blog Area Start -->
        <section class="blog_area single-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <?php
                        include_once("config.php");

                        $id = $_GET['id'];

                        // Fetech donasi data based on id
                        $result = mysqli_query($mysqli, "SELECT * FROM donasi WHERE id=$id");

                        while ($donasi_id = mysqli_fetch_array($result)) {
                            $title = $donasi_id['title'];
                            $description = $donasi_id['description'];
                            $total = round($donasi_id['total'] / $donasi_id['target_funding'] * 100);
                            if($total > 100) {
                                $total = 100;
                            }
                            $image = $donasi_id['image'];

                            echo '<div class="single-post">';
                            echo '<div class="feature-img mb-50">';
                            echo '<img class="img-fluid" src="' . $image . '" alt="">';
                            echo '</div>';
                            echo '<div class="single-skill mb-15">';
                            echo '<div class="bar-progress">';
                            echo '<div id="bar2" class="barfiller">';
                            echo '<div class="tipWrap">';
                            echo '<span class="tip"></span>';
                            echo '</div>';
                            echo '<span class="fill" data-percentage=' . $total . '></span>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="prices d-flex justify-content-between">';
                            echo '<p>Terkumpul Rp. <span>' . $donasi_id['total'] . '</span></p>';
                            echo '<p>Dari Rp. <span>' . $donasi_id['target_funding'] . '</span></p>';
                            echo '</div>';
                            echo '<div class="blog_details">';
                            echo '<h2 style="color: #2d2d2d;">' . $title . '</h2>';
                            echo '<p class="excert">' . $description . '</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>

                        <div class="navigation-top">
                            <h4>Donator</h4>


                            <?php
                            include_once("config.php");

                            $id = $_GET['id'];

                            // Fetech donasi data based on id
                            $result = mysqli_query($mysqli, "SELECT * FROM donator WHERE donasi_id=$id ORDER BY id DESC");

                            while ($donator = mysqli_fetch_array($result)) {
                                $message = $donator['message'];
                                $total = $donator['total'];

                                echo '<div class="blog-author">';
                                echo '<div class="media align-items-center">';
                                // echo '<img src="assets/img/blog/author.png" alt="">';
                                echo '<div class="media-body">';
                                echo '<a href="#">';
                                echo '<h4>Rp. ' . $total . '</h4>';
                                echo '</a>';
                                echo '<p>' . $message . '</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>


                        <!-- 
                        <div class="comments-area">
                            <h4>Donator</h4>
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="assets/img/blog/comment_1.png" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                                Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">Emilly Blunt</a>
                                                    </h5>
                                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                                </div>
                                                <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form class="form-contact comment_form" action="#" id="commentForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-contactForm btn_1 boxed-btn">Post Comment</button>
                                </div>
                            </form>
                        </div> -->
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <p>Donasi Sekarang</p>
                                <form action="add.php?id=<?php echo $_GET['id']; ?>" method="post" name="form1">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input class="form-control" name="total" id="name" type="number" placeholder="Isi Nominal..">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <textarea class="form-control w-100" name="message" id="comment" cols="30" rows="9" placeholder="Tulis Pesan.."></textarea>
                                        </div>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit" name="Submit" value="Add">Donasi</button>
                                </form>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    // Display selected user data based on id
    // Getting id from url
    include_once("config.php");

    $id = $_GET['id'];

    // Fetech donasi data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM donasi WHERE id=$id");

    $title;
    $description;
    $target;
    $total;
    while ($donasi_id = mysqli_fetch_array($result)) {
        $title = $donasi_id['title'];
        $description = $donasi_id['description'];
        $target = $donasi_id['target_funding'];
        $total = $donasi_id['total'];
    }
    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $message = $_POST['message'];
        $total_donation = $_POST['total'];

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO donator(donasi_id,message,total) VALUES('$id','$message','$total_donation')");

        $new_total = $total + $total_donation;
        // Add total
        $new_donasi = mysqli_query($mysqli, "UPDATE donasi SET total = $new_total WHERE id = $id");
        // Show message when user added
        // echo "Donasi berhasil. <a href='index.php'>Kembali ke halaman utama</a>";
        // header("Location: index.php");
    }
    ?>
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

    <!-- Progress -->
    <script src="./assets/js/jquery.barfiller.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

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