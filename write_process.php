<?php
//세션을 켜줘야 한다.
session_cache_limiter('');
session_start();
//DB접속!
require_once('conn.php');
//이상한 함수이다 써보도록 하자
function error($message="", $url="", $url2="")
  {
      if(!$message && !$url)
          return;

      $message=eregi_replace("<br>|<br/>|<br />","\\n",$message);
      $message=str_replace("\"","\\\"",$message);
      if($url=="self.close")
      {
          echo "<script language=\"JavaScript\">\n";
          if($message)
          {
              echo "alert('{$message}');\n";
          }
          echo "self.close();\n";
          if($url2)
          {
              echo "opener.location.href = \"{$url2}\";\n";
          }
          echo "</script>\n";
      }
      else if($url=="history.back")
      {
          echo "<script language=\"JavaScript\">\n";
          if($message)
          {
              echo "alert('{$message}');\n";
          }
          echo "history.back();\n";
          if($url2)
          {
              echo "opener.location.href = \"{$url2}\";\n";
          }
          echo "</script>\n";
      }
      else
      {
          if(!$sented = headers_sent())
              header("Refresh: 0; URL={$url}");
          if($message)
          {
              echo "<script language=\"JavaScript\">\n";
              echo "alert('{$message}');\n";
              if($sented)
                  echo "window.location.href=\"{$url}\";\n";
              echo "</script>\n";
          }
      }
  }
/*
사용방법
Error(Message, Url, Url2);
Message : Alert할 문자열 (줄 구분은 <br>)
Url : 현재 페이지의 이동 주소 혹은 팝업창일 경우 'self.close':닫기, 'history.back':이전페이지
Url2 : 부모창의 이동 주소
*/
$id = $_SESSION['id'];//세션으로 통해 값을 받았다!
if($id){
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['contents']);
$img = mysqli_real_escape_string($conn, $_POST['img']);
$sql = "INSERT INTO notelist (id, title, description, author, created, img) VALUES(NULL,'{$title}', '{$description}', '{$id}', now(), '{$img}');";
//(미완성)author값을 구해야 한다 ???
mysqli_query($conn, $sql);
//등록했으니 note.php로 돌아간다.
header('Location: note.php');
}else {
  Error('로그인 정보가 없어서 저장할 수 없습니다 로그인 해주세요.', 'index.php', write.php);
}

 ?>
