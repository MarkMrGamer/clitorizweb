<?php
//Yo embeds

$replacements = ['/(http(s)?:\/\/.*\.(?:png|jpg|gif))/i', '@\[bold\]([\s\w^(.*)]+)\[/bold\]@i'];
$patterns = ['<img src="$1">','<b>$1</b>']; 
echo preg_replace($replacements, $patterns, $post);
?>