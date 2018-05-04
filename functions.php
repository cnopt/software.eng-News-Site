<?php


function getMainStorySQL() {

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  try {

    $mainStorySQL= "SELECT articleID, articleTitle, articleSub, articleCat, articleFlavourText, articleDate, articleAuth
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
              $eFlavourText = $rowObj->articleFlavourText;
              $eDate = $rowObj->articleDate;
              $eAuth = $rowObj->articleAuth;

               echo "<div class='mainArticle'>
                       <div id='main-article-left'>
                         <span class='articleCategory'>$eCategory</span>
                         <a href='article.php?articleID={$rowObj->articleID}'<span class='mainArticleTitle'>$eTitle</span></a>
                         <span class='mainArticleSubtitle'>$eSubtitle</span>
                       </div>
                       <div id='main-article-right'>
                         <span class='mainarticleFlavourText'>$eFlavourText</span>
                         <span class='mainArticleDate'>$eDate</span>
                         <span class='mainArticleAuthor'>$eAuth</span>
                       </div>
               </div>";
              }
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

}




function getTopThreeStoriesSQL() {

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $topThreeSQL = "SELECT articleID, articleTitle, articleSub, articleCat, articleFlavourText, articleDate, articleAuth
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
            $eFlavourText = $rowObj->articleFlavourText;
            $eDate = $rowObj->articleDate;
            $eAuth = $rowObj->articleAuth;


             echo "<div class='topThreeArticle'>
                       <span class='articleCategory'>$eCategory</span>
                       <a href='article.php?articleID={$rowObj->articleID}'<span class='topThreeArticleTitle'>$eTitle</span></a>
                       <span class='topThreeArticleSubtitle'>$eSubtitle</span>
                       <span class='topThreearticleFlavourText'>$eFlavourText</span>
                       <span class='topThreeArticleDate'>$eDate</span>
                       <span class='topThreeArticleAuthor'>$eAuth</span>
             </div>";
            }
  }

  $dbh = null;
}




function getMoreTopStoriesSQL() {

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $moreTopSQL = "SELECT articleID, articleTitle, articleSub, articleCat, articleFlavourText, articleDate, articleAuth
          FROM articles
          ORDER BY articleDate DESC
          LIMIT 1,4";

          $queryResult = $dbh->prepare($moreTopSQL);
          $queryResult->execute();

  if ($dbh->query($moreTopSQL)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eSubtitle = $rowObj->articleSub;
            $eCategory = $rowObj->articleCat;
            $eFlavourText = $rowObj->articleFlavourText;
            $eFlavourText = (strlen($eFlavourText) > 235) ? substr($eFlavourText,0,233).'..' : $eFlavourText; // cut off text that goes too long
            $eDate = $rowObj->articleDate;
            $eAuth = $rowObj->articleAuth;


             echo "<div class='moreTopArticle'>
                       <img src='http://via.placeholder.com/500x500' class='moreTopImg'>
                       <span class='articleCategory'>$eCategory</span>
                       <a href='article.php?articleID={$rowObj->articleID}'<span class='moreTopArticleTitle'>$eTitle</span></a>
                       <span class='moreToparticleFlavourText'>$eFlavourText</span>
                       <span class='moreTopArticleDate'>$eDate</span>
                       <span class='moreTopArticleAuthor'>$eAuth</span>
             </div>";
            }
  }

  $dbh = null;
}




function getSmallEntStoriesSQL() {

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $moreTopSQL = "SELECT articleID, articleTitle, articleSub, articleCat, articleAuth
          FROM articles
          ORDER BY articleDate DESC
          LIMIT 1,3";

          $queryResult = $dbh->prepare($moreTopSQL);
          $queryResult->execute();

  if ($dbh->query($moreTopSQL)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eTitle = (strlen($eTitle) > 50) ? substr($eTitle,0,48).'..' : $eTitle; // cut off text that goes too long
            $eSubtitle = $rowObj->articleSub;
            $eAuth = $rowObj->articleAuth;


             echo "<div class='smallEntArticle'>
                       <a href='article.php?articleID={$rowObj->articleID}'<span class='smallEntArticleTitle'>$eTitle</span></a>
                       <span class='smallEntArticleSubtitle'>$eSubtitle</span>
                       <span class='smallEntArticleAuthor'>$eAuth</span>
             </div>";
            }
  }

  $dbh = null;
}




function getSmallFashStoriesSQL() {

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $moreTopSQL = "SELECT articleID, articleTitle, articleSub, articleCat, articleAuth
          FROM articles
          ORDER BY articleDate DESC
          LIMIT 1,3";

          $queryResult = $dbh->prepare($moreTopSQL);
          $queryResult->execute();

  if ($dbh->query($moreTopSQL)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eTitle = (strlen($eTitle) > 50) ? substr($eTitle,0,48).'..' : $eTitle; // cut off text that goes too long
            $eSubtitle = $rowObj->articleSub;
            $eAuth = $rowObj->articleAuth;


             echo "<div class='smallFashArticle'>
                       <a href='article.php?articleID={$rowObj->articleID}'<span class='smallFashArticleTitle'>$eTitle</span></a>
                       <span class='smallFashArticleSubtitle'>$eSubtitle</span>
                       <span class='smallFashArticleAuthor'>$eAuth</span>
             </div>";
            }
  }

  $dbh = null;
}




