<section class="portfolio">
    <?php
    function show_portfolio()
    {
        $docs = new WP_Query(array(
            'post_type' => 'portfolio',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'ASC',
        ));

        if ($docs->have_posts()) :
            while ($docs->have_posts()) :
                $docs->the_post();
                $title = get_the_title();
                $featured = get_field('featured');
                $desc = get_field('desc');
                $tag = get_field('tag');
                $thumb = get_the_post_thumbnail_url();
                $links = get_field('links');
                if(!$featured):
    ?>
                <article class="contents scroll-effect">
                    <?php if ($thumb): ?>
                        <div class="thumbnail">
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>" class="ease-in-out">
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <div class="texts">
                            <h4 class="tag">
                                <?php echo $tag; ?>
                            </h4>
                            <h2 class="title">
                                <?php echo $title; ?>
                            </h2>
                            <p class="description">
                                <?php echo $desc; ?>
                            </p>
                            <div class="links">
                                <?php 
                                    foreach( $links as $list):
                                        $group = $list['channel-group'];
                                    if ($group['channel'] === 'github'): 
                                ?>
                                    <a href="<?php echo $group['url'] ?>" target="_blank" class="icon github blue"></a>
                                <?php endif;
                                if ($group['channel'] === 'behance'):?>
                                    <a href="<?php echo $group['url'] ?>" target="_blank" class="icon behance blue"></a>
                                <?php
                                endif;
                                if ($group['channel'] === 'figma'): ?>
                                    <a href="<?php echo $group['url'] ?>" target="_blank" class="icon figma blue"> </a>
                                <?php
                                endif;

                                if ($group['channel'] === 'site'): ?>
                                    <a href="<?php echo $group['link']['url'] ?>" target="_blank" rel="noopener noreferrer" class="button read-more blue">
                                        <?php echo $group['link']['title']; ?>
                                    </a>
                                <?php 
                                    endif; 
                                    endforeach;    
                                ?>
                            </div>
                        </div>
                    </div>
                </article>
    <?php 
            endif;
            endwhile;
            wp_reset_postdata();
        endif;
    }
    show_portfolio();
    ?>
</section>