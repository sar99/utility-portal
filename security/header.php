<?php
        require_once("../connect.php");
?>

<nav class="navbar navbar-expand-lg navbar-light " style="margin: 10px;">
  <a class="navbar-brand" href="../" style="font-size: 2.2vh;">IIITM Gwalior Utility Portal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="gatepass.php">Gate Passes</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="out.php">Mark Out</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="in.php">Mark In</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="crowd.php">Is Going to Mess Safe?</a>
      </li>

      <?php 
      if(isset($_SESSION['id']) )
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


