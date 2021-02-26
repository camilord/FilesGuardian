<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * spamify - BaseCommand.php
 * Username: Camilo
 * Date: 24/02/2021
 * Time: 9:01 PM
 */

namespace App\Console;


use App\QueryDriver\SQLiteConnection;
use Symfony\Component\Console\Command\Command;

/**
 * Class BaseCommand
 * @package App\Console
 */
abstract class BaseCommand extends Command
{
    /**
     * @var SQLiteConnection
     */
    private $db;


    protected function configure()
    {
        $this->db = new SQLiteConnection();
    }

    /**
     * @return \PDO
     */
    public function getDB() {
        return $this->db->getDB();
    }
}