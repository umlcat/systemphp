<?php
// ======================================================================
// Filename: "system.php"
// Description:
// Base Module.
// Important: Its called with "require_once", at the "index.php" file.
// ======================================================================

/* ## string */ function system_internal_slashtobackslash(/* ## string */ $source)
{
  /* ## string var */ $Result = "";
  
  // replace "\" characters for "/":
  $Result = str_replace("/", "\\", $source);
  
  return $Result;
} // void function system_internal_slashtobackslash(...)

/* ## string */ function system_internal_string_right(/* ## string */ $source, /* ## int */ $count) 
{
  /* ## string var */ $Result = "";

  // adjust size
  $source = ($source == NULL) ? "" : $source;  
  $count  = ($count == NULL) ? 0 : $count;
  
  /* ## int var */ $size  = strlen($source);
  /* ## int var */ $index = ($size - $count);
  
  if ($size >= $count)
  {
    $Result = substr($source, $index, $count);
  }
  
  return $Result;
} // string function system_internal_string_right(...)

/* ## bool */ function system_internal_iswindows()
{
  /* ## bool */ $Result = true;
 
  return $Result;
} // bool function system_internal_iswindows(...)

// ----------------------------------------------------------------------

/* ## string */ function system_internal_currdir()
{
  /* ## string var */ $Result = "";
  
  $Result = getcwd();	
  
  //$Result = str_replace($_SERVER['SCRIPT_NAME'],'', $_SERVER['SCRIPT_FILENAME']);
 
  return $Result;
} // string function system_internal_currdir(...)

/* ## void */ function system_require_once(/* ## string const */ $filename)
{
	if ($filename != NULL)
	{
		/* ## string var */ $fullfilename = $filename;
		
		if (system_internal_iswindows())
		{
			/* ## string var */ $currentdir = system_internal_currdir();	
			
			/* ## int */ $count = strlen($fullfilename) - 1;
			
			if (substr($fullfilename, 0, 1) == '^')
			{
			  $fullfilename = $currentdir . system_internal_string_right($fullfilename, $count);
			}
			
			// replace '/' characters for '\\':
			$fullfilename = system_internal_slashtobackslash($fullfilename);
		} // if (system_internal_iswindows())
		//debugln("fullfilename", $fullfilename);
		
		//echo "<b>" . $fullfilename . "</b><br />";
		//die("hello world");
		
		require_once($fullfilename);
	}
	else
	{
		die("Error: \"".$filename."\" Not Found.");
	}// else if ($filename != NULL)
} // void function system_require_once(...)

// ----------------------------------------------------------------------

/* ## void */ function system_echon(/* ## mixed */ $msg)
{
  echo $msg . "\n";
} // void function system_echon(...)

/* ## void */ function system_echobr(/* ## mixed */ $msg)
{
  echo $msg . "<br / >";
} // void function system_echobr(...)

/* ## void */ function system_echoln(/* ## mixed */ $msg)
{
  echo $msg . "<br / >\n";
} // void function system_echoln(...)

/* ## void */ function system_debugln($pVar, $pValue, $addCurrency=true)
{
  if ($addCurrency)
  {
    echo "\$";
  }
  
  echo $pVar . ": " . "[<b><i>" . $pValue . "</i></b>]" . "<br / >\n";
} // void function system_debugln(...)

// ======================================================================

/* ## override void */ function system_start()
{
  // ...
} // void function system_start(...)

/* ## override void */ function system_finish()
{
  // ...  
} // void function system_finish(...)

// ======================================================================
?>
