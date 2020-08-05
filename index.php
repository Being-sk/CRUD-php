<?php
//database connection
include_once('database/config.php');

//fetch array
$result = $conn->query("SELECT * FROM users ORDER BY id DESC");

?>


<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>


    <title>Homepage</title>
</head>

<body>
    <div class="container p-5">
        <a href="add.php" class='btn btn-primary'>Add New User</a><br /><br />

        <table width='80%' border=1 class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Update</th>
                </tr>
            </thead>
            <?php
            while ($user = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $user['name'] . "</td>";
                echo "<td>" . $user['mobile'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
                echo "<td><a class='btn btn-warning' href='edit.php?id=$user[id]'>Edit</a> &nbsp; <a href='delete.php?id=$user[id]' class='btn btn-danger'>Delete</a></td></tr>";
            }

            $conn->close();
            ?>

        </table>
    </div>
</body>

</html>