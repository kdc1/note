
<?php
session_cache_limiter('');
session_start();
//DB접속을 위해 불러옴
require_once('conn.php');
//사용자가 유저리스트에 있는지 체크
$stid =mysqli_real_escape_string($conn, $_POST['student_id']);
$sql = "SELECT * FROM `userlist` WHERE `stdent_id` = '{$stid}'";
$LoginResult = mysqli_query($conn, $sql);
//존재하나 안하나 조건문사용해서 알아보자
if($LoginResult->num_rows > 0){
//존재한다면 유저리스트 테이블에서 id값을 알아낸다.
$row = mysqli_fetch_assoc($LoginResult);
$UserID = $row['id'];
}else {
  //존재하지 않는다면 학번을 유저리스트에 추가 후 id를 알아낸다.
  $sql = "INSERT INTO userlist (id, stdent_id) VALUES(NULL, '{$stid}');";
  $LoginResult = mysqli_query($conn, $sql);
  $UserID = mysqli_insert_id($conn);
}

//세션에 아이디값을 넣어보자
$_SESSION['id'] = $UserID;
//사용자를 노트로 보낸다
header('Location: note.php');

?>
