<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Wather app" />
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
  <title>Weather app</title>
</head>

<body onload>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <div class="container">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Weather app</span>
        </div>
      </header>

      <h3 class="wather-title">Curently weather in Ottawa is... </h3>
      <br>
      <!-- Form added with submit button -->
      <form action="index.php" method="GET">
        <main class="mdl-layout__content">
          <button id="click" name="submit"
            class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Check the Weather
          </button>
          <br><br>
          <img class="Calculate" src="" name="weatherImage">
          <?php
          if (isset($_GET['submit'])) {
            try {
              $url = 'https://newsdata.io/api/1/latest?apikey=pub_c0774b64c35e44e8a862750fbeda4ea8&q=technology';

              // Get and decode JSON
              $response = file_get_contents($url);
              $jsonData = json_decode($response);

              // Extract temp and icon
              $temp = $jsonData->main->temp;
              $iconCode = $jsonData->weather[0]->icon;
              $iconUrl = 'https://openweathermap.org/img/wn/' . $iconCode . '@2x.png';

              // Set image URL (optional, but you were assigning it to $_GET, which is not needed)
              $weatherImage = $iconUrl;

              // Print temperature in Celsius
              echo '<img class="Calculate" src="' . $iconUrl . '" alt="weather icon">';
              echo "<b>" . "&nbsp" . "&nbsp" . "&nbsp" . round($temp - 273.15) . "°C" . "</b>";
            } catch (Exception $error) {
              error_log("Error: " . $error->getMessage());
            }
          }
          ?>
        </main>
      </form>
    </div>
  </div>
</body>

</html>