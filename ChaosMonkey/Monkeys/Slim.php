<?php

include( "ChaosMonkey/ChaosMonkey.php" );

/**
 * ChaosMonkey for Slim framework http://www.slimframework.com/
 * see example.php for usage
 */
class ChaosMonkey_Slim implements ChaosMonkey {
    
    /**
     * A Slim object
     * @var Slim 
     */
    private $slim;
    
    /**
     * @param Slim $slim 
     */
    public function __construct( Slim $slim) {
	$this->slim = $slim;
    }
    
    /**
     * Get the current Slim object
     * @return Slim
     */
    public function getSlim() {
	return $this->slim;
    }
    
    /**
     * Run the ChaosMOnkey_Chaos plugin.
     * 
     * @param ChaosMonkey_Chaos $chaos 
     */
    public function run(ChaosMonkey_Chaos $chaos) {
	if( $chaos->shouldRun() ) {
	    /*
	     * Get a random Slim hook - we don't want to interfere
	     * with the same hook each time
	     */
	    $hook = $this->getHook();
	    
	    /*
	     * Interference can happen before, after, during execution
	     * and will create different behaviour each time
	     */
	    $this->getSlim()->hook( $hook, function() use ($chaos) {		
		$chaos->interfere();
	    });
	}	
    }
    
    /**
     * Get a random hook from the available Slim hooks
     * 
     * @return string
     */
    private function getHook() {
	$hooks = array_keys( $this->getSlim()->getHooks() );
	$hook = $hooks[rand(0, count($hooks)-1)];
	return $hook;
    }
    
    
}