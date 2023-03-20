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

function input($user, $table, $ps, $c_id, $vol, $loca, $pri, $me)
{
    $dbh = dbConect();
    $sql = "INSERT INTO $user$table$ps(`c_name`, `vol`, `pack`,`loca`,`price`,`memo`) VALUES ('$c_id',$vol,'','$loca',$pri,'$me')";
    $stmt = $dbh->query($sql);
    echo '<p>' . $c_id . 'を登録しました</p>';
}

@$t_name = $_POST['t_name'];
@$cd_name = $_POST['c_name'];
@$c_vol = $_POST['vol'];
@$c_loca = $_POST['loca'];
@$u_name = $_POST['u_name'];
@$psword = $_POST['pass'];
@$price = $_POST['price'];
@$memo = $_POST['memo'];

input($u_name, $t_name, $psword, $cd_name, $c_vol, $c_loca, $price, $memo);
?>

<?php
include("input.php");
include("footer.php");
?>