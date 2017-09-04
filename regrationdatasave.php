<!--

   /*
   * Collect all Details from Angular HTTP Request.
   */ 
//    $link= mysqli_connect('localhost', 'root','');
//    mysqli_select_db($link, 'bloodsystem');
//    $count= mysqli_query($link, "select count(*) from  registration");
//    $postdata = file_get_contents("php://input");
//    $request = json_decode($postdata);
//    $username=$request->username;
//    $gender=$request->gender;
//    $bloodgroup=$request->bloodgroup;
//    $number=$request->number;
//    $weight=$request->weight;
//    $age=$request->age;
//    $city=$request->city;
//    $area=$request->area;   
//    $email = $request->email;
//    $password = $request->password;
//    $result=mysqli_query($link,"insert into registration values('$username','$gender','$age','$weight','$bloodgroup','$email','$number','$city','$area','$password')");
// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
// $count1 = mysqli_num_rows($result);
//  if($count1>$count) {
//       echo $email;
//  } 
// 
// 
// $conn->close();     -->
<?php 
$data = json_decode(file_get_contents("php://input"));  
$username = $data->username;
$gender = $data->gender;
$bloodgroup = $data->bloodgroup;
$number = $data->number;
$weight = $data->weight;
$age = $data->age;
$city = $data->city;
$area = $data->area;
$email = $data->email;
$password = $data->password;
$conn = NEW mysqli("localhost","root","","bloodsystem");
 if($conn->connect_error){
     die("Connection failed");
 }

 $sql = "INSERT INTO registration (name,gender,age,weight,blood_group,email_id,phone,city,location,password) VALUES ('$username', '$gender', '$age', '$weight','$bloodgroup','$email','$number','$city','$area','$password')";
 if($conn->query($sql) == TRUE) {
     echo "inserted succesfully";
 }
 else {
     echo "error ". $conn->error;
 }
 
 $conn->close();


?>

