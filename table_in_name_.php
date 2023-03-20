<?php
include("header.php");
ini_set("display_errors", 'On');
error_reporting(E_ALL);
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
    $sql = "SELECT * FROM `c_list` WHERE c_name='$c_id'";
    $stmt = $dbh->query($sql);
    foreach ($stmt as $low) {
        $c_name = $low['c_name'];
        $c_no = $low['pack'];
        $sql = "SELECT * FROM `$user$table$ps` WHERE c_name='$c_name'";
        $stmt = $dbh->query($sql);
        $che = null;
        foreach ($stmt as $low) {
            @$che = $low['c_name'];
        }
        if ($c_name == $che) {
            $olivol = 0;
            $sql = "SELECT * FROM `$user$table$ps` WHERE c_name='$c_name'";
            $stmt = $dbh->query($sql);
            foreach ($stmt as $low) {
                @$olivol = $low['vol'];
                @$c_name = $low['c_name'];
                $vol += $olivol;
                $sql = "UPDATE $user$table$ps SET `vol`=$vol WHERE `c_name`='$c_name'";
                $dbh->query($sql);
                $sql = "UPDATE $user$table$ps SET `price`=$pri WHERE `c_name`='$c_name'";
                $dbh->query($sql);
                echo '<p>' . $c_name . 'の枚数を追加しました</p>';
                break;
            }
        } else {
            $sql = "INSERT INTO $user$table$ps(`c_name`, `vol`, `pack`,`loca`,`price`,`memo`) VALUES ('$c_name',$vol,'$c_no','$loca','$pri','$me')";

            $stmt = $dbh->query($sql);
            if ($c_id != NULL) {
                echo '<p>' . $c_name . 'を登録しました</p>';
            }
        }
        break;
    }
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
?>
<?php include("footer.php") ?>