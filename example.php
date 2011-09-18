<?php
/*
 * Assuming Slim/ is in your include path
 * ini_set( "include_path", ini_get("include_path") . ":../Path/To/Slim");
 * Assuming ChaosMonkey is in your include path
 */

require 'Slim/Slim.php';

require "ChaosMonkey/Chaos/AbsoluteChaos.php";
require "ChaosMonkey/Monkeys/Slim.php";


// First: initialize Slim
$app = new Slim();

// Create the Slim ChaosMonkey
$chaos = new ChaosMonkey_Slim( $app );

// We want to create a lot of havoc:
$chaosrunner = new ChaosMonkey_AbsoluteChaos();
/*
 * For no chaos at all
 * $chaosrunner = new ChaosMonkey_NoChaos()
 */

/*
 * $chaos will now attach itself to one of the Slim hooks
 */
$chaos->run( $chaosrunner );


$app->get('/', function () {
    echo "Hello, world";
});

$app->run();