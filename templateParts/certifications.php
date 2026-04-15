<?php
    
    $certifications = new WP_Query(array(
        'post_type' => 'certifications',
      ));

      if ($certifications->have_posts()) {
        ?>
        <div class="px-3 pb-2  my-5 rounded shadow"> 
            <h4 class="text-left py-4 bold black" id="certifications"><i class="fa fa-graduation-cap fa-lg black2" aria-hidden="true"></i>  Certifications</h4>
            <ul class="px-0">
                <?php
                while ($certifications->have_posts()) {
                    $certifications->the_post();
                    ?>
                        <li class=" list-group my-2 black2 bold">
                        <h6 class="gray2"><?php echo the_title(); ?></h6>
                        </li>
                    <?php
                }
                wp_reset_postdata();
                ?>
            </ul>
        </div>
        <?php
    } else {
        // If no posts are found
        // echo '<p>No work experiences found.</p>';
    }
   