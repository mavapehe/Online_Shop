<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bag</title>
    <link rel="stylesheet" href="styles-cart.css">
    <script src="cart.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="png_materials/logo_shortcut.png" />
</head>
<body style="background-color:#F5F5F5;">

<?php
require_once('header.php')
?>
<?php
require_once('search-header.php')
?>
<?php
require_once('back-button.php')
?>

<div class="cart">
    <h1>My Bag</h1>
    <div class="clear-button-container">
        <button id="clear-cart-btn">x Clear Cart</button>
    </div>
    <div id="cart-items"></div>

    <div id="cart-summary">

        <h4>Items in your bag: <span id="total-items">0</span></h4>
        <h5>Total Balance: $<span id="total-price">0</span></h5>

    </div>

    <button id="checkout-btn" disabled>Checkout</button>
</div>



<!-- Cart Javascript -->
<script>
    // The products array should be declared and fetched from the server here
    let products = [];

    document.addEventListener('DOMContentLoaded', async () => {
        products = await fetchProductDetails(Object.keys(getCartFromLocalStorage()));
        updateCartDisplay();
    });

function updateCartDisplay() {
    const cart = JSON.parse(localStorage.getItem('cart')) || {};

    const totalItems = Object.values(cart).reduce((total, quantity) => total + quantity, 0);
    const totalPrice = Object.entries(cart).reduce((total, [productId, quantity]) => {
        const product = products.find(p => p.id === productId);
        return total + (product.price * quantity);
    }, 0);

    document.getElementById('total-items').textContent = totalItems;
    document.getElementById('total-price').textContent = totalPrice.toFixed(2);

    const checkoutBtn = document.getElementById('checkout-btn');
    if (totalItems > 0) {
        checkoutBtn.disabled = false;
        checkoutBtn.style.backgroundColor = '#40AA54';
    } else {
        checkoutBtn.disabled = true;
        checkoutBtn.style.backgroundColor = '#EBEBEB';
    }

    // Update cart items display
    displayCartItems(products, cart);
}


    const checkoutBtn = document.getElementById('checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', () => {
            if (!checkoutBtn.disabled) {
                window.location.href = 'form.php';
            }
        });
    } else {
        console.error('Checkout button not found');
    }
</script>

<?php
require_once('footer.php')
?>

</body>
</html>
