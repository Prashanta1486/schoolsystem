
<?php
session_start();
if(!isset($_SESSION['username']))
{
          header("location.php");
}
elseif($_SESSION['usertype']=='student')
{
        header("location:login.php"); 
}

$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);
if(isset($_POST['add_teacher']))
{
          $t_name=$_POST['name'];
          $t_description=$_POST['description'];
          $file=$_FILES['image']['name'];

          $dst="./image/".$file;
          $dst_db="image/".$file;
          move_uploaded_file($_FILES['image']['tmp_name'],$dst);
          $sql="INSERT INTO teacher (name,description,image)VALUES ('$t_name','$t_description','$dst_db')";
          $result=mysqli_query($data,$sql);

          if($result)
          {
                    header('location:admin_add_teacher.php');
          }
}

?>












<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Admin Dashboard</title>
          <?php
          include'admin_css.php';
          ?>


<style>
          .div_deg
          {
                background-color:skyblue;
                width: 500px;
                padding-top:70px;
                padding-bottom:70px;
                
          }
</style>
</head>
<body>
<?php
include'admin_sidebar.php';
?>
<div class="content">
       <center>
       <h2><b>Add Teacher</b></h2><br>
       <div class="div_deg">
                 <form action="#" method="POST" enctype="multipart/form-data">
                           <div>
                                     <label for="">Teacher Name:</label>
                                     <input type="text"name="name">
                           </div><br>

                           <div>
                                     <label for="">Description:</label>
                                     <input type="text"name="description">
                           </div><br>

                           <div>
                                     <label for="">Image:</label>
                                     <input type="file"name="image">
                           </div><br>

                           <div>
                                     <input type="submit"class="btn btn-primary"name="add_teacher"
                                     value="Add Teacher"
                                     >
                           </div>
                 </form>
       </div>
       </center>
        
</div>


</body>
</html>