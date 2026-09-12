<div id="education">
    <h2 class="py-4 text-center border-bottom mb-4">Education</h2>
    <?php
      $education = new WP_Query(array(
        'post_type' => 'educationandtraining',
        'orderby'   => 'menu_order',
        'order'     => 'ASC',
      ));
      while($education->have_posts()) {
        $education->the_post();
    ?>
    <div class="edu-block">
      <h5 class="black2 bold m-0"><?php the_title(); ?></h5>
      <div class="gray2 smallFonts pt-1">
        <?php the_field('institution_title'); ?><?php if(get_field('location')): ?> · <?php the_field('location'); ?><?php endif; ?>
      </div>
      <div class="gray2 smallFonts">
        <?php the_field('from'); ?> – <?php the_field('to'); ?>
      </div>
    </div>
    <?php
    }
    wp_reset_postdata();
    get_template_part('templateParts/certifications','content');
    ?>
</div>
