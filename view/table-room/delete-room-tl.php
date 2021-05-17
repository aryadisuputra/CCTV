<?php
// include database connection file
include_once("../../koneksi.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];

$room_info = mysqli_query($mysqli, "SELECT * FROM list_room_tl WHERE id='$id'");
      
while($user_data = mysqli_fetch_array($room_info))
{
  $id_origin = $user_data['id_origin'];
}
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM list_room_tl WHERE id=$id");
if($result){
    header("Location:table-tlc.php?id=$id_origin&notif=5");
}else{
    header("Location:table-tlc.php?id=$id_origin&notif=6");
}
?>