<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brukerveiledning og IT-læring</title>

    <style>
    /* Generelle stiler for hele nettsiden */
    body {
        font-family: Arial, sans-serif; /* Bruker Arial eller en generisk sans-serif skrifttype */
        margin: 0; /* Nullstiller marginen for å unngå unødvendig mellomrom */
        padding: 0; /* Nullstiller padding for å unngå unødvendig polstring */
    }

    /* Stiler for header-seksjonen øverst på siden */
    header {
        background-color: #333; /* Bakgrunnsfarge for header-seksjonen er mørk grå */
        color: #fff; /* Tekstfargen i header-seksjonen er hvit */
        padding: 10px; /* Polstring rundt innholdet i header-seksjonen */
        text-align: center; /* Senterjusterer tekst i header */
    }

    /* Stiler for navigasjonsmenyen */
    nav ul {
        list-style-type: none; /* Fjerner punkter for listeelementene i navigasjonsmenyen */
        margin: 0; /* Nullstiller marginen for å unngå unødvendig mellomrom */
        padding: 0; /* Nullstiller padding for å unngå unødvendig polstring */
    }

    /* Stiler for hvert element i navigasjonsmenyen */
    nav ul li {
        display: inline; /* Viser listeelementene horisontalt ved siden av hverandre */
        margin-right: 10px; /* Legger til mellomrom mellom listeelementene */
    }

    /* Stiler for lenker i navigasjonsmenyen */
    nav a {
        text-decoration: none; /* Fjerner understrekning under lenkene */
        color: #fff; /* Farge for lenkene er hvit */
    }

    /* Stiler for lenker når musepekeren svever over dem */
    a:hover {
        text-decoration: underline; /* Legger til understrekning under lenkene ved hover */
    }

    /* Stiler for hovedseksjonen */
    section {
        margin: 20px; /* Legger til mellomrom rundt innholdet i hovedseksjonen */
    }

    /* Stiler for iframe-elementet */
    iframe {
        width: 100%; /* Setter bredden til 100% av foreldrecontaineren */
        height: 600px; /* Setter fast høyde for iframe-elementet */
    }
</style>

</head>
<body>

<header>
    <h1>Teknotoppen</h1>
    <nav>
        <ul>
            <li><a href="index.php">Hjem</a></li>
            <li><a href="produkter.php">Produkter</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
            <li><a href="it-laering.html">IT-læring</a></li>
        </ul>
    </nav>
</header>

<section id="brukerveiledning">
    <h2>Brukerveiledning</h2>
    <!-- brukerveiledning for sluttbruker, iframe for pdf på nettsiden -->
    <iframe src="bilder/BrukerveiledningBruker.pdf" width="100%" height="600px"></iframe>
</section>

<section id="it-laering">
    <h2>IT-læring</h2>
    <!-- brukerveiledning for it læling iframe for pdf på nettsiden -->
    <iframe src="bilder/ITbrukerveiledning.pdf" width="100%" height="600px"></iframe>
</section>


</body>
</html>
