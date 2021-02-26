<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * FilesGuardian - ExtConfig.php
 * Username: Camilo
 * Date: 26/02/2021
 * Time: 10:54 PM
 */

namespace App\Config;

use camilord\utilus\IO\SystemUtilus;

/**
 * Class ExtConfig
 * @package App\Config
 */
class ExtConfig
{
    /**
     * @return string[]
     */
    public static function get_list() {
        $conf_filename = SystemUtilus::cleanPath(
            CONSOLE_ROOT.'/dictionary/extensions.conf.json'
        );
        return json_decode(
            file_get_contents(
                $conf_filename
            ), true
        );
    }
}