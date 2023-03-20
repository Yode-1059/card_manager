<?php include("header.php");
echo '<div id="howto">
    <div id="howtxt">
        <h3 class="mb-2">この画面について</h3>
        <p>テーブルの中身を確認する画面です<br>
            選択メニューがの中に、自分が登録したカードの情報が記載されています<br>
            削除したい場合は削除したい項目を選んで「これを消す」を選択してください<br>
        </form>
        </p>
    </div>
</div>';
?>

<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
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

function listup()
{
    $dbh = dbConect();
    @$t_name = $_POST['t_name'];
    @$u_name = $_POST['u_name'];
    @$psword = $_POST['pass'];
    // $sql = 'SELECT * FROM information_schema.tables WHERE table_name = "' . $u_name . $t_name . $psword . '"';
    $sql = 'SHOW TABLES LIKE "' . $u_name . $t_name . $psword . '"';
    @$stmt = @$dbh->query($sql);
    $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt[0] != NULL) {
        $total = 0;
        $sql = "SELECT * FROM $u_name$t_name$psword WHERE NOT price LIKE '%node%'";
        $stmt = $dbh->query($sql);
        echo '<p class="mb-3">' . $t_name . 'の中身</p>
        <form action="table_clean.php" method="post">
        <input type="hidden" name="t_name" value="' . $t_name . '">
            <input type="hidden" name="pass" value="' . $psword . '">
            <input type="hidden" name="u_name" value="' . $u_name . '">
            <select name="card" class="mb-3 mw-100">';
        foreach ($stmt as $low) {
            $name = $low['c_name'];
            (int) $pri = (int) $low['price'];
            $place = $low['loca'];
            $memo = $low['memo'];
            (int) $total = (int) $total + $pri;
            $vol = $low['vol'];
            echo '<option value="' . $name . '" name="name">';
            echo $name . "　" . $vol . "枚　";
            if ($pri != NULL) {
                echo $pri . "円　";
            }
            if ($place != NULL) {
                echo "場所：" . $place;
            }
            if ($memo != NULL) {
                echo "メモ：" . $memo;
            }
            echo '</option>';
        }
        if ($name == null) {
            echo '</select></form>';
        } else {
            echo '</select><br>
            <p class="mb-3">合計金額：' . $total . '円</p>
            <div class="d-flex justify-content-start">
            <input class="me-4 sub" type="submit" name="リストアップ"  value="これを消す"  id="del">
            <input type="hidden" name="title" value="カード削除｜">
        </form>';
        }


        echo '<form action="table_in.php" method="post">
        <input type="hidden" name="t_name" value="' . $t_name . '">
        <input type="hidden" name="pass" value="' . $psword . '">
        <input type="hidden" name="u_name" value="' . $u_name . '">
        <input type="submit" name="リストアップ"  value="登録に戻る" class="sub">
        <input type="hidden" name="title" value="カード登録｜">
        </form>
        </div>';
    } else {
        echo '<p>そのテーブルは存在しません<br></p>
            <form action="form.php" method="post">
            <input type="hidden" name="pass" value="' . $psword . '">
            <input type="hidden" name="u_name" value="' . $u_name . '">
            <input type="submit" value="ホームへ戻る" class="sub">
            </form>';
    }
}


listup();
?>

<?php
include("footer.php");
?>