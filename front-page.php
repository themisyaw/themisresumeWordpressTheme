

<?php get_header(); ?>

<button id="theme-switch" class=" btn-sm border-0 position-fixed top-0 start-0 m-1 z-3">
    <span class="dark-icon">🌙</span>
    <span class="light-icon">☀️</span>
</button>
<div class="d-block bg-light d-md-none">
    <?php get_template_part( 'templateParts/header-mobile' ); ?>
</div>

<div class="d-none bg-light d-md-block">
    <?php get_template_part( 'templateParts/header-desktop' ); ?>
</div>

<div class="resumeWrap px-3">

    <?php get_template_part('templateParts/portfolio','content'); ?>

    <?php get_template_part('templateParts/work_experience','content'); ?>

    <div class="educationSection d-none">
        <?php
            get_template_part('templateParts/education','content');
            get_template_part('templateParts/skills','content');
        ?>
    </div>

    <?php get_template_part('templateParts/personal_info','content'); ?>

</div>

<?php get_footer(); ?>
