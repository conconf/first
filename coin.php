<?php

$i = 10000000;
$result = array(
    'a'     => 0,
    'b'     => 0,
    'start' => microtime_float()
);
while($i--){
    $num = mt_rand(1, 2);
    if($num == 1){
        $result['a']++;
    }else{
        $result['b']++;
    }
}
$result['end'] = microtime_float();

// test 

function microtime_float(){
    list($fsec, $sec) = explode(' ', microtime());
    return (float)$sec + (float)$fsec; 
}
?>

<style type="text/css">
.box{height:406px;width:406px;background-image:url(coin/1yuan.jpg)}
.positive{background-position:left top}
.negative{background-position:-410px top}
</style>

<?php if($result['a'] > $result['b']): ?>
<?php file_put_contents('coin.txt', date('Y-m-d H:i:s') . ' [POSITIVE] execute time:' . ($result['end'] - $result['start']) . "\n", FILE_APPEND); ?>
<div class="box positive">

</div>
<?php else: ?>
<?php file_put_contents('coin.txt', date('Y-m-d H:i:s') . ' [NEGATIVE] execute time:' . ($result['end'] - $result['start']) . "\n", FILE_APPEND); ?>
<div class="box negative">

</div>
<?php endif;?>