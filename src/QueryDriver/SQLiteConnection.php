<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * FilesGuardian - SQLiteConnection.php
 * Username: Camilo
 * Date: 26/02/2021
 * Time: 9:52 PM
 */

namespace App\QueryDriver;


use App\Config\DBConfig;

/**
 * Class SQLiteConnection
 * @package App\QueryDriver
 */
class SQLiteConnection
{
    /**
     * PDO instance
     * @var \PDO
     */
    private $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function __construct() {
        if (!$this->pdo) {
            $this->pdo = new \PDO("sqlite:" . DBConfig::SQLiteDb);
        }
    }

    public function getDB() {
        return $this->pdo;
    }
}