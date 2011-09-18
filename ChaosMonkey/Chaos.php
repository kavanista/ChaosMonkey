<?php
/**
 * The ChaosMonkey_Chaos interface defines a class
 * that will interfere with the request somehow
 * 
 * implementations should go in the ChaosMonkey/Chaos folder
 */
interface ChaosMonkey_Chaos {
    /**
     * Should the plugin be run?
     * @return void
     */
    public function shouldRun();
    /**
     * Do intereference with the request
     * @return void
     */
    public function interfere();
}