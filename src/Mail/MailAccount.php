<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * spamify - MailAccount.php
 * Username: Camilo
 * Date: 24/02/2021
 * Time: 9:27 PM
 */

namespace App\Mail;

use camilord\utilus\Data\ArrayUtilus;

/**
 * Class MailAccount
 * @package App\Mail
 */
class MailAccount
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $imap_host;

    /**
     * @var string
     */
    private $imap_port;

    /**
     * @var string
     */
    private $encryption;

    public function __construct(?array $data = null)
    {
        if (ArrayUtilus::haveData($data)) {
            $this->fromArray($data);
        }
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getImapHost()
    {
        return $this->imap_host;
    }

    /**
     * @param string $imap_host
     */
    public function setImapHost($imap_host)
    {
        $this->imap_host = $imap_host;
    }

    /**
     * @return string
     */
    public function getImapPort()
    {
        return $this->imap_port;
    }

    /**
     * @param string $imap_port
     */
    public function setImapPort($imap_port)
    {
        $this->imap_port = $imap_port;
    }

    /**
     * @return string
     */
    public function getEncryption()
    {
        return $this->encryption;
    }

    /**
     * @param string $encryption
     */
    public function setEncryption($encryption)
    {
        $this->encryption = $encryption;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function fromArray(array $data)
    {
        foreach($data as $var_name => $var_value) {
            $this->{$var_name} = $var_value;
        }
        return $this;
    }

    /**
     * @param string $email
     * @param string $password
     * @param string $imap_host
     * @param string $imap_port
     * @param string $encryption
     * @return $this
     */
    public function setParams(
        string $email, string $password,
        string $imap_host, string $imap_port,
        string $encryption
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->imap_host = $imap_host;
        $this->imap_port = $imap_port;
        $this->encryption = $encryption;
        return $this;
    }
}