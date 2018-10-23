<?php
    // 取得列表
    if (isset($_POST["list"]))
    {
        $list = htmlspecialchars($_POST["list"]);
    }
    else
    {
        $list = "";
    }
 
    // 取得數量
    if (isset($_POST["qty"]))
    {
        $qty = htmlspecialchars($_POST["qty"]);
    }
    else
    {
        $qty = 0;
    }
 
    // 抽籤
    srand((double)microtime() * 1000000);
    $lots = explode("\n", $list);
    shuffle($lots);
    $lots = array_slice($lots, 0, $qty);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-tw">
    <head>
        <title>抽籤</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <form action="<?php echo $request_uri ?>" method="post">
            <p>
            <textarea name="list" rows="15" cols="20"><?php echo $list ?></textarea><br />
            抽<input type="text" name="qty" size="1" value="<?php echo $qty ?>" />個<input type="submit" value="抽籤" />
            </p>
        </form>
        <hr />
        <p>抽籤結果</p>
<?php    if (count($lots) > 0): ?>
        <ol>
<?php        foreach($lots as $item): ?>
            <li><?php echo $item ?></li>
<?php        endforeach; ?>
        </ol>
<?php    else: ?>
        <p>無。</p>
<?php    endif; ?>
    </body>
</html>