<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="News API" />
  <meta name="keywords" content="mths, icd2o" />
  <meta name="author" content="Emre Guzel" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-light_green.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible+Mono:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">
  <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="stylesheet" href="css/style.css">
  <title>News API</title>
</head>

<body onload>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <div class="container">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">News API</span>
        </div>
      </header>
      <br>
      <!-- Form added with submit button -->
      <form action="index.php" method="GET">
        <main class="mdl-layout__content">
          <button id="click" name="submit"
            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Check out the latest news
          </button>
          <br><br>
          <img class="Calculate" src="" name="weatherImage">
          <?php
          if (isset($_GET['submit'])) {
            try {
              // Setting API and variables 
              $url = 'https://newsdata.io/api/1/latest?apikey=pub_c0774b64c35e44e8a862750fbeda4ea8&q=technology';
              $result = file_get_contents($url);

              // Decode the result and show the first news article
              if ($result != null) {
                $data = json_decode($result, true);
                // seting the title and descriptoin of the news article 
                if (isset($data['results'][0])) {
                  $title = $data['results'][0]['title'];
                  $description = $data['results'][0]['description'] . "<br>";

                  // Show the result
                  echo "<h2 class='custom-title'>" . $title . "</h2>";
                  echo "<p class='custom-description'>" . $description . "</p>";
                }
              } else {
                echo "<p>API error.</p>";
              }
            } catch (Exception $error) {
              error_log("Error: " . $error->getMessage());
            }
          }
          ?>
          <img class="tech-news" src="images/tech.jpg" alt="tech">
        </main>
      </form>
    </div>
  </div>
</body>

</html>