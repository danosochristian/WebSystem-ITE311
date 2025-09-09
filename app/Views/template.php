<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'My CI Project') ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Poppins", sans-serif;
            color: #212529;
        }

        /* Navbar */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #eaeaea;
        }
        .navbar-brand {
            font-weight: 600;
            font-size: 1.4rem;
            color: #0d6efd !important;
        }
        .nav-link {
            color: #495057 !important;
            margin: 0 8px;
            transition: color 0.2s ease;
        }
        .nav-link:hover {
            color: #0d6efd !important;
        }
        .nav-link.active {
            color: #0d6efd !important;
            font-weight: 600;
        }

        /* Content container */
        .main-container {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<?php $session = session(); ?>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="<?= site_url('/') ?>">DANOSO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link <?= uri_string() == '' ? 'active' : '' ?>" href="<?= site_url('/') ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= uri_string() == 'about' ? 'active' : '' ?>" href="<?= site_url('about') ?>">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= uri_string() == 'contact' ? 'active' : '' ?>" href="<?= site_url('contact') ?>">Contact</a>
        </li>

        <?php if (!$session->get('isLoggedIn')): ?>
            <!-- Guest links -->
            <li class="nav-item">
              <a class="nav-link <?= uri_string() == 'login' ? 'active' : '' ?>" href="<?= site_url('login') ?>">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= uri_string() == 'register' ? 'active' : '' ?>" href="<?= site_url('register') ?>">Register</a>
            </li>
        <?php else: ?>
            <!-- Logged-in user: only Dashboard -->
            <li class="nav-item">
              <a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="<?= site_url('dashboard') ?>">Dashboard</a>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Content -->
<div class="container my-5">
    <div class="main-container">
        <?= $this->renderSection('content') ?>
    </div>
</div>

</body>
</html>
