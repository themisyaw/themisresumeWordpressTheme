<section class="mx-xs-2 mx-2 portfolioSection">
  <?php
    $portfolio = new WP_Query(array(
      'post_type' => 'portfolio',
      'posts_per_page' => -1,  
    ));
  ?>
  <h2 class=" py-4 text-center border border-top-0 border-left-0 border-right-0" id="portfolio">Portfolio</h2>
  <ul class="timeline pl-2 mb-5">
    <?php 
    while($portfolio->have_posts()) {
      $portfolio->the_post();
      $post_id = get_the_ID(); 
      ?>
      <li class=" my-5 fade-in-element shadow portfolioitem show"> 
          <div class="row p-4 m-0 rounded collapsible-btn" id="btn-toggle-<?php echo $post_id ?>">
            <div class="col-10 p-0 justify-content-between">
              <h4 class="text-start m-0 black2 bold"><?php the_title();?></h4>   
            </div>
            <div class="col-2 p-0 align-items-center justify-content-end d-flex">
              <i class="float-right fa fa-arrow-down " type="button"  aria-hidden="true"></i>
            </div>
          </div>  
          <div class="row px-4 m-0">
            <div class="row collapsible-content bg-white" id="content-toggle-<?php echo $post_id ?>">
              <div class="col">
                <h6 class="descriptionContent"><?php echo get_field('description')?></h6> 
              </div>
            </div> 
          </div>
      </li>
        <?php 
      }
      wp_reset_postdata();
          ?>
    </ul>
</section>
