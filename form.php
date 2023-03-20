<?php include("header.php");

function dbConect()
{
    $dsn = 'mysql:host=//host.lan;dbname=//dbname';
    $user = '//user';
    $pass = '//pass';

    try {
        $dbh = new PDO($dsn, $user, $pass);
    } catch (PDOException $e) {

        exit();
    }
    return $dbh;
}
@$u_name = $_POST['u_name'];
@$psword = $_POST['pass'];
@$state = $_POST['state'];

if ($state == 'not') {
    $sql = 'INSERT INTO `user_info` (`user`, `pass`) VALUES ("' . $u_name . '", "' . $psword . '")';
    $dbh = dbConect();
    $dbh->query($sql);
}
$dbh = dbConect();
$sql = 'SELECT * FROM `user_info` WHERE `user`="' . $u_name . '" AND `pass`="' . $psword . '"';
$stmt = $dbh->query($sql);
$che = null;
foreach ($stmt as $low) {
    @$che = $low['user'];
}

if ($che == $u_name) {
    if ($state == 'already') {
        echo '<p>こんにちは　' . $u_name . 'さん</p>';
    }
    @$u_name = $_POST['u_name'];
    @$psword = $_POST['pass'];
    echo '<div class="lform"><form action="table_create.php" method="post" class="c_form">
    <h3>新しいテーブルを作る</h3>

    <p>作りたいテーブル名<br><input type="text" name="table_name" required="required"></p>
    <input type="hidden" name="u_name" value=' . $u_name . '>
    <input type="hidden" name="pass" value=' . $psword . '>
    <input type="submit" value="作る" class="sub">
    <input type="hidden" name="title" value="カード登録｜">
    </p>
</form>
<form action="table_listup.php" method="post" class="c_form">
    <h3>テーブルの確認</h3>
    <p>見たいテーブル<br><input type="text" name="t_name" required="required"></p>
    <input type="hidden" name="u_name" value=' . $u_name . '>
    <input type="hidden" name="pass" value=' . $psword . '>
    <input type="submit" value="表示" class="sub">
    <input type="hidden" name="title" value="内容の確認｜">
    </p>
</form>
<form action="table_breake.php" method="post" class="c_form">
    <h3>テーブルの解体</h3>
    <p>壊したいテーブル名<br><input type="text" name="table_name" required="required"></p>
        <input type="hidden" name="u_name" value=' . $u_name . '>
    <input type="hidden" name="pass" value=' . $psword . '>
    <input type="submit" value="解体する" class="sub" id="del">
    <input type="hidden" name="title" value="テーブル解体｜">
</form>
<form action="./">
    <input type="submit" value="ログアウト" class="sub">
</form>
</div>
';
} else {
    echo '<p>パスワードかユーザー名が間違っています</p>
            <form action="./">
            <input type="submit" value="入力に戻る">
        </form>';
}
?>
<div id="howto">
    <div id="howtxt">
        <h3 class="mb-2">この画面について</h3>
        <p>テーブルの作成・確認・削除というプロセスを行うことができます<br>
            「テーブル」は、”カードを置く場所”という認識でお願いします<br>
            「新しいテーブルを作る」にて、任意の名前のテーブルを作成できます<br>
            「テーブルの確認」にて、その中身の確認、編集が行えます<br>
            「テーブルの解体」にて、そのテーブルを打ち壊すことができます<br>
            ※このサイトに警告文・巻き戻し機能は存在しません。注意して使ってください
        </p>
    </div>
</div>
<?php include("footer.php"); ?>