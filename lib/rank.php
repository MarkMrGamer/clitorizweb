<?php 
switch(true) {
	case $custom_stars < 0: 
		break;
	case $custom_stars == 1: 
	    echo "<img src=\"../images/star.png\"><br>";
		break;
	case $custom_stars == 2: 
	    echo "<img src=\"../images/star.png\"><img src=\"../images/star.png\"><br>";
		break;
	case $custom_stars == 3: 
	    echo "<img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><br>";
		break;
	case $custom_stars == 4: 
	    echo "<img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><br>";
		break;
	case $custom_stars == 5: 
	    echo "<img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><br>";
		break;
}

switch(true) {
	// Custom Rank
	case $custom_rank != NULL:
	    echo "<font size=\"1\" class=\"Profile\"><b>".$custom_rank."</b>";
		break;
	// New Member
	case $counter_posts < 25 AND $custom_rank == NULL:
	    echo "<font size=\"1\" class=\"Profile\"><b>New Member</b>";
		break;
	// Freshman Member
	case $counter_posts < 100 AND $custom_rank == NULL:
	    echo "<img src=\"../images/star.png\"><br>
         <font size=\"1\" class=\"Profile\"><b>Freshman Member</b>";
		break;
	// Sophomore Member
	case $counter_posts < 250 AND $custom_rank == NULL:
	    echo "<img src=\"../images/star.png\"><img src=\"../images/star.png\"><br>
         <font size=\"1\" class=\"Profile\"><b>Freshman Member</b>";
		break;
    // Regular Member
	case $counter_posts < 500 AND $custom_rank == NULL:
	    echo "<img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><br>
         <font size=\"1\" class=\"Profile\"><b>Regular Member</b>";
		break;
	// Established Member
	case $counter_posts < 1000 AND $custom_rank == NULL:
	    echo "<img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><br>
         <font size=\"1\" class=\"Profile\"><b>Established Member</b>";
		break;
	// Senior Member
	case $counter_posts < 5000 AND $custom_rank == NULL:
	    echo "<img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><br>
         <font size=\"1\" class=\"Profile\"><b>Senior Member</b>";
		break;
	// Veteran Member
	case $counter_posts > 5000 AND $custom_rank == NULL:
	    echo "<img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><img src=\"../images/star.png\"><br>
         <font size=\"1\" class=\"Profile\"><b>Veteran Member</b>";
		break;
}
?>