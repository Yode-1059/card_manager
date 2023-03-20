<?php include("header.php"); ?>
<div class="lform">
    <h3 class="mb-3">ようこそ　カード管理アプリへ</h3>

    <form action="form.php" method="post" class="c_form">
        <h4 class="mt-2">ログイン</h4>
        <p>ユーザー名*<br><input type="text" name="u_name" required></p>
        <p>パスワード*<br><input type="password" name="pass" required></p>
        <input type="hidden" name="state" value="already">
        <p><input type="submit" value="ログイン" class="sub"></p>
    </form>

    <form action="form.php" method="post" class="c_form">
        <h4 class="mt-2">ユーザー作成</h4>
        <p>ユーザー名*<br><input type="text" name="u_name" required></p>
        <p>パスワード*<br><input type="password" name="pass" required></p>
        <input type="hidden" name="state" value="not">
        <p><input type="submit" value="作成" class="sub"></p>
    </form>
    <form action="howto.php" method="post">
        <p><input type="submit" value="このサイトについて" class="sub"></p>
    </form>
</div>
<div id="howto">
    <div id="howtxt">
        <h3 class="mb-2">この画面について</h3>
        <p>ログイン・ユーザー作成画面です<br>
            ユーザー名とパスワードの入力をしてログインしてくだい<br>
            新規ユーザーはユーザー名とパスワードを登録してください<br>
            パスワードを忘れてしまった場合は”このサイトについて”に記載されているメアドまでお願いします<br>
        </p>
    </div>
</div>
<?php include("footer.php"); ?>