<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatt app</title>
    <style>
        /* Generelle stiler */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
          
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header-stiler */

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 100px; /* Juster størrelsen etter behov */
            height: 100px; /* Juster størrelsen etter behov */
            background-color: #333; /* Endre farge etter behov */
            border-radius: 50%;
            display: inline-block;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 24px;
            margin: 0;
        }

        /* Meny-stiler */

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        /* Hovedinnhold-stiler */

        .main-content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }

        .login-section {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #555;
        }

        .register-section a {
            color: #333;
            font-weight: bold;
        }

        /* Footer-stiler */

         /* Stiler for bunntekstseksjonen (footer) */
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
    </style>
</head>
<body>
    <!-- Container for hele siden -->
    <div class="container">
        <!-- Header-seksjon -->
        <header>
            <!-- Logo og overaskrift -->

            <h1>Teknotoppen</h1>
        </header>

        <!-- meny -->
        <nav>
            <ul>
                <!-- Lenker til forskjellige sider -->
                <li><a href="index.php.">Hjem</a></li>
                <li><a href="produkter.php">Produkter</a></li>
                <li><a href="kontakt.php">Hjelp</a></li>
            </ul>
        </nav>

        <!-- Hovedinnhold -->
        <div class="main-content">
            <!-- Seksjon for pålogging -->
            <section class="login-section">
                <h2>Login</h2>
                <!-- Skjema for pålogging -->
                <form action="produkter.php" method="post">
                    <!-- Brukernavn-inndatafelt -->
                    <div class="form-group">
                        <label for="brukernavn">Brukernavn:</label>
                        <input type="text" id="brukernavn" name="brukernavn" placeholder="Skriv inn ditt brukernavn" required>
                    </div>

                    <!-- Passord-inndatafelt -->
                    <div class="form-group">
                        <label for="passord">Passord:</label>
                        <input type="password" id="passord" name="passord" placeholder="Skriv inn ditt passord" required>
                    </div>

                    <!-- Innsending-knapp -->
                    <button type="submit">Logg inn</button>
                </form>
                <!-- Seksjon for registrering -->
                <div class="register-section">
                    <p>Har du ikke en konto? <a href="register.php">Registrer deg</a></p>
                </div>

                <p><a href="endrepassord.php">Endre passord</a></p>
            </section>
            <!-- PHP-kode for innlogging -->
            <?php
    include "database.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['brukernavn']) && isset($_POST['passord'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $brukernavn = validate($_POST['brukernavn']);
        $passord = validate($_POST['passord']);

        if (empty($brukernavn) || empty($passord)) {
            $feilmelding = "Feil passord eller brukernavn.";
        } else {

            $sql = "SELECT * FROM kunde WHERE brukernavn='$brukernavn'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($passord, $row['passord'])) {
                    $_SESSION['brukernavn'] = $row['brukernavn'];
                    $_SESSION['idkunde'] = $row['idKunde'];
                    // Omdiriger til ønsket side etter vellykket innlogging
                    header("Location: produkter.php");
                    exit();
                } else {
                    $feilmelding = "Feil passord.";
                }
            } else {
                $feilmelding = "Ingen bruker funnet med dette brukernavnet.";
            }

            // Lukk resultatsettet
            mysqli_free_result($result);
            // Lukk databasetilkoblingen
            mysqli_close($conn);
        }
    } else {
        $feilmelding = "Mangler nødvendige data.";
    }

    // Vis feilmelding hvis det er noen
    echo $feilmelding;
?>


        </div>
             
        <!-- Footer-seksjon -->
        <footer class="footer">
    <div class="social-icons">
        <a href="brukerveiledning.php" target="_blank"><i class="fas fa-book"></i> </a>
        <a href="twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
    <p>&copy; <?php echo date('Y'); ?> Teknotoppen. Alle rettigheter reservert.</p>
    <p>Kontakt: <a href="mailto:info@teknotoppen.no">info@teknotoppen.no</a></p>
</footer>
    </div>
</body>
</html>
