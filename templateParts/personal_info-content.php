
<section class=" mx-xs-2 mx-4" >
    <?php
        $personalInfo = new WP_Query(array(
            'post_type'=>'personalinformation',
        ));
        if($personalInfo->have_posts()){
            $personalInfo->the_post();
        }
    ?>
    <div class="my-2 my-lg-5 p-4 shadow rounded ">
      <div class="row  pl-3 pb-3 ">
        <h4 class="bold black2">Personal Information</h4> 
      </div>
      <div class="row py-1 pl-3 ">
        <h6 class="bold black2">First name | </h6> 
        <h6 class="gray2  pl-1"><?php echo get_field('first_name')?></h6>  
      </div>
      <div class="row py-1 pl-3 ">
        <h6 class="bold black2">Last name | </h6> 
        <h6 class="gray2  pl-1"><?php echo get_field('last_name')?></h6>  
      </div>
      <div class="row py-1 pl-3 ">
        <h6 class="bold black2">Nationality | </h6> 
        <h6 class="gray2  pl-1"><?php echo get_field('nationality')?></h6>  
      </div> 
      <div class="row py-1 pl-3 ">
        <h6 class="bold black2">Birthdate | </h6> 
        <h6 class="gray2  pl-1"><?php echo get_field('birthday')?></h6>  
      </div>
      <div class="row py-1 pl-3 ">
        <h6 class="bold black2">Phone number | </h6> 
        <h6 class="gray2  pl-1"><?php echo get_field('phonenumber')?></h6>  
      </div>
      <div class="row py-1 pl-3 ">
        <h6 class="bold black2">Email | </h6> 
        <h6 class="gray2  pl-1"><?php echo get_field('email')?></h6>  
      </div>  
    </div>     
    <div class="my-5 p-4 shadow rounded">
      <div class="row pl-3 pb-3 ">
        <h4 class="bold black2">Location</h4> 
      </div>
      <div class="row py-1 pl-3 ">
        <h6 class="bold  black2">Address | </h6> 
        <h6 class="gray2  pl-1"><?php echo get_field('address');?></h6>  
      </div> 
      <div class="row py-1 pl-3 ">
        <h6 class="bold black2">Country | </h6> 
        <h6 class="gray2  pl-1"><?php echo get_field('country'); ?></h6>  
      </div> 
      <div class="row py-1 pl-3 ">
        <h6 class="bold black2">City | </h6> 
        <h6 class="gray2  pl-1"><?php echo get_field('city');?></h6>  
      </div>      
    </div>
    <div class="my-5 py-4 px-3 shadow rounded">
      <div class="row mb-3 pl-3 ">
          <h4 class="bold black2">Hobbies and interests </h4>           
      </div>
      <div class="row py-1 pl-3 ">
        <h6 class="gray2  pl-1"><?php echo get_field('hobbies')?></h6>  
      </div> 
    </div> 
</section>