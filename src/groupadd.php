<?php
//adding new group
include "config.php";
if (isset($_POST['submit'])) {
    $grcode = strtoupper($_POST['grcode']);
    $grname = strtoupper($_POST['grname']);
    $sql = "insert into groups (group_id,group_name) values ('" . $grcode . "','" . $grname . "')";
    $execute = mysqli_query($connection, $sql);
    if ($execute == TRUE) {
?>
        <script>
            alert("Added new group to database !");
            window.location.replace("groups.php")
        </script>
<?php
    } else {
        echo " Error : " . $sql . " = " . $connection->error;
    }
    mysqli_close($connection);
}

?>
<html>

<head>
    <meta charset="utf-8">
    <title>Add group!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3>Add group</h3>
        <form method="POST" action="">
            <h6>Group name</h6>
            <input type="text" name="grname" id="grname" required><br>
            <h6>Group Code</h6>
            <input type="text" name="grcode" id="grcode" required><br>
            2 characters<br>
            <input type="submit" class="btn btn-success" name="submit" value="Apply">
            <button type="reset" class="btn btn-danger">Cancel</button>
            <a href="groups.php" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
<hmtl>