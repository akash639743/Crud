<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP IMage Crud</title>
  </head>
  <body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                <h4 class =text-white>PHP Image-crud - Insert image in php</h4>
                </div>
                <div class="card-body">
                    <?php
                    $conn=mysqli_connect("localhost","root","","phptutorials");
                    $query= "SELECT * FROM student";
                    $query_run=mysqli_query($conn,$query);

                    ?>

                   <table class="table">
                       <thead>
                       <tr>
                               <th>ID</th>
                               <th>Stud Name</th>
                               <th>Stud Class</th>
                               <th>Stud Phone</th>
                               <th>Image</th>
                               <th>Edit</th>
                               <th>Delete</th>
                               
                           </tr>

                       </thead>
                       <tbody>
                           <?php
                            if(mysqli_num_rows($query_run)>0){
                                foreach($query_run as $row)
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo$row['id']; ?></td>
                                        <td><?php echo$row['stud_name']; ?></td>
                                        <td><?php echo$row['stud_class']; ?></td>
                                        <td><?php echo$row['stud_phone']; ?></td>
                                        <td>
                                            <img src="<?php echo "upload/".$row['stud_image']; ?>" width="100px" alt="image">
                                        </td>
                                        <td>
                                            <a href="edit.php?id=<?php echo$row['id'];?>" class= "btn btn-info">Edit</a>
                                        </td>
                                        <td>
                                            <!-- <a href="" class= "btn btn-danger">Delete</a> -->
                                        <form action="code.php" method="post">
                                        <input type="hidden" name="delete.id" value="<?php echo $row['id'];?>">
                                        <input type="hidden" name="del_stud_image" value="<?php echo $row['stud_image'];?>">
                                        <button type="submit" name="delete_stud_image" class="btn btn-danger">Delete</button>

                                        </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                

                                ?>
                                    <tr>
                                        <td>No Record data</td>
                                    </tr>
                                <?php
                            }
                           ?>
                           
                           
                       </tbody>
                   </table>

                </div>
            </div>
        </div>
    </div>
</div>

   
 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>