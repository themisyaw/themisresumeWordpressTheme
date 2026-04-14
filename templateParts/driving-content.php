
<div class="row align-items-center py-3 mt-4">
  <div class="col-12">
    <h4 class="pb-3 black1 bold black2" id="drivinglisence">Driving licenses</h4>
  </div>
  
  
<?php

$drivinglicence = new WP_Query(array(
    'post_type' => 'drivinglicence',
  ));
  if ($drivinglicence->have_posts()) {
    while ($drivinglicence->have_posts()) {
        $drivinglicence->the_post();
       ?>
       <div class="row col-12 py-1">
          <div class="col-1">
            <h6 class="black2 bold"><?php echo get_field('driving_licence'); ?> </h6>
          </div>
          <div class="col">
            <?php
              if( get_field('driving_licence') ==='A2' || get_field('driving_licence') ==='AM' || get_field('driving_licence') ==='A1' || get_field('driving_licence') ==='A' ){
                echo '<h6 class="gray2">Motorcycle </h6>';
              }
              if( get_field('driving_licence') ==='B1' || get_field('driving_licence') ==='B'){
                echo '<h6 class="gray2">Car </h6>';
              }
              if( get_field('driving_licence') ==='C1' || get_field('driving_licence') ==='C'){
                echo '<h6 class="gray2">Truck </h6>';
              }
              if( get_field('driving_licence') ==='D1' || get_field('driving_licence') ==='D'){
                echo '<h6 class="gray2">Bus </h6>';
              }
             
            ?>
          </div>
       </div>
       <?php  
    }
    
    wp_reset_postdata();
} else {
    echo '<p>No work experiences found.</p>';
}
?>

</div>
       