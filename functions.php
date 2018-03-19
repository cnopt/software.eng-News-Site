<?php


function getMainStorySQL() {

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  try {

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




function getMoreTopStoriesSQL() {

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $moreTopSQL = "SELECT articleTitle, articleSub, articleCat, articleBody, articleDate, articleAuth
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
            $eBody = $rowObj->articleBody;
            $eBody = (strlen($eBody) > 235) ? substr($eBody,0,233).'..' : $eBody; // cut off text that goes too long
            $eDate = $rowObj->articleDate;
            $eAuth = $rowObj->articleAuth;


             echo "<div class='moreTopArticle'>
                       <img src='http://via.placeholder.com/500x500' class='moreTopImg'>
                       <span class='articleCategory'>$eCategory</span>
                       <span class='moreTopArticleTitle'>$eTitle</span>
                       <span class='moreTopArticleBody'>$eBody</span>
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

  $moreTopSQL = "SELECT articleTitle, articleSub, articleCat, articleAuth
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
                       <span class='smallEntArticleTitle'>$eTitle</span>
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

  $moreTopSQL = "SELECT articleTitle, articleSub, articleCat, articleAuth
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
                       <span class='smallFashArticleTitle'>$eTitle</span>
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

  $moreTopSQL = "SELECT articleTitle
          FROM articles
          ORDER BY articleDate DESC
          LIMIT 1,4";

          $queryResult = $dbh->prepare($moreTopSQL);
          $queryResult->execute();

  if ($dbh->query($moreTopSQL)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eTitle = (strlen($eTitle) > 50) ? substr($eTitle,0,48).'..' : $eTitle; // cut off text that goes too long

             echo "<div class='visualArticle'>
                       <img src='http://via.placeholder.com/950x950' class='visualImg'>
                       <span class='visualArticleTitle'>$eTitle</span>
             </div>";
            }
  }

  $dbh = null;
}








?>
