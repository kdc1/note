
<?php
session_cache_limiter('');
session_start();
require_once('conn.php');
?>
 <!Doctype html>
 <html>

   <head>

     <meta charset="utf-8">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="main.css">
   </head>
   <body>
<nav>
  <ul>
    <h1>내 노트</h1>
    <p>
    <input type="button" name="delete" value="로그아웃" onclick="location.href='logout.php'">
    <input type="button" name="write" value="쓰기" onclick="location.href='write.php'">
  </p>
<?php
$id = $_SESSION['id'];//세션으로 통해 값을 받았다!
echo "당신은".$id."번째 이용자입니다. ";//누구인가 primary key 를 표시한다.
$sql = "SELECT * FROM `notelist` WHERE author =".$id;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
  echo '<li><a href="note.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';

}
//기록된 내용을 볼 때  한 창에서 처리할 것이다.

?>
  </ul>
</nav>
  <article>
<?php
  if(empty($_GET['id'])){
    echo "환영합니다! 글을 작성하거나 작성한 글을 열람하세요!";
  }else{
      $sqlcontent = "SELECT * FROM notelist LEFT JOIN userlist ON notelist.author = userlist.id WHERE notelist.id =".$_GET['id'];
      $result = mysqli_query($conn, $sqlcontent);
      $row = mysqli_fetch_assoc($result);
?>
      <h2><?=htmlspecialchars($row['title'])?></h2>
      <h3>생성날짜: <?=htmlspecialchars($row['created'])?></h3>
      <div class="content"><?=nl2br(htmlspecialchars($row['description']))?></div>
      <p><?=$row['img']?></p>
<?php
  }

 ?>
  </article>
   </body>
 </html>
