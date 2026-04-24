

<?php get_header(); ?>

<div class="d-block d-md-none">
    <?php get_template_part( 'templateParts/header-mobile' ); ?>
</div>

<div class="d-none d-md-block">
    <?php get_template_part( 'templateParts/header-desktop' ); ?>
</div>

<div class="container-fluid">
    <div class="row mx-0">
        
        <div class="col-md-4 col-xl-3">
            <?php get_template_part('templateParts/personal_info','content'); ?>
            
            <div class="d-block d-xl-none">
                <?php get_template_part('templateParts/skills','content'); ?>
            </div>
        </div>

        <div class="col-md-8 col-xl-6 mt-5">
            <?php 
                get_template_part('templateParts/education','content');
                get_template_part('templateParts/work_experience','content'); 
                get_template_part('templateParts/portfolio','content'); 
            ?>
        </div>

        <div class="d-none d-xl-block col-xl-3 mt-5">
            <?php get_template_part('templateParts/skills','content'); ?>
        </div>
        
    </div>
</div>

<?php get_footer(); ?>
<script>
jQuery(document).ready(function($) {
    var lastId;
    var topMenu = $("#menu");
    var topMenuHeight = topMenu.outerHeight();
    var menuItems = topMenu.find("a");
    var scrollItems = menuItems.map(function() {
        var item = $($(this).attr("href"));
        if (item.length) { return item; }
    });
    $(window).scroll(function() {
        var fromTop = $(this).scrollTop() + topMenuHeight;
        var cur = scrollItems.map(function() {
            if ($(this).offset().top < fromTop)
                return this;
        });
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";
        if (lastId !== id) {
            lastId = id;
            menuItems
                .removeClass("active")
                .filter("[href='#" + id + "']").addClass("active");
        }
    });
});
</script>
<?php get_footer(); ?>

