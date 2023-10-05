<?php


include('database_connection.php');

$data = array(
 ':user_name'  => $_POST['user_name'],
 ':parent_user_id' => $_POST['parent_user']
);
$date = date('Y-m-d');

$query = "
 INSERT INTO user (user_name, parent_user_id,created_at) VALUES (:user_name, :parent_user_id,$date)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 echo 'User Added';
}


?>