<section class=" educationSection">
  
    <h2 class="text-center py-4 border border-top-0 border-left-0 border-right-0 pb-2" id="education">Education and Training</h2>
    <?php   
      $education = new WP_Query(array(
        'post_type' => 'educationandtraining',
      ));
      while($education->have_posts()) {
        $education->the_post();
    ?>
    <div class="px-4  my-5 rounded shadow"> 
      <div class="row px-4 d-flex justify-content-between">
        <div class="">
          <div class="row pb-3 ">
            <h4 class="mt-2 pt-3 black2 bold"><?php the_title();?></h4>
          </div>
          <div class="row pb-2">
              <h6 class="bold black2 pr-1">Institution </h6> <h6 class="d-sm-block d-none">|</h6> 
              <h6 class="gray2 mr-3 pl-sm-1"><?php the_field('institution_title'); ?></h6>
          </div>
          <div class="row">
            <h6 class="bold black2 ">Location | </h6><h6 class="gray2 pl-1"><?php the_field('location'); ?></h6> 
          </div>
        </div>
        <div class="mt-2 pt-3 pb-4">
          <div class="row ">
              <h6 class="bold black2">From |</h6>
              <h6 class="gray2 pl-1"><?php the_field('from'); ?> </h6>                  
          </div>
          <div class="row ">
              <h6 class="bold black2 ">To |</h6>
              <h6 class="gray2 pl-1"><?php the_field('to'); ?> </h6>           
          </div>
        </div>   
      </div>  
    </div>
    <?php
    }
    wp_reset_postdata();
    get_template_part('templateParts/certifications','content');
    ?>
</section>