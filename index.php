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
          <p id="title-text"><strong>Halibut</strong> News & Articles</p>

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
          // should have this in seperate functions.php
          $hostname='localhost';
          $username='unn_w15002812';
          $password='RYNUZTYA';

        try {
          $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $mainStorySQL= "SELECT articleTitle, articleSub, articleCat, articleBody, articleDate, articleAuth
                          FROM articles
                          ORDER BY articleDate DESC
                          LIMIT 1";

                  $queryResult = $dbh->prepare($mainStorySQL);
                  $queryResult->execute();

          if ($dbh->query($mainStorySQL)) {

                    while ($rowObj = $queryResult->fetchObject()) {

                    $eTitle = $rowObj->articleTitle;
                    $eSubtitle = $rowObj->articleSub;
                    $eCategory = $rowObj->articleCat;
                    $eBody = $rowObj->articleBody;
                    $eDate = $rowObj->articleDate;
                    $eAuth = $rowObj->articleAuth;

                     echo "<div class='mainArticle'>
                             <div id='main-article-left'>
                               <span class='articleCategory'>$eCategory</span>
                               <span class='mainArticleTitle'>$eTitle</span>
                               <span class='mainArticleSubtitle'>$eSubtitle</span>
                             </div>
                             <div id='main-article-right'>
                               <span class='mainArticleBody'>$eBody</span>
                               <span class='mainArticleDate'>$eDate</span>
                               <span class='mainArticleAuthor'>$eAuth</span>
                             </div>
                     </div>";
                    }
          } ?>

        </div>

          <div id="top-three-area">

          <?php

          $topThreeSQL = "SELECT articleTitle, articleSub, articleCat, articleBody, articleDate, articleAuth
                  FROM articles
                  ORDER BY articleDate DESC
                  LIMIT 1,4";

                  $queryResult = $dbh->prepare($topThreeSQL);
                  $queryResult->execute();

          if ($dbh->query($topThreeSQL)) {
                    while ($rowObj = $queryResult->fetchObject()) {

                    $eTitle = $rowObj->articleTitle;
                    // $eTitle = (strlen($eTitle) > 60) ? substr($eTitle,0,58).'..' : $eTitle; // cut off titles that are extremely long
                    $eSubtitle = $rowObj->articleSub;
                    $eCategory = $rowObj->articleCat;
                    $eBody = $rowObj->articleBody;
                    $eDate = $rowObj->articleDate;
                    $eAuth = $rowObj->articleAuth;


                     echo "<div class='topThreeArticle'>
                               <span class='articleCategory'>$eCategory</span>
                               <span class='topThreeArticleTitle'>$eTitle</span>
                               <span class='topThreeArticleSubtitle'>$eSubtitle</span>
                               <span class='topThreeArticleBody'>$eBody</span>
                               <span class='topThreeArticleDate'>$eDate</span>
                               <span class='topThreeArticleAuthor'>$eAuth</span>
                     </div>";
                    }
          }

          $dbh = null;
        }

        catch(PDOException $e) {
            echo $e->getMessage();
        }
      ?>


    </div>



    <div id="more-stories-area">
        <div id="more-stories-title">More top stories</div>
    </div>





  </body>
</html>
