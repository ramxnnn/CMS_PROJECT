<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

if (!function_exists('is_admin')) {
    function is_admin() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
}
?>

<nav class="navbar navbar-expand-lg" style="background: linear-gradient(to right, #111, #222, #444);">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="color: #00ff00; font-size: 1.8rem; font-weight: bold; text-shadow: 2px 2px 10px rgba(0, 255, 0, 0.6);">Gamer Central</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" style="color: #fff; font-size: 1.1rem;">Home</a>
        </li>
        <?php if (is_admin()): ?>
        <li class="nav-item">
          <a class="nav-link" href="add.php" style="color: #ffbb33; font-size: 1.1rem;">Add Game</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" style="color: #ff5050; font-size: 1.1rem;">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  .navbar-nav .nav-link {
    color: #fff;
    font-size: 1.1rem;
    transition: color 0.3s ease;
  }
  
  .navbar-nav .nav-link:hover {
    color: #00ff00; 
  }


  .navbar-brand:hover {
    color: #ffbb33; 
    text-shadow: 2px 2px 15px rgba(255, 187, 51, 0.8); 
  }


  .navbar-nav .nav-link.active {
    color: #ffbb33;
    font-weight: bold;
    text-decoration: underline;
  }


  .navbar {
    background: linear-gradient(to right, #111, #222, #444);
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.8);
  }
  

  .navbar-nav {
    margin-left: auto;
  }


  .navbar-toggler-icon {
    background-color: #00ff00;
  }
</style>
