<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  // POSTでのアクセスでない場合
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
  $err_msg = '';
  $complete_msg = '';

} else {
  // フォームがサブミットされた場合（POST処理）
  // 入力された値を取得する
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // エラーメッセージ・完了メッセージの用意
  $err_msg = '';
  $complete_msg = '';

  // 空チェック
  if ($name == '' || $email == '' || $subject == '' || $message == '') {
    $err_msg = '全ての項目を入力してください。';
  }

  // エラーなし（全ての項目が入力されている）
  if ($err_msg == '') {
    $to = 'info@pierz-inc.com'; // 管理者のメールアドレスなど送信先を指定
    $headers = "From: " . $email . "\r\n";

    // 本文の最後に名前を追加
    $message .= "\r\n\r\n" . $name;

    // メール送信
    mb_send_mail($to, $subject, $message, $headers);

    // 完了メッセージ
    $complete_msg = '送信されました！';

    // 全てクリア
    $name = '';
    $email = '';
    $subject = '';
    $message = '';
  }

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="content-language" content="ja">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>西池空設株式会社</title>
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="responsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
  <header>
    <div class="container">
      <div class="header-left">
        <img  src="https://store.storeimages.cdn-apple.com/8567/as-images.apple.com/is/category-icon-made-by-apple?wid=150&hei=150&fmt=png-alpha&qlt=80&.v=1526595684706">
        <a  class="top_name" href="index.html#top_name">西池空設株式会社</a>
      </div>
      <div class="header-right">
        <a href="index.html#aboutCompany">会社概要</a>
        <a href="ceoComent.html">代表挨拶</a>
        <a href="performance.html">実積</a>
        <a href="recruit.html">採用</a>
        <a href="contact.php">お問合せ</a>
      </div>
      <div id="header-right-mobile">
        <span class="fa fa-bars" id="menu-icon"></span>
        <div id="menu">
          <a class="menu-btn" href="index.html#aboutCompany">会社概要</a>
          <a class="menu-btn" href="ceoComent.html">代表挨拶</a>
          <a class="menu-btn" href="performance.html">実積</a>
          <a class="menu-btn" href="recruit.html">採用</a>
          <a class="menu-btn" href="contact.php">お問合せ</a>
        </div>

      </div>
    </header>

    <div class="home-top">
      <svg id="2cf77e55-eabf-40f7-b921-9385fa83210e" data-name="wave" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1280 580"><defs><style>.\39 d22e5f0-fbb7-41e6-a962-054a928841ef{fill:url(#9184eca4-4f52-4172-9811-c707abb5fad0);}</style><linearGradient id="9184eca4-4f52-4172-9811-c707abb5fad0" y1="290" x2="1280" y2="290" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#00a8d4"/><stop offset="0.17" stop-color="#00b1cb"/><stop offset="0.31" stop-color="#00bcbf"/><stop offset="0.57" stop-color="#00bfb1"/><stop offset="0.99" stop-color="#00e99e"/></linearGradient></defs><title>home_background</title><path class="9d22e5f0-fbb7-41e6-a962-054a928841ef" d="M1280,431C812,653,412,313,0,580V0H1280Z"/></svg>
      <div class="container">
        <div id="top-copy">
          <h1>お問合せ</h1>
          <h1>CONTACT</h1>
        </div>
      </div>
    </div>


    <div class="home-main">
      <div class="container">
        <div class="contact_copy">
          <p>お問合せフォームは全項目を記入の上</p>
          <p>送信ボタンを押してください。</p>
        </div>
        <div class="contact-form">
          <div class="row">
            <div class="col-xs-offset-4 col-xs-4">

              <?php if ($err_msg != ''): ?>
                <div class="alert alert-danger">
                  <?php echo $err_msg; ?>
                </div>
              <?php endif; ?>

              <?php if ($complete_msg != ''): ?>
                <div class="alert alert-success">
                  <?php echo $complete_msg; ?>
                </div>
              <?php endif; ?>

              <form method="post">
                <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="お名前" value="<?php echo $name; ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="email" placeholder="メールアドレス" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="件名" value="<?php echo $subject; ?>">
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" placeholder="本文"><?php echo $message; ?></textarea>
                </div>
                <button type="submit" class="btn btn-success btn-block">送信</button>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>

      <footer>
        <div class="container">
          <h3 >会社概要</h3>
          <div class="company-map">
            <div id="aboutCompany" class="company">
              <ul>
                <li>会社名　　　西池空設株式会社</li>
                <li>代表取締役　菊地孝明</li>
                <li>設立　　　　2019年9月</li>
                <li>TEL/FAX</li>
                <li>03-6905-9292</li>
                <li>〒173-0025</li>
                <li>東京都板橋区熊野町33-1</li>
              </ul>
            </div>
            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3238.348281999458!2d139.7036843152605!3d35.74224348018019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601892a4863bbb1f%3A0xb0d04418497fd48d!2z44CSMTczLTAwMjUg5p2x5Lqs6YO95p2_5qmL5Yy654aK6YeO55S677yT77yT4oiS77yR!5e0!3m2!1sja!2sjp!4v1585188074667!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
          <h2 class="copyright">Copyright(c) 2020 Nishiike Kuusetsu Co., Ltd All Rights Reserved.</h2>
        </div>
      </footer>

      <script src="script.js"></script>
    </body>
    </html>
  </body>
  </html>
