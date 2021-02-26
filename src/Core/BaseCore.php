<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * FilesGuardian - BaseCore.php
 * Username: Camilo
 * Date: 27/02/2021
 * Time: 9:50 AM
 */

namespace App\Core;

/**
 * Class BaseCore
 * @package App\Core
 */
abstract class BaseCore
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * BaseCore constructor.
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->pdo = $db;
    }

    /**
     * @return \PDO
     */
    public function getDb(): \PDO
    {
        return $this->pdo;
    }
}