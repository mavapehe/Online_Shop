<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fresh Bounty</title>
<link rel="stylesheet" href="styles-f-h-hpbanner.css">
</head>

<body>


<footer>
    <div class="footer-left">

      <div class="footer-links">
        <div class="footer-column">
          <h3>Customer Service</h3>
          <a href="help-and-support.php">Help & Support</a>
          <a href="contact-us.php">Contact Us</a>
          <a href="return-policy.php">Return Policy</a>
        </div>
        <div class="footer-column">
          <h3>Shop Online</h3>
          <a href="delivery.php">Delivery</a>
          <a href="pick-up.php">Pick Up</a>
        </div>
        <div class="footer-column">
          <h3>About Fresh Bounty</h3>
          <a href="our-brand.php">Our Brand</a>
          <a href="careers.php">Careers</a>
          <a href="suppliers.php">Suppliers</a>
        </div>
      </div>

      <div class="footer-social">
        <h3>Connect with us!</h3>
        <a href="#" class="social-btn" id="facebook"><img src="png_materials/icon_facebook.png" alt="Facebook"></a>
        <a href="#" class="social-btn" id="instagram"><img src="png_materials/icon_instagram.png" alt="Instagram"></a>
        <a href="#" class="social-btn" id="twitter"><img src="png_materials/icon_twitter.png" alt="Twitter"></a>
      </div>

    </div>

<!--Newsletter and logo-->

  <div class="footer-right">
    <div class="rectangle"></div>
    <div class="newsletter-title">Join Our Newsletter!</div>
    <div class="newsletter-subtitle">Unlock Exclusive Offers & Tasty Tips</div>

    <div class="newsletter-search-container">
     <div class="message-icon"></div>
     <input type="text" placeholder="Your Email">
     <button onclick="submitNewsletter()">Subscribe</button>
    </div>
    <svg width="12" height="19" class="triangle">
    <polygon points="0,19 12,19 12,0" fill="#1B652A" />
    </svg>
    <div class="footer-logo">
        <a href="index.php"><img src="png_materials/logo_color_neg.png" alt="Logo"></a>
      </div>
  </div>

</footer>

<!--Javascript-->
  <script>
    function submitNewsletter() {
      alert("Thank you for subscribing to our Newsletter!");
    }
  </script>

  </body>
</html>