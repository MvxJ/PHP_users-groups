<html>
<?php
include "config.php";
$sql = "select * from groups";
$execute = mysqli_query($connection, $sql);
$total_results = mysqli_num_rows($execute);
$results = 15;
$pages = ceil($total_results / $results);
?>

<head>
    <meta charset="utf-8">;
    <title>Groups</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container mainc">
        <h2>Groups <a href="groupadd.php"><button class="btn btn-primary addgr">Add group</button></a></h2>
        <table class="gr table">
            <thead>
                <tr>
                    <th>Group Name</th>
                    <th>Group Code</th>
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
                $sql = "select * from groups limit " . $first_item . "," . $results;
                $execute = mysqli_query($connection, $sql);
                if (mysqli_num_rows($execute) > 0) {
                    while ($row = mysqli_fetch_array($execute)) {
                ?>
                        <tr>
                            <td><?php echo $row['group_name'] ?></td>
                            <td><?php echo $row['group_id'] ?></td>
                            <td><a href="groupupdate.php?id=<?php echo $row['id'] ?>" class="btn btn-success bt">Update !</a><a href="groupdelete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger bt">Delete !</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <a href="../index.php"><button class="btn btn-primary back">Back</button></a>
        <?php
        for ($page = 1; $page < $pages; $page++) {
            echo '<a href="groups.php?page=' . $page . '" class="btn btn-dark">' . $page . '</a>';
        }
        ?>

    </div>
</body>
<html>