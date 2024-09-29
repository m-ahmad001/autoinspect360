<?php get_header(); ?>

<main id="site-content" role="main" class="container mx-auto px-4 py-8">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white shadow-md rounded-lg overflow-hidden'); ?>>
                <header class="entry-header bg-gray-100 px-6 py-4">
                    <nav class="text-sm breadcrumbs" aria-label="breadcrumb">
                        <ol class="list-none p-0 inline-flex">
                            <li class="flex items-center">
                                <a href="<?php echo home_url(); ?>" class="text-blue-600 hover:text-blue-800">Home</a>
                                <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg>
                            </li>
                            <li class="flex items-center">
                                <span class="text-gray-500"><?php the_title(); ?></span>
                            </li>
                        </ol>
                    </nav>
                    <h1 class="entry-title text-2xl font-bold mt-2"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content px-6 py-4">
                    <?php the_content(); ?>
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