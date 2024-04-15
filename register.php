<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer deg </title>
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

        .register-section {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
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

        /* Footer-stiler */

        footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
   <!-- Hovedcontaineren som inneholder hele innholdet -->
<div class="container">

<!-- Header-seksjonen med logo og nettstedets navn -->
<header>
  
    <h1> Teknotoppen</h1> <!-- Overskrift for nettstedets navn -->
</header>

<!-- Navigasjonsmenyen -->
<nav>
    <ul>
        <li><a href="index.php">Hjem</a></li> <!-- Lenke til hjem-siden -->
        <li><a href="produkter.php">Produkter</a></li> <!-- Lenke til produkter-siden -->
        <li><a href="kontakt.php">Kontakt</a></li> <!-- Lenke til kontakt-siden -->
    </ul>
</nav>

<!-- Hovedinnholdsseksjonen -->
<div class="main-content">

    <!-- Seksjon for registrering -->
    <section class="register-section">
        <h2>Registrer deg</h2> <!-- Overskrift for registreringsskjemaet -->

        <!-- Skjema for registrering med handling mot register.php -->
        <form action="register.php" method="post">

            <!-- Brukernavn-inputfelt -->
            <div class="form-group">
                <label for="brukernavn">Brukernavn:</label>
                <input type="text" id="brukernavn" name="brukernavn" placeholder="Velg et brukernavn" required>
            </div>

            <!-- E-post-inputfelt -->
            <div class="form-group">
                <label for="epost">E-post:</label>
                <input type="email" id="epost" name="epost" placeholder="Din e-postadresse" required>
            </div>

            <!-- Passord-inputfelt -->
            <div class="form-group">
                <label for="passord">Passord:</label>
                <input type="password" id="passord" name="passord" placeholder="Velg et passord" required>
            </div>

            <!-- Leveringsadresse-inputfelt -->
            <div class="form-group">
                <label for="leveringsadresse">Leveringsadresse:</label>
                <textarea id="leveringsadresse" name="leveringsadresse" placeholder="Din leveringsadresse" required></textarea>
            </div>

            <!-- Knapp for å sende inn registreringsskjemaet -->
            <button type="submit">Registrer deg</button>
        </form>
    </section>


            <?php
            include 'database.php';

            // Behandle registreringsforespørsel
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Sjekk om nødvendige POST-variabler er satt
                if (isset($_POST["brukernavn"]) && isset($_POST["epost"]) && isset($_POST["passord"]) && isset($_POST["leveringsadresse"])) {
                    $brukernavn = $_POST["brukernavn"];
                    $epost = $_POST["epost"];
                    $passord = password_hash($_POST["passord"], PASSWORD_BCRYPT); // Krypterer passordet
                    $leveringsadresse = $_POST["leveringsadresse"];

                    // Sett opp SQL-spørring for å legge til bruker i databasen
                    $sql = "INSERT INTO kunde (brukernavn, epost, leveringsadresse, passord) VALUES ('$brukernavn', '$epost', '$leveringsadresse', '$passord')";

                    // Meldinger for feilsøking
                    if ($conn->query($sql) === TRUE) {
                        echo "Registrering vellykket!";
                    } else {
                        echo "Feil ved registrering: " . $conn->error;
                    }
                } else {
                    echo "Mangler nødvendige data for registrering.";
                }
            } else {
                echo "Ingen data mottatt fra skjema.";
            }

            // Lukk tilkoblingen
            $conn->close();
            ?>
        </div>

        <footer>
            <p>&copy; <?php echo date('Y'); ?> </p>
        </footer>
    </div>
</body>
</html>
