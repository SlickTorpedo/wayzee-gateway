<?php

$sitename = htmlspecialchars($_GET['sitename']);

$txt = Name: $sitename\n;

$myfile = fopen("config.txt", "w") or die("Unable to open / generate config file!");
fwrite($myfile, $txt);
fclose($myfile);
?>
