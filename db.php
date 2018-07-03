<?php

	 $DB_host = "localhost";
	 $DB_student1 = "root";
	 $DB_pass = "";
	 $DB_name = "incubation";
	 
	 $MySQLi_CON = new MySQLi($DB_host,$DB_student1,$DB_pass,$DB_name);
    
     if($MySQLi_CON->connect_errno)
     {
         die("ERROR : -> ".$MySQLi_CON->connect_error);
     }
     else{
     	echo "success";
     }

?>