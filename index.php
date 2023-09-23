<?php
global $connection;
include 'db.php';
error_reporting(E_ERROR | E_PARSE);

$sql_cat = "SELECT * FROM `categories`";
$sql_item = "SELECT * FROM `items`";
$sql_gallery = "SELECT * FROM `gallery`";

$res_cat = mysqli_query($connection, $sql_cat);
$res_item = mysqli_query($connection, $sql_item);
$res_gallery = mysqli_query($connection, $sql_gallery);

$half = mysqli_num_rows($res_item);

?>

<!DOCTYPE html>
<html lang="be">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/basestyle.css">
    <link rel="stylesheet" href="./css/mainstyle.css">
    <link rel="stylesheet" href="./css/responsive.css">
    <title>Ristorante Francesco</title>
    <link rel="apple-touch-icon" sizes="180x180" href="./img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon-16x16.png">
    <meta name="description" content="Op zoek naar huisbereide pasta, verse, smaalvolle gerechten met een originele twist én lekkere wijn, rechtstreeks geimporteerd uit Italië?">
</head>
<body>
    <nav>
        <div id="navigation-desktop">
            <div>
                <div class="logo">
                    <img src="./img/logo.svg" alt="Ristorante Francesco Logo">
                </div>
                <a href="#start">Startpagina</a>
                <a href="#menu">Menu</a>
                <a href="#about">Over ons</a>
                <a href="#gallery">Fotogalerij</a>
                <a href="#reserve">Reserveer nu online</a>
            </div>
        </div>
        <div id="navigation-mobile">
            <div class="logo">
                <img src="./img/logo.svg" alt="Ristorante Francesco Logo">
            </div>
            <button id="nav-button" onclick="openNavigation()">
                <img src="./img/menu_white_24dp.svg" alt="Menu">
            </button>
        </div>
        <div id="navigation-mobile-dropdown">
            <div>
                <a href="#start">Startpaginen</a>
                <a href="#menu">Menu</a>
                <a href="#about">Over ons</a>
                <a href="#gallery">Fotogalrij</a>
                <a href="#reserve">Reserveer nu online</a>
            </div>
        </div>
    </nav>
    <main>
        <div id="modal">
            <div id="modal-content">
                <div>
                    <img src="./img/bg-01.png" id="showcased-image">
                    <button onclick="closeImage()">
                        <img src="./img/close_white_24dp.svg" alt="Close">
                    </button>
                </div>
            </div>
        </div>
        <div id="start" class="parallax-window" data-parallax="scroll" data-image-src="./img/bg-01.png">
            <div class="section start">
                <div>
                    <h1>Francesco</h1>
                    <p class="page-detail">Op zoek naar huisbereide pasta, verse, smaakvolle gerechten met een originele twist én lekkere wijn, rechtstreeks geimporteerd uit <span class="italy-text">Italië</span>?</p>
                    <p class="page-detail bold">Welkom bij Francesco!</p>
                    <p class="page-detail">Een gezellig Italiaans restaurant met mooi ingericht terras en ruime parkeermogelijkheden.
                        Het interieur van de zaak werd begin september ’23 helemaal vernieuwd.</p>
                </div>
            </div>
        </div>
        <div id="menu" class="parallax-window" data-parallax="scroll" data-image-src="./img/bg-05.png">
            <div class="section">
                <h2>&#183; Menu &#183;</h2>
                <div id="menu-wrapper">
                    <div class="menu-column">

                    <?php
                    $counter = 1;
                    $halfed = false;
                    while ($row = mysqli_fetch_array($res_cat)){

                    ?>

                      <h3><?php echo $row["cat_name"]?></h3>
                        <?php
                        $catid = $row["id"];
                        $sql_item_bycat = "SELECT * FROM `items` WHERE cat_id='$catid'";
                        $res_item_bycat = mysqli_query($connection, $sql_item_bycat);
                        while ($item_row = mysqli_fetch_array($res_item_bycat)){

                        ?>

                            <div>
                                <h4><?php echo $item_row["item_name"]?></h4>
                                <p><?php echo $item_row["item_price"]?></p>
                            </div>

                    <?php
                            if ($counter >= $half/2 && $halfed==false){
                                $halfed = true;
                                ?>
                        </div>
                        <div class="menu-column">

                        <?php
                            }

                            $counter++;
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="about" class="parallax-window" data-parallax="scroll" data-image-src="./img/bg-03.png">
            <div class="section clear">
                <div class="section-block">
                    <h2>Over Ons</h2>
                    <p class="personnel-text">CHEF ARTUR</p>
                    <p>Onze nieuwe aanwinst! Hij is een gepassioneerde Chef uit Oekraïne, heeft de Italiaanse keuken geleerd in Moskou, bij Chef Luigi Magni, in restaurant Pinch. Geeft de gerechten een persoonlijke touch.</p>
                    <p class="personnel-text">FRANCESCO</p>
                    <p>Italiaan in hart en nieren, ontvangt jullie met enthousiasme en professionaliteit. Is de zaak begonnen op het Antwerpse Zuid en kwam 10 jaar geleden naar Kapellen.</p>
                    <p class="personnel-text">FRANCOISE</p>
                    <p>Sinds kort bij team Francesco, buitte vroeger de succesvolle B&B Entre Amis uit in Boedapest. Heeft deze nieuwe uitdaging  gevonden dankzij haar passie voor de Italiaanse keuken.</p>
                    <div class="contact">
                        <p>Adres: <span> Kapelsestraat 92, 2950 Kapellen, Belgium</span></p>
                        <p>Contact: <a href="tel:+32472260703">+32 472 26 07 03</a><a href="tel:+32472260703">+32 496 21 40 25</a></p>
                        <div>
                            <a href="https://facebook.com/profile.php/?id=100057390011764" target="_blank"><img src="./img/facebook_white_24dp.svg" alt="Facebook"></a>
                            <a href="https://www.instagram.com/ristorante_francesco/?fbclid=IwAR36Vx-KZY_Sv1_sbcYX6ODHTnfNFVeXHa4ewmFqQ_g_hUVrjsol5ijxFaU" target="_blank"><img src="./img/instagram_white_24dp.svg" alt="Instagram"></a>
                            <a href="https://www.tripadvisor.be/Restaurant_Review-g2030826-d4481571-Reviews-Francesco-Kapellen_Antwerp_Province.html" target="_blank"><img src="./img/trip_advisor_white_24dp.svg" alt="Trip Advisor"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="gallery" class="parallax-window" data-parallax="scroll" data-image-src="./img/bg-02.png">
            <div class="section">
                <h2>&#183; Fotogalrij &#183;</h2>
                <div id="gallery-wrapper">

                    <?php

                    while ($row = mysqli_fetch_array($res_gallery)){
                    ?>
                        <img src="./gallery/<?php echo $row["path"] ?>" onclick="openImage('./gallery/<?php echo $row["path"] ?>')">
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
        <div id="reserve" class="parallax-window" data-parallax="scroll" data-image-src="./img/bg-01.png">
            <div class="section">
                <h2>&#183; Reserveer nu online &#183;</h2>
            </div>
        </div>
    </main>
    <footer>
        <div id="footer-content">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9972.599544072787!2d4.4169388!3d51.3267629!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c40917d110c6af%3A0x39873880ec4343a!2sFrancesco!5e0!3m2!1shu!2shu!4v1695419174722!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div>
                <b>Francesco Ristorante 2023 &copy;</b>
                <div class="contact footer">
                    <p>Adres: <span> Kapelsestraat 92, 2950 Kapellen, Belgium</span></p>
                    <p>Contact: <a href="tel:+32472260703">+32 472 26 07 03</a><a href="tel:+32472260703">+32 496 21 40 25</a></p>
                    <div>
                        <a href="https://facebook.com/profile.php/?id=100057390011764" target="_blank"><img src="./img/facebook_white_24dp.svg" alt="Facebook"></a>
                        <a href="https://www.instagram.com/ristorante_francesco/?fbclid=IwAR36Vx-KZY_Sv1_sbcYX6ODHTnfNFVeXHa4ewmFqQ_g_hUVrjsol5ijxFaU" target="_blank"><img src="./img/instagram_white_24dp.svg" alt="Instagram"></a>
                        <a href="https://www.tripadvisor.be/Restaurant_Review-g2030826-d4481571-Reviews-Francesco-Kapellen_Antwerp_Province.html" target="_blank"><img src="./img/trip_advisor_white_24dp.svg" alt="Trip Advisor"></a>
                    </div>
                </div>
            </div>
            <div class="creators">
                <b>Website created by:</b>
                <p>Várkonyi Borisz</p>
                <p>Wolfram Kristóf</p>
            </div>
        </div>
    </footer>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script>

        var modal = document.getElementById("modal");
        var modalImage = document.getElementById("showcased-image");

        function openImage(filePath) {
            modal.classList.add("opened");
            modalImage.src = filePath;
        }

        function closeImage() {
            modal.classList.remove("opened");
        }

        var mobileMenu = document.getElementById("navigation-mobile-dropdown");

        function openNavigation() {
            mobileMenu.classList.toggle("opened");
        }

        function checkAndShowHideMenu() {
            if(window.innerWidth < 768) {
                $('#tm-nav ul').addClass('hidden');
            } else {
                $('#tm-nav ul').removeClass('hidden');
            }
        }

        $(function(){
            var tmNav = $('#tm-nav');
            tmNav.singlePageNav();

            checkAndShowHideMenu();
            window.addEventListener('resize', checkAndShowHideMenu);

            $('#menu-toggle').click(function(){
                $('#tm-nav ul').toggleClass('hidden');
            });

            $('#tm-nav ul li').click(function(){
                if(window.innerWidth < 768) {
                    $('#tm-nav ul').addClass('hidden');
                }
            });

            $(document).scroll(function() {
                var distanceFromTop = $(document).scrollTop();

                if(distanceFromTop > 100) {
                    tmNav.addClass('scroll');
                } else {
                    tmNav.removeClass('scroll');
                }
            });

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>