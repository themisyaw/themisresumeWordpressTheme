<?php
    
    $certifications = new WP_Query(array(
        'post_type' => 'certifications',
      ));

      if ($certifications->have_posts()) {
        ?>
        <div class="pb-2 my-5" id="certifications">
            <h2 class="py-4 text-center border-bottom mb-4">Certifications</h2>
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
   