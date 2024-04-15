<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Min konto - Teknotoppen</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Move your CSS from inline to here */
        /* Generelle stiler */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        p {
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Min konto</h1>
    </header>
    <div class="container">
        <p>Velkommen til din konto hos Teknotoppen.</p>
        <ul>
            <li><a href="endrepassord.php">Endre passord</a></li>
            <li><a href="slettbruker.php">Slett bruker</a></li>
            <li><a href="ordrehistorikk.php">Ordrehistorikk</a></li>
        </ul>
    </div>
</body>
</html>
