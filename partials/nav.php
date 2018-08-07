

<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  <!-- Links -->
  <ul class="navbar-nav ">
    <li class="nav-item">
      <a class="nav-link" href="#">Facebook</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Twiiter</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Instagram</a>
    </li>
    <li class="nav-item">
     <?php 

      if(isset($_SESSION['logged_in_user'])){
      
      echo '<a class="nav-link" href="logout.php">logout</a>';

    } else {
      
      echo '<a class="nav-link" id="loginbtn" href="#">login</a>';
    }
        ?>
    </li>

    <li class="nav-item">
      <a class="nav-link" id="register-button" href="#">Register</a>
    </li>
    </ul>

</nav>