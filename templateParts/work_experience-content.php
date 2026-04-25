<section class="mx-xs-2 mx-2 workexperienceSection d-none">
  <?php
    $args = array(
        'post_type'      => 'workexperience',  
        'posts_per_page' => -1,  
        'meta_key'       => 'from',            
        'orderby'        => 'meta_value',      
        'order'          => 'ASC',             
    );
    $workExperiences = new WP_Query($args);
  ?>
  
  <h2 class="py-4 text-center border border-top-0 border-left-0 border-right-0" id="workExperience">Work Experience</h2>
  
  <div class="row my-4 mx-2 justify-content-center">
    <button class="col-5 my-2 col-md-3 col-lg-2 py-1 bg-white mx-2 border-0 text-center shadow active-filter rounded filter-btn category-item" data-category="All">All</button>
    
    <?php 
    $displayed_categories = []; 
    
    if ($workExperiences->have_posts()) :
        while ($workExperiences->have_posts()) : $workExperiences->the_post();
            $categories = get_the_category(); 
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    if (!in_array($category->term_id, $displayed_categories)) {
                        $displayed_categories[] = $category->term_id; 
                        ?>
                        <button 
                            class="col-5 my-2 mx-2 py-1 bg-white col-md-3 col-lg-2 border-0 shadow text-center rounded filter-btn category-item" 
                            data-category="<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                        </button>
                        <?php
                    }
                }
            }
        endwhile;
    else :
        echo '<p>No work experiences found.</p>';
    endif;
    wp_reset_postdata();
    ?>
  </div>

  <ul class="timeline pl-4 mb-5"> 
      </ul>
</section>