function getVisualArticlesSQL() {

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $getVisualArticlesSQL = "SELECT articleID, articleTitle, articleFirstImg
          FROM visual_articles
          ORDER BY articleDate DESC";

          $queryResult = $dbh->prepare($getVisualArticlesSQL);
          $queryResult->execute();

  if ($dbh->query($getVisualArticlesSQL)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eTitle = (strlen($eTitle) > 50) ? substr($eTitle,0,48).'..' : $eTitle; // cut off text that goes too long
            $eImg = $rowObj->articleFirstImg;

             echo "<div class='visualArticle'>
                       <a href='visualArticle.php?articleID={$rowObj->articleID}'><img src='$eImg' class='visualImg'></a>
                       <a href='visualArticle.php?articleID={$rowObj->articleID}'<span class='visualArticleTitle'>$eTitle</span></a>
             </div>";
            }
  }

  $dbh = null;
}




function retrieveArticleSQL() {
  $articleID = isset($_REQUEST['articleID']) ? ($_REQUEST['articleID']) : null;
  $pageTitle = isset($_REQUEST['articleTitle']) ? ($_REQUEST['articleTitle']) : null;

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT *
                 FROM articles
                 WHERE articleID = $articleID";

  $queryResult = $dbh->prepare($sqlQuery);
  $queryResult->execute();

  while ($rowObj = $queryResult->fetch(PDO::FETCH_OBJ)) {
      $eID = $rowObj->articleID;
      $eTitle = $rowObj->articleTitle;
      $eSubtitle = $rowObj->articleSub;
      $eCat = $rowObj->articleCat;
      $eDate = $rowObj->articleDate;
      $eAuthor = $rowObj->articleAuth;
      $eFlavourText = $rowObj->articleFlavourText;
      $eFullText = $rowObj->articleFullText;
  }

  echo "<span class='articleCategory'>$eCat</span>
        <span class='retArticleTitle'>$eTitle</span>
        <span class='retArticleAuthor' style='margin-left:0;margin-right:1rem'>$eAuthor</span>
        <span class='retArticleDate'>$eDate</span>
        <span class='retarticleFlavourText'>$eFlavourText</span>
        <span class='retarticleFullText'>$eFullText</span>
  ";
}




function retrieveVisualArticleSQL() {
  $articleID = isset($_REQUEST['articleID']) ? ($_REQUEST['articleID']) : null;
  $pageTitle = isset($_REQUEST['articleTitle']) ? ($_REQUEST['articleTitle']) : null;

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT *
                 FROM visual_articles
                 WHERE articleID = $articleID";

  $queryResult = $dbh->prepare($sqlQuery);
  $queryResult->execute();

  while ($rowObj = $queryResult->fetch(PDO::FETCH_OBJ)) {
      $eID = $rowObj->articleID;
      $eTitle = $rowObj->articleTitle;
      $eCat = $rowObj->articleCat;
      $eDate = $rowObj->articleDate;
      $eAuthor = $rowObj->articleAuth;

      $eFirstImg = $rowObj->articleFirstImg;
      $eFirstText = $rowObj->articleFirstText;
      $eSecondImg = $rowObj->articleSecondImg;
      $eSecondText = $rowObj->articleSecondText;
      $eThirdImg = $rowObj->articleThirdImg;
      $eThirdText = $rowObj->articleThirdText;
  }

  echo "<span class='articleCategory'>$eCat</span>
        <span class='retArticleTitle'>$eTitle</span>
        <span class='mainArticleAuthor' style='margin-left:0;margin-right:1rem'>$eAuthor</span>
        <span class='mainArticleDate'>$eDate</span>

        <img class='retVisualArticleImg' src='$eFirstImg' style='margin-top:6rem'/>
        <p class='retVisualArticleText'>$eFirstText</p>

        <img class='retVisualArticleImg' src='$eSecondImg'/>
        <p class='retVisualArticleText'>$eSecondText</p>

        <img class='retVisualArticleImg' src='$eThirdImg'/>
        <p class='retVisualArticleText'>$eThirdText</p>
  ";
}





function returnArticleSearchSQL() {
  $searchTerm = $_GET['headerSearchBar'];

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT articleID, articleTitle, articleDate, articleAuth
                 FROM articles
                 WHERE articleTitle LIKE '%$searchTerm%'";

  $queryResult = $dbh->prepare($sqlQuery);
  $queryResult->execute();

  while ($rowObj = $queryResult->fetch(PDO::FETCH_OBJ)) {
      $eTitle = $rowObj->articleTitle;
      $eDate = $rowObj->articleDate;
      $eAuthor = $rowObj->articleAuth;
  }

  echo "<p class='searchQuery'>Articles containing: <strong>$searchTerm</strong></p>";

  echo "<div class='searchedArticle'>
          <span class='searchedArticleTitle'>$eTitle</span>
          <span class='searchedArticleDate'>$eDate</span>
          <span class='searchedArticleAuthor'>$eAuthor</span>
        </div>
  ";
}











?>
