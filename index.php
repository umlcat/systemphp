<?php
// ======================================================================
// Filename: "index.php"
// Description:
// EXAMPLE of the "system.php" crossplatform path library.
// ======================================================================

/* ## void */ function main()
{    
	// ........................................................................
	
	/* ## string var */ $basePath = "";
    $basePath=dirname(__FILE__);
    echo('basePath: [' . $basePath . "]<br / >\n");
	
	// must be in same folder
	/* ## string var */ $SystemPath   = $basePath . "\\"  . "system.php";	
	if (!is_readable($SystemPath))
		die("Please make sure that the file \"".$SystemPath."\" is readable by Web server process.");
	
	require_once($SystemPath);
	
	// ........................................................................
	
	system_start();
	
	// DoSomething();
	
	system_finish();
} // ## void function main(...)

// ........................................................................

// => HERE:
main();

// ........................................................................

?>
