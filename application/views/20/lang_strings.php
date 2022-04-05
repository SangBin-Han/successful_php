<?php
function defineStrings() {
  switch ($_SESSION["lang"]) {
    case "en":
      define("WELCOME_TXT", "Welcome!");
      define("CHOOSE_TXT", "Choose Language");
    break;
    case "ko":
      define("WELCOME_TXT", "어서오세요!");
      define("CHOOSE_TXT", "언어 선택");
    break;
    case "ja":
      define("WELCOME_TXT", "어서오세요!(일본어)");
      define("CHOOSE_TXT", "언어 선택(일본어)");
    break;
    default:
      define("WELCOME_TXT", "Welcome!");
      define("CHOOSE_TXT", "Choose Language");
    break;
  }
}
?>