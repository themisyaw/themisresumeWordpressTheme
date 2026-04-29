<section class="mx-xs-2 skillsSection">
    <div class="">
        <h2 class="text-center py-4 border border-top-0 border-left-0 border-right-0 pb-2" id="skills">Skills</h2>
        <div class="my-5 p-4 shadow rounded">
            <?php
           
            $categories = get_terms(array(
                'taxonomy'   => 'skill_category',
                'hide_empty' => true,
            ));

            if (!empty($categories)) :
                foreach ($categories as $cat) : ?>
                    
                    <h4 class="text-muted text-center pt-4 mb-2"><?php echo $cat->name; ?></h4>
                    
                    <div class="d-flex justify-content-center flex-wrap gap-2 mb-4">
                        <?php
                        
                        $skills_query = new WP_Query(array(
                            'post_type'      => 'skills',
                            'posts_per_page' => -1,
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'skill_category',
                                    'field'    => 'slug',
                                    'terms'    => $cat->slug,
                                ),
                            ),
                        ));

                        if ($skills_query->have_posts()) :
                            while ($skills_query->have_posts()) : $skills_query->the_post(); ?>
                                <span class="font-weight-bold m-1 rounded-pill bg-light text-dark border shadow-sm px-3 py-2">
                                    <?php echo get_the_title(); ?>
                                </span>
                            <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>

                <?php endforeach;
            else : ?>
                <p class="text-center">No categorized skills found.</p>
            <?php endif; ?>

            <?php 
           
            get_template_part('templateParts/languages', 'content');
            get_template_part('templateParts/driving', 'content'); 
            ?>
        </div>
    </div>
</section>