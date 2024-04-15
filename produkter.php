<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produkter-Teknotoppen</title>
    <style>
/* Generelle stiler for hele nettsiden */
body {
    font-family: 'Dubai Medium', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

/* Stiler for header-seksjonen øverst på siden */
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

/* Stiler for menyen som lar brukere sortere produktene */
.sort-menu {
    margin: 20px 0;
    text-align: center;
}

/* Stiler for etiketten i menyen */
.sort-menu label {
    font-weight: bold;
    margin-right: 10px;
}

/* Stiler for rullegardinmenyen */
.sort-menu select {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    border: 2px solid #4CAF50; /* setter en grønn ramme */
    background-color: #f8f9fa; /* bakgrunnsfarge */
    color: #333; /* tekstfarge */
    cursor: pointer;
    transition: border-color 0.3s ease;
}

/* Endrer utseendet på rullegardinmenyen ved hover */
.sort-menu select:hover {
    border-color: #45a049; /* endrer ramme til en mørkere grønn ved hover */
}

/* Endrer utseendet på rullegardinmenyen ved fokus */
.sort-menu select:focus {
    outline: none;
    border-color: #007bff; /* endrer ramme til blå ved fokus */
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.25); /* gir en liten skyggeeffekt ved fokus */
}

/* Stiler for hovedcontaineren som inneholder produktene */
.container {
    width: 80%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
}

/* Stiler for hvert produkt */
.product {
    width: calc(22% - 4%);
    margin: 2%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 15px;
    display: flex;
    flex-direction: column;
    position: relative;
    transition: transform 0.3s ease;
}

/* Legger til en liten skyggeeffekt når musen svever over et produkt */
.product:hover {
    transform: translateY(-5px);
}

/* Stiler for bilder i hvert produkt */
.product img {
    width: 100%;
    height: auto;
    border-radius: 8px; /* Legger til avrundede hjørner på bildene */
    margin-bottom: 10px;
}

/* Stiler for produktinformasjonen */
.product-info {
    padding: 15px;
    flex-grow: 1; /* Gjør at produktinformasjonen tar opp tilgjengelig plass */
}

/* Stiler for overskriftsnivå 2 (h2) i produktinformasjonen */
.product-info h2 {
    margin-top: 0;
    font-size: 18px; /* Øker skriftstørrelsen for overskriften */
    margin-bottom: 10px;
}

/* Stiler for prisinformasjonen */
.product-info p:last-child {
    margin-bottom: 0;
    font-weight: bold;
    font-size: 16px; /* Øker skriftstørrelsen for prisen */
    color: #4CAF50; /* Setter prisfargen til grønn */
}

/* Stiler for knappen for å legge til i handlekurven */
.add-to-cart-btn {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 8px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
    margin-top: 10px; /* Økt mellomrom mellom tekst og knapp */
    transition: background-color 0.3s ease;
}

/* Endrer bakgrunnsfargen når musepekeren svever over knappen */
.add-to-cart-btn:hover {
    background-color: #45a049;
}

/* Stiler for handlekurvikonet */
.cart-icon {
    font-size: 24px;
}

/* Stiler for bunntekstseksjonen (footer) */
.footer {
    background-color: #343a40;
    color: #fff;
    padding: 20px;
    text-align: center;
    margin-top: 30px;
}

/* Stiler for avsnitt i bunntekstseksjonen */
.footer p {
    margin: 0;
}
h1{
    text-align center;
}
 </style>
 

</head>

