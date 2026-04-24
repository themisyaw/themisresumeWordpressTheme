<div class="p-0 mb-3 bg-light list-group-item d-flex justify-content-center align-items-center border-0 text-center py-2">
        <div class="col-4">
            <?php 
          $photo = get_field('personal_photo'); // Gets the Array from ACF
          
          if ( !empty($photo) ): ?>
              <img src="<?php echo esc_url($photo['url']); ?>" 
                  class="responsive-img mobile-width" 
                  alt="<?php echo esc_attr($photo['alt']); ?>">
          <?php else: ?>
              <p>No photo uploaded.</p>
          <?php endif; ?>
            
        </div>
        <div class="col-8">
            <h1 class=" my-4 border h3 border-top-0 border-left-0 border-right-0 pb-2 text-left"><?php echo the_title() ?></h1>
        </div>
        

        
    </div>

<!-- <div class="row mb-3 pl-3 mx-4 d-flex align-items-center justify-content-center text-center">
  <div class="col pl-0 mt-3 col-md-6 ">
    <h4 class="gray1 text-center">
      <?php echo the_field('small_description') ?>
    </h4> 
  </div>
</div> -->
<div class="bottomMenu d-block d-lg-none d-flex justify-content-center">
  <ul class="list-group row position-fixed flex-row justify-content-center w-100 py-2 shadow" id="menu">
    <li class="list-group-item border-0 text-center my-2">
        <a class="nav-link p-0" href="#personalinfo"><i class="fa fa-user gray2 fa-lg <?php if(is_front_page()) echo 'current-menu-item'; ?>" aria-hidden="true"></i></a>  
    </li>
    <li class="list-group-item border-0 text-center my-2 <?php if(is_post_type_archive('workexperience')) echo 'current-menu-item'; ?>">
        <a class="nav-link p-0" href="#workExperience"><i class="fa fa-briefcase gray2 fa-lg" aria-hidden="true"></i></a>  
    </li>
    <li class="list-group-item border-0 text-center my-2 <?php if(is_post_type_archive('educationandtraining')) echo 'current-menu-item'; ?>">
        <a class="nav-link p-0" href="#education"><i class="fa fa-graduation-cap fa-lg gray2" aria-hidden="true"></i></a>
    </li>
    <li class="list-group-item border-0 text-center my-2 <?php if(is_post_type_archive('portfolio')) echo 'current-menu-item'; ?>">
        <a class="nav-link p-0" href="#portfolio"><i class="fa fa-folder-open-o fa-lg" aria-hidden="true"></i></a>
    </li>
    <li class="list-group-item border-0 text-center my-2 <?php if(is_post_type_archive('skills')) echo 'current-menu-item'; ?>">
        <a class="nav-link p-0" href="#skills"><i class="fa fa-trophy gray2 fa-lg" aria-hidden="true"></i></a>
    </li>
  </ul>
</div>