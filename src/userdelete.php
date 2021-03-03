<?php
include "config.php";
$gr_id = $_GET['id'];
$sql = "delete from users where id='" . $gr_id . "'";
$execute = mysqli_query($connection, $sql);
if ($execute == TRUE) {
?>
    <script>
        alert("Deleted one record in data base!");
    </script>
<?php
    include "users.php";
} else {
    echo "Error : " . $sql . " - " . $connection->error;
}
?>
<html>

<head>
    <meta charset="utf-8">;
    <title>Group Delete</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
</body>

</html>