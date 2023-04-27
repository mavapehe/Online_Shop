<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meat & Seafood</title>
<link rel="stylesheet" href="styles-homepage.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/520bedc226.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" type="image/x-icon" href="png_materials/logo_shortcut.png" />
</head>

<body style="background-color:#F5F5F5;">

<?php
require_once('header.php')
?>

<?php
require_once('search-header.php')
?>

<div class="category-banner">
    <div class="banner-image">
        <img src="images/banners/meat-and-seafood.jpg">
    </div>
</div>

<?php
require_once('back-button.php')
?>

<!-- Popular products -->
<div id="message-container"></div>
<div class="popular-products">
    <h2>Meat & Seafood</h2>
    <div class="products-grid">

<?php
require 'db-connection.php';

$sql = "SELECT id, name, price, quantity, image FROM products_db WHERE id IN (2001, 2002, 2003, 2004)";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if (!empty($result)) {
    foreach($result as $row) {
?>
        <a href="product.php?id=<?php echo $row['id']; ?>" class="product-link">
            <div class="product-item">
            <img src="/<?php echo $row["image"]; ?>" alt="<?php echo $row["name"]; ?>">
                <div class="product-info">
                    <h3><?php echo $row["name"]; ?></h3>
                    <p class="product-quantity"><?php echo $row["quantity"]; ?></p>
                    <p class="product-price">$<?php echo $row["price"]; ?></p>
                </div>
                <img class="product-button" src="png_materials/icon_add.png" alt="add" data-id="<?php echo $row['id']; ?>">
            </div>
            </a>
        <?php
            }
        } else {
            echo "No products found.";
        }
        ?>

    </div>
</div>





<?php
require_once('footer.php')
?>


<!-- Add button Javascript-->

<script>
document.querySelectorAll('.product-button').forEach(button => {
  button.addEventListener('click', event => {
    event.preventDefault(); // Prevent navigating to the product page

    const productId = event.target.getAttribute('data-id');
    addToCart(productId);
  });
});

function addToCart(productId) {
    const cart = getCartFromLocalStorage();
    if (cart.hasOwnProperty(productId)) {
        if (cart[productId] < 20) {
            cart[productId] += 1;
        } else {
            alert("You can add a maximum of 20 items of the same product.");
        }
    } else {
        cart[productId] = 1;
    }
    saveCartToLocalStorage(cart);
    showMessage('Item added to your bag!');
}

function getCartFromLocalStorage() {
  const cartJSON = localStorage.getItem('cart');
  return cartJSON ? JSON.parse(cartJSON) : {};
}

function saveCartToLocalStorage(cart) {
  const cartJSON = JSON.stringify(cart);
  localStorage.setItem('cart', cartJSON);
}

function showMessage(text, timeout = 3000) {
  const messageContainer = document.getElementById('message-container');

  const messageElement = document.createElement('div');
  messageElement.innerText = text;
  messageElement.classList.add('message');

  messageContainer.appendChild(messageElement);

  setTimeout(() => {
    messageContainer.removeChild(messageElement);
  }, timeout);
}
</script>




</body>
</html>
