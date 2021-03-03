<?php
include "config.php";
$u_id = $_GET['id'];
//updating existing record
if (isset($_POST['submit'])) {
    $new_name = strtoupper($_POST['uname']);
    $new_surname = strtoupper($_POST['usurname']);
    $new_login = strtoupper($_POST['ulogin']);
    $new_password = strtoupper($_POST['password']);
    $new_group = $_POST['grcode'];
    $new_date = $_POST['date'];
    $new_id = $_POST['lol'];
    $sql = "update users set id='" . $new_id . "',login='" . $new_login . "',name='" . $new_name . "',surname='" . $new_surname . "',date_of_birth='" . $new_date . "',group_id='" . $new_group . "' where id='" . $u_id . "'";
    $execute = mysqli_query($connection, $sql);
    if ($execute == TRUE) {
?>
        <script>
            alert("Updated one record in data base!");
            window.location.replace("users.php")
        </script>
    <?php
    } else {
        echo "Error : " . $sql . " - " . $connection->error;
    }
}

//getting default values from database
if (isset($_GET['id'])) {
    $uid = $_GET['id'];
    $sql = "select * from users where id='" . $uid . "'";
    $execute = mysqli_query($connection, $sql);
    if (mysqli_num_rows($execute) > 0) {
        while ($row = mysqli_fetch_assoc($execute)) {
            $login = $row['login'];
            $password = $row['password'];
            $name = $row['name'];
            $surname = $row['surname'];
            $date = $row['date_of_birth'];
            $gr_id = $row['group_id'];
        }
    ?>
        <html>

        <head>
            <meta charset="utf-8">;
            <title>Modify group</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        </head>

        <body>
            <div class="container">
                <h3>Modify selected user !</h3>
                <form method="POST" action="">
                    <h6>Id</h6>
                    <input type="number" name="lol" id="lol" value="<?php echo $uid ?>"><br>
                    <h6>Login</h6>
                    <input type="text" name="ulogin" id="ulogin" value="<?php echo $login ?>"><br>
                    <h6>Password</h6>
                    <input type="password" name="password" id="password" value="<?php echo $password ?>"><br>
                    <h6>Name</h6>
                    <input type="text" name="uname" id="uname" value="<?php echo $name ?>"><br>
                    <h6>Surname</h6>
                    <input type="text" name="usurname" id="usurname" value="<?php echo $surname ?>"><br>
                    <h6>Date of birth</h6>
                    <input type="date" name="date" id="date" value="<?php echo $date ?>"><br>
                    <h6>Group</h6>
                    <select name="grcode">
                        <?php
                        $sql = "select * from groups";
                        $execute = mysqli_query($connection, $sql);
                        while ($row = mysqli_fetch_array($execute)) {
                        ?>
                            <option <?php if ($gr_id == $row['id']) {
                                        echo 'checked';
                                    } ?> value="<?php echo $row['id'] ?>"><?php echo $row['group_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select><br><br>
                    <input type="submit" class="btn btn-success" name="submit" value="Apply">
                    <button type="reset" class="btn btn-danger">Cancel</button>
                    <a href="users.php" class="btn btn-primary">Back</a>
                </form>
            </div>
    <?php
    }
}
    ?>
        </body>

        </html>