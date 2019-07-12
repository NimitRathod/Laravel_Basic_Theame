<?php
// $title = ucfirst(explode(".",Request::route()->getName())[0]);
$title = explode(".",Request::route()->getName())[0];
echo $title;
?>
