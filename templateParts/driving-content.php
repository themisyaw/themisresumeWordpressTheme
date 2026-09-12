
<div id="drivinglisence">
  <h2 class="py-4 text-center border-bottom mb-4">Driving Licences</h2>
  <?php
    $drivinglicence = new WP_Query(array(
        'post_type' => 'drivinglicence',
      ));
      if ($drivinglicence->have_posts()) {
        $labels = array();
        while ($drivinglicence->have_posts()) {
            $drivinglicence->the_post();
            $labels[] = get_field('driving_licence');
        }
        wp_reset_postdata();
        echo '<div class="gray2 smallFonts">' . esc_html(implode(', ', $labels)) . '</div>';
    }
  ?>
</div>
