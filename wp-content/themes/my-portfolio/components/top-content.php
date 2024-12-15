<section class="top-content portfolio">
    <?php
    function show_feature_portfolio()
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
                if ($featured):
    ?>
                    <article class="main-card scroll-effect">
                        <div class="contents">
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
                                        foreach ($links as $list):
                                            $group = $list['channel-group'];
                                            if ($group['channel'] === 'github'):
                                        ?>
                                                <a href="<?php echo $group['url'] ?>" target="_blank" class="icon github white"></a>
                                            <?php endif;
                                            if ($group['channel'] === 'behance'): ?>
                                                <a href="<?php echo $group['url'] ?>" target="_blank" class="icon behance white"></a>
                                            <?php
                                            endif;
                                            if ($group['channel'] === 'figma'): ?>
                                                <a href="<?php echo $group['url'] ?>" target="_blank" class="icon figma white"> </a>
                                            <?php
                                            endif;

                                            if ($group['channel'] === 'site'): ?>
                                                <a href="<?php echo $group['link']['url'] ?>" target="<?php echo $group['link']['target'] ?>" rel="noopener noreferrer" class="button read-more white">
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
    show_feature_portfolio();
    $slug = 'pagina-inicial';
    $id = get_page_id_by_slug($slug);
    ?>
    <aside class="skills scroll-effect">
        <h1 class="title">Vinícius Marques</h1>
        <h2 class="subtitle">
            <?php echo get_field('title', $id) ?>
        </h2>
        <h3>Competências</h3>
        <ul class="list">
            <?php
            $skills = get_field('skills', $id);
            foreach ($skills as $list):
            ?>
                <li><?php echo $list['item'] ?></li>
            <?php endforeach
            ?>
        </ul>
        <a href="<?php $link = get_field('read-more', $id); echo $link['url']; ?>" class="button">
            <?php echo $link['title']; ?>
        </a>
    </aside>
</section>