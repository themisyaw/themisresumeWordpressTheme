<div class="resumeWrap px-3">
    <div class="heroRow">
        <?php
        $photo = get_field('personal_photo');
        if ( !empty($photo) ): ?>
            <img src="<?php echo esc_url($photo['url']); ?>"
                 class="responsive-img"
                 alt="<?php echo esc_attr($photo['alt']); ?>">
        <?php endif; ?>
        <div>
            <h2 class="heroName m-0"><?php echo the_title() ?></h2>
            <div class="heroRole">WordPress / Web Developer — Amsterdam</div>
        </div>
    </div>

    <?php if (get_field('small_description')): ?>
        <p class="heroIntro"><?php echo esc_html(get_field('small_description')); ?></p>
    <?php endif; ?>

    <div class="tabRow">
        <button class="portfoliobtn active-filter">Projects</button>
        <button class="workexperiencebtn">Experience</button>
        <button class="educationBtn">Education &amp; Skills</button>
    </div>
</div>
