<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
          .content-container {
        max-width: 100%; 
        margin: 0; 
        padding: 0; 
    }
    
    body {
        margin: 0; 
        display: flex;
        justify-content: center;
       
    background-image: url("MidTermReq/bg.png");
    background-size: cover; 
    background-repeat: no-repeat; 
    background-attachment: fixed;
}


        form {
            background-color: #FCF8FF;
            padding: 20px;
        }

        .custom-button {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        #delete, #edit {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        #round {
            height: 10px;
        }

        table {
            background-color: #FCF8FF;
            padding: 20px;
            width: 100%;
        }
        .custom-rounded {
            border-radius: 20px;
        }
      
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Y6yymIvR6vZYq1cIwJphfXnYrr3IMBkEOm5mzVa8SeFez3B" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>
<body style="background-image: url('bg.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 20px;">
    <div class="content-container ">
        <div class="container mx-2 custom-rounded p-3" >
            <h1 class="mb-3 mt-4">Contact Organizer</h1>
            
                <div class=" mb-3 ">
                    <form action="create.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 ">
                            <div id="round" name="imgholder" class="mb-3"></div>
                            <label for="picture" class="form-label"><b> Picture</b></label>
                            <input type="file" class="form-control" id="picture" name="picture" accept="image/jpeg, image/jpg, image/png" required>
                        </div>
                        <div class="mb-3">
                            <label for="firstname" class="form-label"> <b>First Name</b></label>
                            <input type="text" class="form-control" id="firstname" name="firstname" pattern="[A-Za-z]+" title="Please enter a valid first name (letters only)" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label"><b>Last Name</b></label>
                            <input type="text" class="form-control" id="lastname" name="lastname" pattern="[A-Za-z]+" title="Please enter a valid last name (letters only)" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label"><b>Address</b></label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Sex</b></label><br>
                            <input type="radio" id="male" name="sex" value="Male" required>
                            <label for="male">Male</label><br>
                            <input type="radio" id="female" name="sex" value="Female">
                            <label for= "female">Female</label><br>
                            <input type="radio" id="other" name="sex" value="Other">
                            <label for="other">Other</label><br>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label"> <b>Mobile Number</b></label>
                            <input type="number" class="form-control" id="mobile" name="mobile" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><b>Email Address</b></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="add">Add Contact</button>
                        </div>
                    </form>
                </div> 
                
                
                <br><br><br>
                <div class="">
                <table id="myTable" class="display">
    <thead>
        <tr>
            <th>USER ID</th>
            <th>FIRSTNAME</th>
            <th>LASTNAME</th>
            <th>ADDRESS</th>
            <th>SEX</th>
            <th>MOBILE NUMBER</th>
            <th>EMAIL ADDRESS</th>
            <th>PICTURE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
    <?php
    require 'config.php';
    $stmt = "SELECT * FROM contactorganizer";
    $container = $conn->query($stmt);
    while ($data = $container->fetch_assoc()) {
    ?>
        <tr>
            <td><?php echo $data['userID'] ?></td>
            <td><?php echo $data['firstName'] ?></td>
            <td><?php echo $data['lastName'] ?></td>
            <td><?php echo $data['address'] ?></td>
            <td><?php echo $data['sex'] ?></td>
            <td><?php echo $data['mobileNum'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td>
                <img src="../MidTermReq/images/<?php echo $data['image']; ?>" height="100px" alt="Picture">
            </td>
            <td>
                <?php
                echo '<a href="edit.php?id=' . $data['userID'] . '"> <button class="btn btn-success " id="edit">Edit</button></a>';
                echo '<a href="delete.php?id=' . $data['userID'] . '"><button class="btn btn-danger " id="delete">Delete</button></a>';
                ?>
            </td>
        </tr>
    <?php
    }
    $container->free_result();
    $conn->close();
    ?>
    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(function(){
            $("#myTable").DataTable();
        });
    </script>
</body>
</html>
