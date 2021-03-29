<?php
// ini_set('memory_limit', '1024M');
use Cake\ORM\TableRegistry;

$ca_datasource = "http://144.202.119.241:9876/3.json";
$bj_datasource = "http://144.202.119.241:9876/api/1.json";
$btc_datasource = "https://api.365kaik.com/api/v1/trend/getHistoryList?t=1616926327&lotCode=10048&date=&pageSize=100&pageNum=0";
$ca_data = json_decode(file_get_contents($ca_datasource), true);
$bj_data = json_decode(file_get_contents($bj_datasource), true);
$btc_data = json_decode(file_get_contents($btc_datasource), true);

$canext_stamp = $ca_data['data'][0]['time'] + 210000;
if (date('Hi', $canext_stamp) >= 1157 && date('Hi', $canext_stamp) <= 1300) {
    $canext_stamp += 7200000;
}
$canext_time = date('Y-m-d H:i:s', $canext_stamp / 1000 + 28800);

// $bjnext_stamp = $bj_data['data'][0]['time'] + 300000;
// if (date('Hi', $bjnext_stamp) >= 2355 && date('Hi', $bjnext_stamp) < 605) {
//     $bjnext_stamp += 25210000;
// }
// $bjnext_time = date('Y-m-d H:i:s', $bjnext_stamp / 1000 + 28800);
$bjnext_time = date_create_from_format('Y-m-d H:i:s', $bj_data['data'][0]['opentime']);
date_add($bjnext_time, new DateInterval('PT5M'));
$bjnext_stamp = $bjnext_time->getTimestamp();
if (date('Hi', $bjnext_stamp) > 2355 && date('Hi', $bjnext_stamp) < 705) {
    date_add($bjnext_time, date_interval_create_from_date_string('420m'));
    $bjnext_stamp = $bjnext_time->getTimestamp();
}
$bjnext_stamp = $bjnext_stamp * 1000;


$btcnext_time = date_create_from_format('Y-m-d H:i:s', $btc_data['data']['list'][0]['drawTime']);
date_add($btcnext_time, new DateInterval('PT1M'));
$btcnext_stamp = $btcnext_time->getTimestamp();
$btcnext_stamp *= 1000;

// debug($bj_data['data'][0]['time']);
// debug($bjnext_stamp);
?>

