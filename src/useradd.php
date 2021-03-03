<?php
//adding new user
include "config.php";
if (isset($_POST['submit'])) {
    $uname = strtoupper($_POST['uname']);
    $usurname = strtoupper($_POST['usurname']);
    $ulogin = strtoupper($_POST['ulogin']);
    $upassword = $_POST['password'];
    $date = $_POST['date'];
    $grcode = $_POST['grcode'];

    $sql = "insert into users (login,password,name,surname,date_of_birth,group_id) values ('" . $ulogin . "','" . $upassword . "','" . $uname . "','" . $usurname . "','" . $date . "','" . $grcode . "')";
    $execute = mysqli_query($connection, $sql);
    if ($execute == TRUE) {
?>
        <script>
            alert("Added new user to database !");
            window.location.replace("users.php")
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
    <title>Add user!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h3>Add user</h3>
        <form method="POST" action="">
            <h6>Login</h6>
            <input type="text" name="ulogin" id="ulogin" required><br>
            <h6>Password</h6>
            <input type="password" name="password" id="password" required><br>
            <h6>Name</h6>
            <input type="text" name="uname" id="uname" required><br>
            <h6>Surname</h6>
            <input type="text" name="usurname" id="usurname" required><br>
            <h6>Date of birth</h6>
            <input type="date" name="date" id="date" required><br>
            <h6>Group Code</h6>
            <select name="grcode">
                <?php
                $sql = "select * from groups";
                $execute = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_array($execute)) {
                    echo '<option value="' . $row['id'] . '">' . $row['group_name'] . '</option>';
                }
                ?>
            </select><br><br>
            <input type="submit" class="btn btn-success" name="submit" value="Apply">
            <button type="reset" class="btn btn-danger">Cancel</button>
            <a href="users.php" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
<hmtl>