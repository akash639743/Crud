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
                <div class="card-header">
                <h4>PHP Image-crud - Insert image in php</h4>
                </div>
                <div class="card-body">
                <?php
                if(isset($_SESSION['status']) && $_SESSION !="")
                {
                    ?>
                    
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                
                <form action="code.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
      <label >Student Name</label>
      <input type="text" required class="form-control" placeholder="Enter name" name="stud_name">
    </div>
    <div class="form-group">
      <label >Student Class</label>
      <input type="text" required class="form-control"  placeholder="Enter class" name="stud_class">
    </div>
    <div class="form-group">
      <label>Student Phone Number</label>
      <input type="text" required class="form-control"  placeholder="Enter Number" name="stud_phone">
    </div>
    <div class="form-group">
      <label>Student Image</label>
      <input type="file" required accept="image/" class="form-control"  name="stud_image">
    </div>
  
    
    <div class="form-group">
      
      <button type="submit" class="btn btn-primary"  name="save_stud_image">Submit-Save</button>
    </div>
  </form>
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