<?php
//Yo embeds

$replacements = ['/(http(s)?:\/\/.*\.(?:png|jpg|gif))/i', '@\[bold\]([\s\w^(.*)-/:-?´{-çÇ~!"^_`\[\]]+)\[/bold\]@i','"(?<!src=[\"\'])(http(s)?://\S+)"'];
$patterns = ['<img src="$1">','<b>$1</b>','<a href="$1">$1</a>']; 
echo preg_replace($replacements, $patterns, $post);
?>