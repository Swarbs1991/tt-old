<?php
/**
 * ifeelweb.de Wordpress Plugin Framework
 * For more information see http://www.ifeelweb.de/wp-plugin-framework
 *
 *
 *
 * @author   Timo Reith <timo@ifeelweb.de>
 * @version  $Id: Outputter.php 527 2016-08-07 09:40:03Z timoreithde $
 */
class IfwPsn_Wp_Plugin_Cli_Outputter
{
    public static function output($output, $foreground = null, $background = null)
    {
        if (!empty($foreground) ||!empty($background)) {
            $output = IfwPsn_Wp_Plugin_Cli_Colors::getInstance()->getColoredString($output, $foreground, $background);
        }

        echo $output;

        if (ob_get_contents()) {
            ob_end_clean();
            flush();
        }
    }

    public static function outputWithLineBreak($output, $foreground = null, $background = null)
    {
        echo self::output($output, $foreground, $background);
        echo PHP_EOL;
    }

    public static function outputWithDoubleLineBreak($output, $foreground = null, $background = null)
    {
        echo self::output($output, $foreground, $background);
        echo PHP_EOL;
        echo PHP_EOL;
    }
}
 