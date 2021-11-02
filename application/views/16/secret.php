<!DOCTYPE html>
<html>
  <head>
    <title>Secret Page</title>  
  </head>
  <body>

    <?php
      if ((!isset($_POST['name'])) || (!isset($_POST['password']))) {
        // 방문자는 이름과 비밀번호를 입력해야 한다.
    ?>
        <h1>Please Log In</h1>
        <p>This page is secret.</p>
        <form method="post" action="secret.php">
          <p><label for="name">Username:</label>
          <input type="text" name="name" id="name" size="15" /></p>

          <p><label for="password">Password:</label>
          <input type="text" name="password" id="password" size="15" /></p>

          <button type="submit" name="submit">Log In</button>
        </form>
    <?php
      } else if (($_POST["name"] == 'user') && ($_POST["password"] == "pass")) {
        // 방문자의 이름과 비밀번호가 모두 정확하다.
        echo '<h1>Here it is!</h1>
        <p>You are not authorized to use this resource.</p>';
      }
    ?>
  </body>
</html>