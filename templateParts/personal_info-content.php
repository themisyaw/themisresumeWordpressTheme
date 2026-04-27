
<section class=" mx-xs-2 " id="personalinfo">
     <h2 class="text-center py-4 border border-top-0 border-left-0 border-right-0 pb-2">Personal Information</h2>
    <?php
        $personalInfo = new WP_Query(array(
            'post_type'=>'personalinformation',
        ));
        if($personalInfo->have_posts()){
            $personalInfo->the_post();
        }
    ?>
    <div class="my-5 my-lg-5 p-4 shadow rounded ">
      <!-- <div class="row justify-content-center  pl-3 pb-3 ">
        <h4 class="bold black2 "></h4> 
      </div> -->
      <div class="row pb-1 pt-2 pl-3 ">
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

      <div class="row justify-content-center py-3 mt-4 ">
        <h4 class="bold black2 ">Location</h4> 
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
      
      <div class="row justify-content-center py-3 mt-4 ">
          <h4 class="bold black2">Hobbies and interests </h4>           
      </div>
      <div class="row py-1 pl-3 ">
        <h6 class="gray2  pl-1"><?php echo get_field('hobbies')?></h6>  
      </div> 
      
    </div>     
    
</section>
<script>
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        document.documentElement.setAttribute('data-theme', savedTheme);
    } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.documentElement.setAttribute('data-theme', 'dark');
    }
</script>