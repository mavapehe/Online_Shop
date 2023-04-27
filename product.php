<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fresh Bounty</title>
<link rel="stylesheet" href="styles-product.css">
<link rel="shortcut icon" type="image/x-icon" href="png_materials/logo_shortcut.png" />
</head>

<body style="background-color:#F5F5F5;">

<?php
  $product_id = $_GET['id'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "products_db";


  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  $id = $_GET["id"];
  $sql = "SELECT id, name, price, quantity, description, image FROM products WHERE id = '$id'";
  
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $product = [
          "id" => $row["id"],
          "name" => $row["name"],
          "price" => $row["price"],
          "quantity" => $row["quantity"],
          "description" => $row["description"]
      ];
  } else {
      $product = null;
  }
  
  $conn->close();
?>

<!-- Header -->
<?php
require_once('header.php')
?>
<?php
require_once('search-header.php')
?>

<?php
require_once('back-button.php')
?>

<div class="product">

    <div class="above">

        <div class="image">  
            <img src="/<?php echo $row["image"]; ?>" alt="<?php echo $row["name"]; ?>">
        </div>
        
        <div class="product-info">
            <h2><?php echo $row["name"]; ?></h2>

            <div class="quantity">
            <h3><?php echo $row["quantity"]; ?></h3>
            <p>$<?php echo $row["price"]; ?></p>
            <div id="message-container"></div>
            </div>
            <img class="product-button" src="png_materials/icon_add.png" alt="add" data-id="<?php echo $row['id']; ?>">
  
        </div>

    </div>

    <div class="below">
            <p class="description"><?php echo $row["description"]; ?></p>
    </div>

</div>


<!-- Footer -->
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