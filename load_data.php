<?php
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$db_name = "forests";
	$table1 = "parks";
	$table2 = "panda";

	$con = mysql_connect(':/home/scf-32/vivekras/mysql.sock','root','password1');
mysql_select_db('Forrest Guide',$con);

if(!$con)
	die('could not connect');

	$q = "SELECT * From $table1 LEFT JOIN $table2 ON $table1.ecoregion = $table2.Name ";

	$results = mysql_query($q);
	$i=0;
	$forests = array();

	while($row=mysql_fetch_assoc($results)){
		$tmp = json_encode($row);
		if ($tmp) {
			$forests[$i] = $tmp;
			$i++;	
		}
	}
	
	$return = implode(",", $forests);
	echo '{"parks":[' . $return . ']}';
	

?>
