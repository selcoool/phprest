
<?php

$host="localhost";
$username="root";
$password="";
$dbname="phprest";


$conn = mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
   die("Connect Failed: ". mysqli_connect_error());
}


// include '../inc/dbcon.php'; //database connection code

error_reporting(0);
$postData = file_get_contents('php://input',true); //collect inout parameters


echo '<pre>';
print_r($postData);
echo '</pre>';

// echo $postData ;
$target_dir = $_SERVER['DOCUMENT_ROOT'].'/upload'.'/';
$image_name = basename($_FILES["filetoupload"]["name"]);
// echo $_SERVER['DOCUMENT_ROOT'];
$requestMethod = $_SERVER["REQUEST_METHOD"];
$target_file = $target_dir . $image_name; //merging/combine the path and image name
// echo $requestMethod;
// echo $_FILES['filetoupload']['name'];
$tmp_name=$_FILES["filetoupload"]["tmp_name"];
// $tc=$_POST["TC"];

$tc=mysqli_real_escape_string($conn,$target_file);

// echo $tc;

// move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file);
$query="INSERT INTO image (id,name) VALUES('',' $tc')";
    $result=mysqli_query($conn,$query);

// $postData = json_decode($postData,true); //convert into readable format

// if(empty($postData)){
// 	$postData = $_POST;
// }
// echo '<pre>';
// print_r($postData);
// echo '</pre>';

// switch ($postData['eventName']) { //here event name is API name
// 	// case 'newTask': //We have create a case with API name so when we call API it work on only
// 	// 	//that section which it is call for
// 	// 	// Right now we are in new task so here new entry will enter in database
		
// 	// 	$qry2 = mysqli_query($conn,'INSERT into tasks (id,user_id,title,comment,status,created_on) VALUES("","'.$postData['user_id'].'","'.$postData['title'].'","'.$postData['comment'].'","'.$postData['status'].'","'.date('Y-m-d H:i:s').'")');
// 	// 	// check this insert query

// 	// 	if($qry2){
// 	// 		$last_id = $conn->insert_id; //fetch lasted added row id

// 	// 		$qry3 = mysqli_query($conn,'SELECT * FROM tasks WHERE id='.$last_id);
// 	// 		$qry3num = mysqli_num_rows($qry3);
// 	// 		$qry3Arr = mysqli_fetch_all($qry3,MYSQLI_ASSOC);
// 	// 		//collecte the lastest row with last id


// 	// 		//success the success message
// 	// 		$res['data'] = $qry3Arr; //send the added data to front end in json format
// 	// 		$res['status'] = 'success';
// 	// 		$res['message'] = 'Insert successfully';
// 	// 	}else{
// 	// 		//failed message
// 	// 		$res['data'] = array();
// 	// 		$res['status'] = 'fail';
// 	// 		$res['message'] = 'something went wrong';
// 	// 	}
// 	// break;
// 	// case 'userLogin': //its start with user login/register
// 	// 	$qry1 = mysqli_query($conn,'SELECT * FROM users WHERE phone_no='.$postData['phone_no']); //search the phone no already added or not
// 	// 	$qry1num = mysqli_num_rows($qry1);

// 	// 	if($qry1num == 0){
// 	// 		$qry2 = mysqli_query($conn,'INSERT into users (id,phone_no) VALUES("","'.$postData['phone_no'].'")');
// 	// 		if($qry2){
// 	// 			$last_id = $conn->insert_id;

// 	// 			$qry3 = mysqli_query($conn,'SELECT * FROM users WHERE id='.$last_id);
// 	// 			$qry3num = mysqli_num_rows($qry3);
// 	// 			$qry3Arr = mysqli_fetch_all($qry3,MYSQLI_ASSOC);

// 	// 			$res['data'] = $qry3Arr;
// 	// 			$res['status'] = 'success';
// 	// 			$res['message'] = 'Register and login successfully';
// 	// 		}else{
// 	// 			$res['data'] = array();
// 	// 			$res['status'] = 'fail';
// 	// 			$res['message'] = 'something went wrong';
// 	// 		}
// 	// 	}else{
// 	// 		$qry1Arr = mysqli_fetch_all($qry1,MYSQLI_ASSOC);
// 	// 		$res['data'] = $qry1Arr;
// 	// 		$res['status'] = 'success';
// 	// 		$res['message'] = 'Login successfully';
// 	// 	}
// 	// break;
// 	// case 'updateTask': //update the task with the you collect from get API
// 	// 	$qry1 = mysqli_query($conn,'UPDATE tasks SET title ="'.$postData['title'].'", comment ="'.$postData['comment'].'",status="'.$postData['status'].'" WHERE id='.$postData['id']);
// 	// 	if($qry1){
// 	// 		$qry2 = mysqli_query($conn,'SELECT * FROM tasks WHERE id='.$postData['id']);
// 	// 		$qry2num = mysqli_num_rows($qry2);
// 	// 		$qry2Arr = mysqli_fetch_all($qry2,MYSQLI_ASSOC);

