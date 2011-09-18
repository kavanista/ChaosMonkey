<?php
include "ChaosMonkey/Chaos.php";

/**
 * Implementation of the ChaosMonkey_Chaos interface that
 * will cause absolutely NO harm to the request
 */
class ChaosMonkey_NoChaos implements ChaosMonkey_Chaos {
    
    /**
     * Always returns false
     * @return false
     */
    public function shouldRun() {
	return false;
    }
    
    /**
     * Empty function body: will never do anything
     * @return void
     */
    public function interfere() {
	// We never interfere
    }
}