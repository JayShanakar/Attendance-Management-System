<?php
    session_start();
    include('dbconnect.php');
	$_SESSION['tab1']=" ";
	$_SESSION['percent']="";
    $la=$_SESSION['loginas']= $_POST['loginas'];
    $_SESSION['id']=$id=$_POST['id'];
    $password=$_POST['password'];
    if($_SESSION['loginas']=='Admin')
    {
        $result = mysql_query("select password from admin where id='$id'") or die(mysql_error());
        $row = mysql_fetch_array($result);
	if(($row != NULL) && ($row['password']==$password)) {
            header('Location:adminindex.php');
            $_SESSION['started']=1;
           
        }
        else
        {
            header('Location:index.php?q=invalid');
        }
        
    }
    
    if($_SESSION['loginas']=='Faculty')
    {
        $result = mysql_query("select password from faculty where id='$id'") or die(mysql_error());
        $row = mysql_fetch_array($result);
	if(($row != NULL) && ($row['password']==$password)) {
            header('Location:facindex.php');
            $_SESSION['started']=1;
           
        }
        else
        {
            header('Location:index.php?q=invalid');
        }
        
    }
?>
