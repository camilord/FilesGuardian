<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * FilesGuardian - ExclusionConfig.php
 * Username: Camilo
 * Date: 27/02/2021
 * Time: 9:29 AM
 */

namespace App\Config;


use camilord\utilus\IO\SystemUtilus;

/**
 * Class ExclusionConfig
 * @package App\Config
 */
class ExclusionConfig
{
    /**
     * @var array|mixed
     */
    private $data;

    /**
     * ExclusionConfig constructor.
     */
    public function __construct()
    {
        $conf_filename = SystemUtilus::cleanPath(
            CONSOLE_ROOT.'/dictionary/extensions.conf.json'
        );
        $this->data = json_decode(
            file_get_contents(
                $conf_filename
            ), true
        );
    }

    /**
     * @return string[]
     */
    public function get_dir_list() {
        return (isset($this->data['folders']) && is_array($this->data['folders'])) ? $this->data['folders'] : [];
    }

    /**
     * @return string[]
     */
    public function get_files_list() {
        return (isset($this->data['files']) && is_array($this->data['files'])) ? $this->data['files'] : [];
    }
}