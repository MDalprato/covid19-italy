<?php //include 'connection.php'; 
  

	  //whether ip is from share internet
	if (!empty($_SERVER['HTTP_CLIENT_IP']))   
	{
	  $ip_address = $_SERVER['HTTP_CLIENT_IP'];
	}
	//whether ip is from proxy
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
	{
	  $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	//whether ip is from remote address
	else
	{
	  $ip_address = $_SERVER['REMOTE_ADDR'];
	}


    $conn = new mysqli($servername, $username, $password, $dbname);


        $params = get_all_get();
        $today = date("Y-m-d H:i:s"); 


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO `stats`(`string`, `timestamp`, `ip_src` ) VALUES 
    ('".$params."', 
    '".$today."',
     '".$ip_address."')";
    
    //echo $sql;
    $conn->query($sql);


    //echo "<h1>TEST LOCALE - ---- DO NOT PULISH " .$sql. "</h1>";
 


    function get_all_get()
{
        $output = "?"; 
        $firstRun = true; 
        foreach($_GET as $key=>$val) { 
        if($key != $parameter) { 
            if(!$firstRun) { 
                $output .= "&"; 
            } else { 
                $firstRun = false; 
            } 
            $output .= $key."=".$val;
         } 
    } 

    return $output;
}   

?>
