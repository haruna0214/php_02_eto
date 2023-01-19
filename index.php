<?php
function h( $str ) {
    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}
function eto( $year ) {
    $etos = ["子", "丑", "寅", "卯", "辰", "巳", "午", "未", "申", "酉", "戌", "亥"];
    return $etos[($year - 4) % 12];
}
$year = filter_input(INPUT_GET, "year", FILTER_VALIDATE_INT);
?>
<!-- プログラムの読みやすさを重視して、headタグとbodyタグを省略 -->
<!DOCTYPE html>
    <title>干支計算機</title>
    <h1>干支計算機</h1>
<?php if (empty($year)): ?>
<p>数字を入力してください</p>
<form method="get">
    <label>年</label>:
    <!-- value属性は、初期状態で現在の西暦を表示するように指定 -->
    <input name="year" type="number" value="<?= h(date( "Y" )) ?>">
</form>
<?php else: ?>
<p><?= h($year) ?>年は<?= eto($year) ?>年です。</p>
<?php endif; ?>
