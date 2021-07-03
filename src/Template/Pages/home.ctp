<?php
$key="c5f6c061f4707fbff65263f5ed3d3eb2";
$hostadd="http://pc28.testingstar.top";

// ini_set('memory_limit', '1024M');
use Cake\ORM\TableRegistry;
$datasource_list = json_decode(file_get_contents("https://pastebin.com/raw/TWjgzE83"),true);
if ($datasource_list == null){
    $datasource_list = json_decode(file_get_contents("https://pastebin.com/raw/jqUCrC2f"),true);
}
$allhistory = file_get_contents($datasource_list['datas']['all']['history'].$key);
$allpredict = file_get_contents($datasource_list['datas']['all']['predict'].$key);

$ca_history = (json_decode($allhistory, true))['Data']['Ca'];
$ca_predict = (json_decode($allpredict,true))['Data']['Ca'];

$bj_history = (json_decode($allhistory,true))['Data']['Bg'];
$bj_predict = (json_decode($allpredict,true))['Data']['Bg'];

$btc_history = json_decode($allhistory, true)['Data']['Btc'];
$btc_predict = json_decode($allpredict,true)['Data']['Btc'];

if ($ca_history != null) {
    $ca_next_drawtime = strtotime($ca_history[0]['time'])+210;
}

if ($bj_history != null) {
    $bj_next_drawtime = strtotime($bj_history[0]['time'])+300;
    if(substr($bj_history[0]['time'],-5) == "23:55"){
        $bj_next_drawtime = strtotime($bj_history[0]['time'])+25800;
    }
}

if ($btc_history != null) {
    $btc_next_drawtime = strtotime($btc_history[0]['time'])+60;
}

