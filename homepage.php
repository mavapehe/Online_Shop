<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fresh Bounty</title>
<link rel="stylesheet" href="styles-homepage.css">
</head>

<body>

<!-- Top Categories -->
<div class="top-categories">
    <h2>Top categories</h2>
    <div class="categories-container">
      <a href="fruits-and-vegetables.php" class="category-item">
        <img src="images/homepage_top_categories/1.png" alt="Fruits & Vegetables">
        <span>Fruits & Vegetables</span>
      </a>
      <a href="meat-and-seafood.php" class="category-item">
        <img src="images/homepage_top_categories/2.png" alt="Meat & Seafood">
        <span>Meat & Seafood</span>
      </a>
      <a href="dairy-and-eggs.php" class="category-item">
        <img src="images/homepage_top_categories/3.png" alt="Dairy & Eggs">
        <span>Dairy & Eggs</span>
      </a>
      <a href="bakery-and-bread.php" class="category-item">
        <img src="images/homepage_top_categories/4.png" alt="Bakery & Bread">
        <span>Bakery & Bread</span>
      </a>
      <a href="snacks.php" class="category-item">
        <img src="images/homepage_top_categories/5.png" alt="Snacks">
        <span>Snacks</span>
      </a>
      <a href="personal-care.php" class="category-item">
        <img src="images/homepage_top_categories/6.png" alt="Personal Care">
        <span>Personal Care</span>
      </a>
      <a href="pet-supplies.php" class="category-item">
        <img src="images/homepage_top_categories/7.png" alt="Pet Supplies">
        <span>Pet Supplies</span>
      </a>
      <a href="baby-and-kids.php" class="category-item">
        <img src="images/homepage_top_categories/8.png" alt="Baby & Kids">
        <span>Baby & Kids</span>
      </a>
    </div>
  </div>

<!-- Popular products -->
<div id="message-container"></div>
<div class="popular-products">
    <h2>Popular products</h2>
    <div class="products-grid">

        <?php
        require 'db-connection.php';

        $sql = "SELECT id, name, price, quantity, image FROM products_db WHERE id IN (1001, 2001, 3001, 4001, 5001, 6001, 7001, 8001, 1002, 2002, 3002, 4002, 5002, 6002, 7002)";

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


    </div>
</div>

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
