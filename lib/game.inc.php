<?php
/**
 * Created by PhpStorm.
 * User: X
 * Date: 2/8/2017
 * Time: 8:55 PM
 */
require __DIR__ . "/../vendor/autoload.php";
// Start the PHP session system
session_start();

define("WUMPUS_SESSION", 'wumpus');
// If there is a Wumpus session, use that. Otherwise, create one
if(!isset($_SESSION[WUMPUS_SESSION])) {
    $_SESSION[WUMPUS_SESSION] = new Wumpus\Wumpus();   // Seed: 1422668587
}

$wumpus = $_SESSION[WUMPUS_SESSION];

