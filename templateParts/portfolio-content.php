
<section class="mx-xs-2 mx-2 pb-4 mb-5 portfolioSection">
  <h2 class="py-4 text-center border-bottom mb-4" id="portfolio">Portfolio</h2>

  <div class="row d-flex justify-content-center category-menu text-center mb-5">
      <button class="col-5 my-2 bg-white mx-2 py-1 col-md-3 col-lg-2 border-0 shadow text-center rounded  filter-btn active-filter" data-category="All">All</button>
      <?php 
      $terms = get_terms(['taxonomy' => 'portfolio_type', 'hide_empty' => true]);
      foreach($terms as $term) {
          echo '<button class="col-6 bg-white my-2 mx-2 py-1 col-md-4 col-lg-3 border-0 shadow text-center rounded filter-btn" data-category="' . $term->slug . '">' . $term->name . '</button>';
      }
      ?>
  </div>

  <ul class="timeline portfolio-timeline pl-2 mb-5"></ul>
</section>