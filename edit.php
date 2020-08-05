<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //database connection
    include_once('database/config.php');

    $stmt = $conn->query("SELECT * FROM  `users` WHERE id = $id");
    $user = $stmt->fetch_assoc();
    $name = $user['name'];
    $email = $user['email'];
    $mobile = $user['mobile'];
}


?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
    <title>Edit User Data</title>
</head>

<body>

    <div class="container p-5">
        <a href="index.php" class="btn btn-outline-primary ">
            Go Home</a> <br /><br />
        <form action="edit.php" method="post" name="form1">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" value="<?php echo $name; ?>" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" value=<?php echo $email; ?>>
            </div>
            <div class="form-group">
                <label for="phone">Mobile:</label>
                <input type="tel" class="form-control" id="phone" name="mobile" value="<?php echo $mobile; ?>">
            </div>

            <input type="hidden" name="id" value=<?php echo $id; ?>>
            <input type="submit" class="btn btn-success " name="update" value="Update">
        </form>
    </div>



    <?php
    if (isset($_POST['update'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $id = $_POST['id'];

        //database connection
        include_once('database/config.php');

        $stmt = $conn->query("UPDATE `users` SET `name` = '$name', `email` = '$email',`mobile`='$mobile' where id = $id");

        if ($stmt) {
            header('location:index.php');
        } else
            echo "Update failed";

        $conn->close();
    }
    ?>

</body>

</html>