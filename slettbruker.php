<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slett bruker</title>
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

        .delete-user-section {
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
            <h1>Teknotoppen - Slett bruker</h1>
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
            <!-- Seksjon for sletting av bruker -->
            <section class="delete-user-section">
                <h2>Slett bruker</h2>
                <!-- Skjema for sletting av bruker -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <!-- Brukernavn-inndatafelt -->
                    <div class="form-group">
                        <label for="brukernavn">Brukernavn:</label>
                        <input type="text" id="brukernavn" name="brukernavn" placeholder="Skriv inn brukernavnet til brukeren du vil slette" required>
                    </div>

                    <!-- Passord-inndatafelt -->
                    <div class="form-group">
                        <label for="passord">Passord:</label>
                        <input type="password" id="passord" name="passord" placeholder="Skriv inn passordet for å bekrefte slettingen" required>
                    </div>

                    <!-- Innsending-knapp -->
                    <button type="submit" name="delete_user">Slett bruker</button>
                </form>

                <?php
                // Start en PHP-seksjon
                include "database.php";

                // Definerer $feilmelding som en tom streng som standard
                $feilmelding = "";

                // Sjekker om skjemaet for sletting av bruker er sendt
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
                    // Henter data fra skjemaet
                    $brukernavn = validate($_POST['brukernavn']);
                    $passord = validate($_POST['passord']);

                    // Sjekker om feltene er fylt ut
                    if (empty($brukernavn) || empty($passord)) {
                        $feilmelding = "Alle felt må fylles ut.";
                    } else {
                        // Hent brukerinformasjon fra databasen
                        $sql = "SELECT * FROM kunde WHERE brukernavn='$brukernavn'";
                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) === 1) {
                            $row = mysqli_fetch_assoc($result);
                            // Verifiser passord
                            if (password_verify($passord, $row['passord'])) {
                                // Slett brukeren fra databasen
                                $delete_sql = "DELETE FROM kunde WHERE brukernavn='$brukernavn'";
                                if (mysqli_query($conn, $delete_sql)) {
                                    $feilmelding = "Brukeren ble slettet.";
                                } else {
                                    $feilmelding = "Noe gikk galt. Vennligst prøv igjen.";
                                }
                            } else {
                                $feilmelding = "Feil passord.";
                            }
                        } else {
                            $feilmelding = "Ingen bruker funnet med dette brukernavnet.";
                        }

                        // Lukk databaseforbindelsen
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

                <!-- Feilmelding vises kun hvis det er en feil -->
                <?php if (!empty($feilmelding)) : ?>
                    <p><?php echo $feilmelding; ?></p>
                <?php endif; ?>
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
