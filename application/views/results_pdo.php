<!DOCTYPE html>
<html>
  <head>
    <title>Book-O-Rama Search Results</title>
  </head>
  <body>
    <h1>Book-O-Rama Search Results</h1>

    <?php
    echo "<p>Number of books found: ".$rowCount."</p>";

    while ($result) {
      echo "<p><strong>Title: ".$result->title."</strong>";
      echo "<br />Author: ".$result->author;
      echo "<br />ISBN: ".$result->ISBN;
      echo "<br />Price: \$".number_format($result->price, 2)."</p>";
    }
    
    ?>
  </body>
</html>