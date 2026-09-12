
<section class="resumeWrap px-3 py-5" id="contact">
    <h2 class="py-4 text-center border-bottom mb-4">Contact</h2>
    <?php
        $personalInfo = new WP_Query(array(
            'post_type'=>'personalinformation',
        ));
        if($personalInfo->have_posts()){
            $personalInfo->the_post();
    ?>
    <div class="contactList">
        <a href="mailto:<?php echo esc_attr(get_field('email')); ?>"><?php echo get_field('email'); ?></a>
        <a href="https://github.com/themisyaw">github.com/themisyaw</a>
    </div>
    <?php
        }
    ?>
</section>
