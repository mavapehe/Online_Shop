<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fresh Bounty</title>
<link rel="stylesheet" href="styles-search-header.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/520bedc226.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="search-container">
<div class="search-header2">
    <div class="search-box2">
        <div class="row2">
        <input type="text" id="input-box2" placeholder="Find your daily groceries" autocomplete="off">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div class="result-box2">
        <div class="search-results2" id="search-results2"></div>
        </div>
    </div>
</div>
</div>

<!-- Searchbar Javascript-->
<script>
    document.addEventListener("DOMContentLoaded", function () {
      var searchInput = document.getElementById("input-box2");
      if (searchInput) {
        searchInput.addEventListener("input", function (e) {
          var query = searchInput.value;
          if (query.length >= 2) {
            search(query);
          } else {
            clearSearchResults();
          }
        });
      }});

    function search(query) {
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var results = JSON.parse(xhr.responseText);
          displayResults(results);
        }
      };

      xhr.open("GET", "search.php?query=" + encodeURIComponent(query), true);
      xhr.send();}

    function displayResults(results) {
      var searchResults = document.getElementById("search-results2");
      searchResults.innerHTML = "";

      if (results.length > 0) {
        searchResults.style.display = "block";
      } else {
        searchResults.style.display = "none";
      }

      results.forEach(function (result) {
        var link = document.createElement("a");
        link.href = "product.php?id=" + result.id;
        link.textContent = result.name;

        var listItem = document.createElement("div");
        listItem.appendChild(link);

        searchResults.appendChild(listItem);
      });}

    function clearSearchResults() {
      var searchResults = document.getElementById("search-results2");
      searchResults.innerHTML = "";
      searchResults.style.display = "none";}
    </script>




</body>
</html>