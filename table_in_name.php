<?php include("header.php"); ?>
<div id="howto">
    <div id="howtxt">
        <h3 class="mb-2">この画面について</h3>
        <p>カードの検索結果です。<br>
            登録したいカードを選択して「決定」を押してください</p>
    </div>
</div>
<?php
function dbConect()
{
    $dsn = 'mysql:host=//host.lan;dbname=//dbname';
    $user = '//user';
    $pass = '//pass';

    try {
        $dbh = new PDO($dsn, $user, $pass);

        // echo'接続<br>';

    } catch (PDOException $e) {

        exit();
    }
    return $dbh;
}

function input($c_id)
{
    $dbh = dbConect();
    $sql = "SELECT * FROM `c_list` WHERE c_name LIKE '%$c_id%'";
    $stmt = $dbh->query($sql);
    echo 'カード名を選択してください<br>
        <form method="post" action="table_in_name_.php">
        <select name="c_name">
        <option hidden>選択してください</option>';
    foreach ($stmt as $low) {
        $c_name = $low['c_name'];
        echo '<option value="' . $c_name . '">';
        echo $c_name;
        echo '</option>';
    }
}

@$t_name = $_POST['t_name'];
@$c_name = $_POST['c_name'];
@$c_vol = $_POST['vol'];
@$c_loca = $_POST['loca'];
@$u_name = $_POST['u_name'];
@$psword = $_POST['pass'];
@$price = $_POST['price'];
@$memo = $_POST['memo'];
input($c_name);
echo '</select>
            <input type="submit" value="決定" class="sub">
            <input type="hidden" name="pass" value="' . $psword . '">
            <input type="hidden" name="u_name" value="' . $u_name . '">
            <input value="' . $c_vol . '" name="vol" type="hidden">
            <input value="' . $t_name . '" name="t_name" type="hidden">
            <input value="' . $lc_oca . '" name="loca" type="hidden">
            <input type="hidden" name="memo" value="' . $memo . '">
            <input type="hidden" name="price" value="' . $price . '">
            </form>
            <form action="table_in.php" method="post">
        <input type="hidden" name="t_name" value="' . $t_name . '">
        <input type="hidden" name="pass" value="' . $psword . '">
        <input type="hidden" name="u_name" value="' . $u_name . '">
        <input type="submit" name="リストアップ"  value="登録に戻る" class="sub">
        </form>';
include("footer.php");
?>