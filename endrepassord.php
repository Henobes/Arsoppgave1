
<?php
// Start en PHP-seksjon
include "database.php";

// Definerer $feilmelding som en tom streng som standard
$feilmelding = "";

// Sjekker om skjemaet for endring av passord er sendt
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_password'])) {
    // Henter data fra skjemaet
    $brukernavn = validate($_POST['brukernavn']);
    $gammelt_passord = validate($_POST['gammelt_passord']);
    $nytt_passord = validate($_POST['nytt_passord']);
    $bekreft_passord = validate($_POST['bekreft_passord']);

    // Sjekker om feltene er fylt ut
    if (empty($brukernavn) || empty($gammelt_passord) || empty($nytt_passord) || empty($bekreft_passord)) {
        $feilmelding = "Alle felt må fylles ut.";
    } else {
        // Henter data fra databasen basert på brukernavnet
        $sql = "SELECT * FROM kunde WHERE brukernavn='$brukernavn'";
        $result = mysqli_query($conn, $sql);

        // Sjekker om brukeren finnes i databasen
        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            // Verifiserer gammelt passord
            if (password_verify($gammelt_passord, $row['passord'])) {
                // Validerer det nye passordet og bekreftelsen
                if ($nytt_passord === $bekreft_passord) {
                    // Oppdaterer passordet i databasen
                    $hashed_password = password_hash($nytt_passord, PASSWORD_DEFAULT);
                    $update_sql = "UPDATE kunde SET passord='$hashed_password' WHERE brukernavn='$brukernavn'";
                    if (mysqli_query($conn, $update_sql)) {
                        $feilmelding = "Passordet ble oppdatert.";
                    } else {
                        $feilmelding = "Noe gikk galt. Vennligst prøv igjen. Feil: " . mysqli_error($conn);
                    }
                } else {
                    $feilmelding = "Det nye passordet stemmer ikke overens med bekreftelsen.";
                }
            } else {
                $feilmelding = "Feil gammelt passord.";
            }
        } else {
            $feilmelding = "Ingen bruker funnet med dette brukernavnet. SQL-feil: " . mysqli_error($conn);
        }

        // Lukker resultatsettet
        mysqli_free_result($result);
        // Lukker databasetilkoblingen
        mysqli_close($conn);
    }
}

// Funksjon for å validere data
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

       

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endre passord</title>
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
            margin-right: 10px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
        }

        /* Hovedinnhold-stiler */

        .main-content {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
        }

        .change-password-section {
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

        /* Footer-stiler */

        .footer {
            background-color: #333;
            color: #fff;
            padding: 30px;
            text-align: center;
            margin-top: 50px;
        }

        /* Stiler for lenker i bunntekstseksjonen */
        .footer a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!-- Container for hele siden -->
    <div class="container">
        <!-- Header-seksjon -->
        <header>
            <!-- Overaskrift -->
            <h1>Teknotoppen - Endre passord</h1>
        </header>

        <!-- Meny -->
        <nav>
            <ul>
                <li><a href="index.php">Hjem</a></li>
                <li><a href="produkter.php">Produkter</a></li>
                <li><a href="kontakt.php">Kontakt</a></li>
            </ul>
        </nav>

        <!-- Hovedinnhold -->
        <div class="main-content">
            <!-- Seksjon for endring av passord -->
            <section class="change-password-section">
                <h2>Endre passord</h2>
                <!-- Skjema for endring av passord -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <!-- Brukernavn-inndatafelt -->
                    <div class="form-group">
                        <label for="brukernavn">Brukernavn:</label>
                        <input type="text" id="brukernavn" name="brukernavn" placeholder="Skriv inn ditt brukernavn" required>
                    </div>

                    <!-- Gammelt passord-inndatafelt -->
                    <div class="form-group">
                        <label for="gammelt_passord">Gammelt passord:</label>
                        <input type="password" id="gammelt_passord" name="gammelt_passord" placeholder="Skriv inn ditt gamle passord" required>
                    </div>

                    <!-- Nytt passord-inndatafelt -->
                    <div class="form-group">
                        <label for="nytt_passord">Nytt passord:</label>
                        <input type="password" id="nytt_passord" name="nytt_passord" placeholder="Skriv inn ditt nye passord" required>
                    </div>

                    <!-- Bekreft passord-inndatafelt -->
                    <div class="form-group">
                        <label for="bekreft_passord">Bekreft nytt passord:</label>
                        <input type="password" id="bekreft_passord" name="bekreft_passord" placeholder="Bekreft ditt nye passord" required>
                    </div>

                    <!-- Innsending-knapp -->
                    <button type="submit" name="change_password">Endre passord</button>
                </form>
                <!-- Feilmelding for endring av passord -->
                <p><?php echo $feilmelding; ?></p>
            </section>
        </div>
             
        <!-- Footer-seksjon -->
        <footer class="footer">
            <!-- Tekst for bunntekst -->
            <p>&copy; <?php echo date('Y'); ?> Teknotoppen. Alle rettigheter reservert.</p>
            <!-- Kontaktinformasjon -->
            <p>Kontakt: <a href="mailto:info@teknotoppen.no">info@teknotoppen.no</a></p>
        </footer>
    </div>
</body>
</html>
