<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handlekurv - Teknotoppen</title>
    <style>
        /* Generelle stiler for hele nettsiden */
        body {
            font-family: 'Dubai Medium'; /* Bruker Dubai Medium-skrifttypen */
            margin: 0; /* Nullstiller marginen for å unngå unødvendig mellomrom */
            padding: 0; /* Nullstiller padding for å unngå unødvendig polstring */
            background-color: #f2f2f2; /* Setter bakgrunnsfargen til lys grå */
        }

        /* Stiler for header-seksjonen øverst på siden */
        header {
            background-color: #333; /* Bakgrunnsfarge for header-seksjonen er mørk grå */
            color: #fff; /* Tekstfargen i header-seksjonen er hvit */
            padding: 10px 0; /* Polstring over og under innholdet i header-seksjonen */
            text-align: center; /* Senterjusterer tekst i header */
        }

        /* Stiler for lenker i header-seksjonen */
        header a {
            color: #fff; /* Farge for lenkene i header er hvit */
            text-decoration: none; /* Fjerner understrekning under lenkene */
            margin: 0 15px; /* Legger til mellomrom mellom lenkene */
            font-weight: bold; /* Setter fet skrift for lenkene */
        }

        /* Stiler for hovedcontaineren som omgir innholdet */
        .container {
            width: 80%; /* Setter bredden til 80% av visningsvinduet */
            margin: auto; /* Sentrerer containeren horisontalt på siden */
            padding: 20px; /* Legger til polstring rundt innholdet i containeren */
            background-color: #fff; /* Bakgrunnsfarge for containeren er hvit */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Legger til en lett skyggeeffekt */
            margin-top: 20px; /* Legger til toppmargen for containeren */
        }

        /* Stiler for hvert element med klassen 'cart-item' */
        .cart-item {
            margin-bottom: 10px; /* Legger til bunnmargen for hvert handlekurvselement */
            border-bottom: 1px solid #ddd; /* Legger til en understrek mellom handlekurvselementene */
            padding-bottom: 10px; /* Legger til polstring under hvert handlekurvselement */
        }

        /* Stiler for elementet med id 'totalPrice' */
        #totalPrice {
            font-weight: bold; /* Setter fet skrift for totalprisen */
            margin-top: 10px; /* Legger til toppmargen for totalprisen */
        }

        /* Stiler for elementet med id 'checkoutBtn' */
        #checkoutBtn {
            display: block; /* Viser knappen som et blokk-element */
            margin-top: 20px; /* Legger til toppmargen for knappen */
            padding: 10px; /* Legger til polstring rundt teksten i knappen */
            background-color: #4CAF50; /* Bakgrunnsfarge for knappen er grønn */
            color: #fff; /* Tekstfargen for knappen er hvit */
            text-align: center; /* Senterjusterer teksten i knappen */
            text-decoration: none; /* Fjerner understrekning under teksten i knappen */
            cursor: pointer; /* Endrer musepekeren til en hånd når den svever over knappen */
        }

        /* Stiler for clear cart-knappen */
        #clearCartBtn {
            display: block; /* Viser knappen som et blokk-element */
            margin-top: 10px; /* Legger til toppmargen for knappen */
            padding: 10px; /* Legger til polstring rundt teksten i knappen */
            background-color: red; /* Bakgrunnsfarge for knappen er rød */
            color:  white; /* Tekstfargen for knappen er hvit */
            text-align: center; /* Senterjusterer teksten i knappen */
            text-decoration: none; /* Fjerner understrekning under teksten i knappen */
            cursor: pointer; /* Endrer musepekeren til en hånd når den svever over knappen */
        }
    </style>
</head>

