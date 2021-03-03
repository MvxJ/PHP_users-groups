<html>
<?php
include "src/config.php";
?>

<head>
    <meta charset="utf-8">;
    <title>Select mode</title>
    <link rel="stylesheet" type="text/css" href="src/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm column1">
                <h3>Users</h3>
                <?php
                $sql = "select * from users";
                $execute = mysqli_query($connection, $sql);
                $numberofrows = mysqli_num_rows($execute);
                echo "<p>" . $numberofrows . " users existing in our system.</p>";
                ?>
                <img src="src/image/user.png" class="mainimg"><br>
                <a href="src/users.php"><button class="btn btn-primary btn1">More</button></a>
            </div>
            <div class="col-sm column2">
                <h3>Groups</h3>
                <?php
                $sql = "select group_name from groups";
                $execute = mysqli_query($connection, $sql);
                $numberofrows = mysqli_num_rows($execute);
                echo "<p>" . $numberofrows . " groups existing in our system.</p>";
                ?>
                <img src="src/image/group.png" class="mainimg"><br>
                <a href="src/groups.php"><button class="btn btn-primary btn1">More</button></a>
            </div>
        </div>
    </div>
</body>

</html>