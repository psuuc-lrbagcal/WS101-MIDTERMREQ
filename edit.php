<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
<style>
     #round {
        max-width: 100px;
        max-height: 100px;
        margin: 0 auto 20px;
        display: block;
        border-radius: 50%; 
        overflow: hidden; 
    }
    .form-label b {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }

        .btn {
            width: 70%;
        }
</style>
</head>
<body style="background-image: url('bg.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 20px;">
<div class="container mt-5" style="background-color: #FCF8FF; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 20px;">
    <?php
    require 'config.php';
    $id=0;
   if(isset($_GET['id'])){
    $id=$_GET['id'];
   }
    $stmt="SELECT * FROM contactorganizer WHERE userID=$id";
    $container=$conn->query($stmt);
    while($data=$container->fetch_assoc()){

    
    
    ?>
 <div class="container mt-2">
        <h1>Edit Contact</h1> <br><br>
        <form action="edit.php" method="POST" enctype="multipart/form-data">
       <b>StudentID</b>  <input type="text" name="id" value="<?php echo $id ?>">
        <div class="mb-3">
            <div id="round" name="imgholder" class="mb-5"></div>
                <label for="picture" class="form-label"><b> Picture</b></label>
                <div id="round" name="imgholder" class="mb-3">
                    <img src="../MidTermReq/images/<?php echo $data['image']; ?>" alt="Profile Picture" height="80px" class="img-fluid rounded-circle">
                </div>
                <input type="file" class="form-control" id="picture" name="picture" accept="image/jpeg, image/jpg, image/png" >
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label"> <b>First Name</b> </label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $data['firstName']; ?>" pattern="[A-Za-z]+" title="Please enter a valid first name (letters only)" required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label"><b>Last Name</b></label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $data['lastName']; ?>" pattern="[A-Za-z]+" title="Please enter a valid last name (letters only)" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label"><b>Address</b></label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $data['address']; ?>"  required>
            </div>
            <div class="mb-3">
                <label class="form-label"><b>Sex</b></label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="male" name="sex" value="Male" <?php if ($data['sex'] == 'Male') echo 'checked'; ?> required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="female" name="sex" value="Female" <?php if ($data['sex'] == 'Female') echo 'checked'; ?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="other" name="sex" value="Other" <?php if ($data['sex'] == 'Other') echo 'checked'; ?>>
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label"><b>Mobile Number</b></label>
                <input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $data['mobileNum']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"><b>Email Address</b></label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="update">Update Contact</button>
            </div>
        </form>
     </div>
        <?php
    }
        ?>
        <?php
        function sanitize($inputData) {
            foreach ($inputData as &$value) {
                $value = trim($value);
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                $value = stripslashes($value);
            }
            return $inputData;
        }
            if(isset($_POST['update'])){
        
        $inputData = array(
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'address' => $_POST['address'],
            'mobile' => $_POST['mobile'],
            'email' => $_POST['email']
        );
        $image=$_FILES['picture']['name'];
        $Imagetype=$_FILES['picture']['type'];
        $Imagesize=$_FILES['picture']['size'];
        $tmp_name=$_FILES['picture']['tmp_name'];
        $sanitizedData = sanitize($inputData);
        
        $id=$_POST['id'];
        $firstname = $sanitizedData['firstname'];
        $lastname = $sanitizedData['lastname'];
        $address = $sanitizedData['address'];
        $sex=$_POST['sex'];
        $Ssex="";
        if($sex=="Male"){
            $Ssex="Male";
        }
        else if($sex=="Female"){
            $Ssex="Female";
            
        }
        else if($sex=="Other"){
            $Ssex="Other";
        }
        $mobile = $sanitizedData['mobile'];
        $email = $sanitizedData['email'];
            require 'config.php';
            if(move_uploaded_file($tmp_name,"../MidTermReq/images/".$image)){
                $stmt = "UPDATE contactorganizer SET image='$image' WHERE userID=$id";
                $container=$conn->query($stmt) or die("Could not perform $stmt");

                
            }
        
$stmt = "UPDATE contactorganizer SET firstName='$firstname', lastName='$lastname', address='$address', sex='$Ssex', mobileNum='$mobile', email='$email' WHERE userID=$id";
                    $container=$conn->query($stmt) or die("Could not perform $stmt");
                    echo "<script>Swal.fire(
                        'Good job!',
                        'The record has been updated!',
                        'success'
                      )</script>";
                      header("Refresh:2;url=index.php");
        
        
            }
          
        ?>
        </div>
</body>
</html>