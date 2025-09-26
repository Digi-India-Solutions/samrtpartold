<?php
ini_set('memory_limit', '-1');
ini_set('post_max_size', '64G');
ini_set('upload_max_filesize', '64G');
ini_set('max_execution_time', '300000');

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * our autoloader, along with Composer's, loads our constants
 * and fires up an environment-specific bootstrapping.
 */

// Ensure the current directory is pointing to the front controller's directory
chdir(__DIR__);

// Load our paths config file
$pathsConfig = FCPATH . 'app/Config/Paths.php';
require realpath($pathsConfig) ?: $pathsConfig;

$paths = new Config\Paths();

// Load Composer autoload (must exist after `composer install`)
require FCPATH . 'vendor/autoload.php';

// Bootstrap the CodeIgniter framework
$app = require rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

/*
 *---------------------------------------------------------------
 * LAUNCH THE APPLICATION
 *---------------------------------------------------------------
 */
$app->run();
