<?php
if (!class_exists('IfwPsn_Wp_Plugin_Cli_Exception')) {
    require_once dirname(__FILE__) . '/../../../Exception.php';
    require_once dirname(__FILE__) . '/../../Exception.php';
    require_once dirname(__FILE__) . '/../Exception.php';
}

global $wp, $wpdb, $wp_query, $wp_the_query, $wp_rewrite, $wp_post_types, $_wp_post_type_features, $wp_post_statuses,
       $wp_did_header, $wp_taxonomies, $wp_locale, $wp_roles, $post_type;

try {

    $localScriptPath = '';
    if (isset($_SERVER['argv'][1])) {
        $localScriptPath = $_SERVER['argv'][1];
    }

    array_splice($_SERVER['argv'], 1, 1);

    $args = $_SERVER['argv'];

    if (!isset($args[1])) {
        throw new IfwPsn_Wp_Plugin_Cli_Exception('Missing command. Please check the plugin documentation.');
    }
    $command = $args[1];

    define('IFW_WP_CLI_CMD', $command);
    define('WP_USE_THEMES', false);

    // init WP environment
    $searchDir = $localScriptPath;
    if ($searchDir[strlen($searchDir)-1] == DIRECTORY_SEPARATOR) {
        $searchDir = substr($searchDir, 0, -1);
    }

    $counter = 10;

    while ($counter > 0) {

        $loadPath = $searchDir . DIRECTORY_SEPARATOR . 'wp-load.php';

        if (file_exists($loadPath)) {

            require_once $loadPath;
            return true;
        }

        $searchDir = substr($searchDir, 0, strrpos($searchDir, DIRECTORY_SEPARATOR));
        $counter--;
    }

    throw new IfwPsn_Wp_Plugin_Cli_Exception('Could not load WP environment from ' . $localScriptPath);

} catch (IfwPsn_Wp_Plugin_Cli_Exception $e) {
    echo 'Error while script initialization: ' . $e->getMessage();
} catch (Exception $e) {
    echo 'General error: ' . $e->getMessage();
}
