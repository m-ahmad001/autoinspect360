<?php get_header(); ?>

<main id="site-content" role="main" class="container mx-auto ">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white overflow-hidden'); ?>>
                <div class="entry-content px-6 py-4 mt-10">
                    <h1 class="entry-title text-4xl font-bold mb-6 text-center"><?php the_title(); ?></h1>

                    <div class="custom-page-content max-w-4xl mx-auto">
                        <?php
                        $content = get_the_content();
                        $content = apply_filters('the_content', $content);
                        $content = str_replace(']]>', ']]&gt;', $content);
                        echo $content;
                        ?>
                    </div>
                </div>
            </article>
            <?php
        endwhile;
    else:
        ?>
        <p class="text-center text-gray-600"><?php esc_html_e('Sorry, no pages found.'); ?></p>
        <?php
    endif;
    ?>
</main>

<?php get_footer(); ?>