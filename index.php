<?php session_start();
include('dbcon.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>php pdo crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">

                
                <?php if(isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php 
                    unset($_SESSION['message']);
                    endif; 
                ?>

                    <div class="card">
                    <div class="card-header" style="display:flex;">
                        <h3>Insert data into databese using pdo</h3>
                        <a href="student-add.php" class="btn btn-primary" style="margin-left: auto;">add student</a>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>ID</th>
                                    <th>FullName</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM students";
                                $statement = $conn->prepare($query);

                                $statement->execute();

                                $result = $statement->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC);
                                if ($result) 
                                {
                                    foreach($result as $row)
                                    {
                                        ?>
                                        <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['fullname']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['phone']; ?></td>
                                        <td><?= $row['course']; ?></td>
                                        <td>
                                            <a href="student-edit.php?id=<?= $row['id']; ?>" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <form action="code.php" method="POST">
                                            <button type="submit" name="delete_student" value="<?=$row['id'];?>" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        
                                        </tr>   
                                        <?php
                                    }
                                }
                                else 
                                {
                                    ?>
                                    <tr>
                                    <td colspan="5">No Record Found</td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
