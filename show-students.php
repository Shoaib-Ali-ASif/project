<?php require_once('./database/connection.php') ?>
<?php
$sql = "SELECT * FROM `students`";
$result = $conn->query($sql);
$students = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('./includes/head.php'); ?>

<body>
    <div class="wrapper">

        <?php require_once('./includes/sidenavbar.php'); ?>

        <div class="main">

            <?php require_once('./includes/topnavbar.php'); ?>
            <main class="content mx-5">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="h1 mb-3">Students</h1>
                        </div>
                        <div class="col-6 text-end">
                            <a href="./add-student.php" class="btn btn-outline-primary">Add Student</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <?php
                                        if (count($students) > 0) { ?>
                                            <thead>
                                                <tr>
                                                    <th>Sr. No.</th>
                                                    <th>Name</th>
                                                    <th>Roll.No.</th>
                                                    <th>email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sr = 1;
                                                foreach ($students as $student) { ?>
                                                    <tr>
                                                        <td><?php echo $sr++; ?></td>
                                                        <td><?php echo $student['name'] ?></td>
                                                        <td><?php echo $student['roll_no.'] ?></td>
                                                        <td><?php echo $student['email'] ?></td>
                                                        <td>
                                                            <a href="./edit-student.php?id=<?php echo $student['id']; ?>" class="btn btn-primary">Edit</a>
                                                            <a href="./delete-student.php?id=<?php echo $student['id']; ?>" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        <?php
                                        } else { ?>
                                            <div class="alert alert-danger m-0">No record found!</div>
                                        <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php require_once('./includes/footer.php'); ?>

        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>

</html>