<?php get_header(); ?>
<div id="" class="">
    <div id="" class="">

        <div class="bg-green-300">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="">
                        <h1><?php the_title(); ?></h1>
                        <h4>Posted on <?php the_time('F jS, Y') ?></h4>
                        <p><?php the_content(__('(more...)')); ?></p>
                    </div>
                <?php endwhile;
            else : ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>