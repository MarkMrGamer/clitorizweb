<?php
switch($counter) {
	case 0:
	   break;
	case 1:
	   echo "Not a image.";
	   break;
	case 2:
	   echo "Images files (PNG, GIF, JPG, JPEG) are only allowed.";
	   break;
	case 3:
	   echo "Please upload an image.";
	   break;
	case 4:
	   echo "Not an audio.";
	   break;
	case 5:
	   echo "Audio files (MP3, WAV, OGG, FLAC) are only allowed.";
	   break;
	case 6:
	   echo "Please upload an audio.";
	   break;
	case 7:
	   echo "Please upload a video.";
	   break;
	case 8:
	   echo "Video files (MP4) are only allowed.";
	   break;
	case 9:
	   echo "Successfully cleared profile picture!";
	   break;
	case 10:
	   echo "Successfully cleared audio profile!";
	   break;
	case 11:
	   echo "Successfully cleared video profile!";
	   break;
}
?>