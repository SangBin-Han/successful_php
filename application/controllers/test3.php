<?php
/* 
| 작성자 : sb
| 작성일 : 2021-10-23
| 용도 : 웹페이지를 쉽고 유연하게 생성하는 방법을 제공
*/
class Page {
  // Page 클래스의 속성
  public $content;
  public $title = "TLA Consulting Pty Ltd";
  public $keywords = "TLA Consulting, Three Letter Abbreviation,
                      some of my best friends are search engines";
  public $buttons = array("Home" => "home.php",
                          "Contact" => "contact.php",
                          "Services" => "services.php",
                          "Site Map" => "map.php"
                    );

  // Page 클래스의 메서드(함수)
  public function __set($name, $value) {
    $this->$name = $value;
  }

  public function Display() {
    echo "<html>\n<head>\n";
    $this->DisplayTitle();
    $this->DisplayKeywords();
    $this->DisplayStyles();
    echo "</head>\n</body>\n";
    $this->DisplayHeader();
    $this->DisplayMenu($this->buttons);
    echo $this->content;
    $this->DisplayFooter();
    echo "</body>\n</html>\n";
  }

  public function DisplayTitle() {
    echo "<title>".$this->title."</title>";
  }

  public function DisplayKeywords() {
    echo "<meta name='keywords' content='".$this->keywords."'/>";
  }

  public function DisplayStyles() {
    ?>
    <link href="style.css" type="text/css" rel="stylesheet">
    <?php
  }

  public function DisplayHeader() {
    ?>
    <!-- page Header -->
    <header>
      <img src="logo.gif" alt="TLA logo" height="70" width="70" />
      <h1>TLA Consulting</h1>
    </header>
    <?php
  }

  public function DisplayMenu($buttons) {
    echo "<!-- menu -->
    <nav>";

    foreach ($buttons as $name => $url) {
      $this->DisplayButton($name, $url, !$this->IsURLCurrentPage($url));
    } 
    echo "</nav>\n";
  }

  public function IsURLCurrentPage($url) {
    if (strpos($_SERVER['PHP_SELF'], $url) === false) {
      return false;
    } else {
      return true;
    }
  }

  public function DisplayButton($name, $url, $active=true) {
    if ($active) { ?>
        <a href="<?=$url?>">
          <img src="s-logo.gif" alt="" height="20" width="20" />
          <span class="menutext"><?=$name?></span>
        </a>
      </div>
      <?php
    } else { ?>
        <div class="menuitem">
        <img src="side-logo.gif">
        <span class="menutext"><?=$name?></span>
      </div>
      <?php
    }
  }

  public function DisplayFooter() {
    ?>
    <!-- page footer -->
    <footer>
      <p>&copy; TLA Consulting Pty Ltd.<br />
      Please see our 
      <a href="legal.php">legal information page</a>.</p>
    </footer>
    <?php
  }
}
?>