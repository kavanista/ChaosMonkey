<?php
/**
 * Every chaos application must implement this interface
 * in order to become a proper ChaosMonkey
 * 
 * Implementations should go in the ChaosMonkey/Chaos folder
 */
interface ChaosMonkey {
    /**
     * Each request can run different chaos plugins
     * See ChaosMonkey/Chaos/ where there are examples of implementation of
     * this interface
     * 
     * The run() method decides when in the request the ChaosMonkey_Chaos 
     * plugin should be run (see the ChaosMonkey/Monkeys/Slim.php for example)
     * 
     * @param ChaosMonkey_Chaos $chaos
     */
    public function run( ChaosMonkey_Chaos $chaos );
}
