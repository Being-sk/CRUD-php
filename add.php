<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
    <title>Add Users</title>
</head>

<body>
    <div class="container p-5">
        <a href="index.php" class="btn btn-outline-primary ">
            Go Home</a> <br /><br />
        <form action="add.php" method="post" name="form1">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Mobile:</label>
                <input type="tel" class="form-control" id="phone" name="mobile">
            </div>
            <input type="submit" class="btn btn-success " name="Submit" value="Add">
        </form>
    </div>

    <?php
    if (isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        //database connection
        include_once('database/config.php');

        $stmt = $conn->prepare("INSERT INTO `users`(`name`,`email`,`mobile`) VALUES(?,?,?)");
        $stmt->bind_param("sss", $name, $email, $mobile);

        if ($stmt->execute()) {
            header('location:index.php');
        } else
            echo "INSERTION failed";
        $conn->close();
    }

    ?>

</body>

</html>