$this->layout = false;
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC28--极力打造精准北京28、加拿大28人工计划网站</title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.css') ?>
    <?php // $this->Html->css('site.css')
    ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('style_m.css') ?>

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('main.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <?= $this->Flash->render() ?>
    <div class="container">
        <header>
            <!-- <div class="logo"><img src="img/logo.png"></div> -->
            <?= $this->Html->image('logo.png', ['class' => 'logo', 'url' => '/']) ?>
            <div class="tips">PC28--极力打造精准宾果28、加拿大28人工计划网站</div>
        </header>
        <!-- <div class="all_pic wap_hide"><img src="img/pic_pc.jpg"></div> -->
        <?= $this->Html->image('pic_pc.jpg', ['class' => 'all_pic wap_hide']) ?>
        <!-- <div class="all_pic wap_show"><img src="img/pic_wap.jpg"></div> -->
        <?= $this->Html->image('pic_wap.jpg', ['class' => 'all_pic wap_show']) ?>
        <div class="jiang">
            <ul class="tab">
                <?php if ($id != 2 && $id != 3) { ?>
                    <li class="on" Data-id="qi_jnd">加拿大28</li>
                    <li Data-id="qi_bj">宾果28</li>
                    <li Data-id="qi_xjp">比特币28</li>
                <?php } else if ($id == 2) { ?>
                    <li Data-id="qi_jnd">加拿大28</li>
                    <li class="on" Data-id="qi_bj">宾果28</li>
                    <li Data-id="qi_xjp">比特币28</li>
                <?php } else if ($id == 3) { ?>
                    <li Data-id="qi_jnd">加拿大28</li>
                    <li Data-id="qi_bj">宾果28</li>
                    <li class="on" Data-id="qi_xjp">比特币28</li>
                <?php } ?>
            </ul>
            <div id="qi_jnd">
                <?php if ($ca_history != null) { ?>
                    <div class="flex_main">
                        <div class="info">
                            <div class="left"><img src="img/qi_jnd.png"></div>
                            <div class="right">
                                <div class="bt">最新：<span><?= $ca_history[0]['draw'] ?></span>期</div>
                                <div class="qis_but">
                                    <div class="prev"></div>
                                    <div class="t"></div>
                                    <ul>
                                        <li class="on"><?= $ca_history[0]['draw'] ?></li>
                                        <?php for ($i = 1;$i<15 && $i< count($ca_history); $i++) {
                                            echo "<li>". $ca_history[$i]['draw']."</li>";
                                        } ?>
                                    </ul>
                                    <div class="next"></div>
                                </div>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="date">下一期：<dl>
                                <dd><em id="camin1"></em></dd>
                                <dd><em id="camin2"></em></dd>
                                <dt><em id="cadivider"></em></dt>
                                <dd><em id="casec1"></em></dd>
                                <dd><em id="casec2"></em></dd>
                            </dl>
                        </div>
                        <div class="line"></div>
                        <dl class="kai">
                            <dd><?= substr($ca_history[0]['calc'], 0, 1) ?></dd>
                            <dt>+</dt>
                            <dd><?= substr($ca_history[0]['calc'], 4, 1) ?></dd>
                            <dt>+</dt>
                            <dd><?= substr($ca_history[0]['calc'], 8, 1) ?></dd>
                            <dt>=</dt>
                            <dd class="zong"><?= $ca_history[0]['result'] ?></dd>
                            <dt>
                                <?php if ($ca_history[0]['result'] >= 14) {
                                    echo "（ 大 ，";
                                } else {
                                    echo "（ 小 ，";
                                } ?>
                                <?php if ($ca_history[0]['result'] % 2 == 0) {
                                    echo "双 ）";
                                } else {
                                    echo "单 ）";
                                } ?>
                            </dt>
                        </dl>
                    </div>

                <?php } else { ?>
                    <h1 id='ca_disagree' style='font-size:150%'> 数据异常，3秒后刷新重试…… </h1>
                    <script>
                        var refresh_ca = setInterval(function() {
                            setTimeout(function() {}, 0);
                            if (document.getElementById("qi_jnd").style.display == "block") {
                                window.location.replace(<?= $hostadd.'/1'?>);
                            }
                        }, 3000);
                    </script>
                <?php } ?>
            </div>
            <div id="qi_bj">
                <?php if ($bj_history != null) { ?>
                    <div class="flex_main">
                        <div class="info">
                            <div class="left"><img src="img/qi_cn.png"></div>
                            <div class="right">
                                <div class="bt">最新：<span><?= $bj_history[0]['draw'] ?></span>期</div>
                                <div class="qis_but">
                                    <div class="prev"></div>
                                    <div class="t"><?= $bj_history[0]['draw'] ?></div>
                                    <ul>
                                        <li class="on"><?= $bj_history[0]['draw'] ?></li>
                                        <?php for ($i = 1; $i < 15 && $i< count($bj_history); $i++) {
                                            echo "<li>" . $bj_history[$i]['draw'] . "</li>";
                                        } ?>
                                    </ul>
                                    <div class="next"></div>
                                </div>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="date">下一期：<dl>
                                <dd><em id="bjmin1"></em></dd>
                                <dd><em id="bjmin2"></em></dd>
                                <dt id="bjdivider"></dt>
                                <dd><em id="bjsec1"></em></dd>
                                <dd><em id="bjsec2"></em></dd>
                            </dl>
                        </div>
                        <div class="line"></div>
                        <dl class="kai">
                            <dd><?= substr($bj_history[0]['calc'],0,1)?></dd>
                            <dt>+</dt>
                            <dd><?= substr($bj_history[0]['calc'],4,1)?></dd>
                            <dt>+</dt>
                            <dd><?= substr($bj_history[0]['calc'],-1) ?></dd>
                            <dt>=</dt>
                            <dd class="zong"><?= $bj_history[0]['result'] ?></dd>
                            <dt><?php if ($bj_history[0]['result'] >= 14) {
                                    echo "（ 小 ，";
                                } else {
                                    echo "（ 大 ，";
                                } ?>
                                <?php if ($bj_history[0]['result'] % 2 != 0) {
                                    echo "单 ）";
                                } else {
                                    echo "双 ）";
                                } ?></dt>
                        </dl>
                    </div>
                <?php } else { ?>
                    <h1 id='bj_disagree' style='font-size:150%'>数据异常，3秒后刷新重试……</h1>
                    <script>
                        var refresh_bj = setInterval(function() {
                            setTimeout(function() {}, 0);
                            if (document.getElementById("qi_bj").style.display == "block") {
                                window.location.replace(<?= $hostadd.'/2'?>);
                            }
                        }, 3500);
                    </script>
                <?php } ?>
            </div>
            <div id="qi_xjp">
                <?php if (count($btc_history)>0) { ?>
                    <div class="flex_main">
                        <div class="info">
                            <div class="left"><img src="img/qi_btc.png"></div>
                            <div class="right">
                                <div class="bt">最新：<span><?= $btc_history[0]['draw'] ?></span>期</div>
                                <div class="qis_but">
                                    <div class="prev"></div>
                                    <div class="t"><?= $btc_history[0]['draw'] ?></div>
                                    <ul>
                                        <li class="on"><?= $btc_history[0]['draw'] ?></li>
                                        <?php for ($i = 1; $i<15 && $i < count($btc_history['draw']); $i++) {
                                            echo "<li>" . $btc_history[$i]['draw'] . "</li>";
                                        }
                                        ?>
                                    </ul>
                                    <div class="next"></div>
                                </div>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="date">下一期：<dl>
                                <dd><em id="btcmin1"></em></dd>
                                <dd><em id="btcmin2"></em></dd>
                                <dt id="btcdivider"></dt>
                                <dd><em id="btcsec1"></em></dd>
                                <dd><em id="btcsec2"></em></dd>
                            </dl>
                        </div>
                        <div class="line"></div>
                        <dl class="kai">
                            <dd><?= substr($btc_history[0]['calc'],0,1) ?></dd>
                            <dt>+</dt>
                            <dd><?= substr($btc_history[0]['calc'],4,1) ?></dd>
                            <dt>+</dt>
                            <dd><?= substr($btc_history[0]['calc'], -1) ?></dd>
                            <dt>=</dt>
                            <?php $btc_history[0]['result'] ?>
                            <dd class="zong"><?= $btc_history[0]['result'] ?></dd>
                            <dt>
                                <?php if ($btc_history[0]['result'] >= 14) {
                                    echo "（ 小 ，";} else {echo "（ 大 ，";}
                                ?>
                                <?php if ($btc_history[0]['result'] % 2 != 0) {
                                    echo "单 ）";} else {echo "双 ）";}
                                ?>
                            </dt>
                        </dl>
                    </div>
                <?php } else { ?>
                    <h1 id='btc_disagree' style='font-size:150%'>数据异常，3秒后刷新重试……</h1>
                    <script>
                        var refresh_btc = setInterval(function() {
                            setTimeout(function() {}, 0);
                            if (document.getElementById("qi_xjp").style.display == "block") {
                                window.location.replace(<?= $hostadd.'/3'?>);
                            }
                        }, 3500);
                    </script>
                <?php } ?>
            </div>
        </div>

        <div class="main">
            <?php if (count($ca_history)>0) { ?>
                <?php if ($id == 2 || $id == 3) {
                    echo '<div class="bj" id="jnd" style="display:none;">';
                } else {
                    echo '<div class="bj" id="jnd">';
                } ?>
                <ul class="tab">
                    <li class="on" Data-id="jndtable_jieguo"><img src="img/icon_jg.png" class="default"><img src="img/icon_jgcur.png" class="hide"><span>结果</span></li>
                    <li Data-id="jndtable_zoushi"><img src="img/icon_zs.png" class="default"><img src="img/icon_zscur.png" class="hide"><span>走势</span></li>
                    <li Data-id="jndtable_yuce"><img src="img/icon_yc.png" class="default"><img src="img/icon_yccur.png" class="hide"><span>预测</span></li>
                </ul>
                <div class="zsy">
                    <table id="jndtable_jieguo">
                        <thead><tr><th>期号</th><th>时间</th><th>号码</th></tr></thead>
                        <tbody id="jndopencodelist">
                            <?php for ($i = 0; $i < 100 && $i < count($ca_history); $i++) { ?>
                                <tr>
                                    <td><?= $ca_history[$i]['draw'] ?></td>
                                    <td><?= str_replace("T"," ",$ca_history[$i]['time'])?></td>
                                    <td><?= $ca_history[$i]['calc'].' = '.$ca_history[$i]['result'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="zsy">
                    <table id="jndtable_zoushi" style="display: none;">
                        <thead>
                            <tr><th>期号</th><th>值</th><th>大</th><th>小</th><th>单</th><th>双</th><th>大单</th>
                                <th>大双</th><th>小单</th><th>小双</th></tr>
                        </thead>
                        <tbody id="jndresultlist">
                            <tr>
                                <th>间隔</th>
                                <th></th>
                                <?php
                                    $ca1 = $ca2 = $ca3 = $ca4 = 0;
                                    for ($i = 0; $i < 100 && count($ca_history); $i++) {
                                    if ($ca_history[$i]['result'] >= 14) {
                                        if ($ca_history[$i]['result'] % 2 == 0) {$ca2++;} else {$ca1++;}
                                    } else {
                                        if ($ca_history[$i]['result'] % 2 == 0) {$ca4++;} else {$ca3++;}
                                    }
                                } ?>
                                <th><?= $ca1 + $ca2 ?></th>
                                <th><?= $ca3 + $ca4 ?></th>
                                <th><?= $ca1 + $ca3 ?></th>
                                <th><?= $ca2 + $ca4 ?></th>
                                <th><?= $ca1 ?></th>
                                <th><?= $ca2 ?></th>
                                <th><?= $ca3 ?></th>
                                <th><?= $ca4 ?></th>
                            </tr>
                            <?php for ($i = 0; $i < 100 && count($ca_history); $i++) { ?>
                                <tr>
                                    <td><?= $ca_history[$i]['draw'] ?></td>
                                    <td><?= $ca_history[$i]['result'] ?></td>
                                    <?php if ($ca_history[$i]['result'] >= 14) {
                                        echo "<td><span class='icon'>大</span></td><td></td>";
                                    } else {
                                        echo "<td></td><td><span class='icon'>小</span></td>";
                                    } ?>
                                    <?php if ($ca_history[$i]['result'] % 2 != 0) {
                                        echo "<td><span class='icon'>单</span></td><td></td>";
                                    } else {
                                        echo "<td></td><td><span class='icon'>双</span></td>";
                                    } ?>

                                    <?php if ($ca_history[$i]['result'] >= 14) {
                                        if ($ca_history[$i]['result'] % 2 != 0) {
                                            echo "<td class='er'><span class='icon'>大单</span></td><td class='er'></td>";
                                        } else {
                                            echo "<td class='er'></td><td class='er'><span class='icon'>大双</span></td>";
                                        }
                                        echo "<td class='er'></td><td class='er'></td>";
                                    } else {
                                        echo "<td class='er'></td><td class='er'></td>";
                                        if ($ca_history[$i]['result'] % 2 != 0) {
                                            echo "<td class='er'><span class='icon'>小单</span></td><td class='er'></td>";
                                        } else {
                                            echo "<td class='er'></td><td class='er'><span class='icon'>小双</span></td>";
                                        }
                                    } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="zsy">
                    <table id="jndtable_yuce" style="display:none">
                        <thead>
                            <tr>
                                <th>期号</th>
                                <th>开奖</th>
                                <th>预测</th>
                                <th>结果</th>
                            </tr>
                        </thead>
                        <tbody id="jndgameforecastlist">
                            <tr>
                                <td><?= $ca_history[0]['draw'] + 1 ?></td>
                                <td>--- 预测仅供参考 ---</td>
                                <td>
                                    <?php if ($ca_predict[0]['size'] == 0) {
                                        echo "小 丨";
                                    } else {
                                        echo "大 丨";
                                    } ?>
                                    <?php if ($ca_predict[0]['odd'] == 0) {
                                        echo " 单";
                                    } else {
                                        echo " 双";
                                    } ?>
                                </td>
                                <td></td>
                            </tr>
                            <?php for ($i = 0; $i < 100 && $i < count($ca_history); $i++) { ?>
                                <tr>
                                    <td><?= $ca_history[$i]['draw'] ?></td>
                                    <td><?= $ca_history[$i]['calc']." = ".$ca_history[$i]['result']?></td>
                                    <td>
                                        <?php if ($ca_predict[$i + 1]['size'] == 0) {
                                            echo "小 丨";
                                        } else {
                                            echo "大 丨";
                                        } ?>
                                        <?php if ($ca_predict[$i + 1]['odd'] == 0) {
                                            echo " 单";
                                        } else {
                                            echo " 双";
                                        } ?>
                                    </td>
                                    <td><?php
                                        $res = $ca_history[0]['result'];
                                        if ($res >= 14 &&  $ca_predict[$i + 1]['size'] == 1) {
                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                        } else if ($res < 14 &&  $ca_predict[$i + 1]['size'] == 0) {
                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                        } else if ($res % 2 == 0 && $ca_predict[$i + 1]['odd'] == 1) {
                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                        } else if ($res % 2 != 0 && $ca_predict[$i + 1]['odd'] == 0) {
                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                        } else {
                                            echo $this->Html->image('icon_no.png', ['alt' => '']);
                                        } ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <script>
                    var ca_countdown = setInterval(function() {
                        setTimeout(function() {}, 0);
                        var now = new Date().getTime();
                        now = Math.floor(now/1000);
                        var nextdraw = <?= $ca_next_drawtime-28800 ?>

                        var distance = nextdraw-now;

                        if (distance > 210) {
                            distance = 210;
                        }

                        var minutes = Math.floor(distance / 60);
                        var seconds = Math.floor(distance % 60);

                        document.getElementById("camin1").innerHTML = Math.floor(minutes / 10);
                        document.getElementById("camin2").innerHTML = minutes % 10;
                        document.getElementById("cadivider").innerHTML = ":"
                        document.getElementById("casec1").innerHTML = Math.floor(seconds / 10);
                        document.getElementById("casec2").innerHTML = seconds % 10;

                        // If the count down is finished, write some text
                        if (distance < 0) {
                            clearInterval(ca_countdown);
                            document.getElementById("camin1").innerHTML = "开";
                            document.getElementById("camin2").innerHTML = "奖";
                            document.getElementById("cadivider").innerHTML = ""
                            document.getElementById("casec1").innerHTML = "中";
                            document.getElementById("casec2").innerHTML = "…";

                            setTimeout(ca_getdata, 5000);
                        }
                    }, 1000);
                </script>
            <?php } ?>
        </div>
        <div class="main">
            <?php if ($bj_history != null) { ?>
                <?php if ($id == 2) {
                    echo "<div class='bj' id='bj'>";
                } else {
                    echo '<div class="bj" id="bj" style="display:none;">';
                } ?>
                <ul class="tab">
                    <li class="on" Data-id="bjtable_jieguo"><img src="img/icon_jg.png" class="default"><img src="img/icon_jgcur.png" class="hide"><span>结果</span></li>
                    <li Data-id="bjtable_zoushi"><img src="img/icon_zs.png" class="default"><img src="img/icon_zscur.png" class="hide"><span>走势</span></li>
                    <li Data-id="bjtable_yuce"><img src="img/icon_yc.png" class="default"><img src="img/icon_yccur.png" class="hide"><span>预测</span></li>
                </ul>
                <div class="zsy">
                    <table id="bjtable_jieguo">
                        <thead>
                            <tr>
                                <th>期号</th>
                                <th>时间</th>
                                <th>号码</th>
                            </tr>
                        </thead>
                        <tbody id="bjopencodelist">
                            <?php for ($i = 0; $i < count($bj_history); $i++) { ?>
                                <tr>
                                    <td><?= $bj_history[$i]['draw'] ?></td>
                                    <td><?= str_replace("T"," ",$bj_history[$i]['time'])?></td>
                                    <td><?= $bj_history[$i]['calc']." = ".$bj_history[$i]['result']?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="zsy">
                    <table id="bjtable_zoushi">
                        <thead>
                            <tr>
                                <th>期号</th>
                                <th>值</th>
                                <th>大</th>
                                <th>小</th>
                                <th>单</th>
                                <th>双</th>
                                <th>大单</th>
                                <th>大双</th>
                                <th>小单</th>
                                <th>小双</th>
                            </tr>
                        </thead>
                        <tbody id="bjresultlist">
                            <tr>
                                <th>间隔</th>
                                <th></th>
                                <?php $ca1 = $ca2 = $ca3 = $ca4 = 0;
                                for ($i = 0; $i<100 && $i < count($bj_history); $i++) {
                                    if ($bj_history[$i]['result'] < 14) {
                                        if ($bj_history[$i]['result'] % 2 == 0) {$ca2++;} else {$ca1++;}
                                    } else {
                                        if ($bj_history[$i]['result'] % 2 == 0) {$ca4++;} else {$ca3++;}
                                    }
                                } ?>
                                <th><?= $ca1 + $ca2 ?></th>
                                <th><?= $ca3 + $ca4 ?></th>
                                <th><?= $ca1 + $ca3 ?></th>
                                <th><?= $ca2 + $ca4 ?></th>
                                <th><?= $ca1 ?></th>
                                <th><?= $ca2 ?></th>
                                <th><?= $ca3 ?></th>
                                <th><?= $ca4 ?></th>
                            </tr>
                            <?php for ($i = 0; $i < 100 && $i < count($bj_history); $i++) {?>
                                <tr>
                                    <td><?= $bj_history[$i]['draw'] ?></td>
                                    <td><?= $bj_history[$i]['result']; ?></td>
                                    <td>
                                    <?php if ($bj_history[$i]['result'] >= 14) {
                                        echo "<span class='icon'>大</span></td><td>";
                                    } else {
                                        echo "</td><td><span class='icon'>小</span>";
                                    } ?>
                                    </td>
                                    <td>
                                    <?php if ($bj_history[$i]['result'] % 2 != 0) {
                                        echo "<span class='icon'>单</span></td><td>";
                                    } else {
                                        echo "<td></td><td><span class='icon'>双</span>";
                                    } ?>
                                    </td>
                                    <?php if ($bj_history[$i]['result'] >= 14) {
                                        if ($bj_history[$i]['result'] % 2 != 0) {
                                            echo "<td class='er'><span class='icon'>大单</span></td><td></td>";
                                        } else {
                                            echo "<td></td><td class='er'><span class='icon'>大双</span></td>";
                                        }
                                        echo "<td></td><td></td>";
                                    } else {
                                        echo "<td></td><td></td>";
                                        if ($bj_history[$i]['result'] % 2 != 0) {
                                            echo "<td class='er'><span class='icon'>小单</span></td><td></td>";
                                        } else {
                                            echo "<td></td><td class='er'><span class='icon'>小双</span></td>";
                                        }
                                    } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="zsy">
                    <table id="bjtable_yuce">
                        <thead>
                            <tr>
                                <th>期号</th>
                                <th>开奖</th>
                                <th>预测</th>
                                <th>结果</th>
                            </tr>
                        </thead>
                        <tbody id="bjgameforecastlist">
                            <?php for ($i = 0; $i < 100 && count($bj_history); $i++) { ?>
                                <tr>
                                    <td><?= $bj_history[$i]['draw'] ?></td>
                                    <td><?php if ($i == 0) { echo "--- 预测仅供参考 ---";}
                                        else { echo $bj_history[$i]['calc']." = ".$bj_history[$i]['result'];} ?></td>
                                    <td>
                                        <?php if ($bj_predict[$i]['size'] == 1) {echo "大 | ";} else {echo "小 | ";} ?>
                                        <?php if ($bj_predict[$i]['odd'] == 1) {echo "单";} else {echo "双";} ?>
                                    </td>
                                    <td>
                                        <?php if ($i == 0) {
                                        } else if ($res % 2 == $bj_predict[$i]['odd']) {
                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                        } else if ($res < 14 && $bj_predict[$i]['size'] == 0) {
                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                        } else if ($res >= 14 && $bj_predict[$i]['size'] == 1) {
                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                        } else {
                                            echo $this->Html->image('icon_no.png', ['alt' => '']);
                                        } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <script>
                    var bj_countdown = setInterval(function() {
                        setTimeout(function() {}, 0);
                        var now = Math.floor(new Date().getTime()/1000) + 28800;
                        var nextdraw = '<?= $bj_next_drawtime?>'
                        var distance = nextdraw - now;

                        var minutes = Math.floor((distance % (60 * 60)) / 60);
                        var seconds = Math.floor((distance % 60));

                        document.getElementById("bjmin1").innerHTML = Math.floor(minutes / 10);
                        document.getElementById("bjmin2").innerHTML = minutes % 10;
                        document.getElementById("bjdivider").innerHTML = ":"
                        document.getElementById("bjsec1").innerHTML = Math.floor(seconds / 10);
                        document.getElementById("bjsec2").innerHTML = seconds % 10;

                        // If the count down is finished, write some text
                        if (distance < 0) {
                            clearInterval(bj_countdown);
                            document.getElementById("bjmin1").innerHTML = "开";
                            document.getElementById("bjmin2").innerHTML = "奖";
                            document.getElementById("bjdivider").innerHTML = ""
                            document.getElementById("bjsec1").innerHTML = "中";
                            document.getElementById("bjsec2").innerHTML = "…";

                            setInterval(bg_getdata, 5000);
                        }
                    }, 1000);
                </script>

            <?php } ?>
        </div>
        <div class="main">
            <?php if ($btc_history != null) { ?>
                <?php if ($id == 3) {
                    echo '<div class="bj" id="xjp">';
                } else {
                    echo '<div class="bj" id="xjp" style="display:none;">';
                } ?>
                <ul class="tab">
                    <li class="on" Data-id="xjptable_jieguo"><img src="img/icon_jg.png" class="default"><img src="img/icon_jgcur.png" class="hide"><span>结果</span></li>
                    <li Data-id="xjptable_zoushi"><img src="img/icon_zs.png" class="default"><img src="img/icon_zscur.png" class="hide"><span>走势</span></li>
                    <li Data-id="xjptable_yuce"><img src="img/icon_yc.png" class="default"><img src="img/icon_yccur.png" class="hide"><span>预测</span></li>
                </ul>
                <div class="zsy">
                    <table id="xjptable_jieguo">
                        <thead>
                            <tr>
                                <th>期号</th>
                                <th>时间</th>
                                <th>号码</th>
                            </tr>
                        </thead>
                        <tbody id="xjpopencodelist">
                            <?php for ($i = 0; $i < count($btc_history); $i++) { ?>
                                <tr>
                                    <td><?= $btc_history[$i]['draw'] ?></td>
                                    <td><?= str_replace("T"," ",$btc_history[$i]['time']) ?></td>
                                    <td><?= $btc_history[$i]['calc']. " = " . $btc_history[$i]['result'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="zsy">
                    <table id="xjptable_zoushi">
                        <thead>
                            <tr>
                                <th>期号</th>
                                <th>值</th>
                                <th>大</th>
                                <th>小</th>
                                <th>单</th>
                                <th>双</th>
                                <th>大单</th>
                                <th>大双</th>
                                <th>小单</th>
                                <th>小双</th>
                            </tr>
                        </thead>
                        <tbody id="xjpresultlist">
                            <tr>
                                <?php
                                $bt1 = $bt2 = $bt3 = $bt4 = 0;
                                for ($i = 0; $i<100 && $i < count($btc_history); $i++) {
                                    if ($btc_history[$i]['result'] >= 14) {
                                        if ($btc_history[$i]['result'] % 2 != 0) {$bt1++;} else {$bt2++;}
                                    } else {
                                        if ($btc_history[$i]['result'] % 2 != 0) {$bt3++;} else {$bt4++;}
                                    }
                                } ?>
                                <th>间隔</th>
                                <th></th>
                                <th><?= $bt1 + $bt2 ?></th>
                                <th><?= $bt3 + $bt4 ?></th>
                                <th><?= $bt1 + $bt3 ?></th>
                                <th><?= $bt2 + $bt4 ?></th>
                                <th><?= $bt1 ?></th>
                                <th><?= $bt2 ?></th>
                                <th><?= $bt3 ?></th>
                                <th><?= $bt4 ?></th>
                            </tr>
                            <?php for ($i = 0; $i < count($btc_history); $i++) { ?>
                                <tr>
                                    <td><?= $btc_history[$i]['draw'] ?></td>
                                    <td><?= $btc_history[$i]['result'] ?></td>
                                    <?php if ($btc_history[$i]['result'] >= 14) {
                                        echo "<td><span class='icon'>大</span></td><td></td>";
                                    } else {
                                        echo "<td></td><td><span class='icon'>小</span></td>";
                                    } ?>
                                    <?php if ($btc_history[$i]['result'] % 2 != 0) {
                                        echo "<td><span class='icon'>单</span></td><td></td>";
                                    } else {
                                        echo "<td></td><td><span class='icon'>双</span></td>";
                                    } ?>

                                    <?php if ($btc_history[$i]['result'] >= 14) {
                                        if ($btc_history[$i]['result'] % 2 != 0) {
                                            echo "<td class='er'><span class='icon'>大单</span></td><td></td><td></td><td></td>";
                                        } else {
                                            echo "<td></td><td class='er'><span class='icon'>大双</span></td><td></td><td></td>";
                                        }
                                    } else {
                                        if ($btc_history[$i]['result'] % 2 != 0) {
                                            echo "<td></td><td></td><td class='er'><span class='icon'>小单</span></td><td></td>";
                                        } else {
                                            echo "<td></td><td></td><td></td><td class='er'><span class='icon'>小双</span></td>";
                                        }
                                    } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="zsy">
                    <table id="xjptable_yuce">
                        <thead>
                            <tr>
                                <th>期号</th>
                                <th>开奖</th>
                                <th>预测</th>
                                <th>结果</th>
                            </tr>
                        </thead>
                        <tbody id="xjpgameforecastlist">
                            <tr>
                                <td><?= $btc_history[0]['draw'] + 1 ?></td>
                                <td>--- 预测仅供参考 ---</td>
                                <td>
                                    <?php if ($btc_predict[0]['size'] == 1) {
                                        echo "大 | ";
                                    } else {
                                        echo "小 | ";
                                    } ?>
                                    <?php if ($btc_predict[0]['odd'] == 1) {
                                        echo "单";
                                    } else {
                                        echo "双";
                                    } ?>
                                </td>
                                <td></td>
                            </tr>
                            <?php for ($i = 1; $i < count($btc_history); $i++) { ?>
                                <tr>
                                    <td><?= $btc_history[$i]['draw'] ?></td>
                                    <td><?= $btc_history[$i]['calc'].' = '.$btc_history[$i]['result'] ?></td>
                                    <td>
                                        <?php if ($btc_predict[$i + 1]['size'] == 1) {
                                            echo "大 | ";
                                        } else {
                                            echo "小 | ";
                                        } ?>
                                        <?php if ($btc_predict[$i + 1]['odd'] == 1) {
                                            echo "单";
                                        } else {
                                            echo "双";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if ($btc_history[$i]['result'] % 2 == $btc_predict[$i]['odd']) {
                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                        } else if ($btc_history[$i]['result'] < 14 && $btc_predict[$i]['size'] == 0) {
                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                        } else if ($btc_history[$i]['result'] >= 14 && $btc_predict[$i]['size'] == 1) {
                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                        } else {
                                            echo $this->Html->image('icon_no.png', ['alt' => '']);
                                        } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <script>
                    var btc_countdown = setInterval(function() {
                        setTimeout(function() {}, 0);
                        var now = Math.floor(new Date().getTime()/1000) + 28800;
                        var distance = "<?= $btc_next_drawtime ?>" - now;

                        if (distance > 60) {
                            distance = 60;
                        }

                        var minutes = Math.floor(distance / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        document.getElementById("btcmin1").innerHTML = Math.floor(minutes / 10);
                        document.getElementById("btcmin2").innerHTML = minutes % 10;
                        document.getElementById("btcdivider").innerHTML = ":"
                        document.getElementById("btcsec1").innerHTML = Math.floor(seconds / 10);
                        document.getElementById("btcsec2").innerHTML = seconds % 10;

                        // If the count down is finished, write some text
                        if (distance < 0) {
                            clearInterval(btc_countdown);
                            document.getElementById("btcmin1").innerHTML = "开";
                            document.getElementById("btcmin2").innerHTML = "奖";
                            document.getElementById("btcdivider").innerHTML = ""
                            document.getElementById("btcsec1").innerHTML = "中";
                            document.getElementById("btcsec2").innerHTML = "…";

                            setTimeout(btc_getdata, 3000);
                        }
                    }, 1000);
                </script>
            <?php } ?>
        </div>

        <div class="tip">本站提供宾果28、加拿大28预测，仅供参考</div>
    </div>
    <footer>Copyright©PC28网络科技有限公司</footer>
</body>

<script>
   function ca_getdata() {
       $.getJSON('<?= $datasource_list['datas']['ca']['latest']?>', function(data) {
           if(data!=null) {
               var got = data;
               var logged = <?= $ca_history[0]['draw']?>;
               if(got!=logged && document.getElementById("jnd").style.display != "none"){
                   window.location.replace('<?= $hostadd.'/1'?>');
               }
           }
       });
   }
</script>
<script>
   function bg_getdata() {
        $.getJSON('<?= $datasource_list['datas']['bg']['latest']?>', function(data) {
            if(data!=null) {
                var got = data;
                var logged = <?= $bj_history[0]['draw']?>;
                if(got!=logged && document.getElementById("bj").style.display != "none"){
                    window.location.replace('<?= $hostadd."/2"?>');
                }
            }
        });
   }
</script>
<script>
   function btc_getdata() {
       $.getJSON('<?= $datasource_list['datas']['btc']['latest']?>', function(data) {
           if(data!=null) {
               var got = data;
               var logged = <?= $btc_history[0]['draw']?>;
               if(got!=logged && document.getElementById("xjp").style.display != "none"){
                   console.log("Refresh BTC" );
                   window.location.replace('<?= $hostadd."/3"?>');
               }
           }
       });
   }
</script>
</html>
