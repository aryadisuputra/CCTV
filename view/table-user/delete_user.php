<?php
// include database connection file
include_once("../../koneksi.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM user WHERE id=$id");
 
// After delete redirect to Home, so that latest user list will be displayed.
if($result){
    header("Location:table-ch-kra.php?notif=5");
}else{
    header("Location:table-ch-kra.php?notif=6");
}
?>