// 	// 		$res['data'] = $qry2Arr;
// 	// 		$res['status'] = 'success';
// 	// 		$res['message'] = 'Update successfully';
// 	// 	}else{
// 	// 		$res['data'] = array();
// 	// 		$res['status'] = 'fail';
// 	// 		$res['message'] = 'something went wrong';
// 	// 	}
// 	// break;
// 	// case 'gettask': //to list out the all added task
// 	// 	$qry1 = mysqli_query($conn,'SELECT * FROM users WHERE phone_no='.$postData['phone_no']);
// 	// 	$qry1num = mysqli_num_rows($qry1);
// 	// 	$qry1Arr = mysqli_fetch_array($qry1,MYSQLI_ASSOC);
// 	// 	if($qry1num == 0){
// 	// 		$res['data'] = array();
// 	// 		$res['status'] = 'success';
// 	// 		$res['message'] = 'No phone found';
// 	// 	}else{
// 	// 		$qry2 = mysqli_query($conn,'SELECT * FROM tasks WHERE user_id='.$qry1Arr['id']);
// 	// 		$qry2num = mysqli_num_rows($qry2);
// 	// 		$qry2Arr = mysqli_fetch_all($qry2,MYSQLI_ASSOC);
// 	// 		if(empty($qry2Arr)){
// 	// 			$res['data'] = array();
// 	// 			$res['status'] = 'success';
// 	// 			$res['message'] = ' no task listed';
// 	// 		}else{
// 	// 			$res['data'] = $qry2Arr;
// 	// 			$res['status'] = 'success';
// 	// 			$res['message'] = 'task listed successfully';
// 	// 		}
// 	// 	}
// 	// break;
// 	// case 'deletetask': //In the end start complete delete the task
// 	// 	$qry1 = mysqli_query($conn,'DELETE FROM tasks WHERE id='.$postData['id']);
		
// 	// 	if($qry1){
// 	// 		$res['data'] = array();
// 	// 		$res['status'] = 'success';
// 	// 		$res['message'] = 'Task deleted';
// 	// 	}else{
// 	// 		$res['data'] = array();
// 	// 		$res['status'] = 'failded';
// 	// 		$res['message'] = 'something went wrong';
			
// 	// 	}
// 	// break;
// 	// case 'uploadbase64image': // So here is I already create API to upload base64 image
	
// 	// 	$image = $postData['image']; //This a postdata here we going to collect the base64 image.
// 	// 	$image_name = ""; //declaring the image name variable
// 	// 	if (strlen($image) > 0) { //Set the validation that if image lenght must be greater than 0. So image is in base64 so it will be in string
			
// 	//         $image_name = round(microtime(true) * 1000). ".jpg"; //Giving new name to image.

// 	//         $image_upload_dir = $_SERVER['DOCUMENT_ROOT'].'/Todolist_corephp/image/'.$image_name; //Set the path where we need to upload the image.


// 	//         $flag = file_put_contents($image_upload_dir, base64_decode($image));
// 	//         //Here is the main code to convert Base64 image into the real image/Normal image.
// 	//         //file_put_contents is function of php. first parameter is the path where you neeed to upload the image. second parameter is the base64image and with the help of base64_decode function we decoding the image.

// 	//         if($flag){ //Basically flag variable is set for if image get uploaded it will give us true then we will save it in database or else we give response for fail.

// 	//         	$qry2 = mysqli_query($conn,'INSERT into image (id,name) VALUES("","'.$image_name.'")');
// 	//         	$res['data']['image'] = $image_name;
// 	// 			$res['status'] = 'success';
// 	// 			$res['message'] = 'Base64 image uploaded';

// 	// 			//So lets try to upload image via postman
// 	//         }else{
// 	//         	$res['data'] = array();
// 	// 			$res['status'] = 'fail';
// 	// 			$res['message'] = 'Something wrong';
// 	//         }
	        
// 	//     }else{
// 	//     	$res['data'] = array();
// 	// 		$res['status'] = 'fail';
// 	// 		$res['message'] = 'Please passed image';
// 	//     }
// 	// break;



// 	case 'uploadpostimage': //This video is of how to upload image with $_FILES via Rest API
// 		//Here we set the path where we need upload the image
// 		$target_dir = $_SERVER['DOCUMENT_ROOT'].'/upload/image/'; 
// 		if($_FILES['filetoupload']['name'] != ""){ //Here we set the condition is image is getting passed by $_FILES or not
// 			$image_name = basename($_FILES["filetoupload"]["name"]); //Here getting the base name
            
// 			$target_file = $target_dir . $image_name; //merging/combine the path and image name
// 			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); //finding the extension of the image
// 			if($imageFileType = "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) { //Here we set the validation which type of image we need to upload
// 				$res['data'] = array();
// 				$res['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
// 				$res['status'] = 'fail';
// 			}else{
// 				//every thing is right then only it come to this part here we uploading the image with move uploaded files function.
// 				if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
// 					//storing the image into the database and returning the data in response
// 					$qry2 = mysqli_query($conn,'INSERT into image (id,name) VALUES("","'.$image_name.'")');
// 					$res['data']['image'] = $image_name;
// 					$res['status'] = 'success';
// 					$res['message'] = 'Base64 image uploaded';
// 				}else{
// 					//This is the else part if image is broken or anything
// 					$res['data'] = array();
// 					$res['message'] = "Sorry, there was an error uploading your file.";
// 					$res['status'] = 'fail';
// 				}
// 			}
// 		}else{
// 			//This is the else part if you did not pass the image in parametr.
// 			//Let check the demo
// 			//Thank you for watching. Subscibe to my channel and add into the comment what kind of other php solution you neede. I will make video according to same.
// 			$res['data'] = array();
// 			$res['status'] = 'fail';
// 			$res['message'] = 'Please passed image';
// 		}
// 	break;


// 	default:
// 		$res['data'] = array();
// 		$res['status'] = 'fail';
// 		$res['message'] = 'No event found';
// 		break;
// }
// echo json_encode($res); //all API response send from here

?>