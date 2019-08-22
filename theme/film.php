<?php 
require_once dirname(__DIR__, 1) . "/theme/search.php";

$search_url = null;

if(!empty($_REQUEST["search"])){
    $search = $_REQUEST["search"];
    $search_url = "http://".$_SERVER["HTTP_HOST"]. "/index.php?search=" . $search;
}

if(!empty($_COOKIE) && !empty($_ENV)){
echo "<div class='film'>";
$filmName = $_COOKIE->title;
$film = rawurlencode($filmName);
$portada = "http://".$_SERVER["HTTP_HOST"]. "/theme/img/poster/" . $film. ".jpg";
echo "<img class='portada' src=".$portada." />";

$charNumb = count($_ENV);
echo "<div class='info'>";
echo "<p>Title: ".$_COOKIE->title."</p>";
echo "<p>Date: ".$_COOKIE->release_date."</p>";
echo "<p>Episode: ".$_COOKIE->episode_id."</p>";
echo "<p>Director: ".$_COOKIE->director."</p>";
echo "<p>Producer: ".$_COOKIE->producer."</p>";
echo "<p>Characters:</p>";
echo "<ul>";
    for ($i = 0; $i < $charNumb; $i++) {
        echo "<li>".$_ENV[$i]."</li>";

    }
echo "</ul></div></div>";
}

else if(!empty($_REQUEST["search"]) && strpos($search_url, $_REQUEST["search"])){
    throw404();
}
?>