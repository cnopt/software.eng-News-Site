<?php


function getMainStorySQL() {
// this function retrieves the first article in the database, and is therefore
// presented as the 'main' article.

  // connect to the database
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
                    // sort by DESC to get the most recent first
                    // limit the query to only retrieve 1

            $queryResult = $dbh->prepare($mainStorySQL);
            $queryResult->execute();

    if ($dbh->query($mainStorySQL)) {

              while ($rowObj = $queryResult->fetchObject()) {

              // set variables as rows from the table
              $eTitle = $rowObj->articleTitle;
              $eSubtitle = $rowObj->articleSub;
              $eCategory = $rowObj->articleCat;
              $eFlavourText = $rowObj->articleFlavourText;
              $eDate = $rowObj->articleDate;
              $eAuth = $rowObj->articleAuth;

              // this echo outputs all of the above variables,
              // segmented into their own divs/spans so as to be formatted individually
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
  // catch exception, echo out the exception message
} catch(PDOException $e) {
    echo $e->getMessage();
}

}




function getTopThreeStoriesSQL() {
// this function retrieves 3 articles, but only after the first article
// therefore becoming the next top 3 articles, all sorted by their submission date

  // connect to database
  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $topThreeSQL = "SELECT articleID, articleTitle, articleSub, articleCat, articleFlavourText, articleDate, articleAuth
          FROM articles
          ORDER BY articleDate DESC
          LIMIT 1,4";
          // using LIMIT to 3 articles AFTER the first article,
          // essentially working as a desired 'range'

          $queryResult = $dbh->prepare($topThreeSQL);
          $queryResult->execute();

  if ($dbh->query($topThreeSQL)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eSubtitle = $rowObj->articleSub;
            $eCategory = $rowObj->articleCat;
            $eFlavourText = $rowObj->articleFlavourText;
            $eDate = $rowObj->articleDate;
            $eAuth = $rowObj->articleAuth;

            // output is the same as the last function, however they are differently named
            // so as to be differently styled from the previous articles
            // each section has its own layout
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
// this is the same as the last function, however now it is retrieving
// four articles opposed to three, AFTER the previous three articles

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $moreTopSQL = "SELECT articleID, articleTitle, articleSub, articleCat, articleFlavourText, articleDate, articleAuth
          FROM articles
          ORDER BY articleDate DESC
          LIMIT 4,4";
          // using LIMIT as a range once again, this time getting four articles

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

            // the only significant difference here is the introduction of an image tag
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
// this is for one of the two sections of the site designed to be 'mini' sections,
// that are small and unobtrusive, and providing enough visual difference as to be noticable
// among all of the text on the site

  //connect to db
  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $moreTopSQL = "SELECT articleID, articleTitle, articleSub, articleCat, articleAuth
          FROM articles
          WHERE articleCat = 'entertainment'
          ORDER BY articleDate DESC
          LIMIT 1,3";
          // only retrieve articles with their category matching entertainment
          // limit to only 3 articles as that's how many divs will be displayed on the homepage

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
// the second mini section, this time for fashion articles

  // connect to db
  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $moreTopSQL = "SELECT articleID, articleTitle, articleSub, articleCat, articleAuth
          FROM articles
          WHERE articleCat = 'fashion'
          ORDER BY articleDate DESC
          LIMIT 0,4";
          // only get articles with their category being fashion
          // limited to only 3 articles, despite the limit being syntactically different this time
          // think it's because there's 3 articles total in 'fasion'

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
// this function retrieves the 'visual articles', that have additional fields and are in a seperate table
// so it's necessary for this to be its own function

  // connect to db
  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $getVisualArticlesSQL = "SELECT articleID, articleTitle, articleFirstImg
          FROM visual_articles
          ORDER BY articleDate DESC";
          // get data from visual_articles table this time, again sort by newest
          // retrieves the first image in the article to be used as the thumbnail image

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
           } // both the image and the article title are hyperlinks, as mobile users will likely click on the image itself
  }

  $dbh = null;
}






function retrieveArticleSQL() {
// function retrieves and outputs the full article info
// to be called on article.php

  // gets the articleID, in order to retrieve ONLY the article matching a specific ID
  $articleID = isset($_REQUEST['articleID']) ? ($_REQUEST['articleID']) : null;
  // used to dynamically set the page title to match the article's title
  $pageTitle = isset($_REQUEST['articleTitle']) ? ($_REQUEST['articleTitle']) : null;

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT *
                 FROM articles
                 WHERE articleID = $articleID";
                 // get everythinggggg
                 // where the articleID is the one the user requested (from clicking)

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
// function is the same as the last function, but instead for the visual-articles
// as they have a different layout to accomodate all of the images
// and, again, as theyre in a seperate table

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
      // get all of the images and text fields
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
// function for returning the output of a user's search query
// and output the results as clickable links

  error_reporting(0); // briefly disable error checking,
                      //as one of these variables will always be unset, as the user can't search from both
    $searchTerm = $_GET['headerSearchBar'];   // get the contents of the headerSearchBar div on previous page
    $searchTermMobile = $_GET['sideNavSearchBar'];
  error_reporting(1); // re-enable

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT articleID, articleTitle, articleDate, articleAuth
                 FROM articles
                 WHERE articleTitle LIKE '%$searchTerm%'
                 ORDER BY articleDate DESC";
                 // retrieve articles where the article title contains part of the user's query
                 // % either side means their term could be anywhere within the title

  $queryResult = $dbh->prepare($sqlQuery);
  $queryResult->execute();

  echo "<p class='searchQuery'>Articles containing: <strong>$searchTerm</strong></p>";
  // echo out what the user's search term was

  if ($dbh->query($sqlQuery)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eAuthor = $rowObj->articleAuth;
            $eDate = $rowObj->articleDate;


            echo "<div class='searchedArticle'>
                    <a href='article.php?articleID={$rowObj->articleID}'<span class='searchedArticleTitle'>$eTitle</span></a>
                    <span class='searchedArticleDate'>$eDate</span>
                    <span class='searchedArticleAuthor'>$eAuthor</span>
                  </div>
            ";
          }
      }

      $dbh = null;
}





