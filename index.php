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
            <button id="nav-button">
                <img src="./img/menu_white.24dp.svg" alt="Menu">
            </button>
        </div>
    </nav>
    <main>
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

                        <!--<h3>Antipasti</h3>
                        <div>
                            <h4>Bruschetta Classic</h4>
                            <p>€12</p>
                        </div>
                        <div>
                            <h4>Bruschetta Vijgen, Parma, Geitenkaas</h4>
                            <p>€16</p>
                        </div>
                        <div>
                            <h4>Vitello Tonnato</h4>
                            <p>€16</p>
                        </div>
                        <div>
                            <h4>Zalmtartaar</h4>
                            <p>€16.5</p>
                        </div>
                        <div>
                            <h4>Carpaccio Van Zalm</h4>
                            <p>€16.5</p>
                        </div>
                        <div>
                            <h4>Rundscarpaccio Met Ruccola Parmezaan</h4>
                            <p>€18.5</p>
                        </div>
                        <div>
                            <h4>Lauwe Salade Van Octopus</h4>
                            <p>€19.5</p>
                        </div>
                        <div>
                            <h4>Bruschetta Krab</h4>
                            <p>€19.5</p>
                        </div>
                        <div>
                            <h4>Bruschetta Krab</h4>
                            <p>€19.5</p>
                        </div>
                        <div>
                            <h4>Antipasto Italiano 2p</h4>
                            <p>€19.5</p>
                        </div>


                        <h3>Pasta</h3>
                        <div>
                            <h4>Tagliatelle Ragu</h4>
                            <p>€15.5</p>
                        </div>
                        <div>
                            <h4>Lasagna Von De Chef</h4>
                            <p>€17.5</p>
                        </div>
                        <div>
                            <h4>Ravioli Ricotta En Spinazie</h4>
                            <p>€18.5</p>
                        </div>
                        <div>
                            <h4>Spaghetti Alla Puttanesca</h4>
                            <p>€16.5</p>
                        </div>
                        <div>
                            <h4>Tagliatelle Zalm Met Zalmcaviaar</h4>
                            <p>€20.5</p>
                        </div>
                        <div>
                            <h4>Lasagna Calamari En Scampi</h4>
                            <p>€21.5</p>
                        </div>
                        <div>
                            <h4>Linguini Vongole</h4>
                            <p>€25</p>
                        </div>
                        <div>
                            <h4>Ravioli St Jacobs En Scampi</h4>
                            <p>€26.5</p>
                        </div>
                        <div>
                            <h4>Spaghetti Frutti Di Mare</h4>
                            <p>€27.5</p>
                        </div>


                        <h3>Vlees</h3>
                        <div>
                            <h4>Saltimbocca Alla Romana</h4>
                            <p>€26.5</p>
                        </div>
                        <div>
                            <h4>Kalfslapjes Met Citroensaus</h4>
                            <p>€26.5</p>
                        </div>
                        <div>
                            <h4>Tagliata Ruccola Parmezaan</h4>
                            <p>€28.5</p>
                        </div>
                        <div>
                            <h4>Lamsfilet Met Groentjes</h4>
                            <p>€28.5</p>
                        </div>
                    </div>




                    <div class="menu-column">
                        <h3>Vis</h3>
                        <div>
                            <h4>Heilbot Met Zwarte Rijst</h4>
                            <p>€23.5</p>
                        </div>
                        <div>
                            <h4>Gebakken Zalm</h4>
                            <p>€23.5</p>
                        </div>
                        <div>
                            <h4>Gegrilde Octopus</h4>
                            <p>€26.5</p>
                        </div>
                        <div>
                            <h4>Gambas Naar Keuze</h4>
                            <p>€31.5</p>
                        </div>


                        <h3>Dolci</h3>
                        <div>
                            <h4>Tiramisu</h4>
                            <p>€8.5</p>
                        </div>
                        <div>
                            <h4>Créme Brulée</h4>
                            <p>€8.5</p>
                        </div>
                        <div>
                            <h4>Panna Cotta</h4>
                            <p>€8.5</p>
                        </div>
                        <div>
                            <h4>Sorbetto Al Limone (Citroensorbet)</h4>
                            <p>€8</p>
                        </div>
                        <div>
                            <h4>Sorbetto Al Limone Con Limoncello (Citroensorbet&Limoncello)</h4>
                            <p>€13</p>
                        </div>
                        <div>
                            <h4>Gelato Alla Vaniglia (Vanilla Ijs)</h4>
                            <p>€7</p>
                        </div>
                        <div>
                            <h4>Gelato Al Caffé (Mokka Ijs)</h4>
                            <p>€7</p>
                        </div>
                        <div>
                            <h4>Gelato Alla Cioccolato (Chocolade Ijs)</h4>
                            <p>€7</p>
                        </div>
                        <div>
                            <h4>Gelato Alla Vaniglia Con Frutta Rossa (Vanilla Ijs Met Rood Fruit)</h4>
                            <p>€12</p>
                        </div>
                        <div>
                            <h4>Dame Blanche</h4>
                            <p>€8</p>
                        </div>
                        <div>
                            <h4>Coupe Brésilienne</h4>
                            <p>€8</p>
                        </div>
                        <div>
                            <h4>Tartuffo Biano O Néro (Tartuffo Ijs Wit Of Zwart)</h4>
                            <p>€7</p>
                        </div>
                        <div>
                            <h4>Limone Ripieno (Gevulde Citroen Met Ijs)</h4>
                            <p>€7</p>
                        </div>-->
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
                        <p><span><a href="https://m.facebook.com/profile.php/?id=100057390011764"><img src="./img/facebook_white_24dp.svg" alt="Facebook"></a></span></p>
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
                        <img src="./gallery/<?php echo $row["path"] ?>" alt="">
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
            <div>
                <b>Francesco Ristorante 2023 &copy;</b>
                <div class="contact">
                    <p>Adres: <span> Kapelsestraat 92, 2950 Kapellen, Belgium</span></p>
                    <p>Telefoonnummer: <a href="tel:+32472260703">+32 472 26 07 03</a></p>
                    <p>Sociaal: <span><a><img src="./img/facebook_white_24dp.svg" alt="Facebook"></a></span></p>
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