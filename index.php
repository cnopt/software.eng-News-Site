<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>title</title>
  <meta name="Charlie Biddiscombe" content="name">
  <meta name="description" content="description here">
  <meta name="keywords" content="keywords,here">
  <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
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
          <a href="index.php"><p id="title-text"><strong>Halibut</strong> News & Articles</p></a>

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

  <section id="bg">
    <section id="in-the-news">
      <p id="itn-title">In the News</p>
      <p class="itn">Russia probe</p>
      <p class="itn">Flat earth</p>
      <p class="itn">Givenchy</p>
      <p class="itn">CDC Doctor</p>
      <p class="itn">Brain Space</p>
      <p class="itn">March Madness</p>
    </section>
  </section>

  <div id="main-article-area">
      <?php
        require_once 'functions.php';
        getMainStorySQL();
      ?>
  </div>



  <div id="top-three-area">
      <?php
        getTopThreeStoriesSQL();
      ?>
  </div>



  <div id="more-stories-area">
      <div id="more-stories-title">More top stories</div>
      <?php
        getMoreTopStoriesSQL();
      ?>
  </div>



  <div id="ent-cat-stories-area">
      <div id="ent-cat-stories-title">In Entertainment</div>
      <?php
        getSmallEntStoriesSQL();
      ?>
  </div>



  <div id="fash-cat-stories-area">
      <div id="fash-cat-stories-title">In Fashion</div>
      <?php
        getSmallFashStoriesSQL();
      ?>
  </div>



  <div id="visual-articles-title">Visual Articles</div>
  <div id="visual-articles-area">
      <?php
        getVisualArticlesSQL();
      ?>
  </div>



  <div id="subscribe-area">
      <input type="email" id="sub-email" placeholder="Email address..">
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
            <ul>Join us!</ul>
          </li>
      </div>

  </footer>





  </body>
</html>
