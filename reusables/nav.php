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

<nav class="navbar navbar-expand-lg" style="background-color: #343a40;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color: #4adf17;">LMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if (is_admin()): ?>
        <li class="nav-item">
          <a class="nav-link" href="add.php" style="color: white;">Add Game</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" style="color: white;">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<style>
  .navbar-nav .nav-link {
    color: white;
  }
  
  .navbar-nav .nav-link:hover {
    color: #4adf17;
  }

  .navbar-brand:hover {
    color: #4adf17;
  }
</style>
