<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teknotoppen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
    <style>
        /* Generelle stiler for hele nettsiden */
        body {
            background-color: #f2f2f2;
            color: #333;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Stiler for header-seksjonen øverst på siden */
        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /* Stiler for lenker i header-seksjonen */
        header a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s ease;
            position: relative;
        }

        /* Pseudo-element for animert understrekning ved hover-effekt */
        header a::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: #fff;
            bottom: 0;
            left: 0;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease;
        }

        /* Endrer fargen og viser understrekning når musepekeren svever over lenkene */
        header a:hover {
            color: #55acee;
        }

        header a:hover::before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        /* Stiler for logo-bildet i header-seksjonen */
        .logo img {
            max-width: 100px;
            max-height: 60px;
        }

        /* Stiler for hovedtekstboksen */
        .tekst {
            width: 80%;
            margin: auto;
            padding: 30px;
            text-align: justify;
            background-color: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            margin-top: 30px;
        }

        /* Stiler for overskriftsnivå 2 (h2) */
        h2 {
            color: #333;
            font-size: 24px;
        }

        /* Stiler for hovedinnholdet */
        .main-content {
            padding: 30px;
        }

        /* Stiler for handlekurvknappen */
        .cart-button {
            display: inline-block;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 20px;
            border-radius: 8px;
            margin: 30px auto;
            text-align: center;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        /* Endrer bakgrunnsfargen når musepekeren svever over handlekurvknappen */
        .cart-button:hover {
            background-color: #555;
        }

        /* Stiler for bunntekstseksjonen (footer) */
        .footer {
            background-color: #333;
            color: #fff;
            padding: 30px;
            text-align: center;
            margin-top: 50px;
        }

        /* Stiler for avsnitt i bunntekstseksjonen */
        .footer p {
            margin: 0;
        }

        /* Stiler for sosiale medieikoner */
        .social-icons {
            margin-top: 30px;
        }

        /* Stiler for lenker til sosiale medieikoner */
        .social-icons a i {
            display: inline-block;
            margin: 0 15px;
            color: #fff;
            font-size: 24px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        /* Endrer fargen når musepekeren svever over sosiale medieikoner */
        .social-icons a i:hover {
            color: #55acee;
        }

     
.slider {
    width: 100%; /* Dekker hele bredden */
    max-height: 300px; /* Juster høyden etter behov */
    margin-top: 10px; /* Redusert avstand */
    margin-bottom: 10px; /* Redusert avstand */
    overflow: hidden;
}

.slick-slide img {
    width: 100%; /* Bildene dekker hele bredden */
    height: auto;
    display: block;
    border-radius: 10px;
}


        .slick-slide div {
            padding: 20px;
            text-align: center;
        }
    </style>

</head>

<body>
    <header>
        <div class="logo">
            <img src="" alt="">
        </div>
        <h1>Teknotoppen</h1>
        <nav>
            <a href="login.php">Logg inn/Registrering</a>
            <a href="produkter.php">Produkter</a>
            <a href="kontakt.php">Kontakt/Faq</a>
            <a href="minkonto.php">Min konto</a>
        </nav>
        <a href="handlekurv.php" class="cart-link" onclick="showCart()">
            <div class="cart-icon">&#128722;</div>
            <div class="cart-text">Handlekurv (<span id="cartCount">0</span>)</div>
        </a>
    </header>

    <!-- Bilde-slider for nyheter -->
    <div class="slider">
        <div>
            <img src="bilder/vision.avif" alt="Nyhetsbilde 1">
            <div>Nyhetsartikkel 1:.</div>
        </div>
        <div>
            <img src="bilder/ps5.jpg" alt="Nyhetsbilde 2">
            <div>Nyhetsartikkel 2: .</div>
        </div>
        <div>
            <img src="bilder/nintendo.avif" alt="Nyhetsbilde 2">
            <div>Nyhetsartikkel 2: .</div>
        </div>
    </div>

    <!-- Tekst boks om Teknotoppen -->
    <div class="tekst">
        <div class="main-content">
            <h2>Velkommen til Teknotoppen</h2>
            <p>
                Teknotoppen er ditt ultimate reisemål for den nyeste og mest avanserte teknologien.
                Vi kuraterer et utvalg av innovative og kvalitetsprodukter som vil berike ditt digitale liv.
                Utforsk den digitale fremtiden med toppmoderne smarttelefoner, bærbare datamaskiner, høykvalitets
                hodetelefoner og mye mer.
            </p>
            <p>
                Vårt fokus er å levere ikke bare nyskapende, men også pålitelige og holdbare produkter. Handle med
                trygghet gjennom våre sikre betalingsalternativer og brukervennlige plattform. Vi er ikke bare en
                butikk; vi er din partner på veien til et smartere og mer tilkoblet liv.
            </p>
        </div>
        <a href="produkter.php" class="cart-button">Se på vårt utvalg</a>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="social-icons">
            <a href="brukerveiledning.php" target="_blank"><i class="fas fa-book"></i> </a>
            <a href="twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; <?php echo date('Y'); ?> Teknotoppen. Alle rettigheter reservert.</p>
        <p>Kontakt: <a href="mailto:info@teknotoppen.no">info@teknotoppen.no</a></p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider').slick();
        });
    </script>

</body>

</html>