function technologyFilterSQL() {
// this set of queries is to filter out content that isn't part of
// the respective category, i.e. this one will display all technology articles

  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT articleID, articleTitle, articleDate, articleAuth, articleCat
                 FROM articles
                 WHERE articleCat = 'technology'
                 ORDER BY articleDate DESC";
                 // limit only to the technology category
                 // order by newest

  $queryResult = $dbh->prepare($sqlQuery);
  $queryResult->execute();


  if ($dbh->query($sqlQuery)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eAuthor = $rowObj->articleAuth;
            $eDate = $rowObj->articleDate;


            echo "<div class='searchedArticle'>
                    <a href='../article.php?articleID={$rowObj->articleID}'<span class='searchedArticleTitle'>$eTitle</span></a>
                    <span class='searchedArticleDate'>$eDate</span>
                    <span class='searchedArticleAuthor'>$eAuthor</span>
                  </div>
            ";
          }
      }

  $dbh = null;
}

function entertainmentFilterSQL() {
  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT articleID, articleTitle, articleDate, articleAuth, articleCat
                 FROM articles
                 WHERE articleCat = 'entertainment'
                 ORDER BY articleDate DESC";

  $queryResult = $dbh->prepare($sqlQuery);
  $queryResult->execute();


  if ($dbh->query($sqlQuery)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eAuthor = $rowObj->articleAuth;
            $eDate = $rowObj->articleDate;


            echo "<div class='searchedArticle'>
                    <a href='../article.php?articleID={$rowObj->articleID}'<span class='searchedArticleTitle'>$eTitle</span></a>
                    <span class='searchedArticleDate'>$eDate</span>
                    <span class='searchedArticleAuthor'>$eAuthor</span>
                  </div>
            ";
          }
      }

  $dbh = null;
}

function fashionFilterSQL() {
  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT articleID, articleTitle, articleDate, articleAuth, articleCat
                 FROM articles
                 WHERE articleCat = 'fashion'
                 ORDER BY articleDate DESC";

  $queryResult = $dbh->prepare($sqlQuery);
  $queryResult->execute();


  if ($dbh->query($sqlQuery)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eAuthor = $rowObj->articleAuth;
            $eDate = $rowObj->articleDate;


            echo "<div class='searchedArticle'>
                    <a href='../article.php?articleID={$rowObj->articleID}'<span class='searchedArticleTitle'>$eTitle</span></a>
                    <span class='searchedArticleDate'>$eDate</span>
                    <span class='searchedArticleAuthor'>$eAuthor</span>
                  </div>
            ";
          }
      }

  $dbh = null;
}

function societyFilterSQL() {
  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT articleID, articleTitle, articleDate, articleAuth, articleCat
                 FROM articles
                 WHERE articleCat = 'society'
                 ORDER BY articleDate DESC";

  $queryResult = $dbh->prepare($sqlQuery);
  $queryResult->execute();


  if ($dbh->query($sqlQuery)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eAuthor = $rowObj->articleAuth;
            $eDate = $rowObj->articleDate;


            echo "<div class='searchedArticle'>
                    <a href='../article.php?articleID={$rowObj->articleID}'<span class='searchedArticleTitle'>$eTitle</span></a>
                    <span class='searchedArticleDate'>$eDate</span>
                    <span class='searchedArticleAuthor'>$eAuthor</span>
                  </div>
            ";
          }
      }

  $dbh = null;
}

function sportFilterSQL() {
  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT articleID, articleTitle, articleDate, articleAuth, articleCat
                 FROM articles
                 WHERE articleCat = 'sport'
                 ORDER BY articleDate DESC";

  $queryResult = $dbh->prepare($sqlQuery);
  $queryResult->execute();


  if ($dbh->query($sqlQuery)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eAuthor = $rowObj->articleAuth;
            $eDate = $rowObj->articleDate;


            echo "<div class='searchedArticle'>
                    <a href='../article.php?articleID={$rowObj->articleID}'<span class='searchedArticleTitle'>$eTitle</span></a>
                    <span class='searchedArticleDate'>$eDate</span>
                    <span class='searchedArticleAuthor'>$eAuthor</span>
                  </div>
            ";
          }
      }

  $dbh = null;
}

function politicsFilterSQL() {
  $hostname='localhost';
  $username='unn_w15002812';
  $password='RYNUZTYA';
  $dbh = new PDO("mysql:host=$hostname;dbname=unn_w15002812",$username,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sqlQuery =   "SELECT articleID, articleTitle, articleDate, articleAuth, articleCat
                 FROM articles
                 WHERE articleCat = 'politics'
                 ORDER BY articleDate DESC";

  $queryResult = $dbh->prepare($sqlQuery);
  $queryResult->execute();


  if ($dbh->query($sqlQuery)) {
            while ($rowObj = $queryResult->fetchObject()) {

            $eTitle = $rowObj->articleTitle;
            $eAuthor = $rowObj->articleAuth;
            $eDate = $rowObj->articleDate;


            echo "<div class='searchedArticle'>
                    <a href='../article.php?articleID={$rowObj->articleID}'<span class='searchedArticleTitle'>$eTitle</span></a>
                    <span class='searchedArticleDate'>$eDate</span>
                    <span class='searchedArticleAuthor'>$eAuthor</span>
                  </div>
            ";
          }
      }

  $dbh = null;
}






?>
