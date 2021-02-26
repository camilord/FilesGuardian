<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * spamify - console.php
 * Username: Camilo
 * Date: 24/02/2021
 * Time: 9:02 PM
 */

define('CONSOLE_ROOT', __DIR__);

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Console\Command\ScanFilesCommand;

$application = new Application();

// ... register commands
$application->add(new ScanFilesCommand());

$application->run();