<?php
$locale="en_US";
putenv("LC_ALL=".$Locale);
setlocale(LC_ALL.$Locale);

$domain = "messages";
bindtextdomain($domain, "./locale");
textdomain($domain);
?>
<!DOCTYPE html>
<html>
  <title><?php echo gettext("WELCOME_TEXT"); ?></title>
  <body>
    <h1><?php echo gettext("WELCOME TEXT"); ?></h1>
    <h2><?php echo gettext("CHOOSE_LANGUAGE"); ?></h2>
    <ul>
      <li><a href="<?php echo $_SESSION["PHP_SELF"]."?lang=en_US";?>">en_US</a></li>
      <li><a href="<?php echo $_SESSION["PHP_SELF"]."?lang=ko_KR";?>">ko_KR</a></li>
      <li><a href="<?php echo $_SESSION["PHP_SELF"]."?lang=ja_JP";?>">ja_JP</a></li>
    </ul>
  </body>
</html>