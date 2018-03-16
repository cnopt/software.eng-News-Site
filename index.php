<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>title</title>
  <meta name="author" content="name">
  <meta name="description" content="description here">
  <meta name="keywords" content="keywords,here">
  <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>

    <header>
          <svg width="24px" height="24px" viewBox="0 0 48 48" style="padding-left:1.5rem"><path d="M6 36h36v-4H6v4zm0-10h36v-4H6v4zm0-14v4h36v-4H6z"></path></svg>
          <p id="title-text"><strong>Idiot</strong> News & Articles</p>
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


    <div id="content-area">

      <?php
          // should have this in seperate functions.php
          $hostname='localhost';
          $username='unn_w15002812';
          $password='RYNUZTYA';

        try {
          $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = "SELECT articleTitle, articleSub, articleCat, articleBody, articleDate, articleAuth
                  FROM articles";

                  $queryResult = $dbh->prepare($sql);
                  $queryResult->execute();

          if ($dbh->query($sql)) {

                    while ($rowObj = $queryResult->fetchObject()) {

                    $eTitle = $rowObj->articleTitle;
                    // $eTitle = (strlen($eTitle) > 60) ? substr($eTitle,0,58).'..' : $eTitle; // cut off titles that are extremely long
                    $eSubtitle = $rowObj->articleSub;
                    $eCategory = $rowObj->articleCat;
                    $eBody = $rowObj->articleBody;
                    $eDate = $rowObj->articleDate;
                    $eAuth = $rowObj->articleAuth;

                     echo "<div class='article'>
                               <span class='articleCategory'>$eCategory</span>
                               <span class='articleTitle'>$eTitle</span>
                               <span class='articleSubtitle'>$eSubtitle</span>
                               <span class='articleBody'>$eBody</span>
                               <span class='articleDate'>$eDate</span>
                               <span class='articleAuthor'>$eAuth</span>
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





  </body>
</html>
