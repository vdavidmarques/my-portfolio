<?php  get_header(); ?>
<section class="contact">
    <div class="content">
        <article class="contact">
            <h1 class="title">Contato</h1>
            <p>
                <?php echo get_field('desc'); ?>
            </p>
            <div class="links">
                <?php
                $args = array(
                    'name' => 'informacoes-gerais',
                    'post_type' => 'post',
                );

                $query = new WP_Query($args);
                while ($query->have_posts()) :
                    $query->the_post();
                    $whatsapp = get_field('whatsapp');
                    $whatsappNumber = get_field('whatsappNumber');
                    $whatsappMessage = get_field('whatsappMessage');
                    $email = get_field('e-mail');
                    $github = get_field('github');
                    $behance = get_field('behance');
                    $instagram = get_field('instagram');
                    $linkedin = get_field('linkedin');
                ?>
                    <a href="mailto:<?php echo $email; ?>" class="icon email" target="_blank"></a>
                    <a href="<?php echo $github; ?>" class="icon github blue" target="_blank"></a>
                    <a href="<?php echo $behance; ?>" class="icon behance blue" target="_blank"></a>
                    <a href="https://api.whatsapp.com/send?phone=5513988264181" class="icon wpp" target="_blank"></a>
                    <a href="<?php echo $instagram ?>" class="icon instagram" target="_blank"></a>
                <?php endwhile; ?>
            </div>
        </article>
    </div>
</section>
<?php get_footer(); ?>    
