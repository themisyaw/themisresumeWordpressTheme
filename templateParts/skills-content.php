<div id="skills">
    <h2 class="py-4 text-center border-bottom mb-4">Skills</h2>
    <?php
        $categories = get_terms(array(
            'taxonomy'   => 'skill_category',
            'hide_empty' => true,
        ));

        if (!empty($categories)) :
            foreach ($categories as $cat) : ?>
                <div class="skillRow">
                    <div class="skillRow-k"><?php echo $cat->name; ?></div>
                    <div class="skillRow-v">
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

                        $titles = array();
                        if ($skills_query->have_posts()) :
                            while ($skills_query->have_posts()) : $skills_query->the_post();
                                $titles[] = get_the_title();
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        echo esc_html(implode(', ', $titles));
                        ?>
                    </div>
                </div>
            <?php endforeach;
        endif; ?>
</div>

<?php
get_template_part('templateParts/languages', 'content');
get_template_part('templateParts/driving', 'content');
?>
