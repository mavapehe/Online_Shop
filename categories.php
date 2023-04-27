<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Categories</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/520bedc226.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" type="image/x-icon" href="png_materials/logo_shortcut.png" />
<link rel="stylesheet" href="styles-categories.css">
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
        <img src="images/banners/categories.jpg">
    </div>
</div>

<?php
require_once('back-button.php')
?>

<!-- Categories -->
<div class="categories">
    <h2>Categories</h2>
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


<?php
require_once('footer.php')
?>






</body>
</html>