
<div id="languages">
  <h2 class="py-4 text-center border-bottom mb-4">Languages</h2>
  <?php
    $languages = new WP_Query(array(
        'post_type'=>'languages'
    ));
    while($languages->have_posts()) {
      $languages->the_post();
      $is_mother_tongues = get_field('mother_tongues');
      ?>
      <div class="edu-block">
        <h5 class="black2 bold m-0"><?php the_title(); ?></h5>
        <?php if ($is_mother_tongues): ?>
          <div class="gray2 smallFonts pt-1">Mother tongue</div>
        <?php else: ?>
          <div class="gray2 smallFonts pt-1">
            Listening <?php the_field('listening'); ?> ·
            Reading <?php the_field('reading'); ?> ·
            Writing <?php the_field('writing'); ?> ·
            Spoken production <?php the_field('spoken_production'); ?> ·
            Spoken interaction <?php the_field('spoken_interaction'); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php
    }
    wp_reset_postdata();
  ?>
</div>