<div class="container">
    <header>
        <!-- <div class="logo"><img src="img/logo.png"></div> -->
        <?= $this->Html->image('logo.png', ['class' => 'logo', 'url' => '/']) ?>
        <div class="tips">PC28--极力打造精准北京28、加拿大28人工计划网站</div>
    </header>
    <!-- <div class="all_pic wap_hide"><img src="img/pic_pc.jpg"></div> -->
    <?= $this->Html->image('pic_pc.jpg', ['class' => 'all_pic wap_hide']) ?>
    <!-- <div class="all_pic wap_show"><img src="img/pic_wap.jpg"></div> -->
    <?= $this->Html->image('pic_wap.jpg', ['class' => 'all_pic wap_show']) ?>
    <div class="jiang">
        <ul class="tab">
            <?php if ($id != 2 && $id != 3) { ?>
                <li class="on" data-id="qi_jnd">加拿大28</li>
                <li data-id="qi_bj">北京28</li>
                <li data-id="qi_xjp">比特币28</li>
            <?php } else if ($id == 2) { ?>
                <li data-id="qi_jnd">加拿大28</li>
                <li class="on" data-id="qi_bj">北京28</li>
                <li data-id="qi_xjp">比特币28</li>
            <?php } else if ($id == 3) { ?>
                <li data-id="qi_jnd">加拿大28</li>
                <li data-id="qi_bj">北京28</li>
                <li class="on" data-id="qi_xjp">比特币28</li>
            <?php } ?>
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
                        <div class="bt">最新：<span><?= $bj_data['data'][0]['expect'] ?></span>期</div>
                        <div class="qis_but">
                            <div class="prev"></div>
                            <div class="t"><?= $bj_data['data'][0]['expect'] ?></div>
                            <ul>
                                <li class="on"><?= $bj_data['data'][0]['expect'] ?></li>
                                <?php for ($i = 1; $i < 15; $i++) {
                                    echo "<li>" . $bj_data['data'][$i]['expect'] . "</li>";
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
                <?php
                $k = explode(",", $bj_data['data'][0]['opencode']);
                $k0 = $k1 = $k2 = 0;
                for ($i = 0; $i < 6; $i++) {
                    $k0 += $k[$i];
                    $k1 += $k[$i + 6];
                    $k2 += $k[$i + 12];
                }
                $total = $k0 % 10 + $k1 % 10 + $k2 % 10;
                ?>
                <dl class="kai">
                    <dd><?= $k0 % 10 ?></dd>
                    <dt>+</dt>
                    <dd><?= $k1 % 10 ?></dd>
                    <dt>+</dt>
                    <dd><?= $k2 % 10 ?></dd>
                    <dt>=</dt>
                    <dd class="zong"><?= $total ?></dd>
                    <dt><?php if ($total >= 14) {
                            echo "（ 小 ，";
                        } else {
                            echo "（ 大 ，";
                        } ?>
                        <?php if ($total % 2 != 0) {
                            echo "单 ）";
                        } else {
                            echo "双 ）";
                        } ?></dt>
                </dl>
            </div>
        </div>

        <div id="qi_xjp">
            <div class="flex_main">
                <div class="info">
                    <div class="left"><img src="img/qi_cn.png"></div>
                    <div class="right">
                        <div class="bt">最新：<span><?= $btc_data['data']['list'][0]['drawIssue'] ?></span>期</div>
                        <div class="qis_but">
                            <div class="prev"></div>
                            <div class="t"><?= $btc_data['data']['list'][0]['drawIssue'] ?></div>
                            <ul>
                                <li class="on"><?= $btc_data['data']['list'][0]['drawIssue'] ?></li>
                                <?php for ($i = 1; $i < 15; $i++) {
                                    echo "<li>" . $btc_data['data']['list'][$i]['drawIssue'] . "</li>";
                                } ?>
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
                <?php $k = explode(",", $btc_data['data']['list'][0]['drawCode']); ?>
                <dl class="kai">
                    <dd><?= $k[0] ?></dd>
                    <dt>+</dt>
                    <dd><?= $k[1] ?></dd>
                    <dt>+</dt>
                    <dd><?= $k[2] ?></dd>
                    <dt>=</dt>
                    <?php $total = $k[0] + $k[1] + $k[2] ?>
                    <dd class="zong"><?= $total ?></dd>
                    <dt><?php if ($total >= 14) {
                            echo "（ 小 ，";
                        } else {
                            echo "（ 大 ，";
                        } ?>
                        <?php if ($total % 2 != 0) {
                            echo "单 ）";
                        } else {
                            echo "双 ）";
                        } ?></dt>
                </dl>
            </div>
        </div>


    </div>
    <div class="main">
        <?php if ($id == 2 || $id == 3) { ?>
            <div class="bj" id="jnd" style="display:none;">
            <?php } else { ?>
                <div class="bj" id="jnd">
                <?php } ?>
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
                                <th><?= $ca1 + $ca2 ?></th>
                                <th><?= $ca3 + $ca4 ?></th>
                                <th><?= $ca1 + $ca3 ?></th>
                                <th><?= $ca2 + $ca4 ?></th>
                                <th><?= $ca1 ?></th>
                                <th><?= $ca2 ?></th>
                                <th><?= $ca3 ?></th>
                                <th><?= $ca4 ?></th>
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

                <?php if ($id == 2) { ?>
                    <div class="bj" id="bj">
                    <?php } else { ?>
                        <div class="bj" id="bj" style="display:none;">
                        <?php } ?>
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
                                            <td><?= $bj_data['data'][$i]['expect'] ?></td>
                                            <td><?= $bj_data['data'][$i]['opentime'] ?></td>
                                            <td>
                                                <?php
                                                $n0 = $n1 = $n2 = 0;
                                                $n = explode(",", $bj_data['data'][$i]['opencode']);
                                                for ($j = 0; $j < 6; $j++) {
                                                    $n0 += $n[$j];
                                                    $n1 += $n[$j + 6];
                                                    $n2 += $n[$j + 12];
                                                }
                                                ?>
                                                <?= $n0 % 10 ?> + <?= $n1 % 10 ?> + <?= $n2 % 10 ?> = <?= $n0 % 10 + $n1 % 10 + $n2 % 10 ?>
                                            </td>
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
                                        for ($i = 0; $i < 100; $i++) {
                                            $k = explode(",", $bj_data['data'][$i]['opencode']);
                                            $l0 = $l1 = $l2 = 0;
                                            for ($j = 0; $j < 6; $j++) {
                                                $l0 += $k[$j];
                                                $l1 += $k[$j + 6];
                                                $l2 += $k[$j + 12];
                                            }
                                            $res = $l0 % 10 + $l1 % 10 + $l2 % 10;
                                            if ($res < 14) {
                                                if ($res % 2 == 0) {
                                                    $ca2++;
                                                } else {
                                                    $ca1++;
                                                }
                                            } else {
                                                if ($res % 2 == 0) {
                                                    $ca4++;
                                                } else {
                                                    $ca3++;
                                                }
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
                                    <?php for ($i = 0; $i < 100; $i++) {
                                        $k = explode(",", $bj_data['data'][$i]['opencode']);
                                        $l0 = $l1 = $l2 = 0;
                                        for ($j = 0; $j < 6; $j++) {
                                            $l0 += $k[$j];
                                            $l1 += $k[$j + 6];
                                            $l2 += $k[$j + 12];
                                        }
                                        $res = $l0 % 10 + $l1 % 10 + $l2 % 10;
                                    ?>
                                        <tr>
                                            <td><?= $bj_data['data'][$i]['expect'] ?></td>
                                            <td><?= $res; ?></td>
                                            <?php if ($res >= 14) {
                                                echo "<td><span class='icon'>大</span></td><td></td>";
                                            } else {
                                                echo "<td></td><td><span class='icon'>小</span></td>";
                                            } ?>
                                            <?php if ($res % 2 != 0) {
                                                echo "<td><span class='icon'>单</span></td><td></td>";
                                            } else {
                                                echo "<td></td><td><span class='icon'>双</span></td>";
                                            } ?>
                                            <?php if ($res >= 14) {
                                                if ($res % 2 != 0) {
                                                    echo "<td class='er'><span class='icon'>大单</span></td><td></td>";
                                                } else {
                                                    echo "<td></td><td class='er'><span class='icon'>大双</span></td>";
                                                }
                                                echo "<td></td><td></td>";
                                            } else {
                                                echo "<td></td><td></td>";
                                                if ($res % 2 != 0) {
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
                                    <?php $bj_predictdata = TableRegistry::getTableLocator()->get('bj')->find()->orderDesc('id')->limit(110)->toArray(); ?>
                                    <tr>
                                        <td><?= $bj_data['data'][0]['expect'] + 1 ?></td>
                                        <td>--- 预测仅供参考 ---</td>
                                        <td>
                                            <?php if ($bj_predictdata[0]['size'] == 1) {
                                                echo "大 | ";
                                            } else {
                                                echo "小 | ";
                                            } ?>
                                            <?php if ($bj_predictdata[0]['odd'] == 1) {
                                                echo "单";
                                            } else {
                                                echo "双";
                                            } ?>
                                        <td></td>
                                    </tr>
                                    <?php for ($i = 0; $i < 100; $i++) { ?>
                                        <tr>
                                            <td><?= $bj_data['data'][$i]['expect'] ?></td>
                                            <?php
                                            $k = explode(",", $bj_data['data'][$i]['opencode']);
                                            $k0 = $k1 = $k2 = 0;
                                            for ($j = 0; $j < 6; $j++) {
                                                $k0 += $k[$j];
                                                $k1 += $k[$j + 6];
                                                $k2 += $k[$j + 12];
                                            }
                                            $res = $k0 % 10 + $k1 % 10 + $k2 % 10;
                                            ?>
                                            <td><?= $k0 % 10 ?> + <?= $k1 % 10 ?> + <?= $k2 % 10 ?> = <?= $res; ?></td>
                                            <td>
                                                <?php if ($bj_predictdata[$i]['size'] == 1) {
                                                    echo "大 | ";
                                                } else {
                                                    echo "小 | ";
                                                } ?>
                                                <?php if ($bj_predictdata[$i]['odd'] == 1) {
                                                    echo "单";
                                                } else {
                                                    echo "双";
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($res % 2 == $bj_predictdata[$i]['odd']) {
                                                    echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                                } else if ($res < 14 && $bj_predictdata[$i]['size'] == 0) {
                                                    echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                                } else if ($res >= 14 && $bj_predictdata[$i]['size'] == 1) {
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
                        </div>

                        <?php if ($id == 3) { ?>
                            <div class="bj" id="xjp">
                            <?php } else { ?>
                                <div class="bj" id="xjp" style="display:none;">
                                <?php } ?>
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
                                            <?php for ($i = 0; $i < 100; $i++) { ?>
                                                <tr>
                                                    <td><?= $btc_data['data']['list'][$i]['drawIssue'] ?></td>
                                                    <td><?= $btc_data['data']['list'][$i]['drawTime'] ?></td>
                                                    <td><?= str_replace(",", " + ", $btc_data['data']['list'][$i]['drawCode']) ?> = <?= $btc_data['data']['list'][$i]['result']['pc28_total'] ?></td>
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
                                                for ($i = 0; $i < 100; $i++) {
                                                    if ($btc_data['data']['list'][$i]['result']['pc28_total'] >= 14) {
                                                        if ($btc_data['data']['list'][$i]['result']['pc28_total'] % 2 != 0) {
                                                            $bt1++;
                                                        } else {
                                                            $bt2++;
                                                        }
                                                    } else {
                                                        if ($btc_data['data']['list'][$i]['result']['pc28_total'] % 2 != 0) {
                                                            $bt3++;
                                                        } else {
                                                            $bt4++;
                                                        }
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
                                            <?php for ($i = 0; $i < 100; $i++) { ?>
                                                <tr>
                                                    <td><?= $btc_data['data']['list'][$i]['drawIssue'] ?></td>
                                                    <td><?= $btc_data['data']['list'][$i]['result']['pc28_total'] ?></td>
                                                    <?php if ($btc_data['data']['list'][$i]['result']['pc28_total'] >= 14) {
                                                        echo "<td><span class='icon'>大</span></td><td></td>";
                                                    } else {
                                                        echo "<td></td><td><span class='icon'>小</span></td>";
                                                    } ?>
                                                    <?php if ($btc_data['data']['list'][$i]['result']['pc28_total'] % 2 != 0) {
                                                        echo "<td><span class='icon'>单</span></td><td></td>";
                                                    } else {
                                                        echo "<td></td><td><span class='icon'>双</span></td>";
                                                    } ?>

                                                    <?php if ($btc_data['data']['list'][$i]['result']['pc28_total'] >= 14) {
                                                        if ($btc_data['data']['list'][$i]['result']['pc28_total'] % 2 != 0) {
                                                            echo "<td class='er'><span class='icon'>大单</span></td><td></td><td></td><td></td>";
                                                        } else {
                                                            echo "<td></td><td class='er'><span class='icon'>大双</span></td><td></td><td></td>";
                                                        }
                                                    } else {
                                                        if ($btc_data['data']['list'][$i]['result']['pc28_total'] % 2 != 0) {
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
                                            <?php $btc_predictdata = TableRegistry::getTableLocator()->get('btc')->find()->orderDesc('id')->limit(110)->toArray(); ?>
                                            <tr>
                                                <td><?= $btc_data['data']['list'][0]['drawIssue'] + 1 ?></td>
                                                <td>--- 预测仅供参考 ---</td>
                                                <td>
                                                    <?php if ($btc_predictdata[0]['size'] == 1) {
                                                        echo "大 | ";
                                                    } else {
                                                        echo "小 | ";
                                                    } ?>
                                                    <?php if ($btc_predictdata[0]['odd'] == 1) {
                                                        echo "单";
                                                    } else {
                                                        echo "双";
                                                    } ?>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <?php for ($i = 0; $i < 99; $i++) { ?>
                                                <tr>
                                                    <td><?= $btc_data['data']['list'][$i]['drawIssue'] ?></td>
                                                    <td><?= str_replace(",", " + ", $btc_data['data']['list'][$i]['drawCode']) ?> = <?= $btc_data['data']['list'][$i]['result']['pc28_total'] ?></td>
                                                    <td>
                                                        <?php if ($btc_predictdata[$i + 1]['size'] == 1) {
                                                            echo "大 | ";
                                                        } else {
                                                            echo "小 | ";
                                                        } ?>
                                                        <?php if ($btc_predictdata[$i + 1]['odd'] == 1) {
                                                            echo "单";
                                                        } else {
                                                            echo "双";
                                                        } ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($btc_data['data']['list'][$i]['result']['pc28_total'] % 2 == $btc_predictdata[$i]['odd']) {
                                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                                        } else if ($btc_data['data']['list'][$i]['result']['pc28_total'] < 14 && $btc_predictdata[$i]['size'] == 0) {
                                                            echo $this->Html->image('icon_yes.png', ['alt' => '']);
                                                        } else if ($btc_data['data']['list'][$i]['result']['pc28_total'] >= 14 && $btc_predictdata[$i]['size'] == 1) {
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
                                </div>

                                <div class="tip">本站提供北京28、加拿大28预测，仅供参考</div>
                            </div>
                            <footer>Copyright©PC28网络科技有限公司</footer>
                    </div>

                    <!-- <script>
var aaa;
$.getJSON('http://144.202.119.241:9876/3.json', function(data) {
    console.log(data);
    aaa=data;
});
</script> -->

                    <script>
                        var ca_0 = <?= json_encode($ca_data); ?>;
                        function ca_getdata() {
                            $.ajax({
                                url: "js/1.js",
                                type: "get",
                                dataType: "json",
                                success: function(ca_d) {
                                    // console.log(ca_d.data[0].qihao);
                                    if(ca_d.data[0].qihao>ca_0.data[0].qihao){
                                        if(document.getElementById("jnd").style.display != "none"){
                                            window.location='./1';
                                        }
                                    }
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                },
                            })
                        }
                    </script>
                    <script>
                        var bj_0 = <?= json_encode($bj_data); ?>;
                        function bj_getdata() {
                            $.ajax({
                                url: "js/2.js",
                                type: "get",
                                dataType: "json",
                                success: function(bj_d) {
                                    if(bj_0.data[0].expect<bj_d.data[0].expect){
                                        if(document.getElementById("bj").style.display != "none"){
                                            window.location='./2';
                                        }
                                    }
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                },
                            })
                        }
                    </script>
                    <script>
                    var btc_0 = <?= json_encode($btc_data); ?>;
                        function btc_getdata() {
                            $.ajax({
                                url: "js/3.js",
                                type: "get",
                                dataType: "json",
                                success: function(data) {
                                    // console.log(data.data.list[0].drawIssue);
                                    if(btc_0.data.list[0].drawIssue<data.data.list[0].drawIssue){
                                        if(document.getElementById("xjp").style.display != "none"){
                                            window.location='./3';
                                        }
                                    }
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                },
                            })
                        }
                    </script>


                    <script>
                        var ca_0 = <?= json_encode($ca_data); ?>;

                        var x = setInterval(function() {
                            var now = new Date().getTime();
                            var distance = "<?= $canext_stamp ?>" - now;

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

                                // setInterval(function() {
                                //     //当前问题：倒计时到0后无法抓到新的数据
                                //     var ca_current = <?= file_get_contents("http://144.202.119.241:9876/3.json"); ?>;
                                //     // console.log(ca_0.data[0]);
                                //     // console.log(ca_current.data[0]);
                                //     if (ca_0.data[0].qihao != ca_current.data[0].qihao) {
                                //         console.log("Different");
                                //         // 根据当前tab决定是否reload
                                //         // location.reload()
                                //     }
                                // }, 5000);

                                setInterval(ca_getdata, 3000);
                            }
                        }, 1000);
                    </script>

                    <script>
                        var bj_0 = <?= json_encode($bj_data); ?>;
                        // var bj_init=bj_0.data[0].expect;

                        // bj_display
                        var y = setInterval(function() {
                            var now = new Date().getTime() + 28800000;
                            var distance = "<?= $bjnext_stamp ?>" - now;

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
                                clearInterval(y);
                                document.getElementById("bjmin1").innerHTML = "开";
                                document.getElementById("bjmin2").innerHTML = "奖";
                                document.getElementById("bjdivider").innerHTML = ""
                                document.getElementById("bjsec1").innerHTML = "中";
                                document.getElementById("bjsec2").innerHTML = "…";

                                setInterval(bj_getdata, 3000);
                            }
                        }, 1000);
                    </script>

                    <script>
                        var btc_0 = <?= json_encode($btc_data); ?>;
                        // var btc_init=btc_0.data.list[0].drawIssue
                        // btc1f_display
                        var z = setInterval(function() {
                            var now = new Date().getTime() + 28800000;
                            var distance = "<?= $btcnext_stamp ?>" - now;

                            var hours = Math.floor(distance / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                            if (hours > 0) {
                                document.getElementById("btcmin1").innerHTML = Math.floor(hours / 10);
                                document.getElementById("btcmin2").innerHTML = hours % 10;
                                document.getElementById("btcdivider").innerHTML = ":"
                                document.getElementById("btcsec1").innerHTML = Math.floor(minutes / 10);
                                document.getElementById("btcsec2").innerHTML = minutes % 10;
                            } else {
                                document.getElementById("btcmin1").innerHTML = Math.floor(minutes / 10);
                                document.getElementById("btcmin2").innerHTML = minutes % 10;
                                document.getElementById("btcdivider").innerHTML = ":"
                                document.getElementById("btcsec1").innerHTML = Math.floor(seconds / 10);
                                document.getElementById("btcsec2").innerHTML = seconds % 10;
                            }

                            // If the count down is finished, write some text
                            if (distance < 0) {
                                clearInterval(z);
                                document.getElementById("btcmin1").innerHTML = "开";
                                document.getElementById("btcmin2").innerHTML = "奖";
                                document.getElementById("btcdivider").innerHTML = ""
                                document.getElementById("btcsec1").innerHTML = "中";
                                document.getElementById("btcsec2").innerHTML = "…";

                                setInterval(btc_getdata, 3000);
                            }
                        }, 1000);
                    </script>