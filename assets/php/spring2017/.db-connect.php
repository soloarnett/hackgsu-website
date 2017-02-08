<?php 

	class Db {

	    protected static $connection;

	    public function connect() {
	    	/*
	        	FUNCTION NAME:	connect
	        	PARAMETERS:		none
	        	DESCRIPTION:	connects to the db. returns false if an error exists
	        */
	        
	            
	        // Try and connect to the database
	        if(!isset(self::$connection)) {
	            // Load configuration as an array. Use the actual location of your configuration file
	            $config = parse_ini_file('.connect.ini'); 
	            self::$connection = new mysqli($config['host'],$config['username'],$config['password'],$config['database']);
	        }

	        // If connection was not successful, handle the error
	        if(self::$connection === false) {
	            // Handle error - notify administrator, log to a file, show an error screen, etc.
	            return false;
	        }else{
	        	// echo "success";
	        }
	        return self::$connection;
	    }

	    public function query($query) {
	    	/*
	    		FUNCTION NAME:	query
	    		PARAMETERS:		$query
	    		DESCRIPTION:	performs a query on the db. returns the result
	    	*/
	    	
	    	
	        // Connect to the database
	        $connection = $this -> connect();

	        // Query the database
	        $result = $connection -> query($query);

	        return $result;
	    }

	    public function select($query) {
	    	/*
	    		FUNCTION NAME:	select
	    		PARAMETERS:		$query
	    		DESCRIPTION:	performs a select query on the db. returns the rows as a resulting array
	    	*/
	    	
	    	
	        $rows = array();
	        $result = $this -> query($query);
	        if($result === false) {
	            return false;
	        }
	        while ($row = $result -> fetch_assoc()) {
	            $rows[] = $row;
	        }
	        return $rows;
	    }

	    public function error() {
	    	/*
	    		FUNCTION NAME:	error
	    		PARAMETERS:		none
	    		DESCRIPTION:	returns an error from the db if one exists
	    	*/
	    	
	    	
	        $connection = $this -> connect();
	        return $connection -> error;
	    }

	    public function quote($value) {
	    	/*
	    		FUNCTION NAME:	quote
	    		PARAMETERS:		$value
	    		DESCRIPTION:	allows for the proper escaping of characters before using them in the db
	    	*/
	    	
	    	
	        $connection = $this -> connect();
	        return "'" . $connection -> real_escape_string($value) . "'";
	    }
	}
?>