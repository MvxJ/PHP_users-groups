<?php
include "config.php";
$gr_id = $_GET['id'];
//updating existing record
if (isset($_POST['submit'])) {
    $new_name = strtoupper($_POST['name']);
    $sql = "update groups set group_name='" . $new_name . "' where id='" . $gr_id . "'";
    $execute = mysqli_query($connection, $sql);
    if ($execute == TRUE) {
?>
        <script>
            alert("Updated one record in data base!");
            window.location.replace("groups.php")
        </script>
    <?php
    } else {
        echo "Error : " . $sql . " - " . $connection->error;
    }
}

//getting default values from database
if (isset($_GET['id'])) {
    $gr_id = $_GET['id'];
    $sql = "select * from groups where id='" . $gr_id . "'";
    $execute = mysqli_query($connection, $sql);
    if (mysqli_num_rows($execute) > 0) {
        while ($row = mysqli_fetch_assoc($execute)) {
            $group_name = $row['group_name'];
            $group_code = $row['group_id'];
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
                <h3>Modify selected group !</h3>
                <form method="POST" action="">
                    <h5>Group name</h5>
                    <input type="text" value="<?php echo $group_name ?>" name="name"><br><br>
                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
                    <input type="reset" class="btn btn-danger" name="reset" value="Reset">
                    <a href="groups.php"><input type="button" class="btn btn-primary" name="back" value="Back"></a>
                </form>
            </div>
    <?php
    }
}
    ?>
        </body>

        </html>
