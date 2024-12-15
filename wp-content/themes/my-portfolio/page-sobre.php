<?php 
    get_header();  
    $slug = 'sobre';
    $id = get_page_id_by_slug($slug);
?>
    <section class="about container">
        <article class="content">
            <h1 class="title">
                Sobre
            </h1>
            <?php echo get_field('content', $id) ?>
        
        </article>
    </section>
<?php get_footer(); ?>