<body>
    <header>
        <h1>Teknotoppen</h1>
        <nav>
            <a href="index.php">Hjem</a>
            <a href="register.php">Registrering</a>
            <a href="login.php">Logg inn</a>
            <a href="kontakt.php">Kontakt</a>
        </nav>
    </header>

    <div class="container">
        <!-- bestill nå knapp og handlekurv-->
        <h2>Handlekurv</h2>
        <div id="cartItems" class="cart-item"></div>
        <div id="totalPrice">Totalpris: 0 kr</div>
        
        <!-- Legg til dropdown-meny for betalingsalternativer -->
        <div id="paymentOptions">
            <label for="paymentMethod">Velg betalingsmetode:</label>
            <select id="paymentMethod">
                <option value="vipps">Vipps</option>
                <option value="kredittkort">Kredittkort</option>
                <option value="klarna">Klarna</option>
                <option value="bankkort">Visa</option>
            </select>
        </div>
        
        <button id="checkoutBtn" onclick="checkout()">Bestill nå</button>
        <button id="clearCartBtn" onclick="clearCart()">Tøm handlekurven</button>
    </div>

    <script>
        // Hent handlekurvdataene fra localStorage
        let cartItems = [];

        // Sjekk om det er lagret handlekurvdata i localStorage
        if (localStorage.getItem('cartItems')) {
            retrieveCartFromLocalStorage();
        }

        // Oppdater handlekurven og teller
        function updateCart() {
            console.log('Updating cart...');
            showCart();
            updateCartCount();
            saveCartToLocalStorage(); // Lagre handlekurven etter endringer
        }

        function showCart() {
            const cartContainer = document.getElementById('cartItems');
            const totalPriceContainer = document.getElementById('totalPrice');

            if (cartItems.length === 0) {
                cartContainer.innerHTML = '<p>Handlekurven er tom.</p>';
                totalPriceContainer.innerText = 'Totalpris: 0 kr';
            } else {
                cartContainer.innerHTML = cartItems.map((item, index) => `
                    <div class="cart-item">
                        <div>${item.name} - ${item.price}kr</div>
                        <button class="delete-btn" onclick="deleteItem(${index})">Slett</button>
                    </div>`).join('');

                // Beregn totalprisen
                const totalPrice = cartItems.reduce((acc, item) => acc + item.price, 0);
                totalPriceContainer.innerText = `Totalpris: ${totalPrice} kr`;
            }
        }

        // Slett et produkt fra handlekurven
        function deleteItem(index) {
            console.log('Deleting item at index:', index);
            cartItems.splice(index, 1);
            saveCartToLocalStorage();
            updateCart();
        }

        // Oppdater telleren for antall produkter i handlekurven
        function updateCartCount() {
            // Du må legge til en teller i HTML for dette for å oppdatere den
            // For eksempel:
            // document.getElementById('cartCount').innerText = cartItems.length;
        }

        // Lagre handlekurvdataene i localStorage
        function saveCartToLocalStorage() {
            try {
                console.log('Saving to localStorage...', cartItems);
                localStorage.setItem('cartItems', JSON.stringify(cartItems));
                console.log('Saved in localStorage:', localStorage.getItem('cartItems'));
            } catch (error) {
                console.error('Error saving to localStorage:', error);
            }
        }

        // Hent handlekurvdataene fra localStorage
        function retrieveCartFromLocalStorage() {
            try {
                const storedCartItems = localStorage.getItem('cartItems');
                if (storedCartItems) {
                    cartItems = JSON.parse(storedCartItems);
                }
                console.log('Retrieved from localStorage:', cartItems);
            } catch (error) {
                console.error('Error retrieving from localStorage:', error);
            }
        }

        // Initialiser handlekurven ved lasting av siden
        showCart();

        // Funksjon for bestilling
        function checkout() {
            // Hent den valgte betalingsmetoden fra dropdown-menyen
            const paymentMethod = document.getElementById('paymentMethod').value;

            // Hent handlekurvdataene og totalprisen
            const totalPrice = cartItems.reduce((acc, item) => acc + item.price, 0);

            // Legg til 'quantity' og 'productId' for hvert element i handlekurven
            const checkoutData = cartItems.map(item => ({
                productId: item.productId, // Bytt ut med riktig nøkkel
                quantity: 1, // Du kan justere dette basert på din implementasjon
                price: item.price
            }));

            // Legg til betalingsmetoden i bestillingsdataene
            checkoutData.push({ paymentMethod: paymentMethod });

            // Lag en HTTP-forespørsel (AJAX) for å sende bestillingsdataene til serveren
            const xhr = new XMLHttpRequest();
            const url = 'processorder.php'; // Endre dette til filen som vil håndtere bestillinger på serveren

            // Definer dataen som skal sendes til serveren
            const data = {
                cartItems: JSON.stringify(checkoutData),
                // Legg til andre nødvendige data som epost, leveringsadresse, etc.
            };

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Lytt til når forespørselen fullføres
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Bestillingen er sendt, håndter svaret fra serveren om nødvendig
                    alert('Bestillingen er sendt!');
                    // Omdirigere til kvitteringssiden
                    window.location.href = 'kvittering.php';
                    // Tilbakestill handlekurven etter bestilling
                    cartItems = [];
                    saveCartToLocalStorage();
                    updateCart();
                } else {
                    // Noe gikk galt, vis en feilmelding
                    alert('Feil ved bestilling, prøv igjen senere.');
                }
            };

            // Konverter dataen til en streng som sendes som en forespørselsparameter
            const params = Object.keys(data).map(key => `${key}=${encodeURIComponent(data[key])}`).join('&');

            // Send dataen til serveren
            xhr.send(params);
        }

        // Funksjon for å tømme handlekurven
        function clearCart() {
            // Tømmer handlekurven
            cartItems = [];
            // Lagrer den tomme handlekurven til localStorage
            saveCartToLocalStorage();
            // Oppdaterer visningen for å vise den tomme handlekurven
            updateCart();
        }
    </script>
</body>

</html>
