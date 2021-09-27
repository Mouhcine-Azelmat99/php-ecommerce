<?php
    $admin=new AdminController();
    $admin=$admin->getAdminByname();
 

?>
<div class="col py-3">
  <div class="content py-3">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-8 col-lg-6">
            <!-- Section Heading-->
            <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
              <div class="line"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Single Advisor-->
          <div class="col-lg-3"></div>
          <div class="col-12 col-sm-6 col-lg-6">
            <div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
              <!-- Team Thumb-->
              <div class="advisor_thumb">
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
              </div>
              <!-- Team Details-->
              <div class="infos">
                <h1><?php echo $admin->username ;?></h1>
                <h3 class="designation"><?php echo $admin->email ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>