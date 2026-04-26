<!-- <section class="mx-xs-2 mx-2 pb-4 mb-5 portfolioSection">
  <?php
    $portfolio = new WP_Query(array(
      'post_type' => 'portfolio',
      'posts_per_page' => -1,  
    ));
  ?>
  <h2 class="py-4 text-center border border-top-0 border-left-0 border-right-0" id="portfolio">Portfolio</h2>
  <ul class="timeline pl-2 mb-5">
    <?php 
    while($portfolio->have_posts()) {
      $portfolio->the_post();
      $post_id = get_the_ID(); 
      $has_thumb = has_post_thumbnail();
      ?>
      <li class="my-5 fade-in-element shadow portfolioitem show overflow-hidden border-0"> 
          <div class="row m-0 rounded collapsible-btn " id="btn-toggle-<?php echo $post_id ?>" style="cursor: pointer;">
            
            <div class="col-md-6  p-2  d-flex align-items-center p-0 position-relative portfolio-image-container">
                <?php if($has_thumb): ?>
                    <img class="img-fluid" src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title(); ?>">
                <?php else: ?>
                    <div class="h-100 w-100 d-flex align-items-center justify-content-center ">
                        <i class="fa fa-code fa-2x text-muted opacity-50"></i>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-5 p-2 d-flex flex-column justify-content-center">
                <h5 class="text-start border-secondary p-3 border-left m-0 black2 bold"><?php the_title();?></h5> 
                
            </div>

            <div class="col-md-1 p-0 align-items-center justify-content-center d-flex ">
              <i class="fa fa-chevron-down text-secondary" aria-hidden="true"></i>
            </div>
          </div>  

          <div class="row m-0 border-top collapsible-content" id="content-toggle-<?php echo $post_id ?>" style="max-height: 0; overflow: hidden; transition: all 0.4s ease;">
            <div class="col-12 p-4">
               <div class="p-2">
                  <h6 class="descriptionContent lh-base text-secondary"><?php echo get_field('description')?></h6> 
               </div>
            </div>
          </div>
      </li>
    <?php 
    }
    wp_reset_postdata();
    ?>
  </ul>
</section> -->
<section class="mx-xs-2 mx-2 pb-4 mb-5 portfolioSection">
  <h2 class="py-4 text-center border-bottom mb-4" id="portfolio">Portfolio</h2>

  <div class="row d-flex justify-content-center category-menu text-center mb-5">
      <button class="col-5 my-2 mx-2 py-1 col-md-3 col-lg-2 border-0 shadow text-center rounded  filter-btn active-filter" data-category="All">All</button>
      <?php 
      $terms = get_terms(['taxonomy' => 'portfolio_type', 'hide_empty' => true]);
      foreach($terms as $term) {
          echo '<button class="col-6 my-2 mx-2 py-1 col-md-4 col-lg-3 border-0 shadow text-center rounded filter-btn" data-category="' . $term->slug . '">' . $term->name . '</button>';
      }
      ?>
  </div>

  <ul class="timeline portfolio-timeline pl-2 mb-5"></ul>
</section>