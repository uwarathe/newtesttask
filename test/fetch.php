<?php


include('database_connection.php');

$parent_user_id = 0;

$query = "SELECT * FROM user";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data = get_node_data($parent_user_id, $connect);
}

echo json_encode(array_values($data));

function get_node_data($parent_user_id, $connect)
{
 $query = "SELECT * FROM user WHERE parent_user_id = '".$parent_user_id."'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = array();
 foreach($result as $row)
 {
  $sub_array = array();
  $sub_array['text'] = $row['user_name'];
  $sub_array['nodes'] = array_values(get_node_data($row['user_id'], $connect));
  $output[] = $sub_array;
 }
 return $output;
}

?>