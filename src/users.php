<html>
<?php
include "config.php";
$results = 15;
$sql = "select * from users";
$execute = mysqli_query($connection, $sql);
$total_rsults = mysqli_num_rows($execute);
$pages = ceil($total_rsults / $results);
?>

<head>
    <meta charset="utf-8">;
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container mainc">
        <h2>Users <a href="useradd.php"><button class="btn btn-primary addgr">Add user</button></a></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Date Of Birth</th>
                    <th>Group Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
                $first_item = ($page - 1) * $results;
                $sql = "select users.id,login,password,name,surname,date_of_birth,group_name from users inner join groups on users.group_id=groups.id limit " . $first_item . "," . $results;
                $execute = mysqli_query($connection, $sql);
                if (mysqli_num_rows($execute) > 0) {
                    while ($row = mysqli_fetch_array($execute)) {
                ?>
                        <tr>
                            <td><?php echo $row['login'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['surname'] ?></td>
                            <td><?php echo $row['date_of_birth'] ?></td>
                            <td><?php echo $row['group_name'] ?></td>
                            <td><a href="userupdate.php?id=<?php echo $row['id'] ?>" class="btn btn-success bt">Update !</a><a href="userdelete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger bt">Delete !</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
    <div class="container">
        <a href="../index.php" class="btn btn-primary back">Back</a>
        <?php
        for ($page = 1; $page <= $pages; $page++) {
            echo '&nbsp;<a href="users.php?page=' . $page . '" class="btn btn-dark">' . $page . '</a>';
        }
        ?>
    </div>
</body>
<html>
