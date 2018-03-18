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






?>
