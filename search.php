<!DOCTYPE html>
<?php
  require_once 'functions.php';
?>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>search</title>
  <meta name="Charlie Biddiscombe" content="name">
  <meta name="description" content="description here">
  <meta name="keywords" content="keywords,here">
  <meta name="theme-color" content="#cfdfd78a">
  <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="script.js" type="text/javascript"></script>
  <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>

    <header>
          <div id="sideNav">
            <a href="javascript:void(0)" class="closebtn" onclick="hideNav()">&times;</a>
            <input type="text" id="sideNavSearchBar" placeholder="Search..">
            <a href="#"><i class="material-icons">&#xE84F;</i> Politics</a>
            <a href="#"><i class="material-icons">&#xE84E;</i> Society</a>
            <a href="#"><i class="material-icons">&#xE1E0;</i> Technology</a>
            <a href="#"><i class="material-icons">&#xE8F8;</i> Fashion</a>
            <a href="#"><i class="material-icons">&#xE8DA;</i> Entertainment</a>
            <a href="#"><i class="material-icons">&#xEB45;</i> Sport</a>
          </div>

          <svg onclick="showNav()" width="24px" height="24px" viewBox="0 0 48 48" style="padding-left:1.5rem;cursor:pointer;"><path d="M6 36h36v-4H6v4zm0-10h36v-4H6v4zm0-14v4h36v-4H6z"></path></svg>
          <a href="index.php"<p id="title-text"><strong>Halibut</strong> News & Articles</p></a>

          <input type="text" id="headerSearchBar" placeholder="Search..">


          <li>
            <ul>Politics</ul>
            <ul>Society</ul>
            <ul>Technology</ul>
            <ul>Fashion</ul>
            <ul>Entertainment</ul>
            <ul>Sport</ul>
          </li>
    </header>


    <div id="retArticleArea">
        <?php
          returnArticleSearchSQL();
        ?>
    </div>




    <div id="subscribe-area">
        <form>
          <input type="email" id="sub-email" placeholder="Email address..">
          <input type="submit" id="sub-submit">
        </form>
        <p id="sub-text">Enter your email address to subscribe to our weekly newsletter.</p>
    </div>


    <footer>

        <div id="footer-nav">
            <li>
              <ul><strong>Site Navigation</strong></ul>
              <ul>Politics</ul>
              <ul>Society</ul>
              <ul>Technology</ul>
              <ul>Fashion</ul>
              <ul>Entertainment</ul>
              <ul>Sport</ul>
            </li>

            <li>
              <ul><strong>Terms of Use</strong></ul>
              <ul>Terms of Service</ul>
              <ul>Privacy Policy</ul>
              <ul>Discussion Policy</ul>
              <ul>Ad choices</ul>
            </li>

            <li>
              <ul><strong>Get in touch</strong></ul>
              <ul>Help</ul>
              <ul>Contact information</ul>
              <ul>Advertise with us</ul>
              <ul>News syndication</ul>
            </li>

            <li>
              <ul><strong>Careers</strong></ul>
              <ul>Join Heroic Halibuts</ul>
            </li>
        </div>

    </footer>




  </body>
</html>
