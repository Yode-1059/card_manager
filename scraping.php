<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css">
    <title>Document</title>
</head>

<body>

    <?php
    function dbConect(){
    $dsn ='mysql:host=mysql209.phy.lolipop.lan;dbname=LAA1416052-card';
    $user = 'LAA1416052';
    $pass = 'card';

    try{
        $dbh = new PDO($dsn, $user, $pass);

        // echo'接続<br>';

    }catch (PDOException $e){
        echo'エラー:'.$e->getMessage();
        exit();
    }
    return $dbh;
    }
dbConect();

    //データ挿入
function inInfo(){

    for( $num = 1 ; $num <= 74; $num++ ){
    $dbh =dbConect();
    $i = sprintf('%03d', $num);
    $link ='https://dm.takaratomy.co.jp/card/detail/?id=dm22RP2-'.$i;
    $html = file_get_contents($link);//データを抽出したいURLを入力
    $dom = new DOMDocument('1.0', 'UTF-8');//インスタンス生成
    libxml_use_internal_errors( true );
    $dom->loadHTML($html);//読み込み
    $xpath = new DOMXpath($dom);



    foreach($xpath->query('//th[@class="cardname"]') as $node){

    $name = $node->nodeValue;
    echo $name,'<br>';

    }

    foreach($xpath->query('//td[@class="typetxt"]') as $node){

    $type = $node->nodeValue;

    }

    foreach($xpath->query('//td[@class="civtxt"]') as $node){

    $civ = $node->nodeValue;

    }

    foreach($xpath->query('//td[@class="powertxt"]') as $node){

    $power = $node->nodeValue;
    // echo $power,'<br>';

    }

    foreach($xpath->query('//td[@class="costtxt"]') as $node){

    $cost = $node->nodeValue;
    // echo $cost,'<br>';

    }

    foreach($xpath->query('//td[@class="racetxt"]') as $node){

    $lace = $node->nodeValue;
    // echo $lace,'<br>';

    }

    foreach($xpath->query('//td[@class="abilitytxt"]') as $node){

    $effect = $node->nodeValue;
    // echo $effect,'<br>';

    }

    foreach($xpath->query('//span[@class="packname"]') as $node){

    $pack = $node->nodeValue;
    // echo $pack,'<br>';

    }
      $sql ="INSERT INTO `c_list`(`name`,`civ`, `cost`, `lace`, `type`, `effect`, `power`,`pack`) VALUES ('".$name."','".$civ."','".$cost."','".$lace."','".$type."','".$effect."','".$power."','".$pack."')";
        $dbh->query($sql);
        }
    }
 inInfo();

?>
</body>

</html>