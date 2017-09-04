<!Doctype html>
<html>

  <head>
    <meta charset="utf-8">
    <title>MY REPORT</title>
    <style media="screen">
      form.container{
        width: 70%;
  height: 70%;
  margin: 40px auto;
  background: none;
      }
      .outer {
  display: table;
  width: 100%;
  height: 100%;
}
.inner {
  display: table-cell;
  vertical-align: middle;
  text-align: center;
}
.centered {
  position: relative;
  display: inline-block;

  width: 50%;
  padding: 1em;
  background: white;
  color: blue;
}
input[type="text"]{
  border: 2px solid blue;
  border-bottom: 2px solid blue;
  width: 90%;
  height: 40px;
  font-size: 35px;

}
h1{
  font-size: 700%;
}
input[type="submit"]{
  background-color: blue;
  border: none;
  color: white;
  padding: 8px 16px;
  text-decoration: none;
  margin: 30px 2px;
  cursor: pointer;
  font-size: 25px;
}
    </style>
  </head>
  <body>
    <form class="container" action="login.php" method="post">

      <div class="outer">
        <div class="inner">
          <div class="centered">
            <h1>N</h1>
            <p><input type="text" name="student_id" value="" autocomplete="off" ></p>
            <p><input type="submit" name="login" value="접속" ></p>
          </div>
        </div>

      </div>

    </form>
  </body>
</html>
