<?php

namespace App\Helpers;
session_start();
include "../../koneksi.php";
// $data = mysqli_query($koneksi,"SELECT * FROM user WHERE username='".$_SESSION["username"]."'");
// 				while($d = mysqli_fetch_array($data)){
// 					// $temp_topic = $d['topic'];
// 					$temp_user_id = $d['uid_zoom'];
// 					echo $temp_user_id;
// 				}
				// echo $_SESSION['username'];
				
class ZoomApiHelper{

	public static function createZoomMeeting($meetingConfig = []){
		include "../../koneksi.php";
		$jwtToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6Ijk1eGNRVTZEU21xRHRfMXZCdElPS3ciLCJleHAiOjE2NTA5MDI0MDAsImlhdCI6MTYxOTQwODc5N30.GvIiakkEwRtIYNQe2sNEdcT67EZhK9uQU1C1lvPXLt8';
		
		$requestBody = [
			'topic'			=> $meetingConfig['topic'] 		?? 'Ruang Meeting',
			'type'			=> $meetingConfig['type'] 		?? 2,
			'start_time'	=> $meetingConfig['start_time']	?? date('Y-m-dTh:i:00').'Z',
			'duration'		=> $meetingConfig['duration'] 	?? 30,
			'password'		=> $meetingConfig['password'] 	?? mt_rand(),
			'timezone'		=> 'Africa/Cairo',
			'agenda'		=> 'PHP Session',
			'settings'		=> [
			  	'host_video'			=> false,
			  	'participant_video'		=> true,
			  	'cn_meeting'			=> false,
			  	'in_meeting'			=> false,
			  	'join_before_host'		=> true,
			  	'mute_upon_entry'		=> true,
			  	'watermark'				=> false,
			  	'use_pmi'				=> false,
			  	'approval_type'			=> 1,
			  	'registration_type'		=> 1,
			  	'audio'					=> 'voip',
				'auto_recording'		=> 'none',
				'waiting_room'			=> false
			]
		];
		
		
		$zoomUserId = 'pVUInY2KSs-rZz41D1zCTg' ;


		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // Skip SSL Verification
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.zoom.us/v2/users/".$zoomUserId."/meetings",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER => 0,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($requestBody),
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer ".$jwtToken,
		    "Content-Type: application/json",
		    "cache-control: no-cache"
		  ),
		));
		
		$response = curl_exec($curl);
        return $response;
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return [
		  	'success' 	=> false, 
		  	'msg' 		=> 'cURL Error #:' . $err,
		  	'response' 	=> ''
		  ];
		} else {
		  return [
		  	'success' 	=> true,
		  	'msg' 		=> 'success',
		  	'response' 	=> json_decode($response)
		  ];
		}
		
	}
	} 
	

$zoom2 = strval(ZoomApiHelper::createZoomMeeting());

$id_meeting = explode(",",$zoom2);
$id_meeting2 = explode(":", $id_meeting[1]);
echo $id_meeting2[1];

$password = explode(",",$zoom2);
$password2 = explode(":", $password[17]);
$password3 = explode('"', $password2[1]);
echo $password3[1];

$nama =  $_SESSION['username'];
$sql="UPDATE list_room_tl  SET meeting_id='$id_meeting2[1]', meeting_password='$password3[1]' WHERE tl_name='$nama'";
$hasil=mysqli_query($mysqli,$sql);
if ($sql) {
	echo "Berhasil insert data";
	header("location: table-tlc.php");
	
	exit;
  }
else {
	echo "Gagal insert data";
	exit;
}
?>



// echo ZoomApiHelper::createZoomMeeting();