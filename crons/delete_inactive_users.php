<?php

// Définir le contrôleur et la méthode à appeler
$_SERVER['argv'] = ['index.php', 'cli/cron', 'deleteInactiveUsers'];
$_SERVER['argc'] = count($_SERVER['argv']);

// Inclure l'index de CodeIgniter
require_once __DIR__ . '/../index.php';