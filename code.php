<?php
session_start();
$conn =mysqli_connect("localhost","root","","phptutorials");

if (isset($_POST['save_stud_image'])){
    $name=$_POST['stud_name'];
    $class=$_POST['stud_class'];
    $phone=$_POST['stud_phone'];
    $image=$_FILES['stud_image']['name'];

    $allowed_exttension = array('png','jpg','jpeg');
    $filename=$_FILES['stud_image']['name'];
    $file_extension=pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($file_extension, $allowed_exttension))
    {
        $_SESSION['status']="You are allowed";
        header('loaction: create.php');
    }
    else{
        
        
        if(file_exists("update/" . $_FILES['stud_image']['name']))
        {
            $filename=$_FILES['stud_image']['name'];
            $_SESSION['status']="Image already exists".$filename;
            header('location: create.php');
        }
   else{

 
    $query="INSERT INTO `student`(`stud_name`, `stud_class`, `stud_phone`, `stud_image`) 
    VALUES('$name','$class','$phone','$image')";
    $query_run=mysqli_query($conn,$query);

    if($query_run){

        move_uploaded_file($_FILES["stud_image"]["tmp_name"],"upload/".$_FILES["stud_image"]["name"]);
        $_SESSION['status']='Image stored Successfully';
        header('location: create.php');
    }else{
        $_SESSION['status']="Image not Connect";
        header('location: create.php');
    }

}
}

}

if(isset($_POST['update_stud_image']))
{
    $stud_id=$_POST['stud_id'];
    $name=$_POST['stud_name'];
    $class=$_POST['stud_class'];
    $phone=$_POST['stud_phone'];

    $new_image=$_FILES['stud_image']['name'];
    $old_image=$_FILES['stud_image_old'];
    if($new_image != '')
    {
        $update_filename=$_FILES['stud_image']['name'];
        $_Session['status']="image already exists".$filename;
        header('location: index.php');
    }
    else{
        $update_filename=$old_image;
    }
    if(file_exists("update/" . $_FILES['stud_image']['name']))
    {
        $filename=$_FILES['stud_image']['name'];
        $_SESSION['status']="Image already exists".$filename;
        header('location: index.php');
    }
else{
    $query="UPDATE `student` SET stud_name='$name',stud_class='$class',stud_phone='$phone',stud_image='$update_filename' WHERE id='$stud_id' ";
    $query_run=mysqli_query($conn,$query);
    if($query_run){

     if( $_FILES['stud_image']['name'] !=''){
        move_uploaded_file($_FILES["stud_image"]["tmp_name"],"upload/".$_FILES["stud_image"]["name"]);
        unlink("upload/".$old_image);

     }
     $_SESSION['status']="Updated Successfully" ;
     header('location : index.php');  
    }else{
        $_SESSION['status']="Image not Updated " ;
        header('location : index.php'); 
    }

}

}


if(isset($_POST['delete_stud_image']))
{
    $id=$_POST['delete_id'];
    $stud_image=$_POST['del_stud_image'];

    $query="SELECT FROM student WHERE id='$id";
    $query_run=mysqli_query($conn,$query);
    if($query_run){
        unlink("upload/".$stud_image);
        $_SESSION['status']="Delete Successfully" ;
        header('location : index.php'); 
    }else{
        $_SESSION['status']="not delete Successfully" ;
        header('location : index.php'); 
    }
}

?>