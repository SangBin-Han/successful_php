<?php
/* 
| 작성자 : sb
| 작성일 : 2021-11-07
| 용도 : 파일 업로드 처리
*/
class Upload {
 
  
  function __construct() {
    parent::__construct();
  }

  public function index() {
    if ($_FILES["the_file"]['error'] > 0) {
      echo "Problem: ";
      switch ($_FILES["the_file"]["error"]) {
        case 1:
          echo 'File exceeded upload_max_filesize.';
          break;
        case 2:
          echo 'File exceeded max_file_size.';
          break;
        case 3:
          echo 'FIle only partially uploaded.';
          break;
        case 4:
          echo 'No file uploaded.';
          break;
        case 6:
          echo 'Cannot upload file: No temp directory specified.';
          break;
        case 7:
          echo 'Upload failed: Cannot write to disk.';
          break;
        case 8:
          echo 'A PHP extension blocked the file upload.';
          break;
      }
      exit;
    }

    // 파일의 MIME 타입이 올바른지 확인한다.
    if ($_FILES["the_file"]["type"] != "image/png") {
      echo "Problem: file is not a PNG image.";
      exit;
    }

    // 우리가 원하는 곳으로 파일을 이동시킨다.
    $uploaded_file = './uploads/'.$_FILES["the_file"]["name"];

    if (is_uploaded_file($_FILES["the_file"]["tmp_name"])) {
      if (!move_uploaded_file($_FILES["the_file"]["tmp_name"], $uploaded_file)) {
        echo "Problem: Could not move file to destination directory.";
        exit;
      }
    } else {
      echo 'Problem: Possible file upload attack. Filename: ';
      echo $_FILES["the_file"]["name"];
      exit;
    }

    echo "File uploaded successfully.";

    // 업로드된 이미지를 보여준다.
    echo "<p>You uploaded the following image:<br />";
    echo '<img src="./uploads/'.$_FILES['the_file']['name'].'"/>';

    $this->load->view("/upload");
  }

  // 업로드된 파일이 있는 디렉터리 내역 보여주기
  public function browsedir() {
    $this->load->view("browsedir");
  }
}
?>