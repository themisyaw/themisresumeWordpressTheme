
<div class=" py-3 mt-4">
  <h4 class=" pb-3 bold black2" id="languages">Languages</h4>
  <?php
    $languages = new WP_Query(array(
        'post_type'=>'languages'
    ));
    while($languages->have_posts()) {
      $languages->the_post(); 
      $is_mother_tongues = get_field('mother_tongues');
      ?>       
      <div class="py-1 my-2    rounded "> 
        <h5 class="mb-2 black2 bold language_title "><?php the_title(); ?></h5>
        <?php
          if ($is_mother_tongues) {
            echo '<h6 class="gray2">Mothers tongue</h6>';            
          } else {
          ?>
            <div class="row py-1 col">
              <h6 class="bold black2">Listening |</h6><span class="ml-1 gray2"><?php the_field('listening'); ?> </span>
            </div>
            <div class="row py-1 col">
              <h6 class="bold black2">Reading |</h6><span class="ml-1 gray2"><?php the_field('reading'); ?> </span>
            </div>
            <div class="row py-1 col">
            <h6 class="bold black2">Writing |</h6><span class="ml-1 gray2"><?php the_field('writing'); ?> </span>
            </div>
            <div class="row py-1 col">
              <h6 class="bold black2">Spoken production |</h6><span class="ml-1 gray2"><?php the_field('spoken_production'); ?> </span>
            </div>
            <div class="row py-1 col">
              <h6 class="bold black2">Spoken interaction |</h6><span class="ml-1 gray2"><?php the_field('spoken_interaction'); ?> </span>
            </div>
            <?php
          }
        ?> 
      </div>
    <?php
    }
    wp_reset_postdata();

    
  ?>
</div>
