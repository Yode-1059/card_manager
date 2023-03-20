<?php
include("header.php");
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

function c_list($user, $l_name, $ps)
{
    $dbh = dbConect();
    $sql = "CREATE TABLE $user$l_name$ps(
        c_name varchar(100),
        vol INT(3),
        pack varchar(30),
        loca varchar(200),
        price varchar(6),
        memo varchar(200)
        )";
    $dbh->query($sql);

    $sql = "INSERT INTO $user$l_name$ps(`c_name`, `vol`, `pack`,`loca`,`price`,`memo`) VALUES ('node',16,'node','node','node','node')";
    $dbh->query($sql);
    global $l_name;
}
@$u_name = $_POST['u_name'];
@$psword = $_POST['pass'];
@$t_name = $_POST['table_name'];
c_list($u_name, $t_name, $psword);
echo "<p>テーブル：" . $t_name . "を作成しました</p>";
include("input.php");
include("footer.php"); ?>