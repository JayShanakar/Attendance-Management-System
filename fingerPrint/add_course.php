<?php require 'dbconnect.php';
$mon_count   = 0;
$tue_count   = 0;
$wed_count   = 0;
$thu_count   = 0;
$fri_count   = 0;


$mon1_start  = ( $_POST['mon_time1_start'] != "" ) ? $_POST['mon_time1_start'] : "\"    \" ";
$mon1_end  = ( $_POST['mon_time1_end'] != "" ) ? $_POST['mon_time1_end'] : "\"    \" ";
$mon2_start  = ( $_POST['mon_time2_start'] != "" ) ? $_POST['mon_time2_start'] : "\"    \" ";
$mon2_end  = ( $_POST['mon_time2_end'] != "" ) ? $_POST['mon_time2_end'] : "\"    \" ";


$tue1_start  = ( $_POST['tue_time1_start'] != "" ) ? $_POST['tue_time1_start'] : "\"    \" ";
$tue1_end  = ( $_POST['tue_time1_end'] != "" ) ? $_POST['tue_time1_end'] : "\"    \" ";
$tue2_start  = ( $_POST['tue_time2_start'] != "" ) ? $_POST['tue_time2_start'] : "\"    \" ";
$tue2_end  = ( $_POST['tue_time2_end'] != "" ) ? $_POST['tue_time2_end'] : "\"    \" ";


$wed1_start  = ( $_POST['wed_time1_start'] != "" ) ? $_POST['wed_time1_start'] : "\"    \" ";
$wed1_end  = ( $_POST['wed_time1_end'] != "" ) ? $_POST['wed_time1_end'] : "\"    \" ";
$wed2_start  = ( $_POST['wed_time2_start'] != "" ) ? $_POST['wed_time2_start'] : "\"    \" ";
$wed2_end  = ( $_POST['wed_time2_end'] != "" ) ? $_POST['wed_time2_end'] : "\"    \" ";


$thu1_start  = ( $_POST['thu_time1_start'] != "" ) ? $_POST['thu_time1_start'] : "\"    \" ";
$thu1_end  = ( $_POST['thu_time1_end'] != "" ) ? $_POST['thu_time1_end'] : "\"    \" ";
$thu2_start  = ( $_POST['thu_time2_start'] != "" ) ? $_POST['thu_time2_start'] : "\"    \" ";
$thu2_end  = ( $_POST['thu_time2_end'] != "" ) ? $_POST['thu_time2_end'] : "\"    \" ";


$fri1_start  = ( $_POST['fri_time1_start'] != "" ) ? $_POST['fri_time1_start'] : "\"    \" ";
$fri1_end  = ( $_POST['fri_time1_end'] != "" ) ? $_POST['fri_time1_end'] : "\"    \" ";
$fri2_start  = ( $_POST['fri_time2_start'] != "" ) ? $_POST['fri_time2_start'] : "\"    \" ";
$fri2_end  = ( $_POST['fri_time2_end'] != "" ) ? $_POST['fri_time2_end'] : "\"    \" ";



$c_id   = $_POST['CourseID'];
$c_nm   = $_POST['Name'];
$fac_id = $_POST['FacultyID'];
$st_dt  = $_POST['StartDate'];
$fn_dt  = $_POST['FinishDate'];

$mon = "Monday";
$tue = "Tuesday";
$wed = "Wednesday";
$thu = "Thursday";
$fri = "Friday";

$query =  "insert ignore into course_schedule values ('$c_id','$mon','$mon1_start','$mon1_end','$mon2_start','$mon2_end','$mon_count')";
//echo $query;
$result = mysql_query($query) or die(mysql_error());

$query =  "insert ignore into course_schedule values ('$c_id','$tue','$tue1_start','$tue1_end','$tue2_start','$tue2_end','$tue_count')";
$result = mysql_query($query) or die(mysql_error());

$query =  "insert ignore into course_schedule values ('$c_id','$wed','$wed1_start','$wed1_end','$wed2_start','$wed2_end','$wed_count')";
$result = mysql_query($query) or die(mysql_error());

$query =  "insert ignore into course_schedule values ('$c_id','$thu','$thu1_start','$thu1_end','$thu2_start','$thu2_end','$thu_count')";
$result = mysql_query($query) or die(mysql_error());

$query =  "insert ignore into course_schedule values ('$c_id','$fri','$fri1_start','$fri1_end','$fri2_start','$fri2_end','$fri_count')";
$result = mysql_query($query) or die(mysql_error());

$query = "insert ignore into course_details values ('$c_nm','$c_id','$fac_id','$st_dt','$fn_dt')";
$result = mysql_query($query) or die(mysql_error());

echo $c_nm . " ( ". $c_id .") has been added ";
    
    


?>
