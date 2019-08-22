<?php 
require_once dirname(__DIR__, 1) . "/functions/search.php";
?>

<div class="search">
<form action="index.php" method="GET">
    <input type="text" name="search" placeholder="Buscar...">
    <input type="submit" value="Buscar">
</form>
</div>

<div class="separator"></div>

<?php include './theme/film.php'?>