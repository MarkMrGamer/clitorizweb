<?php
//Yo embeds

$replacements = ['/(http(s)?:\/\/.*\.(?:png|jpg|gif))/i', '@\[bold\]([\s\w^(.*)-/:-?´{-çÇ~!"^_`\[\]]+)\[/bold\]@i','/(?<!src="|href=")(http(s):\/\/.*)/i', '/(<a href=")?http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/watch\?v=|\.be\/)([\w\-\_]*)(&(amp;)?‌​[\w\?‌​=]*)?(">)/i','/http(?:s?):\/\/(?:www\.)?youtu(?:be\.com\/watch\?v=|\.be\/)([\w\-\_]*)(&(amp;)?‌​[\w\?‌​=]*)?/i'];
$patterns = ['<img src="$1">','<b>$1</b>','<a href="$1">$1</a>', '<iframe width="303" height="202" src="http://youtube.com/embed/$2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>','']; 
echo preg_replace($replacements, $patterns, $post);
?>