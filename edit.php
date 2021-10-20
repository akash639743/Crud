<?php


?>


<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP CRUD</title>
  </head>
  <body>
    
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning">
                <h4>PHP Image-crud - Edit data and Image</h4>
                </div>
                <div class="card-body">
               <?php
                $conn = mysqli_connect("localhost","root","","phptutorials");
                $id = $_GET['id'];
                $query="SELECT * FROM student WHERE id='$id' ";
                $query_run=mysqli_query($conn,$query);
                if(mysqli_num_rows($query_run)>0)
                {
                    foreach($query_run as $row)
                    {
                       ?>
<form action="code.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="stud_id" value="<?php echo $row['id']; ?>"/>
  <div class="form-group">
      <label >Student Name</label>
      <input type="text" required value="<?php echo $row['stud_name'];?>"class="form-control" placeholder="Enter name" name="stud_name">
    </div>
    <div class="form-group">
      <label >Student Class</label>
      <input type="text" required class="form-control"  value="<?php echo $row['stud_class'];?>" placeholder="Enter class" name="stud_class">
    </div>
    <div class="form-group">
      <label>Student Phone Number</label>
      <input type="text" required class="form-control"  value="<?php echo $row['stud_phone'];?>" placeholder="Enter Number" name="stud_phone">
    </div>
    <div class="form-group">
      <label>Student Image</label>
      <input type="file" accept="image/" class="form-control"  name="stud_image">
      <input type="hidden" name="stud_image_old" value="<?php echo $row['stud_image'];?>">
    </div>
  <img src="<?php echo "update/".$row['stud_image']; ?>" width="100px">
    
    <div class="form-group">
      
      <button type="submit" class="btn btn-primary"  name="update_stud_image">Update</button>
    </div>
  </form>
                       <?php
                    }
                }else{
                    echo "No record";
                }
               
               
               ?>
                

                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" ></script>
    
  </body>
</html>