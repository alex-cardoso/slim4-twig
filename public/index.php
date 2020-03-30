<?php
session_start();

require "../vendor/autoload.php";

// Helpers
use src\helpers\TwigGlobalVariables;

// Global Variables
TwigGlobalVariables::setVariable('logged', $_SESSION['logged'] ?? null);
TwigGlobalVariables::setVariable('user', $_SESSION['user'] ?? null);

require "../src/routes/routes.php";