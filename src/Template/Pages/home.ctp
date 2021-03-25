<?php

use Cake\ORM\TableRegistry;

$ca_datasource = "http://144.202.119.241:9876/3.json";
$bj_datasource = "http://yuce2.com/api/gameInfo/39/100";
$ca_data = json_decode(file_get_contents($ca_datasource), true);
$bj_data = json_decode(file_get_contents($bj_datasource), true);
$btc_data = '';

$canext_stamp = $ca_data['data'][0]['time'] + 210000;
if (date('Hi', $canext_stamp) >= 1157 && date('Hi', $canext_stamp) <= 1300) {
    $canext_stamp += 7200000;
}
$canext_time = date('Y-m-d H:i:s', $canext_stamp / 1000 + 28800);

$bjnext_stamp = $bj_data['data'][0]['time'] + 300000;
if (date('Hi', $bjnext_stamp) >= 2355 && date('Hi', $bjnext_stamp) < 605) {
    $bjnext_stamp += 25210000;
}
$bjnext_time = date('Y-m-d H:i:s', $bjnext_stamp / 1000 + 28800);

// debug($bj_data['data'][0]['time']);
// debug($bjnext_stamp);
?>

<div class="container">
    <header>
        <div class="logo"><img src="img/logo.png"></div>
        <div class="tips">PC28--极力打造精准北京28、加拿大28人工计划网站</div>
    </header>
    <div class="all_pic wap_hide"><img src="img/pic_pc.jpg"></div>
    <div class="all_pic wap_show"><img src="img/pic_wap.jpg"></div>
    <div class="jiang">
        <ul class="tab">
            <li class="on" data-id="qi_jnd">加拿大28</li>
            <li data-id="qi_bj">北京28</li>
            <li data-id="qi_xjp">比特币28</li>
        </ul>
        <div id="qi_jnd">
            <div class="flex_main">
                <div class="info">
                    <div class="left"><img src="img/qi_jnd.png"></div>
                    <div class="right">
                        <div class="bt">最新：<span><?= $ca_data['data'][0]['qihao'] ?></span>期</div>
                        <div class="qis_but">
                            <div class="prev"></div>
                            <div class="t"></div>
                            <ul>
                                <li class="on"><?= $ca_data['data'][0]['qihao'] ?></li>
                                <?php for ($i = 1; $i < 10; $i++) { ?>
                                    <li><?= $ca_data['data'][$i]['qihao'] ?></li>
                                <?php } ?>
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
                    <dd><?= substr($ca_data['data'][0]['kaijiang'], 0, 1) ?></dd>
                    <dt>+</dt>
                    <dd><?= substr($ca_data['data'][0]['kaijiang'], 4, 1) ?></dd>
                    <dt>+</dt>
                    <dd><?= substr($ca_data['data'][0]['kaijiang'], 8, 1) ?></dd>
                    <dt>=</dt>
                    <dd class="zong"><?= substr($ca_data['data'][0]['kaijiang'], -2) ?></dd>
                    <dt>
                        <?php if (substr($ca_data['data'][0]['kaijiang'], -2) >= 14) {
                            echo "（ 大 ，";
                        } else {
                            echo "（ 小 ，";
                        } ?>
                        <?php if (substr($ca_data['data'][0]['kaijiang'], -2) % 2 == 0) {
                            echo "双 ）";
                        } else {
                            echo "单 ）";
                        } ?>
                    </dt>
                </dl>
            </div>

        </div>
        <div id="qi_bj">
            <div class="flex_main">
                <div class="info">
                    <div class="left"><img src="img/qi_cn.png"></div>
                    <div class="right">
                        <div class="bt">最新：<span><?= $bj_data['data'][0]['qihao'] ?></span>期</div>
                        <div class="qis_but">
                            <div class="prev"></div>
                            <div class="t"><?= $bj_data['data'][0]['qihao'] ?></div>
                            <ul>
                                <li class="on"><?= $bj_data['data'][0]['qihao'] ?></li>
                                <?php for ($i = 1; $i < 15; $i++) {
                                    echo "<li>" . $bj_data['data'][$i]['qihao'] . "</li>";
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
                    <dd><?= substr($bj_data['data'][0]['kaijiang'], 0, 1) ?></dd>
                    <dt>+</dt>
                    <dd><?= substr($bj_data['data'][0]['kaijiang'], 4, 1) ?></dd>
                    <dt>+</dt>
                    <dd><?= substr($bj_data['data'][0]['kaijiang'], 8, 1) ?></dd>
                    <dt>=</dt>
                    <dd class="zong"><?= substr($bj_data['data'][0]['kaijiang'], -2) ?></dd>
                    <dt>（小，单）</dt>
                </dl>
            </div>
        </div>
    </div>
    <div class="main">
        <div class="bj" id="jnd">
            <ul class="tab">
                <li class="on" data-id="jndtable_jieguo"><img src="img/icon_jg.png" class="default"><img src="img/icon_jgcur.png" class="hide"><span>结果</span></li>
                <li data-id="jndtable_zoushi"><img src="img/icon_zs.png" class="default"><img src="img/icon_zscur.png" class="hide"><span>走势</span></li>
                <li data-id="jndtable_yuce"><img src="img/icon_yc.png" class="default"><img src="img/icon_yccur.png" class="hide"><span>预测</span></li>
            </ul>
            <div class="zsy">
                <table id="jndtable_jieguo">
                    <thead>
                        <tr>
                            <th>期号</th>
                            <th>时间</th>
                            <th>号码</th>
                        </tr>
                    </thead>
                    <tbody id="jndopencodelist">
                        <?php for ($i = 0; $i < 100; $i++) { ?>
                            <tr>
                                <td><?= $ca_data['data'][$i]['qihao'] ?></td>
                                <td><?= date('Y-m-d H:i:s', $ca_data['data'][$i]['time'] / 1000 + 28800) ?></td>
                                <td><?= $ca_data['data'][$i]['kaijiang'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="zsy">
                <table id="jndtable_zoushi" style="display: none;">
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
                    <tbody id="jndresultlist">
                        <tr>
                            <th>间隔</th>
                            <th></th>
                            <?php for ($i = 0; $i < 100; $i++) {
                                $ca1 = $ca2 = $ca3 = $ca4 = 0;
                                if (substr($ca_data['data'][$i]['kaijiang'], -2) >= 14) {
                                    if (substr($ca_data['data'][$i]['kaijiang'], -2) % 2 == 0) {
                                        $ca2++;
                                    } else {
                                        $ca1++;
                                    }
                                } else {
                                    if (substr($ca_data['data'][$i]['kaijiang'], -2) % 2 == 0) {
                                        $ca4++;
                                    } else {
                                        $ca3++;
                                    }
                                }
                            } ?>
                            <th><?= $ca1+$ca2?></th>
                            <th><?= $ca3+$ca4?></th>
                            <th><?= $ca1+$ca3?></th>
                            <th><?= $ca2+$ca4?></th>
                            <th><?= $ca1?></th>
                            <th><?= $ca2?></th>
                            <th><?= $ca3?></th>
                            <th><?= $ca4?></th>
                        </tr>
                        <?php for ($i = 0; $i < 100; $i++) { ?>
                            <tr>
                                <td><?= $ca_data['data'][$i]['qihao'] ?></td>
                                <td><?= substr($ca_data['data'][$i]['kaijiang'], -2) ?></td>
                                <?php if (substr($ca_data['data'][$i]['kaijiang'], -2) >= 14) {
                                    echo "<td><span class='icon'>大</span></td><td></td>";
                                } else {
                                    echo "<td></td><td><span class='icon'>小</span></td>";
                                } ?>
                                <?php if (substr($ca_data['data'][$i]['kaijiang'], -2) % 2 != 0) {
                                    echo "<td><span class='icon'>单</span></td><td></td>";
                                } else {
                                    echo "<td></td><td><span class='icon'>双</span></td>";
                                } ?>

                                <?php if (substr($ca_data['data'][$i]['kaijiang'], -2) >= 14) {
                                    if (substr($ca_data['data'][$i]['kaijiang'], -2) % 2 != 0) {
                                        echo "<td class='er'><span class='icon'>大单</span></td><td class='er'></td>";
                                    } else {
                                        echo "<td class='er'></td><td class='er'><span class='icon'>大双</span></td>";
                                    }
                                    echo "<td class='er'></td><td class='er'></td>";
                                } else {
                                    echo "<td class='er'></td><td class='er'></td>";
                                    if (substr($ca_data['data'][$i]['kaijiang'], -2) % 2 != 0) {
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
                        <?php $ca_predictdata = TableRegistry::getTableLocator()->get('canada')->find()->orderDesc('id')->limit(110)->toArray(); ?>
                        <tr>
                            <td><?= $ca_data['data'][0]['qihao'] + 1 ?></td>
                            <td>--- 预测仅供参考 ---</td>
                            <td>
                                <?php if ($ca_predictdata[0]['size'] == 0) {
                                    echo "小 丨";
                                } else {
                                    echo "大 丨";
                                } ?>
                                <?php if ($ca_predictdata[0]['odd'] == 0) {
                                    echo " 单";
                                } else {
                                    echo " 双";
                                } ?>
                            </td>
                            <td></td>
                        </tr>
                        <?php for ($i = 0; $i < 100; $i++) { ?>
                            <tr>
                                <td><?= $ca_data['data'][$i]['qihao'] ?></td>
                                <td><?= $ca_data['data'][$i]['kaijiang'] ?></td>
                                <td>
                                    <?php if ($ca_predictdata[$i + 1]['size'] == 0) {
                                        echo "小 丨";
                                    } else {
                                        echo "大 丨";
                                    } ?>
                                    <?php if ($ca_predictdata[$i + 1]['odd'] == 0) {
                                        echo " 单";
                                    } else {
                                        echo " 双";
                                    } ?>
                                </td>
                                <td><?php
                                    $res = substr($ca_data['data'][0]['kaijiang'], 12, 2);
                                    if ($res >= 14 &&  $ca_predictdata[$i + 1]['size'] == 1) {
                                        echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                    } else if ($res < 14 &&  $ca_predictdata[$i + 1]['size'] == 0) {
                                        echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                    } else if ($res % 2 == 0 && $ca_predictdata[$i + 1]['odd'] == 1) {
                                        echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                    } else if ($res % 2 != 0 && $ca_predictdata[$i + 1]['odd'] == 0) {
                                        echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                    } else {
                                        echo $this->Html->image('icon_no.png', ['alt' => '']);
                                    } ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bj" id="bj" style="display:none;">
            <ul class="tab">
                <li class="on" data-id="bjtable_jieguo"><img src="img/icon_jg.png" class="default"><img src="img/icon_jgcur.png" class="hide"><span>结果</span></li>
                <li data-id="bjtable_zoushi"><img src="img/icon_zs.png" class="default"><img src="img/icon_zscur.png" class="hide"><span>走势</span></li>
                <li data-id="bjtable_yuce"><img src="img/icon_yc.png" class="default"><img src="img/icon_yccur.png" class="hide"><span>预测</span></li>
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
                        <?php for ($i = 0; $i < 100; $i++) { ?>
                            <tr>
                                <td><?= $bj_data['data'][$i]['qihao'] ?></td>
                                <td><?= date('Y-m-d H:i:s', $bj_data['data'][$i]['time'] / 1000 + 28800) ?></td>
                                <td><?= $bj_data['data'][$i]['kaijiang'] ?></td>
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
                            <?php $ca1=$ca2=$ca3=$ca4=0;
                                for($i = 0; $i < 100; $i++){
                                $res = substr($bj_data['data'][$i]['kaijiang'],-2);
                                if($res<14){
                                    if($res%2==0){$ca2++;} 
                                    else{$ca1++;}
                                } else{
                                    if($res%2==0){$ca4++;} 
                                    else{$ca3++;}
                                }
                            }?>
                            <th><?= $ca1+$ca2?></th>
                            <th><?= $ca3+$ca4?></th>
                            <th><?= $ca1+$ca3?></th>
                            <th><?= $ca2+$ca4?></th>
                            <th><?= $ca1?></th>
                            <th><?= $ca2?></th>
                            <th><?= $ca3?></th>
                            <th><?= $ca4?></th>
                        </tr>
                        <?php for($i = 0; $i < 100; $i++){ $res= substr($bj_data['data'][$i]['kaijiang'],-2);?>
                            <tr>
                                <td><?= $bj_data['data'][$i]['qihao'] ?></td>
                                <td><?= $res; ?></td>
                                <?php if($res>=14){
                                    echo "<td><span class='icon'>大</span></td><td></td>";
                                } else{
                                    echo "<td></td><td><span class='icon'>小</span></td>";
                                }?>
                                <?php if($res%2==0){
                                    echo "<td><span class='icon'>单</span></td><td></td>";
                                } else{
                                    echo "<td></td><td><span class='icon'>双</span></td>";
                                }?>
                                <?php if($res>=14){
                                    if($res%2==0){
                                        echo "<td class='er'><span class='icon'>大单</span></td><td></td>";
                                    } else{
                                        echo "<td></td><td class='er'><span class='icon'>大双</span></td>";
                                    }
                                    echo "<td></td><td></td>";
                                } else{
                                    echo "<td></td><td></td>";
                                    if($res%2==0){
                                        echo "<td class='er'><span class='icon'>小单</span></td><td></td>";
                                    } else{
                                        echo "<td></td><td class='er'><span class='icon'>小双</span></td>";
                                    }
                                }?>
                            </tr>
                        <?php }?>
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
                        <tr>
                            <td>977582</td>
                            <td>--- 预测仅供参考 ---</td>
                            <td>单丨大</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bj" id="xjp" style="display:none;">
            <ul class="tab">
                <li class="on" data-id="xjptable_jieguo"><img src="img/icon_jg.png" class="default"><img src="img/icon_jgcur.png" class="hide"><span>结果</span></li>
                <li data-id="xjptable_zoushi"><img src="img/icon_zs.png" class="default"><img src="img/icon_zscur.png" class="hide"><span>走势</span></li>
                <li data-id="xjptable_yuce"><img src="img/icon_yc.png" class="default"><img src="img/icon_yccur.png" class="hide"><span>预测</span></li>
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
                        <tr>
                            <td>2484572</td>
                            <td>2019-10-10 18:00:30</td>
                            <td>8+3+7=18</td>
                        </tr>
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
                            <th>间隔</th>
                            <th></th>
                            <th>5</th>
                            <th>0</th>
                            <th>2</th>
                            <th>0</th>
                            <th>8</th>
                            <th>5</th>
                            <th>2</th>
                            <th>0</th>
                        </tr>
                        <tr>
                            <td>2484572</td>
                            <td>11</td>
                            <td></td>
                            <td><span class="icon">小</span></td>
                            <td><span class="icon">单</span></td>
                            <td></td>
                            <td class="er"></td>
                            <td class="er"></td>
                            <td class="er"><span class="icon">小单</span></td>
                            <td class="er"></td>
                        </tr>
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
                            <td>977582</td>
                            <td>9+6+2=17</td>
                            <td>单丨大</td>
                            <td><img src="img/icon_yes.png" class="ztpic"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tip">本站提供北京28、加拿大28预测，仅供参考</div>
    </div>
    <footer>Copyright©PC28网络科技有限公司</footer>
</div>


<script>
    // CA_display
    var currentdata;
    var nextdata;

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = <?= $canext_stamp ?> - now;

        var hours = Math.floor(distance / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        //   document.getElementById("min1").innerHTML=now
        //   document.getElementById("min2").innerHTML=
        if (hours > 0) {
            document.getElementById("camin1").innerHTML = Math.floor(hours / 10);
            document.getElementById("camin2").innerHTML = hours % 10;
            document.getElementById("cadivider").innerHTML = ":"
            document.getElementById("casec1").innerHTML = Math.floor(minutes / 10);
            document.getElementById("casec2").innerHTML = minutes % 10;
        } else {
            document.getElementById("camin1").innerHTML = Math.floor(minutes / 10);
            document.getElementById("camin2").innerHTML = minutes % 10;
            document.getElementById("cadivider").innerHTML = ":"
            document.getElementById("casec1").innerHTML = Math.floor(seconds / 10);
            document.getElementById("casec2").innerHTML = seconds % 10;
        }

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("camin1").innerHTML = "开";
            document.getElementById("camin2").innerHTML = "奖";
            document.getElementById("cadivider").innerHTML = ""
            document.getElementById("casec1").innerHTML = "中";
            document.getElementById("casec2").innerHTML = "…";

            // setInterval(function(){var nextdata = ***;if(nextdata!=currentdata){location.reload()}},10000);
            setTimeout(function() {
                if (document.getElementById("qi_jnd").style.display != "none") {
                    location.reload()
                };
            }, 7500);
        }
    }, 1000);
</script>

<script>
    // bj_display

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = <?= $bjnext_stamp ?> - now;

        var hours = Math.floor(distance / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        //   document.getElementById("min1").innerHTML=now
        //   document.getElementById("min2").innerHTML=
        if (hours > 0) {
            document.getElementById("bjmin1").innerHTML = Math.floor(hours / 10);
            document.getElementById("bjmin2").innerHTML = hours % 10;
            document.getElementById("bjdivider").innerHTML = ":"
            document.getElementById("bjsec1").innerHTML = Math.floor(minutes / 10);
            document.getElementById("bjsec2").innerHTML = minutes % 10;
        } else {
            document.getElementById("bjmin1").innerHTML = Math.floor(minutes / 10);
            document.getElementById("bjmin2").innerHTML = minutes % 10;
            document.getElementById("bjdivider").innerHTML = ":"
            document.getElementById("bjsec1").innerHTML = Math.floor(seconds / 10);
            document.getElementById("bjsec2").innerHTML = seconds % 10;
        }

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("bjmin1").innerHTML = "开";
            document.getElementById("bjmin2").innerHTML = "奖";
            document.getElementById("bjdivider").innerHTML = ""
            document.getElementById("bjsec1").innerHTML = "中";
            document.getElementById("bjsec2").innerHTML = "…";

            // setInterval(function(){var nextdata = ***;if(nextdata!=currentdata){location.reload()}},10000);
            setTimeout(function() {
                if (document.getElementById("qi_bj").style.display != "none") {
                    location.reload()
                };
            }, 7500);
        }
    }, 1000);
</script>