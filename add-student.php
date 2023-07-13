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
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="mx-5">
                    <div class="mb-3">
                        <label for="name" class="form-label h4">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name!" value="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label h4">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email!" value="">
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