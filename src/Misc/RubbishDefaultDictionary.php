<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * FilesGuardian - RubbishDefaultDictionary.php
 * Username: Camilo
 * Date: 26/02/2021
 * Time: 10:48 PM
 */

namespace App\Misc;

/**
 * Class RubbishDefaultDictionary
 * @package App\Misc
 */
class RubbishDefaultDictionary
{
    /**
     * @var array
     */
    private $data;

    public function __construct()
    {
        $this->data = [];
        $json_file = CONSOLE_ROOT.'/dictionary/known.rubbish.json';
        if (file_exists($json_file)) {
            $this->data = json_decode(file_get_contents($json_file), true);
        }
    }

    /**
     * @return array|mixed
     */
    public function get_list() {
        return $this->data;
    }
}