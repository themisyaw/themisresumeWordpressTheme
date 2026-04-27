<section class="mx-xs-2  skillsSection">
    <div class="">
        <h2 class="text-center py-4 border border-top-0 border-left-0 border-right-0 pb-2" id="skills">Skills</h2>
        <div class="my-5 p-4  shadow rounded">
            <div class="d-flex flex-wrap justify-content-center gap-2 py-4">
                <?php
                $workExperiences = new WP_Query(array(
                    'post_type' => 'skills',
                    'posts_per_page' => -1
                ));
                if ($workExperiences->have_posts()) {
                    while ($workExperiences->have_posts()) {
                        $workExperiences->the_post();
                        ?>   
                        <span class="font-weight-bold m-1 rounded-pill bg-light text-dark border shadow-sm px-3 py-2"><?php echo get_the_title(); ?></span>
                        <?php
                    }
                    wp_reset_postdata();

                    ?>
                    </div>
                    <?php
                    get_template_part('templateParts/languages','content');
                    get_template_part('templateParts/driving','content');
                    
                } else {
                    // echo '<p>No work experiences found.</p>';
                }
                    ?>
             
        </div>
    </div>
</section>
