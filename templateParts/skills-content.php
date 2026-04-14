<section class="mx-xs-2 mx-4 mb-4 pb-5 skillsSection">
    <div class="">
        <h2 class="text-center py-4 border border-top-0 border-left-0 border-right-0 pb-2" id="skills">Skills</h2>
        <div class="my-5 p-4  shadow rounded">
            <?php
            $workExperiences = new WP_Query(array(
                'post_type' => 'skills',
                'posts_per_page' => -1
            ));
            if ($workExperiences->have_posts()) {
                while ($workExperiences->have_posts()) {
                    $workExperiences->the_post();
                    ?>
                    <div class="row align-items-center py-2">
                        <div class="col-6">
                            <h6 class="black2 bold m-0"><?php echo get_the_title(); ?></h6>
                        </div>
                        <div class="col">
                            <?php
                                $numeric_value = get_field('level'); 
                                $star_rating = convert_to_star_rating($numeric_value);
                                for ($i = 1; $i <= 6; $i++) {
                                    if ($i <= $star_rating) {
                                        echo '<span class="star full">&#9733;</span>'; 
                                    } else {
                                        echo '<span class="star empty">&#9734;</span>'; 
                                    }
                                }
                            ?>
                            <!-- <h5 class="gray2"><?php echo get_field('level') ?></h5> -->
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                get_template_part('templateParts/languages','content');
                get_template_part('templateParts/driving','content');
                
            } else {
                echo '<p>No work experiences found.</p>';
            }
                ?>
        </div>
    </div>
</section>
