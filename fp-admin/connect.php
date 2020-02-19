<?php
require_once "fp-config.php";
try
{
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
$_SESSION["login_warning"] = "Krytyczny błąd! Spróbuj ponownie później.";
header("Location: index.php");
exit();
}