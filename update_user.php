<?php 
include('connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$city = $_POST['city'];
$id = $_POST['id'];

//$sql = "UPDATE 'uploading' SET  'name'='.$name.' , 'email'= '.$email.', 'mobile'='.$mobile.',  'city'='.$city.' WHERE id='.$id.' ";
$sql = "UPDATE uploading SET name='{$name}',email='{$email}',mobile='{$mobile}',city='{$city}' WHERE id='{$id}'";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
print_r($query);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>