<?php
  /* 
  | 작성자 : sb
  | 작성일 : 2021-10-19
  | 최종 수정일 : 2021-10-23
  | 용도 : 메인 페이지
  */
  require("application/controllers/page.php");
  
  $homepage = new Page();

  $homepage->content = "<!-- page content -->
                        <section>
                        <h2>Welcome to the home of TLA Consulting.</h2>
                        <p>Please take some time to get to know us.</p>
                        <p>We specialize in serving your business needs
                        and hope to hear form you soon.</p>
                        </section>";
  $homepage->Display();
?>