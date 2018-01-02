

<!DOCTYPE html>
<html>
<head></head>
<?php
include ('./website-master/rait/connect.php');
include ('./website-master/rait/folder_bs4_links.php');
//include ('./website-master/rait/folder_navbar.php');
session_start();
//initialize variables
$id =0;
$title="";
$img_desc="";
$img="";
$edit_state = false;

//connect to database
$conn = mysqli_connect('localhost','root','Babli@123','rait');
   if(!$conn){ die ("connection failed:".mysqli_connect_error()); }
    echo "Connected successfully";
 
// if save button is clicked
if(isset($_POST['save'])){
    //$id =$_POST['id'];
    $title=$_POST['title'];
    $img_desc =$_POST['img_desc'];
    $image =$_POST['img'];

    $query = "INSERT INTO facilities (title,img_desc,img) VALUES('$title',
    '$img_desc','$img')";
    mysqli_query($conn,$query);
    //messsage 
    $_SESSION['msg'] = "Record Saved";

    //redirecting to facility page after inserting.
    header ('location: facilities_dynamic.php'); 
     }
       
 //update records
 if(isset($_POST['update'])){
            //$id = mysql_real_escape_string($_POST['id']);
            //$title = mysql_real_escape_string($_POST['title']);
            //$img_desc = mysql_real_escape_string($_POST['img_desc']);
            //$img= mysql_real_escape_string($_POST['img']);
           
            mysqli_query($conn,"UPDATE facilities SET title='$title', img_desc='$img_desc', img='$img' where id=$id ");
            
             $_SESSION['msg'] = "Record updated";
              header ('location:facilities_dynamic.php');

         }

         //delete records
         if(isset($_GET['delete'])){
          $id = $_GET['delete'];
          mysqli_query($conn,"DELETE FrOM facilities where id=$id");
           $_SESSION['msg'] = "Record deleted";
              header ('location: facilities_dynamic.php');
         }
          
        //retrieve records
           $results = mysqli_query($conn, "SELECT * FROM facilities");
       
?>        
</html>

