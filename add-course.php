<?php require_once('./database/connection.php') ?>
<?php
$error = $id = $name = $duration = "";

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $duration = htmlspecialchars($_POST['duration']);



    if (empty($name)) {
        $error = "Enter the name!";
    } elseif (empty($duration)) {
        $error = "Enter the duration!";
    } else { {
            $sql = "INSERT INTO `courses`(`name`, `duration`) VALUES ('$name','$duration')";
            $is_created = $conn->query($sql);
            if ($is_created) {
                $success = 'SuccessFully Added!';
            } else {
                $error = 'failed!';
            }
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
                        <h1 class="h1 mb-3">Add Course</h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="./show-courses.php" class="btn btn-outline-primary">Back</a>
                    </div>
                </div>

                <?php require_once('./includes/alerts.php'); ?>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="mx-5">
                    <div class="mb-3">
                        <label for="name" class="form-label h4">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name!" value="<?php echo $name; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label h4">Duration</label>
                        <input type="text" class="form-control" name="duration" id="duration" placeholder="Enter Course Duration!" value="<?php echo $duration; ?>">
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