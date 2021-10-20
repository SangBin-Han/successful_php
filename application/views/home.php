<?php
  /* 
  | 작성자 : sb
  | 작성일 : 2021-10-19
  | 용도 : 메인 페이지
  */
  $document_root = $_SERVER['DOCUMENT_ROOT'];

  require($document_root.'/application/views/inc/header.php');
?>
  <!-- page content -->
  <section>
    <h2>Welcome to the home of TLA Consulting.</h2>
    <p>Please take some time to get to know us.</p>
    <p>We specialize in serving your business needs
      and hope to hear from you soon.</p>
  </section>
<?php
  require($document_root.'/application/views/inc/footer.php');
?>