<div class="row mx-0 py-4 bg-light">
    <div class="col-3 p-0 mb-3 bg-light list-group-item d-flex justify-content-center align-items-center border-0 text-center py-2">
        <?php 
        $photo = get_field('personal_photo'); // Gets the Array from ACF
        
        if ( !empty($photo) ): ?>
            <img src="<?php echo esc_url($photo['url']); ?>" 
                 class="responsive-img  " 
                 alt="<?php echo esc_attr($photo['alt']); ?>">
        <?php else: ?>
            <p>No photo uploaded..</p>
        <?php endif; ?>
    </div>
    <div class="col">
        <h2 class="mx-4 my-4 border border-top-0 border-left-0 border-right-0 pb-2 text-start"><?php echo the_title() ?></h2>
        <!-- <h5 class="gray1 mx-4">
            <?php echo the_field('small_description') ?>
        </h5>  -->
        <div class="row mx-4 my-4">
                <button class="px-4 py-2 mr-4  bg-white border-0 text-center shadow active-filter  rounded educationBtn">Education</button>
                <button class="px-4 py-2 mx-4  bg-white border-0 text-center shadow   rounded workexperiencebtn">Work Experience</button>
                <button class=" px-4 py-2 ml-4 bg-white border-0 text-center shadow  rounded portfoliobtn">Portfolio</button>
        </div>
    </div>
</div>
<div class="bottomMenu d-block d-lg-none d-flex justify-content-center">
    <ul class="list-group row position-fixed flex-row justify-content-center w-100 py-2 shadow" id="menu">
        <li class="list-group-item border-0 text-center my-2">
            <a class="nav-link p-0" href="#personalinfo"><i class="fa fa-user gray2 fa-lg <?php if(is_front_page()) echo 'current-menu-item'; ?>" aria-hidden="true"></i></a>  
        </li>
        <li class="list-group-item border-0 text-center my-2 <?php if(is_post_type_archive('workexperience')) echo 'current-menu-item'; ?>">
            <a class="nav-link p-0" href="#workExperience"><i class="fa fa-briefcase gray2 fa-lg" aria-hidden="true"></i></a>  
        </li>
        <li class="list-group-item border-0 text-center my-2 <?php if(is_post_type_archive('educationandtraining')) echo 'current-menu-item'; ?>">
            <a class="nav-link p-0" href="#education"><i class="fa fa-university fa-lg gray2" aria-hidden="true"></i></a>
        </li>
        <li class="list-group-item border-0 text-center my-2 <?php if(is_post_type_archive('languages')) echo 'current-menu-item'; ?>">
            <a class="nav-link p-0" href="#languages"><i class="fa fa-language gray2 fa-lg" aria-hidden="true"></i></a>
        </li>
        <li class="list-group-item border-0 text-center my-2 <?php if(is_post_type_archive('skills')) echo 'current-menu-item'; ?>">
            <a class="nav-link p-0" href="#skills"><i class="fa fa-trophy gray2 fa-lg" aria-hidden="true"></i></a>
        </li>
        <li class="list-group-item border-0 text-center my-2 <?php if(is_post_type_archive('drivinglicence')) echo 'current-menu-item'; ?>">
            <a class="nav-link p-0" href="#drivinglisence"><i class="fa fa-id-card-o gray2 fa-lg" aria-hidden="true"></i></a>
        </li>
    </ul>
</div>