<body>
    <header>
        <h1>Teknotoppen</h1>
        <nav>
            <a href="index.php">Hjem</a>
            <a href="login.php">Logg inn/Registrering</a>
            <a href="kontakt.php">Kontakt</a>
        </nav>
        <a href="handlekurv.php" class="cart-link" onclick="showCart()">
            <div class="cart-icon">&#128722;</div>
            <div class="cart-text">Handlekurv (<span id="cartCount">0</span>)</div>
        </a>
    </header>

    <!-- Legg til meny for sortering -->
    <div class="sort-menu">
        <label for="sortSelect">Sorter etter type:</label>
        <select id="sortSelect" onchange="sortProducts()">
            <option value="alle">Alle produkter</option>
            <option value="hodetelefon">Hodetelefon</option>
            <option value="laptop">Laptop</option>
            <option value="apple">Apple</option>
            <option value="gaming">Gaming</option>
            <option value="mobiler">mobil</option>
            <option value="Samsung">Samsung</option>
            <!-- Legg til flere kategorier etter behov -->
        </select>
    </div>

    <div class="container">
    <!-- Produktene til nettside med bilde og informasjon om produktet -->
    <div class="product" id="Product1" data-category="hodetelefon">
        <img src="bilder/hode.jpg" alt="JBL hodetelefon">
        <div class="product-info">
            <h2>JBL hodetelefon</h2>
            <p>Type: hodetelefon</p>
            <p>Levetid: 48 timer</p>
            <p>Pris: 300 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart(' JBL hodetelefon', 300, 'Product1')">Legg til handlekurv</button>
    </div>

    <div class="product" id="Product2" data-category="laptop">
    <img src="bilder/laptop.jpg" alt="Surface Laptop 5">
    <div class="product-info">
        <h2>Surface Laptop 5</h2>
        <p>Type: Microsoft</p>
        <p>Levetid: 12 timer</p>
        <p>Pris: 13 000 kr</p>
    </div>
    <button class="add-to-cart-btn" onclick="addToCart('Surface Laptop 5', 13000, 'Product2')">Legg til handlekurv</button>
</div>


    <div class="product" data-category="apple laptop">
        <img src="bilder/macbook.jpg" alt="Apple MacBook Pro 13">
        <div class="product-info">
            <h2>Apple MacBook Pro 13</h2>
            <p>Type: Apple</p>
            <p>Størrelse: 256 GB</p>
            <p>Pris: 19 000 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Apple MacBook Pro 13', 19000)">Legg til handlekurv</button>
    </div>
                                             
    <div class="product" data-category="apple hodetelefon">
        <img src="bilder/airpod.jpg" alt="Airpods (3gen)">
        <div class="product-info">
            <h2>Airpods (3gen)</h2>
            <p>Type: Apple</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 2000 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Airpods (3gen)', 2000)">Legg til handlekurv</button>
    </div>

    <div class="product" data-category="gaming hodetelefon">
        <img src="bilder/logitech.jpg" alt="Logitech Gaming Headsett">
        <div class="product-info">
            <h2>Logitech Gaming Headsett</h2>
            <p>Type: G433</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 1300 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Logitech Gaming Headsett', 1300)">Legg til handlekurv</button>
    </div>

    <div class="product" data-category="laptop">
        <img src="bilder/lenovo.jpg" alt="Lenovo Thinkpad E14 Gen 5">
        <div class="product-info">
            <h2>Lenovo Thinkpad E14 Gen 5</h2>
            <p>Type: E14 gen 5</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 6500 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Lenovo Thinkpad E14 Gen 5', 6500)">Legg til handlekurv</button>
    </div>

    <div class="product" data-category="mobiler Samsung">
        <img src="bilder/samsung.jpg" alt="Samsung Galaxy S22">
        <div class="product-info">
            <h2>Samsung Galaxy S22</h2>
            <p>Type: Galaxy S22</p>
            <p>Lagring: 256 GB</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 8400 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Samsung Galaxy S22', 8400)">Legg til handlekurv</button>
    </div>

    <div class="product" data-category="gaming">
        <img src="bilder/ps5.jpg" alt="Playstation 5">
        <div class="product-info">
            <h2>Playstation 5</h2>
            <p>Type: Standard edition</p>
            <p>Lagring: 256 GB</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 6800 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Playstation 5', 6800)">Legg til handlekurv</button>
    </div>
   
    <div class="product" data-category="apple mobiler">
        <img src="bilder/iphone.avif" alt="Iphone">
        <div class="product-info">
            <h2>Iphone</h2>
            <p>Type: 11 pro</p>
            <p>Lagring: 256 GB</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 7000 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Iphone 11 pro', 7000)">Legg til handlekurv</button>
    </div>

    <div class="product" data-category="gaming">
        <img src="bilder/xbox.avif" alt="Iphone">
        <div class="product-info">
            <h2>Xbox</h2>
            <p>Type: one</p>
            <p>Lagring: 256 GB</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 6000 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Xbox one', 6000)">Legg til handlekurv</button>
    </div>

    <div class="product" data-category="gaming">
        <img src="bilder/pinkps5.avif" alt="Iphone">
        <div class="product-info">
            <h2>Playstation 5 kontroller</h2>
            <p>Type: kontroller </p>
            <p>Farge: hvit</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 800 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('ps5 kontroller', 800)">Legg til handlekurv</button>
    </div>

    <div class="product" data-category="mobiler Samsung">
        <img src="bilder/s23.avif" alt="Iphone">
        <div class="product-info">
            <h2>Samsung galaxy s23</h2>
            <p>Type: Samsung </p>
            <p>Farge: svart</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 10 000 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Samsung galaxy s23', 10 000)">Legg til handlekurv</button>
    </div>

    <div class="product" data-category="gaming">
        <img src="bilder/nintendo.avif" alt="Iphone">
        <div class="product-info">
            <h2>Nintendo switch</h2>
            <p>Type: Nintendo </p>
            <p>Farge: svart</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 4000 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Nintendo switch', 4000)">Legg til handlekurv</button>
    </div>

    <div class="product" data-category="apple">
        <img src="bilder/vision.avif" alt="Iphone">
        <div class="product-info">
            <h2>Apple vision pro</h2>
            <p>Type: Apple </p>
            <p>Farge: hvit</p>
            <p>Levetid: 20 timer</p>
            <p>Pris: 50 000 kr</p>
        </div>
        <button class="add-to-cart-btn" onclick="addToCart('Apple vision pro', 50000)">Legg til handlekurv</button>
    </div>
