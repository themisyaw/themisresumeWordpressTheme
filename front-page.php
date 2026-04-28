

<?php get_header(); ?>

<button id="theme-switch" class=" btn-sm border-0 position-fixed top-0 start-0 m-1 z-3">
    <span class="dark-icon">🌙</span>
    <span class="light-icon">☀️3</span>
</button>
<div class="d-block bg-light d-md-none">
    <?php get_template_part( 'templateParts/header-mobile' ); ?>
</div>

<div class="d-none bg-light d-md-block">
    <?php get_template_part( 'templateParts/header-desktop' ); ?>
</div>

<div class="container-fluid  px-0">
    <div class="row mx-0">
        
        <div class="col-md-4 mt-5 col-xl-3">
            <?php get_template_part('templateParts/personal_info','content'); ?>
            
            <div class="d-block d-xl-none">
                <?php get_template_part('templateParts/skills','content'); ?>
            </div>
        </div>

        <div class="col-md-8 col-xl-6 mt-5">
            <?php 
                get_template_part('templateParts/work_experience','content');
                get_template_part('templateParts/education','content');
                 
                get_template_part('templateParts/portfolio','content'); 
            ?>
        </div>

        <div class="d-none d-xl-block col-xl-3 mt-5">
            <?php get_template_part('templateParts/skills','content'); ?>
        </div>
        

        
        
    </div>
</div>

<?php get_footer(); ?>



