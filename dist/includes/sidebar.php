<div class="col-md-4">

  <!-- Blog Search Well -->
  <div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="POST">
      <div class="input-group">
        <input type="text" name="search" class="form-control">
        <span class="input-group-btn">
          <button type="submit" name="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
      <!-- /.input-group -->
    </form> <!-- search form end -->
  </div>

  <!-- Blog Categories Well -->
  <div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
      <div class="col-lg-12">
        <ul class="list-unstyled">

          <?php
          $query = $con->prepare("SELECT * FROM categories");
          $query->execute();
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "
            <li>
              <a href='#'>{$row['cat_title']}</a>
            </li>
            ";
          }
          ?>

        </ul>
      </div>
      <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
  </div>

  <!-- Side Widget Well -->
  <?php include('widget.php'); ?>
</div>