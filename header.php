<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <meta name="description" content="「デュエル・マスターズ」のカードを管理するWebアプリです。使い方を読んでから使ってください。">
    <link rel="icon" href="./img/4502.png">
    <script src="./script.js" defer></script>

    <title>
        <?php $title = $_POST["title"];
        echo $title; ?>カード管理
    </title>
</head>
<style>
@charset "UTF-8";
@import url('https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap');

* {
    z-index: 10;
}

input {
    margin: 5px 0 10px;
    font-size: 14px;
}

input[type="submit"] {
    border: 1px #767676 solid;
    border-radius: 0.25rem;
}

body {
    font-family: 'M PLUS Rounded 1c', sans-serif;
    position: relative;
}

p {
    font-size: 14px;
}

.form {
    margin: 0 15px 20px 15px;
    text-align: center;
    border: 4px solid #000;
    border-radius: 10px;
    padding: 20px;
}

.active {
    display: block;
    opacity: 1;
    z-index: 99999;
}

#howto {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 0;
    opacity: 0;
    transition: 0.5s;
    color: white;
    text-align: center;
    z-index: 9999999;
}

#howtxt {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    line-height: 1.8em;
}

.sub {
    border: 2px solid #000;
    border-radius: 0;
    background: #fff;
    font-size: 16px;
    padding-left: 20px;
    padding-right: 20px;
    text-align: center;
}

.sub:hover {
    color: #fff;
    background: #000;
}

.lform {
    text-align: center;
}

.c_form {
    border: 4px solid #000;
    border-radius: 10px;
    padding: 10px;
    margin: auto auto 20px auto;
    text-align: center;
    max-width: 400px;
}
</style>

<body class="">
    <header class="py-3 bg-secondary mb-4 text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>カード管理</h1>
            <form action="howto.php" method="post">
                <?php
                @$t_name = $_POST['t_name'];
                @$u_name = $_POST['u_name'];
                @$psword = $_POST['pass'];
                echo '<input type="hidden" name="t_name" value="' . $t_name . '">
                <input type="hidden" name="pass" value="' . $psword . '">
                <input type="hidden" name="u_name" value="' . $u_name . '">' ?>
                <input type="hidden" name="title" value="このサイトの使い方｜">
                <input class="sub" type="hidden" value="このサイトの使い方" class="rounded-pill">
            </form>
            <button id="start" class="sub">このページの説明</button>
        </div>
    </header>
    <div class="container">