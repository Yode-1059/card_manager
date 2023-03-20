<div id="howto">
    <div id="howtxt">
        <h3 class="mb-2">この画面について</h3>
        <p>テーブルに新しいカードを登録できます<br>
            「カード番号で登録」では、[DM22EX1 23/130]といったカードの下にある番号で登録できます。<br>
            「カード名で登録」では、任意のカード名を入力して登録したいカードを検索できます。部分一致可<br>
            「名称で登録」では、任意の名前で登録できます。<br>
            「リストアップ」では、登録したカードの一覧を見ることができます。<br>
            「ホームへ戻る」にて、テーブル作成・確認ページに移行できます。<br>
            ※現在登録されているカードリストは「黄金戦略！デュエキングMAX2022」に収録されているカードのみです。<br>
            カードリストは<a
                href="https://dm.takaratomy.co.jp/card/?v=%7B%22suggest%22:%22on%22,%22keyword_type%22:%5B%22card_name%22,%22card_ruby%22,%22card_text%22%5D,%22culture_cond%22:%5B%22%E5%8D%98%E8%89%B2%22,%22%E5%A4%9A%E8%89%B2%22%5D,%22pagenum%22:%221%22,%22samename%22:%22show%22,%22products%22:%2222ex1%22,%22sort%22:%22release_new%22%7D"
                target="_blank">こちら</a>
        </p>
    </div>
</div>
<div class=" d-flex justify-content-between flex-wrap">
    <form action="table_in.php" method="post" class="form">
        <h3>カード番号で登録</h3>
        <p>カード番号入力<br>
            <input type="text" name="id" required>
        </p>
        <p>枚数<br>
            <input type="number" name="vol" required>
        </p>
        <p>場所<br>
            <input type="text" name="loca">
        </p>
        <p>金額（あれば）<br>
            <input type="text" name="price">
        </p>
        <p>メモ（あれば）<br>
            <input type="text" name="memo">
        </p>
        <input type="hidden" name="title" value="カード登録｜">
        <?php
        echo '<input type="hidden" name="t_name" value="' . $t_name . '">
            <input type="hidden" name="pass" value="' . $psword . '">
            <input type="hidden" name="u_name" value="' . $u_name . '">' ?>
        <p><input type="submit" name="送信" class="sub">
        </p>
    </form>
    <form action="table_in_name.php" method="post" class="form">
        <h3>カード名で登録</h3>
        <p>カード名入力　部分一致可能<br>
            <input type="text" name="c_name" required>
        </p>
        <p>枚数<br>
            <input type="number" name="vol" required>
        </p>
        <p>場所<br>
            <input type="text" name="loca">
        </p>
        <p>金額（あれば）<br>
            <input type="text" name="price">
        </p>
        <p>メモ（あれば）<br>
            <input type="text" name="memo">
        </p>
        <input type="hidden" name="title" value="カード名検索｜">
        <?php
        echo '<input type="hidden" name="t_name" value="' . $t_name . '"><input type="hidden" name="pass" value="' . $psword . '"><input type="hidden" name="u_name" value="' . $u_name . '">' ?>
        <p><input type="submit" name="送信" class="sub">
        </p>
    </form>
    <form action="table_in_not.php" method="post" class="form">
        <h3>名称で登録</h3>
        <p>名称<br>
            <input type="text" name="c_name" required>
        </p>
        <P>個数<br>
            <input type="number" name="vol" required>
        </p>
        <p>場所<br>
            <input type="text" name="loca">
        </p>
        <p>金額（あれば）<br>
            <input type="text" name="price">
        </p>
        <p>メモ（あれば）<br>
            <input type="text" name="memo">
        </p>
        <input type="hidden" name="title" value="カード登録｜">
        <?php
        echo '<input type="hidden" name="t_name" value="' . $t_name . '"><input type="hidden" name="pass" value="' . $psword . '"><input type="hidden" name="u_name" value="' . $u_name . '">' ?>
        <p><input type="submit" name="送信" class="sub">
        </p>
    </form>
    <div class="form">
        <form action="table_listup.php" method="post">
            <?php
            echo '<input type="hidden" name="t_name" value="' . $t_name . '"><input type="hidden" name="pass" value="' . $psword . '"><input type="hidden" name="u_name" value="' . $u_name . '"><h5>現在のテーブル</h5><p>' . $t_name . '</p> '
                ?>
            <input type="hidden" name="title" value="内容の確認｜">
            <br><input type="submit" name="リストアップ" value="リストアップ" class="sub">
        </form>
        <form action="form.php" method="post">
            <input type="submit" value="ホームへ戻る" class="sub">
            <input type="hidden" name="title" value="ホーム｜">
            <?php echo '<input type="hidden" name="pass" value="' . $psword . '">
            <input type="hidden" name="u_name" value="' . $u_name . '">' ?>
        </form>
    </div>
</div>