</div>

    <!-- JavaScript-seksjon-->
    <script>
    // Initialiser en tom handlekurvliste
let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

// Legg til produkt i handlekurven ved klikk på "Legg til handlekurv"-knappen
function addToCart(productName, productPrice, productId) {
    cartItems.push({ id: productId, name: productName, price: productPrice });
    updateCart();
    showConfirmation(productName);
}

// Oppdater handlekurven og teller
function updateCart() {
    updateCartCount();
    saveCartToLocalStorage();
}

// Oppdater telleren for antall produkter i handlekurven
function updateCartCount() {
    document.getElementById('cartCount').innerText = cartItems.length;
}

// Lagre handlekurvdataene i localStorage
function saveCartToLocalStorage() {
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
}

// Vis en bekreftelsesmelding når et produkt blir lagt til i handlekurven
function showConfirmation(productName) {
    alert(`${productName} er lagt til i handlekurven!`);
}

// Sorter produkter etter valgt kategori i menyen
function sortProducts() {
    const selectElement = document.getElementById('sortSelect');
    const selectedCategory = selectElement.value;

    const products = document.querySelectorAll('.product');

    products.forEach(product => {
        const categories = product.getAttribute('data-category').split(' ');

        if (selectedCategory === 'alle' || categories.includes(selectedCategory)) {
            product.style.display = 'flex';
        } else {
            product.style.display = 'none';
        }
    });
}
</script>

    <footer class="footer">
        <div class="social-icons">
            <a href="brukerveiledning.php" target="_blank">Brukerveiledning</a>
            <a href="#" target="_blank">Twitter</a>
            <a href="#" target="_blank">Instagram</a>
        </div>
        <p>&copy; <?php echo date('Y'); ?> Teknotoppen. Alle rettigheter reservert.</p>
        <p>Kontakt: <a href="mailto:info@teknotoppen.no">info@teknotoppen.no</a></p>
    </footer>

</body>

</html>
