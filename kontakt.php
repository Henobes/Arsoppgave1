<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt oss - Din Nettbutikk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            background-color: #f2f2f2;
            color: #333;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

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

        .container {
            width: 80%;
            margin: auto;
        }

        .contact-form {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 16px;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .submit-btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

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

        .faq {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        .faq h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .question {
            margin-bottom: 15px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .question p {
            margin-bottom: 5px;
        }

        .answer {
            display: none;
            padding-left: 20px;
        }

        .answer.open {
            display: block;
        }

        .toggle i {
            font-size: 18px;
            transition: transform 0.3s ease;
        }

        /* Rotasjon for pilikonet når svaret er åpent */
        .toggle.open i {
            transform: rotate(180deg);
        }

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
    </style>
</head>

<body>
    <header>
        <h1>Teknotoppen</h1>
        <nav>
            <a href="index.php">Hjem</a>
            <a href="login.php">Logg inn/Registrering</a>
            <a href="produkter.php">Produkter</a>
        
        </nav>
        <a href="handlekurv.php" class="cart-link" onclick="showCart()">
            <div class="cart-icon">&#128722;</div>
            <div class="cart-text">Handlekurv (<span id="cartCount">0</span>)</div>
        </a>
    </header>
     
    <div class="container">
        <div class="contact-form">
            <h2>Kontakt oss</h2>
            <form action="sendmail.php" method="post">
                <div class="form-group">
                    <label for="name">Navn:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">E-post:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="message">Melding:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="submit-btn">Send melding</button>
            </form>
        </div>

        <div class="faq">
            <h2>Ofte stilte spørsmål</h2>
            <div class="question">
                <p>Hvordan kan jeg returnere et produkt?</p>
                <div class="toggle"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="answer">
                <p>Du kan returnere et produkt innen 30 dager etter kjøpet ditt. Vennligst kontakt vår kundeservice
                    for å få mer informasjon om returprosessen.</p>
            </div>

            <div class="question">
                <p>Hvordan sporer jeg min bestilling?</p>
                <div class="toggle"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="answer">
                <p>Du kan spore din bestilling ved å logge inn på kontoen din og gå til ordrehistorikken.</p>
            </div>

            <div class="question">
                <p>Er det gratis frakt?</p>
                <div class="toggle"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="answer">
                <p>Det er gratis frakt fa bestillinger på over 1000 kr, frakten ellers er mellom 50-100 kr .</p>
            </div>

            <div class="question">
                <p>Hvilke mulige betalingsmetoder kan man bruke?</p>
                <div class="toggle"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="answer">
                <p>Man kan bruke visa, kredittkort, klarna og Vipps.</p>
            </div>

            <div class="question">
                <p>Hvordan bytter du passord på kontoen din?</p>
                <div class="toggle"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="answer">
                <p>Du kann bytte passord ved å gå til hjemsiden vår og gå på min konto for å bytte passord.</p>
            </div>

            <div class="question">
                <p> Kan jeg slette brukern min?</p>
                <div class="toggle"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="answer">
                <p>Du kan slette bruker din ved å gå til vår hejmmeside trykk på minkonto,finn slett bruker og der skriver du ditt passord og brukernavn for å slette din bruker.</p>
            </div>

            <div class="question">
                <p> Sender vi produktene våre i hele verden ?</p>
                <div class="toggle"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="answer">
                <p>Vi sender alle produktene til alle land.</p>
            </div>

            <div class="question">
                <p> Hvordan registrerer jeg som bruker hos Teknotoppen ?</p>
                <div class="toggle"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="answer">
                <p>fra hjemmesiden trykker du loggin/registrering også på registrer deg der skriver du dine opplysninger.</p>
            </div>



        </div>
    </div>

    <footer class="footer">
        <div class="social-icons">
            <a href="brukerveiledning.php" target="_blank"><i class="fas fa-book"></i> </a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <p>&copy; <?php echo date('Y'); ?> Teknotoppen. Alle rettigheter reservert.</p>
        <p>Kontakt: <a href="mailto:info@teknotoppen.no">info@teknotoppen.no</a></p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const questions = document.querySelectorAll('.question');

            questions.forEach(question => {
                question.addEventListener('click', () => {
                    console.log("Clicked");
                    const answer = question.nextElementSibling;
                    answer.classList.toggle('open');
                    const toggleIcon = question.querySelector('.toggle i');
                    toggleIcon.classList.toggle('fa-chevron-down');
                    toggleIcon.classList.toggle('fa-chevron-up');
                });
            });
        });
    </script>

</body>

</html>
