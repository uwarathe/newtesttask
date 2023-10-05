<?php



include('database_connection.php');

$query = "SELECT * FROM user ORDER BY user_name ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '<option value="0">Parent user</option>';

foreach($result as $row)
{
 $output .= '<option value="'.$row["user_id"].'">'.$row["user_name"].'</option>';
}

echo $output;

?>





