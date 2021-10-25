<!DOCTYPE html>
<html>
  <head>
    <title>Book-O-Rama Search Results</title>
  </head>
  <body>
    <h1>Book-O-Rama Search Results</h1>
    <p>Number of books found : <?= $bookList->num_rows?></p>

    <?php
    foreach ($bookList as $fetch) {
      echo "<p><strong>Title: ".$title."</strong>";
      echo "<br />Author: ".$author;
      echo "<br />ISBN: ".$ISBN;
      echo "<br />Price: \$".number_format($price, 2)."</p>";
    }
    $bookList->free_result();
    ?>
  </body>
</html>