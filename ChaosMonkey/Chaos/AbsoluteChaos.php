<?php
include "ChaosMonkey/Chaos.php";
include "ChaosMonkey/Exception.php";

/**
 * Implementation of ChaosMonkey_Chaos that will create the most
 * possible havoc to the request
 * 
 * This plugin will NOT decide when in the request to be run, that
 * is the work of ChaosMonkey/Monkeys/* classes
 */
class ChaosMonkey_AbsoluteChaos implements ChaosMonkey_Chaos {
    
    /**
     * Should the chaos plugin be run? 
     * Randomly selects every other request to be subject to chaos
     * 
     * @return bool
     */
    public function shouldRun() {
	return rand(0, 1);
    }
    
    /**
     * Interfere with the current request
     * 
     * Randomly selects a interfereWith* function
     * 
     * @return void
     */
    public function interfere() {
	$interfere = array(
	    "GeneralException",
	    "ChaosMonkeyException",
	    "TimeDelay",
	    "OutputGarbage",
	    "Die",
	    "Exit"
	);
	$key = rand(0, count($interfere) - 1);
	$function = "interfereWith" . $interfere[$key];
	if(is_callable(array( $this, $function) ) ) {
	    $this->$function();
	}
    }
    
    /**
     * Throw a general PHP Exception
     * 
     * @throws Exception
     */
    private function interfereWithGeneralException() {
	throw new Exception("Chaos" );
    }
    
    /**
     * Throw a ChaosMonkey Exception to see how the rest of the
     * application will handle this
     * 
     * @throws ChaosMonkey_Exception
     */
    public function interfereWithChaosMonkeyException() {
	throw new ChaosMonkey_Exception( "Chaos" );
    }
    
    /**
     * Sleep between 5 and 60 seconds before resuming the request
     * 
     * @return void
     */
    private function interfereWithTimeDelay() {
	sleep(rand(5, 60));
    }
    
    /**
     * interfere with random output garbage and then
     * die()
     * 
     * @return void
     */
    private function interfereWithOutputGarbage() {
	$str = str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789 ',3));
	echo $str;
	die();
    }
    
    /**
     * Interfere with die()
     */
    private function interfereWithDie() {
	die();
    }
    
    /**
     * Interfere with exit()
     */
    private function interfereWithExit() {
	exit();
    }
}