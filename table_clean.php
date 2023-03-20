<?php
include("header.php"); ?>
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

function crean($table, $card, $name, $ps)
{
    $dbh = dbConect();
    $sql = "DELETE FROM `$name$table$ps` WHERE `c_name` ='$card'";

    $dbh->query($sql);
}

@$t_name = $_POST['t_name'];
@$u_name = $_POST['u_name'];
@$psword = $_POST['pass'];
echo "<p>テーブル：" . $t_name . "の";
$c_name = $_POST['card'];
echo $c_name . "を削除しました</p>";

crean($t_name, $c_name, $u_name, $psword);
include("input.php");
include("footer.php");
?>