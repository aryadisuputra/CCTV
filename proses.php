<?php
		$conn = mysqli_connect('localhost', 'root', '', 'multi_user');

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $sql = "SELECT * from user where username = '$username'";
        $process = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($process);
        if($num == 0){

            echo " ✔ Username masih tersedia";
        }else{

            echo " ❌ Username Sudah Digunakan";
        }

        ?>