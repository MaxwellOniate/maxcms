<?php include('includes/header.php'); ?>

<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <?php


      if (isset($_POST['submit'])) {
        $search = $_POST['search'];

        $query = $con->prepare("SELECT * FROM posts WHERE post_tags LIKE :search");
        $query->execute([
          ':search' => '%' . $search . '%'
        ]);

        if ($query->rowCount() == 0) {
          echo '<h1>No Results</h1>';
        } else {
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      ?>
            <!-- Blog Post -->
            <h2>
              <a href="#"><?php echo $row['post_title'] ?></a>
            </h2>
            <p class="lead">
              by <a href="index.php"><?php echo $row['post_author']; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['post_date']; ?></p>
            <hr>
            <img class="img-responsive" src="assets/img/<?php echo $row['post_image']; ?>" alt="">
            <hr>
            <p><?php echo $row['post_content']; ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
      <?php
          }
        }
      }
      ?>



    </div>

    <!-- Blog Sidebar Widgets Column -->
    <?php include('includes/sidebar.php'); ?>

  </div>
  <!-- /.row -->

  <hr>

  <?php include('includes/footer.php'); ?>