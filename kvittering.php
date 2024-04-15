<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kvittering - Teknotoppen</title>
    <style>
    /* Generelle stiler for hele nettsiden */
    body {
        font-family: 'Dubai Medium', sans-serif; /* Bruker Dubai Medium eller en generisk sans-serif skrifttype */
        margin: 0; /* Nullstiller marginen for å unngå unødvendig mellomrom */
        padding: 0; /* Nullstiller padding for å unngå unødvendig polstring */
        background-color: #f2f2f2; /* Setter bakgrunnsfargen til lys grå */
        text-align: center; /* Senterjusterer tekst innenfor body-elementet */
    }

    /* Stiler for header-seksjonen øverst på siden */
    header {
        background-color: #333; /* Bakgrunnsfarge for header-seksjonen er mørk grå */
        color: #fff; /* Tekstfargen i header-seksjonen er hvit */
        padding: 10px 0; /* Polstring over og under innholdet i header-seksjonen */
    }

    /* Stiler for lenker i header-seksjonen */
    header a {
        color: #fff; /* Farge for lenkene i header er hvit */
        text-decoration: none; /* Fjerner understrekning under lenkene */
        margin: 0 15px; /* Legger til mellomrom mellom lenkene */
        font-weight: bold; /* Setter fet skrift for lenkene */
    }

    /* Stiler for kvitteringsseksjonen */
    .kvittering {
        width: 50%; /* Setter bredden til 50% av visningsvinduet */
        margin: 50px auto; /* Sentrerer kvitteringsseksjonen vertikalt og horisontalt */
        padding: 20px; /* Legger til polstring rundt innholdet i kvitteringsseksjonen */
        background-color: #fff; /* Bakgrunnsfarge for kvitteringsseksjonen er hvit */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Legger til en lett skyggeeffekt */
        border-radius: 10px; /* Legger til avrundede hjørner for kvitteringsseksjonen */
    }

    h1 {
        color: white; /* Tekstfargen for overskriftsnivå 1 (h1) er hvit */
    }

    #melding {
        font-size: 1.2em; /* Setter skriftstørrelsen for meldingen til 1.2em */
        margin-top: 20px; /* Legger til toppmargen for meldingen */
        color: #555; /* Farge for meldingen er mørk grå */
    }

    /* Stiler for "Tilbake til hjem" lenken */
    .back-to-home {
        margin-top: 30px; /* Legger til toppmargen for lenken */
    }

    .back-to-home a {
        display: inline-block; /* Viser lenken som et inline-blokk-element */
        padding: 10px 20px; /* Legger til polstring rundt teksten i lenken */
        background-color: #333; /* Bakgrunnsfarge for lenken er mørk grå */
        color: #fff; /* Tekstfargen for lenken er hvit */
        text-decoration: none; /* Fjerner understrekning under lenken */
        border-radius: 5px; /* Legger til avrundede hjørner for lenken */
    }
</style>

</head>
<body>
    <header>
        <h1>Teknotoppen</h1>
        <nav>
            <a href="index.php">Hjem</a>
            <a href="produkter.php">Produkter</a>
            <a href="login.php">Logg inn</a>
            <a href="kontakt.php">Kontakt</a>
        </nav>
    </header>

    <div class="kvittering">
        <!-- melding om bekreftelse av bestilling og knapp til bake till hjemsiden -->
        <h2>Kvittering</h2>
        <p id="melding">Takk for din bestilling! Du vil motta en bekreftelse på e-post.</p>
        <div class="back-to-home">
            <a href="index.php">Gå tilbake til startsiden</a>
        </div>
    </div>

    <?php
// Koble til databasen
session_start();
include "database.php";

// Sjekk tilkobling
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Legg til bestilling i databasen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hent data fra handlekurven (antatt at det er lagret i localStorage)
    $cartItems = json_decode($_POST['cartItems'], true);

    // Sett opp SQL-spørringen for å legge til bestilling
    $customerId = $_POST['idKunde'];
    $date = date('Y-m-d H:i:s'); // Bruk gjeldende dato og tid

    // Loop gjennom elementene i handlekurven og legg til i databasen
    foreach ($cartItems as $item) {
        $productId = $item['ProduktID'];  // Juster dette avhengig av strukturen på handlekurvobjektet
        $quantity = $item['antall'];  // Juster dette avhengig av strukturen på handlekurvobjektet

        $sql = "INSERT INTO bestilling (idBestilling, ProduktID idKunde, antall, ) VALUES ('$productId', '$customerId', '$quantity', '$date')";

        if ($conn->query($sql) !== TRUE) {
            // Feil ved lagring av bestilling
            echo "Feil ved lagring av bestilling: " . $conn->error;
            break; // Avslutt løkken hvis det oppstår en feil
        }
    }

    // Lukk tilkoblingen
    $conn->close();

    // Gi en tilbakemelding til brukeren etter vellykket bestilling
    // Dette kan inkluderes i kvitteringsmeldingen eller annen responsmekanisme du foretrekker
    // echo "Bestillingen ble lagt til vellykket!";
}
?>

</body>
</html>


