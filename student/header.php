<?php
        require_once("../connect.php");
?>

<nav class="navbar navbar-expand-lg navbar-light " style="margin: 10px;">
  <a class="navbar-brand" href="#" style="font-size: 2.2vh;">IIITM Gwalior Utility Portal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="complaint.php">File a Complaint</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="gatepass.php">Apply for Gate Pass</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="ratemeal.php">Rate Last Meal</a>
      </li>

      <?php 
      if(isset($_SESSION['yr']) && isset($_SESSION['batch']) && isset($_SESSION['roll']) )
      {
          ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log Out</a>
      </li>

      <?php
      }
      else {
      ?>

      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#LoginModal">Login</a>
      </li>

      <?php
      }
      ?>

    </ul>
  </div>
</nav>

<div style="width: 100vw; height: 10px;background-color: #FF3B3F; "></div>
<div style="width: 100vw; height: 10px;background-color: #CAEBF2; "></div>


<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="login.php" method="post">
            <label for="exampleInputPassword1">Roll No.</label>
              <div class="form-inline">
                          <input type="text" class="form-control" id="yr" placeholder=" " style="width: 30%;" name="yr" required=""> -
                          <input type="text" class="form-control" id="batch" placeholder=" " style="width: 30%;" name="batch" required=""> -
                          <input type="text" class="form-control" id="rollno" placeholder=" " style="width: 30%;" name="rollno" required="">
                          <small id="emailHelp" class="form-text text-muted">Enter in format: 20XX-XXX-000</small>

              </div><br>
              <div class="form-group">
                    <label for="Password">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" required="">
              </div>
              <div class="modal-footer">
                     <button type="submit" class="btn btn-secondary"  name="submit" style="background-color: #FF3B3F;">Login</button>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>