<?php 
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
$path = 'uploads/';
 if (!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['mobile']) || !empty($_POST['city']) ||  $_FILES['image']) 
{
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
  
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
  
    $final_image = rand(1000, 1000000) . $img;
   
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);
        if (move_uploaded_file($tmp, $path)) {
          //  echo "<img src='$path' />";
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile'];
            $city = $_POST['city'];
            include_once 'connection.php';
          
            $insert = $con->query("INSERT uploading (name,email,mobile,city,file_name) VALUES ('" . $name . "','" . $email . "','" . $mobile . "','" . $city . "','" . $path . "')");
           
        }
    } else {
        echo 'invalid';
    }

}
?>