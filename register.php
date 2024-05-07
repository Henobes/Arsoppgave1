<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrer deg</title>
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
            width: 100px;
            height: 100px;
            background-color: #333;
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
<div class="container">
    <header>
        <h1>Teknotoppen</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Hjem</a></li>
            <li><a href="produkter.php">Produkter</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
        </ul>
    </nav>
    <div class="main-content">
        <section class="register-section">
            <h2>Registrer deg</h2>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="brukernavn">Brukernavn:</label>
                    <input type="text" id="brukernavn" name="brukernavn" placeholder="Velg et brukernavn" required>
                </div>
                <div class="form-group">
                    <label for="epost">E-post:</label>
                    <input type="email" id="epost" name="epost" placeholder="Din e-postadresse" required>
                </div>
                <div class="form-group">
                    <label for="passord">Passord:</label>
                    <input type="password" id="passord" name="passord" placeholder="Velg et passord" required>
                </div>
                <div class="form-group">
                    <label for="leveringsadresse">Leveringsadresse:</label>
                    <textarea id="leveringsadresse" name="leveringsadresse" placeholder="Din leveringsadresse" required></textarea>
                </div>
                <div class="form-group">
                    <label for="rolle">Rolle:</label>
                    <select id="rolle" name="rolle">
                        <option value="standard">Standard</option>
                        <option value="administrator">Medlem </option>
                    </select>
                </div>
                <button type="submit">Registrer deg</button>
            </form>
        </section>
        <?php
        include 'database.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["brukernavn"]) && isset($_POST["epost"]) && isset($_POST["passord"]) && isset($_POST["leveringsadresse"])) {
                $brukernavn = $_POST["brukernavn"];
                $epost = $_POST["epost"];
                $passord = password_hash($_POST["passord"], PASSWORD_BCRYPT);
                $leveringsadresse = $_POST["leveringsadresse"];
                $rolle = $_POST["rolle"];
                $sql = "INSERT INTO kunde (brukernavn, epost, leveringsadresse, passord, rolle) VALUES ('$brukernavn', '$epost', '$leveringsadresse', '$passord', '$rolle')";
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
        $conn->close();
        ?>
    </div>
    <footer>
        <p>&copy; <?php echo date('Y'); ?></p>
    </footer>
</div>
</body>
</html>
