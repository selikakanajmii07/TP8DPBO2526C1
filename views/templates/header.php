<?php $currentFlash=take_flash(); ?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($pageTitle ?? 'Lecturer Management') ?></title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar">
  <a class="brand" href="?page=lecturers">Lecturer Management</a>
  <div class="navlinks"><a href="?page=lecturers">Data Dosen</a><a href="?page=departments">Department</a></div>
</nav>
<main class="container">
<?php if ($currentFlash): ?><div class="alert <?= e($currentFlash['type']) ?>"><?= e($currentFlash['message']) ?></div><?php endif; ?>
