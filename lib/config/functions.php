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
function GetCurrentUser2($username, $conn) {
	global $user1;
	global $get1;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $username); 
	$query->execute();
	$get1 = $query->get_result();
	$user1 = $get1->fetch_assoc();
	return $get1;
	return $user1;
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
function InsertUser($username, $password_hashed, $email, $profile_picture, $song, $video, $ip, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_users (username, password, email, pfp, song, video, ip) VALUES (?,?,?,?,?,?,?)");
	$query->bind_param("sssiiis", $username, $password_hashed, $email, $profile_picture, $song, $video, $ip); 
	$query->execute();
	return true;
}
function AddBadge($badge_name, $newfile2, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_badges (badge_name, badge_pic) VALUES (?,?)");
	$query->bind_param("ss", $badge_name, $newfile2); 
	$query->execute();
	return true;
}
function ReportUser($report_username, $reason, $short_desc, $username, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_reports (report_name, report_reason, report_description, user_reporter) VALUES (?,?,?,?)");
	$query->bind_param("ssss", $report_username, $reason, $short_desc, $username); 
	$query->execute();
	return true;
}
function AddBan($ban_username, $ban_date, $ban_note, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_bans (ban_date, ban_note, ban_username) VALUES (?,?,?)");
	$query->bind_param("sss", $ban_date, $ban_note, $ban_username); 
	$query->execute();
	return true;
}
function AddComment($username, $comment, $user, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_comments (comment_username, comment_description, comment_profile) VALUES (?,?,?)");
	$query->bind_param("sss", $username, $comment, $user); 
	$query->execute();
	return true;
}
function UpdateProfile($nickname, $username, $status, $bio, $newcss, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET css = ?, bio = ?, status = ?, nickname = ? WHERE username = ?");
	$query->bind_param("sssss", $newcss, $bio, $status, $nickname, $username); 
	$query->execute();
	return true;
}
function UpdateBanner($banner, $username, $conn) {
    $query = $conn->prepare("UPDATE clitorizweb_users SET banner = ? WHERE username = ?");
    $query->bind_param("is", $banner, $username); 
    $query->execute();
    return true;
}
function ChangeBan($ban_username, $ban, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET isbanned = ? WHERE username = ?");
	$query->bind_param("ss", $ban, $ban_username); 
	$query->execute();
	return true;
}
function ChangePassword($hash, $name, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET password = ? WHERE username = ?");
	$query->bind_param("ss", $hash, $name); 
	$query->execute();
	return true;
}
function UpdateRank($username, $badge, $custom_rank, $custom_stars_converter, $custom_badge, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET badge = ?, custom_rank = ?, custom_stars = ?, custom_badge = ? WHERE username = ?");
	$query->bind_param("ssiss", $badge, $custom_rank, $custom_stars_converter, $custom_badge, $username); 
	$query->execute();
	return true;
}
function UpdateRank2($username, $badge, $custom_rank, $custom_stars, $custom_badge, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET badge = ?, custom_rank = ?, custom_stars = ?, custom_badge = ? WHERE username = ?");
	$query->bind_param("ssiss", $badge, $custom_rank, $custom_stars, $custom_badge, $username); 
	$query->execute();
	return true;
}
function AddCooldown($author, $time, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET forum_cooldown = ? WHERE username = ?");
	$query->bind_param("ss", $time, $author); 
	$query->execute();
	return true;
}
function AddCooldown2($username, $time, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET comment_cooldown = ? WHERE username = ?");
	$query->bind_param("ss", $time, $username); 
	$query->execute();
	return true;
}
function PinThread($thread_id, $thread_pin, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_threads SET thread_pinned = ? WHERE thread_id = ?");
	$query->bind_param("si", $thread_pin, $thread_id); 
	$query->execute();
	return true;
}
function LockThread($thread_id, $thread_lock, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_threads SET thread_locked = ? WHERE thread_id = ?");
	$query->bind_param("si", $thread_lock, $thread_id); 
	$query->execute();
	return true;
}
function UnlockThread($thread_id, $thread_lock, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_threads SET thread_locked = ? WHERE thread_id = ?");
	$query->bind_param("si", $thread_lock, $thread_id); 
	$query->execute();
	return true;
}
function UnPinThread($thread_id, $thread_pin, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_threads SET thread_pinned = ? WHERE thread_id = ?");
	$query->bind_param("si", $thread_pin, $thread_id); 
	$query->execute();
	return true;
}
function UpdateUsersZeroPFP($pfp_id, $user_pfp, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET pfp = ? WHERE username = ?");
	$query->bind_param("is", $pfp_id, $user_pfp); 
	$query->execute();
	return true;
}
function UpdateUsersZeroBanner($banner_id, $user_banner, $conn) {
    $query = $conn->prepare("UPDATE clitorizweb_users SET banner = ? WHERE username = ?");
    $query->bind_param("is", $banner_id, $user_banner); 
    $query->execute();
    return true;
}
function UpdateProfilePicture($pfp, $username, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET pfp = ? WHERE username = ?");
	$query->bind_param("is", $pfp, $username); 
	$query->execute();
	return true;
}
function UpdateUsersZeroSong($song_id, $user_song, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET song = ? WHERE username = ?");
	$query->bind_param("is", $song_id, $user_song); 
	$query->execute();
	return true;
}
function UpdateUsersZeroVideo($video_id, $user_video, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET video = ? WHERE username = ?");
	$query->bind_param("is", $video_id, $user_video); 
	$query->execute();
	return true;
}
function UpdateAudioProfile($song, $audioFileType, $username, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET song = ?, audio_file_type = ? WHERE username = ?");
	$query->bind_param("iss", $song, $audioFileType, $username); 
	$query->execute();
	return true;
}
function UpdateVideoProfile($video, $username, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET video = ? WHERE username = ?");
	$query->bind_param("is", $video, $username); 
	$query->execute();
	return true;
}
function AnnounceMessage($announce_text, $announce_bgcolor, $announce_textcolor, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_banner SET bannertext = ?, textcolor = ?, bannercolor = ?");
	$query->bind_param("sss", $announce_text, $announce_bgcolor, $announce_textcolor); 
	$query->execute();
	return true;
}
function UpdateIPLogin($username2, $ip, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET ip = ? WHERE username = ?");
	$query->bind_param("ss", $ip, $username2); 
	$query->execute();
	return true;
}
function GetUsers($isbanned2, $conn) {
	global $users;
    $query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE isbanned = ?");
	$query->bind_param("s", $isbanned2);
	$query->execute();
	$users = $query->get_result();
	return $users;
}
function GetCustomBadges($conn) {
	global $custom_badges;
    $custom_badges = $conn->query("SELECT * FROM clitorizweb_badges");
	return $custom_badges;
}
function GetCustomBadge($custom_badge, $conn) {
	global $get_custom_badge;
    $query = $conn->prepare("SELECT * FROM clitorizweb_badges WHERE badge_name = ?");
	$query->bind_param("s", $custom_badge);
	$query->execute();
	$get_custom_badge = $query->get_result();
	return $get_custom_badge;
}
function GetThreads($conn) {
	global $threads;
    $threads = $conn->query("SELECT * FROM clitorizweb_threads ORDER BY thread_pinned DESC");
	return $threads;
}
function GetThreadsFromForumName($forum, $conn) {
	global $threads;
    $query = $conn->prepare("SELECT * FROM clitorizweb_threads WHERE thread_forum = ? ORDER BY thread_pinned DESC, thread_date DESC");
	$query->bind_param("s", $forum);
	$query->execute();
	$threads = $query->get_result();
	return $threads;
}
function GrabBan($username, $conn) {
	global $bans;
    $query = $conn->prepare("SELECT * FROM clitorizweb_bans WHERE ban_username = ? ORDER BY id DESC");
	$query->bind_param("s", $username);
	$query->execute();
	$bans = $query->get_result();
	return $bans;
}
function GetThreadsFromForumName2($forum2, $conn) {
	global $threads2;
    $query = $conn->prepare("SELECT * FROM clitorizweb_threads WHERE thread_forum = ? ORDER BY thread_pinned DESC");
	$query->bind_param("s", $forum2);
	$query->execute();
	$threads2 = $query->get_result();
	return $threads2;
}
function GetThreadsFromForumName3($forum3, $conn) {
	global $threads3;
    $query = $conn->prepare("SELECT * FROM clitorizweb_threads WHERE thread_forum = ? ORDER BY thread_pinned DESC");
	$query->bind_param("s", $forum3);
	$query->execute();
	$threads3 = $query->get_result();
	return $threads3;
}
function GetReply($id, $conn) {
	global $replies;
    $query = $conn->prepare("SELECT * FROM clitorizweb_replies WHERE post_id = ?");
	$query->bind_param("i", $id);
	$query->execute();
	$replies = $query->get_result();
	return $replies;
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
function GrabReports($reports, $conn) {
	global $reports;
	$query = $conn->prepare("SELECT * FROM clitorizweb_reports ORDER BY id DESC");
	$query->execute();
	$reports = $query->get_result();
	return $reports;
}
function GrabLogs($logs, $conn) {
	global $logs;
	$query = $conn->prepare("SELECT * FROM clitorizweb_logs ORDER BY id DESC");
	$query->execute();
	$logs = $query->get_result();
	return $logs;
}
function AddLog($log_note, $ip, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_logs (log_note, ip) VALUES (?,?)");
	$query->bind_param("ss", $log_note, $ip); 
	$query->execute();
	return true;
}
function GetComment($id, $conn) {
	global $comment;
	$query = $conn->prepare("SELECT * FROM clitorizweb_comments WHERE id = ?");
	$query->bind_param("i", $id); 
	$query->execute();
	$comment = $query->get_result();
	return $comment;
}
function GetThreadAuthor($author, $conn) {
	global $thread_author;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $author); 
	$query->execute();
	$thread_author = $query->get_result();
	return $thread_author;
}
function GetCommentFromName($name, $conn) {
	global $comments;
	$query = $conn->prepare("SELECT * FROM clitorizweb_comments WHERE comment_profile = ? ORDER BY comment_date DESC");
	$query->bind_param("s", $name); 
	$query->execute();
	$comments = $query->get_result();
	return $comments;
}
function GetCommentAuthor($author, $conn) {
	global $comment_author;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $author); 
	$query->execute();
	$comment_author = $query->get_result();
	return $comment_author;
}
function GetPostAuthor($author2, $conn) {
	global $replies_author;
	$query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $author2); 
	$query->execute();
	$replies_author = $query->get_result();
	return $replies_author;
}
function DeleteReply($id, $conn) {
	$query = $conn->prepare("DELETE FROM clitorizweb_replies WHERE post_id = ?");
	$query->bind_param("i", $id); 
	$query->execute();
	return true;
}
function DeleteComment($comment_id, $conn) {
	$query = $conn->prepare("DELETE FROM clitorizweb_comments WHERE id = ?");
	$query->bind_param("i", $comment_id); 
	$query->execute();
	return true;
}
function DeleteRepliesFromThread($thread_id, $conn) {
	$query = $conn->prepare("DELETE FROM clitorizweb_replies WHERE post_thread = ?");
	$query->bind_param("i", $thread_id); 
	$query->execute();
	return true;
}
function DeleteThread($thread_id, $conn) {
	$query = $conn->prepare("DELETE FROM clitorizweb_threads WHERE thread_id = ?");
	$query->bind_param("i", $thread_id); 
	$query->execute();
	return true;
}
function GetThreadFromAuthor($author_name, $conn) {
	global $post_counter;
	$query = $conn->prepare("SELECT * FROM clitorizweb_threads WHERE thread_author = ?");
	$query->bind_param("s", $author_name); 
	$query->execute();
	$post_counter = $query->get_result();
	return $post_counter;
}
function GetRepliesFromAuthor($author_name, $conn) {
	global $post_counter2;
	$query = $conn->prepare("SELECT * FROM clitorizweb_replies WHERE post_author = ?");
	$query->bind_param("s", $author_name); 
	$query->execute();
	$post_counter2 = $query->get_result();
	return $post_counter2;
}
function GrabGroups($groups, $conn) {
	global $groups;
	$query = $conn->prepare("SELECT * FROM clitorizweb_groups ORDER BY id DESC");
	$query->execute();
	$groups = $query->get_result();
	return $groups;
}
function CreateGroup($title, $desc, $picture, $owner, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_groups (group_name, group_owner, group_description, group_photo) VALUES (?,?,?,?)");
	$query->bind_param("ssss", $title, $owner, $desc, $picture); 
	$query->execute();
	return true;
}
function JoinGroup($title, $owner, $conn) {
	$query = $conn->prepare("INSERT INTO clitorizweb_group_users (group_user, group_title) VALUES (?,?)");
	$query->bind_param("ss", $owner, $title); 
	$query->execute();
	return true;
}
function GetUsersFromGroup($group_name1, $conn) {
	global $group_users;
    $query = $conn->prepare("SELECT * FROM clitorizweb_group_users WHERE group_title = ?");
	$query->bind_param("s", $group_name1);
	$query->execute();
	$group_users = $query->get_result();
	return $group_users;
}
function GetGroup($id, $conn) {
	global $group;
	$query = $conn->prepare("SELECT * FROM clitorizweb_groups WHERE id = ?");
	$query->bind_param("i", $id); 
	$query->execute();
	$group = $query->get_result();
	return $group;
}
function ToggleOldHeader($oldheader, $username, $conn) {
    $query = $conn->prepare("UPDATE clitorizweb_users SET old_header = ? WHERE username = ?");
    $query->bind_param("ss", $oldheader, $username); 
    $query->execute();
    return true;
}
function ToggleAutoPlay($autoplay, $username, $conn) {
	$query = $conn->prepare("UPDATE clitorizweb_users SET audio_autoplay = ? WHERE username = ?");
	$query->bind_param("ss", $autoplay, $username); 
	$query->execute();
	return true;
}
function CheckUserInGroup($title, $username, $conn) {
	global $usergroup;
    $query = $conn->prepare("SELECT * FROM clitorizweb_group_users WHERE group_user = ? AND group_title = ?");
	$query->bind_param("ss", $username, $title);
	$query->execute();
	$usergroup = $query->get_result();
	return $usergroup;
}
function LeaveGroup($title, $username, $conn) {
	$query = $conn->prepare("DELETE FROM clitorizweb_group_users WHERE group_user = ? AND group_title = ?");
	$query->bind_param("ss", $username, $title); 
	$query->execute();
	return true;
}
function GetUserDetails($theuser, $conn) {
	global $get_details3;
    $query = $conn->prepare("SELECT * FROM clitorizweb_users WHERE username = ?");
	$query->bind_param("s", $theuser);
	$query->execute();
	$get_details3 = $query->get_result();
	return $get_details3;
}
?>