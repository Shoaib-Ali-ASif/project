<?php require_once('./database/connection.php'); ?>
<?php

if (isset($_POST['submit'])) {
  $id = $_POST['search'];
  $sql = "SELECT * FROM `students` WHERE name LIKE '%$id%'";
  $result = mysqli_query($conn, $sql);
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

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3">Search</h1>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <?php require_once('./includes/alerts.php'); ?>
                  <div class="container">
                    <form method="post">
                      <input type="text" name="search" placeholder="Search student" class="form-control">
                      <button name="submit" class="btn btn-dark mt-2 d-end">Search</button>
                    </form>
                  </div>
                  <div class="container my-5">
                    <table class="table">
                      <?php
                      if (isset($_POST['submit'])) {
                        if ($result) {
                          if (mysqli_num_rows($result) > 0) {
                            echo '<thead>
                                                        <tr>
                                                        <th> ID.</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Roll_no</th>
                                                        </tr>
                                                        </thead>';
                            while ($student = mysqli_fetch_assoc($result)) {
                              echo '<tbody>
                                                        <tr>
                                                        <td>' . $student['id'] . '</td>
                                                        <td>' . $student['name'] . '</td>
                                                        <td>' . $student['email'] . '</td>
                                                        <td>' . $student['roll_no'] . '</td>
                                                        </tr>
                                                        </tbody>';
                            }
                          } else {
                            echo '<h2 class=text-danger>Student Not Found</h2>';
                          }
                        }
                      }
                      ?>
                    </table>
                  </div>

                </div>
                <div class="card-body"></div>
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