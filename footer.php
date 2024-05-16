<?php
// Get the ID of the front page
$front_page_id = get_option('page_on_front');

// Get the permalink (URL) of the front page
$front_page_url = get_permalink($front_page_id);
?>

</div><!-- .content -->
<footer>
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo $front_page_url ?>/admin">rochester.dev</a></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>