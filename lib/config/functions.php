<?php 
//let's open up some functions
//so anything that requires it will be used
function CheckDB($username, $conn) {
	global $result;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $username); 
	$query->execute();
	$result = $query->get_result();
	return $result;
}
function CheckLogin($username, $conn) {
	global $result;
	global $get;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $username); 
	$query->execute();
	$get = $query->get_result();
	$result = $get->fetch_assoc();
	return $get;
	return $result;
}
function GetCurrentUser($username, $conn) {
	global $user;
	global $get;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $username); 
	$query->execute();
	$get = $query->get_result();
	$user = $get->fetch_assoc();
	return $get;
	return $user;
}
function GetUserFriend($friend_details1, $conn) {
	global $friend_details2;
	global $get_friend;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $friend_details1); 
	$query->execute();
	$get_friend = $query->get_result();
	$friend_details2 = $get_friend->fetch_assoc();
	return $get_friend;
	return $friend_details2;
}
function GetUserFriend2($friend_details3, $conn) {
	global $friend_details4;
	global $get_friend2;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $friend_details3); 
	$query->execute();
	$get_friend2 = $query->get_result();
	$friend_details4 = $get_friend2->fetch_assoc();
	return $get_friend2;
	return $friend_details4;
}
function InsertUser($username, $password_hashed, $email, $profile_picture, $song, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_users (username, password, email, pfp, song) VALUES (?,?,?,?,?)");
	$query->bind_param("sssii", $username, $password_hashed, $email, $profile_picture, $song); 
	$query->execute();
	return true;
}
function UpdateProfile($username, $status, $bio, $newcss, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET css = ?, bio = ?, status = ? WHERE username = ?");
	$query->bind_param("ssss", $newcss, $bio, $status, $username); 
	$query->execute();
	return true;
}
function UpdateProfilePicture($pfp, $username, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET pfp = ? WHERE username = ?");
	$query->bind_param("is", $pfp, $username); 
	$query->execute();
	return true;
}
function UpdateUsersZeroPFP($pfp_id, $user_pfp, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET pfp = ? WHERE username = ?");
	$query->bind_param("is", $pfp_id, $user_pfp); 
	$query->execute();
	return true;
}
function UpdateUsersZeroSong($song_id, $user_song, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET song = ? WHERE username = ?");
	$query->bind_param("is", $song_id, $user_song); 
	$query->execute();
	return true;
}
function UpdateAudioProfile($song, $username, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET song = ? WHERE username = ?");
	$query->bind_param("is", $song, $username); 
	$query->execute();
	return true;
}
function GetUsers($conn) {
	global $users;
    $users = $conn->query("SELECT * FROM clitorizweb_users");
	return $users;
}
function GetThreads($conn) {
	global $threads;
    $threads = $conn->query("SELECT * FROM clitorizweb_threads");
	return $threads;
}
function GetThreadsFromForumName($forum, $conn) {
	global $threads;
    $query = $conn->prepare("SELECT * FROM clitorizweb_threads WHERE thread_forum = ?");
	$query->bind_param("s", $forum);
	$query->execute();
	$threads = $query->get_result();
	return $threads;
}
function GetRepliesFromThread($thread_name, $conn) {
	global $replies;
    $query = $conn->prepare("SELECT * FROM clitorizweb_replies WHERE post_thread = ?");
	$query->bind_param("i", $thread_name);
	$query->execute();
	$replies = $query->get_result();
	return $replies;
}
function GetRepliesFromThreadName($id, $conn) {
	global $replies;
    $query = $conn->prepare("SELECT * FROM clitorizweb_replies WHERE post_thread = ?");
	$query->bind_param("i", $id);
	$query->execute();
	$replies = $query->get_result();
	return $replies;
}
function GetFriends($friend_name, $friend_status, $conn) {
	global $friend;
	$query = $conn->prepare("SELECT * FROM clitorizweb_friends WHERE buddy1 = ? AND status = ?");
	$query->bind_param("ss", $friend_name, $friend_status); 
	$query->execute();
	$friend = $query->get_result();
	return $friend;
}
function GetFriends2($friend_name, $friend_status, $conn) {
	global $friend2;
	$query = $conn->prepare("SELECT * FROM clitorizweb_friends WHERE buddy2 = ? AND status = ?");
	$query->bind_param("ss", $friend_name, $friend_status); 
	$query->execute();
	$friend2 = $query->get_result();
	return $friend2;
}
function GetFriend($buddy1, $buddy2, $conn) {
	global $user2;
	$query = $conn->prepare("SELECT * FROM clitorizweb_friends WHERE buddy1 = ? AND buddy2 = ? LIMIT 1");
	$query->bind_param("ss", $buddy1, $buddy2); 
	$query->execute();
	$user2 = $query->get_result();
	return $user2;
}
function GetFriend2($buddy1, $buddy2, $conn) {
	global $user3;
	$query = $conn->prepare("SELECT * FROM clitorizweb_friends WHERE buddy1 = ? AND buddy2 = ? LIMIT 1");
	$query->bind_param("ss", $buddy2, $buddy1); 
	$query->execute();
	$user3 = $query->get_result();
	return $user3;
}
function GetFriendRequest($buddy1, $buddy2, $status, $conn) {
	global $user2;
	$query = $conn->prepare("SELECT * FROM clitorizweb_friends WHERE buddy1 = ? AND buddy2 = ? AND status = ?");
	$query->bind_param("sss", $buddy1, $buddy2, $status); 
	$query->execute();
	$user2 = $query->get_result();
	return $user2;
}
function GetFriendRequest2($buddy1, $buddy2, $status, $conn) {
	global $user3;
	$query = $conn->prepare("SELECT * FROM clitorizweb_friends WHERE buddy1 = ? AND buddy2 = ? AND status = ?");
	$query->bind_param("sss", $buddy2, $buddy1, $status); 
	$query->execute();
	$user3 = $query->get_result();
	return $user3;
}
function GetFriendRequest3($buddy1, $buddy2, $status2, $conn) {
	global $user4;
	$query = $conn->prepare("SELECT * FROM clitorizweb_friends WHERE buddy1 = ? AND buddy2 = ? AND status = ?");
	$query->bind_param("sss", $buddy2, $buddy1, $status2); 
	$query->execute();
	$user4 = $query->get_result();
	return $user4;
}
function AddFriend($buddy1, $buddy2, $status, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_friends (buddy1, buddy2, status) VALUES (?,?,?)");
	$query->bind_param("sss", $buddy1, $buddy2, $status); 
	$query->execute();
	return true;
}
function UnFriend($buddy1, $buddy2, $conn) {
	$query = $conn->prepare("DELETE FROM clitorizweb_friends WHERE buddy1 = ? AND buddy2 = ?");
	$query->bind_param("ss", $buddy1, $buddy2); 
	$query->execute();
	return true;
}
function UnFriend2($buddy1, $buddy2, $conn) {
	$query = $conn->prepare("DELETE FROM clitorizweb_friends WHERE buddy1 = ? AND buddy2 = ?");
	$query->bind_param("ss", $buddy2, $buddy1); 
	$query->execute();
	return true;
}
function AcceptFriend($buddy1, $buddy2, $status2, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_friends SET status = ? WHERE buddy1 = ? AND buddy2 = ?");
	$query->bind_param("sss", $status2, $buddy1, $buddy2); 
	$query->execute();
	return true;
}
function CreateThread($title, $text, $author, $forum, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_threads (thread_title, thread_text, thread_author, thread_forum) VALUES (?,?,?,?)");
	$query->bind_param("ssss", $title, $text, $author, $forum); 
	$query->execute();
	return true;
}
function CreateReply($text, $author, $id, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_replies (post_text, post_author, post_thread) VALUES (?,?,?)");
	$query->bind_param("ssi", $text, $author, $id); 
	$query->execute();
	return true;
}
function GetProfile($name, $conn) {
	global $user;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $name); 
	$query->execute();
	$user = $query->get_result();
	return $user;
}
function GetThread($id, $conn) {
	global $thread;
	$query = $conn->prepare("SELECT * FROM clitorizweb_threads WHERE thread_id = ?");
	$query->bind_param("i", $id); 
	$query->execute();
	$thread = $query->get_result();
	return $thread;
}
function GetThreadAuthor($author, $conn) {
	global $thread_author;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $author); 
	$query->execute();
	$thread_author = $query->get_result();
	return $thread_author;
}
function GetPostAuthor($author2, $conn) {
	global $replies_author;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $author2); 
	$query->execute();
	$replies_author = $query->get_result();
	return $replies_author;
}
function DeleteReply($post_id, $conn) {
	$query = $conn->prepare("DELETE FROM clitorizweb_replies WHERE post_id = ?");
	$query->bind_param("i", $post_id); 
	$query->execute();
	return true;
}
?>