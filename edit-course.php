<?php require_once('./database/connection.php') ?>
<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo 'good to go';
}
$id = "";

$sql = "SELECT * FROM `courses` WHERE `id` = $id";
$result = $conn->query($sql);
$course = $result->fetch_assoc();

$name = $course['name'];
$duration = $course['duration'];

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $duration = htmlspecialchars($_POST['duration']);

    if (empty($name)) {
        $error = "Enter course name!";
    } elseif (empty($duration)) {
        $error = "Enter course duration!";
    } else {
        $sql = "UPDATE `courses` SET `name` = '$name', `duration` = '$duration' WHERE `id` = $id";
        if ($conn->query($sql)) {
            $success = "SuccessFully Edit!";
        } else {
            $error = "Failed to Edit!";
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
                        <h1 class="h1 mb-3">Edit Course</h1>
                    </div>
                    <div class="col-6 text-end">
                        <a href="./show-courses.php" class="btn btn-outline-primary">Back</a>
                    </div>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label h4">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name!" value="">
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label h4">Duration</label>
                        <input type="text" class="form-control" name="duration" id="duration" placeholder="Enter Course Duration!" value="">
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