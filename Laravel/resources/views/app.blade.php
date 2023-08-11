<!DOCTYPE html> <!--DOCTYPE宣言-->
<html> <!--html-->
  <head> <!--HP外部に見せる情報-->
    <meta charset='utf-8'> <!--文字コード-->
    <link rel='stylesheet' href='/css/app.css'> <!--app.cssを読み込む-->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!--スマホなどで閲覧した際の表示領域-->
  </head>
  <body> <!--画面に表示する内容-->
    <header> <!--ページトップ-->
      <h1 class='page-header'>掲示板</h1> <!--タイトル-->
    </header>
    @yield('content')
    <footer> <!--ページの最後-->
      <small>Laravel_work</small> <!--一回り小さいテキスト-->
    </footer>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> <!--jquery読み込み-->
  </body>
</html>
