<?php
if (!defined('ABSPATH')) {
    die('No direct access.');
}
?>
<div id="slideshows-list" class="wrap">
    <h1 class="wp-heading-inline"><?php echo esc_html_e('Slideshows', 'ml-slider'); ?></h1> <a href="<?php echo wp_nonce_url(admin_url('admin-post.php?action=metaslider_create_slider'), 'metaslider_create_slider');?>" class="page-title-action"><?php echo esc_html_e('Add New', 'ml-slider'); ?></a>
    <?php
        if ('delete' === $listtable->current_action()) {
            echo '<div class="updated below-h2" id="message"><p>'. sprintf(esc_html__('Items deleted: %d', 'ml-slider'), count($_REQUEST['slideshows'])) . '</p></div>';
        }
    ?>
    <div id="metaslider-ui">
        <div id="nds-wp-list-table-demo">			
            <div id="nds-post-body">		
                <form id="metaslider-list-form" method="POST">
                    <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
                    <?php 
                        $listtable->search_box(esc_html__('Search', 'ml-slider'), 'search_slideshow');
                        $listtable->display();
                    ?>					
                </form>
            </div>			
        </div>
    </div>
</div>
