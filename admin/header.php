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
        <a class="nav-link" href="recommendation.php">Get Menu Recommendations</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="savefood.php">Save Food</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="gatepass.php">Gate Pass Statuses</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../">Is Going to Mess Safe?</a>
      </li>

      <?php 
      if(isset($_SESSION['adminid']) )
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
            <label for="exampleInputPassword1">Admin ID</label>
              <div class="form-group">
                          <input type="text" class="form-control" id="adminid" placeholder="Enter ID "  name="adminid" required> 

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