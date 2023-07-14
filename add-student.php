<?php require_once('./database/connection.php') ?>

<?php
$error = $name = $email = $roll_no = "";

if (isset($_POST['submit'])) {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $roll_no = htmlspecialchars($_POST['roll_no']);
   

    if (empty($name)) {
        $error = "Enter the name!";
    } elseif (empty($email)) {
        $error = "Enter the email!";
    } elseif (empty($roll_no)) {
        $error = "Enter the Roll.No!";
    } 
     else {
        $sql = "SELECT * FROM `students` WHERE `email` = '$email'";
        $result = $conn->query($sql);

        if($result->num_rows == 0) {
            $sql = "INSERT INTO `students`(`name`, `email`, `roll_no.`) VALUES ('$name','$email','$roll_no')";
            $is_created = $conn->query($sql);
            if($is_created) {
                $success = 'SuccessFully Added!';
            } else {
                $error = 'Roll.No already exists!';
            }
        } else {
            $error = 'Email already exists!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('./includes/head.php'); ?>

<body>
    <div class="wrapper">
        <?php require_once('./includes/sidenavbar.php'); ?>
        <div class="main">
            <?php require_once('./includes/topnavbar.php'); ?>
            <div class="card-body mt-5 mx-5">
                <div class="row mx-5">
                    <div class="col-6">
                        <h1 class="h1 mb-3">Add Student</h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="./show-students.php" class="btn btn-outline-primary">Back</a>
                    </div>
                </div>
                <?php require_once('./includes/alerts.php'); ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="mx-5">
                    <div class="mb-3">
                        <label for="name" class="form-label h4">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name!" value="<?php echo $name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label h4">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email!" value="<?php echo $email; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="roll_no" class="form-label h4">Roll no.</label>
                        <input type="roll_no" class="form-control" name="roll_no" id="roll_no" placeholder="Enter your roll_no!" value="">
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                    </div>
                </form>
            </div>
            <?php require_once('./includes/footer.php'); ?>
        </div>
    </div>
    <script src="assets/js/app.js"></script>
</body>

</html>