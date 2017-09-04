<!Doctype html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <form class="" action="write_process.php" method="post" autocomplete="off">

      <p> 노트</p>
      <p>제목</p>
      <p><input type="text" name="title" value=""></p>
      <p>내용</p>
      <p><textarea rows="5"  cols="30" name="contents"></textarea></p>
      <p>html 입력기(브라우저에서 실행됨)</p>
      <p><textarea name="img" rows="1" cols="30" id="description" ></textarea></p>
      <input type="hidden" role="uploadcare-uploader"
       data-crop="disabled"
       data-images-only="true" />
      <input type="submit" name="write" value="작성">
    </form>
    <h3>샌드 애니웨어 이용해보기</h3>
    <script src="https://send-anywhere.com/widgets/platform.js" async defer></script>
    <div class="sa-plugin" data-type="send-receive" data-width="224" data-height="430"></div>
    <script>
  UPLOADCARE_LOCALE = "en";
  UPLOADCARE_TABS = "file url facebook gdrive gphotos dropbox instagram evernote flickr skydrive";
  UPLOADCARE_PUBLIC_KEY = "273ae988e8c6dc7d91b1";
</script>
<script charset="utf-8" src="//ucarecdn.com/libs/widget/2.10.3/uploadcare.full.min.js"></script>
<script>
    //role의 값이 uploadcare-uploader인 태그를 업로드 위젯으로 만들어라.
    var singleWidget = uploadcare.SingleWidget('[role=uploadcare-uploader]');
    //그 위젯을 통해서 업로드가 끝났을 때
    singleWidget.onUploadComplete(function(info){
      //id값이 description인 태그의 값 뒤에 업로드한 이미지 파일의 주소를 이미지 태그화 함께 첨부하라.
      document.getElementById('description').value = document.getElementById('description').value+'<img src="'+info.cdnUrl+'"/>';
    });
  </script>
  </body>
</html>
