<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * FilesGuardian - MailConfig.php
 * Username: Camilo
 * Date: 26/02/2021
 * Time: 9:54 PM
 */

namespace App\Config;


use camilord\utilus\Data\ArrayUtilus;

/**
 * Class MailConfig
 * @package App\Config
 */
class MailConfig
{
    /**
     * @var string
     */
    private $smtp_host = 'localhost';
    /**
     * @var string
     */
    private $smtp_username = '';
    /**
     * @var string
     */
    private $smtp_password = '';
    /**
     * @var int
     */
    private $smtp_port = 25;
    /**
     * @var string
     */
    private $smtp_encryption = '';

    /**
     * MailConfig constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $config_file = CONSOLE_ROOT.'/mail.conf.json';
        if (file_exists($config_file)) {
            $data = json_decode(file_get_contents($config_file), true);
            if (ArrayUtilus::haveData($data))
            {
                foreach($data as $cfg_name => $cfg_value) {
                    $this->{$cfg_name} = $cfg_value;
                }
            }
        } else {
            throw new \Exception('Error! No email configuration has been setup yet.');
        }
    }

    /**
     * @return string
     */
    public function getSmtpHost()
    {
        return $this->smtp_host;
    }

    /**
     * @return string
     */
    public function getSmtpUsername()
    {
        return $this->smtp_username;
    }

    /**
     * @return string
     */
    public function getSmtpPassword()
    {
        return $this->smtp_password;
    }

    /**
     * @return int
     */
    public function getSmtpPort()
    {
        return $this->smtp_port;
    }

    /**
     * @return string
     */
    public function getSmtpEncryption()
    {
        return $this->smtp_encryption;
    }
}