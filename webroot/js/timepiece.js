var bjTimer, jndTimer, xjpTimer;
var bjinner, jndinner, xjpinner;
var bjopenlist, jndopenlist, xjpopenlist;
var bjforecastlist, jndforecastlist, xjpforecastlist;

$(function () {
    $('#bj').hide(); $('#xjp').hide(); $('#jndtable_zoushi').hide(); $('#jndtable_yuce').hide();
    LoadBaseInfomation();
    bjinner = parseInt($("#BjNexSecond").val());
    jndinner = parseInt($("#JndNexSecond").val());
    xjpinner = parseInt($("#XjpNexSecond").val());

    bjTimer = setInterval(BjTimmerInterval, 1000);
    jndTimer = setInterval(JndTimmerInterval, 1000);
    xjpTimer = setInterval(XjpTimmerInterval, 1000);

    var codes = $("#BjOpenCode").val().split(',');
    var sum = parseInt(codes[0]) + parseInt(codes[1]) + parseInt(codes[2]);
    var big = "大", both = "双";
    if (sum < 14) big = "小";
    if (sum % 2 != 0) both = "单";
    var openresult = "<dd>" + addPreZero(codes[0]) + "</dd><dt>+</dt ><dd>" + addPreZero(codes[1]) + "</dd><dt>+</dt><dd>"
        + addPreZero(codes[2]) + "</dd><dt>=</dt><dd class='zong'>" + addPreZero(sum) + "</dd><dt>（" + big + "，" + both + "）</dt>";
    $("#bjOpenCode").html(openresult);

    codes = $("#JndOpenCode").val().split(',');
    sum = parseInt(codes[0]) + parseInt(codes[1]) + parseInt(codes[2]);
    big = "大", both = "双";
    if (sum < 14) big = "小";
    if (sum % 2 != 0) both = "单";
    openresult = "<dd>" + addPreZero(codes[0]) + "</dd><dt>+</dt ><dd>" + addPreZero(codes[1]) + "</dd><dt>+</dt><dd>"
        + addPreZero(codes[2]) + "</dd><dt>=</dt><dd class='zong'>" + addPreZero(sum) + "</dd><dt>（" + big + "，" + both + "）</dt>";
    $("#jndOpenCode").html(openresult);

    codes = $("#XjpOpenCode").val().split(',');
    sum = parseInt(codes[0]) + parseInt(codes[1]) + parseInt(codes[2]);
    big = "大", both = "双";
    if (sum < 14) big = "小";
    if (sum % 2 != 0) both = "单";
    openresult = "<dd>" + addPreZero(codes[0]) + "</dd><dt>+</dt ><dd>" + addPreZero(codes[1]) + "</dd><dt>+</dt><dd>"
        + addPreZero(codes[2]) + "</dd><dt>=</dt><dd class='zong'>" + addPreZero(sum) + "</dd><dt>（" + big + "，" + both + "）</dt>";
    $("#xjpOpenCode").html(openresult);

});

function BjTimmerInterval() {
    bjinner = bjinner - 1;
    if (bjinner < 0) {
        //到了准备开奖的时间了
        $("#bj_next_down").html("<dd><em>开</em></dd><dd><em>奖</em></dd><dd><em>中</em></dd><dd><em>.</em></dd><dd><em>.</em></dd><dd><em>.</em></dd><dd><em>.</em></dd>");
        //暂停一下
        clearInterval(bjTimer);
        //获取开奖结果
        bjTimer = setInterval(function () {
            GetNextInformation("比特币", 1);
        }, 2000);

    } else {
        //if (bjinner > 1800) {
        //    $("#BjNexSecond").html("<dd><em>0</em></dd><dd><em>0</em></dd><dt>:</dt><dd><em>0</em></dd><dd><em>0</em></dd>");
        //    return;
        //}
        timers(bjinner, "#bj_next_down");
    }
}

function JndTimmerInterval() {
    jndinner = jndinner - 1;
    if (jndinner < 0) {
        $("#jnd_next_down").html("<dd><em>开</em></dd><dd><em>奖</em></dd><dd><em>中</em></dd><dd><em>.</em></dd><dd><em>.</em></dd><dd><em>.</em></dd><dd><em>.</em></dd>");
        //document.getElementById("JndNexSecond").innerHTML = "<dd><em>开</em></dd><dd><em>奖</em></dd><dt>中</dt><dd><em>.</em></dd><dd><em>.</em></dd>";
        //暂停一下
        clearInterval(jndTimer);
        jndTimer = setInterval(function () {
            GetNextInformation("加拿大", 2);
        }, 2000);
        //获取开奖结果
        //GetNextInformation("加拿大", 2);
    } else {
        //if (jndinner > 1800) {
        //    $("#JndNexSecond").html("<dd><em>0</em></dd><dd><em>0</em></dd><dt>:</dt><dd><em>0</em></dd><dd><em>0</em></dd>");
        //    return;
        //}
        timers(jndinner, "#jnd_next_down");
    }

}

function XjpTimmerInterval() {
    xjpinner = xjpinner - 1;
    if (xjpinner < 0) {
        //到了准备开奖的时间了
        $("#xjp_next_down").html("<dd><em>开</em></dd><dd><em>奖</em></dd><dd><em>中</em></dd><dd><em>.</em></dd><dd><em>.</em></dd><dd><em>.</em></dd><dd><em>.</em></dd>");
        //暂停一下
        clearInterval(xjpTimer);
        //获取开奖结果
        xjpTimer = setInterval(function () {
            GetNextInformation("腾讯", 3);
        }, 2000);

    } else {
        //if (bjinner > 1800) {
        //    $("#BjNexSecond").html("<dd><em>0</em></dd><dd><em>0</em></dd><dt>:</dt><dd><em>0</em></dd><dd><em>0</em></dd>");
        //    return;
        //}
        timers(xjpinner, "#xjp_next_down");
    }
}



//倒计时函数， 每一秒计算一次
function timers(allsecond, id) {
    //由秒数计算分秒
    var clock = addPreZero(parseInt(allsecond / 3600));//时钟
    var ttmm = parseInt(allsecond % 3600);//余下的秒数
    var mintue = addPreZero(parseInt(ttmm / 60));//分钟
    var second = addPreZero(parseInt(allsecond % 60));//秒

    $(id).html("<dd><em>" + clock.substr(0, 1) + "</em></dd><dd><em>"//时钟的十位
        + clock.substr(1, 1) + "</em></dd><dt>:</dt><dd><em>"
        + mintue.substr(0, 1) + "</em></dd><dd><em>"//分钟的十位
        + mintue.substr(1, 1) + "</em></dd><dt>:</dt><dd><em>"//分钟的个位
        + second.substr(0, 1) + "</em></dd><dd><em>"//秒钟的十位
        + second.substr(1, 1) + "</em></dd>");//分钟的个位
}

//前置补0
function addPreZero(num) {
    return ('00' + num).slice(-2);
}

//获取最新的开奖数据
function GetNextInformation(gamename, flag) {
    $.ajax({
        type: "POST",
        url: "/api/GameResult/GetCurrentResult",
        data: JSON.stringify({ "GameName": gamename, "Page": 1, "Rows": 20 }),
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            //
            if (result != null && result.data != null && result.data.nextInval > 0) {//说明获取到了， 获取列表，及预测
                //console.log(JSON.stringify(result.data));
                //组装开奖结果
                var codes = result.data.opencode.split(',');
                var sum = parseInt(codes[0]) + parseInt(codes[1]) + parseInt(codes[2]);
                var big = "大", both = "双";
                if (sum < 14) big = "小";
                if (sum % 2 != 0) both = "单";
                var openresult = "<dd>" + addPreZero(codes[0]) + "</dd><dt>+</dt ><dd>" + addPreZero(codes[1]) + "</dd><dt>+</dt><dd>"
                    + addPreZero(codes[2]) + "</dd><dt>=</dt><dd class='zong'>" + addPreZero(sum) + "</dd><dt>（" + big + "，" + both + "）</dt>";
                //更新数据
                if (flag == 1) {//比特币
                    bjinner = result.data.nextInval;
                    clearInterval(bjTimer);
                    bjTimer = setInterval(BjTimmerInterval, 1000);
                    $("#bjIssue").html(result.data.nextissue);
                    $("#bjOpenCode").html(openresult);
                } else if (flag == 2) {//加拿大
                    jndinner = result.data.nextInval;
                    clearInterval(jndTimer);//把之前的那个干掉
                    jndTimer = setInterval(JndTimmerInterval, 1000);
                    //把数据更新
                    $("#jndIssue").html(result.data.nextissue);
                    $("#jndOpenCode").html(openresult);
                    //$("#jndIssueList").html(result.data.nextissue);
                } else if (flag == 3) {
                    xjpinner = result.data.nextInval;
                    clearInterval(xjpTimer);//把之前的那个干掉
                    xjpTimer = setInterval(XjpTimmerInterval, 1000);
                    //把数据更新
                    $("#xjpIssue").html(result.data.nextissue);
                    $("#xjpOpenCode").html(openresult);
                }

                $.ajax({
                    type: "POST",
                    url: "/api/GameResult/GetResultList",
                    data: JSON.stringify({ "GameName": gamename, "Page": 1, "Rows": 20 }),
                    contentType: "application/json",
                    dataType: "json",
                    success: function (result) {
                        if (flag == 1) {
                            bjopenlist = result.data;
                            LoadOpenList("比特币", "#bjopencodelist", "#bjresultlist", "#bjbutlist");
                        }
                        else if (flag == 2) {
                            jndopenlist = result.data;
                            LoadOpenList("加拿大", "#jndopencodelist", "#jndresultlist", "#jndbutlist");
                        }
                        else {
                            xjpopenlist = result.data;
                            LoadOpenList("腾讯", "#xjpopencodelist", "#xjpresultlist", "#xjpbutlist");
                        }
                    },
                });
                //预测
                $.ajax({
                    type: "POST",
                    url: "/api/GameResult/GetForecastList",
                    data: JSON.stringify({ "GameName": gamename, "Page": 1, "Rows": 20 }),
                    contentType: "application/json",
                    dataType: "json",
                    success: function (result) {
                        if (flag == 1) {
                            bjforecastlist = result.data;
                            LoadForecastList("比特币", "#bjgameforecastlist");
                        }
                        else if (flag == 2) {
                            jndforecastlist = result.data;
                            LoadForecastList("加拿大", "#jndgameforecastlist");
                        }
                        else {
                            xjpforecastlist = result.data;
                            LoadForecastList("腾讯", "#xjpgameforecastlist");
                        }
                    },
                });
            }
        }
    });
}

//获取页面的基本信息
function LoadBaseInfomation() {
    //加载历史列表
    $.ajax({
        type: "POST",
        url: "/api/GameResult/GetResultList",
        data: JSON.stringify({ "GameName": "比特币", "Page": 1, "Rows": 20 }),
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            bjopenlist = result.data;
            LoadOpenList("比特币", "#bjopencodelist", "#bjresultlist", "#bjbutlist");
        },
    });
    $.ajax({
        type: "POST",
        url: "/api/GameResult/GetResultList",
        data: JSON.stringify({ "GameName": "加拿大", "Page": 1, "Rows": 20 }),
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            jndopenlist = result.data;
            LoadOpenList("加拿大", "#jndopencodelist", "#jndresultlist", "#jndbutlist");
        },
    });

    $.ajax({
        type: "POST",
        url: "/api/GameResult/GetResultList",
        data: JSON.stringify({ "GameName": "腾讯", "Page": 1, "Rows": 20 }),
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            xjpopenlist = result.data;
            LoadOpenList("腾讯", "#xjpopencodelist", "#xjpresultlist", "#xjpbutlist");
        },
    });

    //预测
    $.ajax({
        type: "POST",
        url: "/api/GameResult/GetForecastList",
        data: JSON.stringify({ "GameName": "比特币", "Page": 1, "Rows": 20 }),
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            bjforecastlist = result.data;
            LoadForecastList("比特币", "#bjgameforecastlist");
        },
    });

    $.ajax({
        type: "POST",
        url: "/api/GameResult/GetForecastList",
        data: JSON.stringify({ "GameName": "加拿大", "Page": 1, "Rows": 20 }),
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            jndforecastlist = result.data;
            LoadForecastList("加拿大", "#jndgameforecastlist");
        },
    });

    $.ajax({
        type: "POST",
        url: "/api/GameResult/GetForecastList",
        data: JSON.stringify({ "GameName": "腾讯", "Page": 1, "Rows": 20 }),
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            xjpforecastlist = result.data;
            LoadForecastList("腾讯", "#xjpgameforecastlist");
        },
    });
}

function LoadOpenList(gamename, id1, id2, id3) {
    var openlist = [];
    if (gamename == "比特币")
        openlist = bjopenlist;
    else if (gamename == "加拿大")
        openlist = jndopenlist;
    else
        openlist = xjpopenlist;

    var openlistresult = "", goresultlist = "", butlist = "";
    var step = [20, 20, 20, 20, 20, 20, 20, 20];
    for (var i = 0; i < openlist.length; i++) {
        var codes = openlist[i].finalResult.split(',');
        var sum = parseInt(codes[0]) + parseInt(codes[1]) + parseInt(codes[2]);
        openlistresult += "<tr><td>" + openlist[i].issue + "</td><td>" + openlist[i].finalOpenTime.replace("T", " ") + "</td><td>" + codes[0] + " + " + codes[1] + " + " + codes[2] + " = " + sum + "</td></tr>";

        //加载走势
        if (i == 0) {
            butlist += "<li class='on'>" + openlist[i].issue + "</li>";
        } else {
            butlist += "<li>" + openlist[i].issue + "</li>";
        }
        if (i < (openlist.length - 1)) {
            //走势
            goresultlist += "<tr><td>" + openlist[i].issue + "</td><td>" + sum + "</td>";
            if (sum < 14 && sum % 2 != 0) {//小单
                goresultlist += "<td></td><td><span class='icon'>小</span></td><td><span class='icon'>单</span></td><td></td><td></td><td></td><td><span class='icon'>小单</span></td><td></td>";                
                if (step[1] == 20) {//小
                    step[1] = i;
                }
                if (step[2] == 20) {
                    step[2] = i;
                }
                if (step[6] == 20) {
                    step[6] = i;
                }
            } else if (sum < 14 && sum % 2 == 0) {//小双
                goresultlist += "<td></td><td><span class='icon'>小</span></td><td></td><td><span class='icon'>双</span></td><td></td><td></td><td></td><td><span class='icon'>小双</span></td>";
                //<td>大</td><td>小</td><td>单</td><td>双</td><td>大单</td><td>大双</td><td>小单</td><td>小双</td>
                if (step[1] == 20) {//小
                    step[1] = i;
                }
                if (step[3] == 20) {
                    step[3] = i;
                }
                if (step[7] == 20) {
                    step[7] = i;
                }
            } else if (sum >= 14 && sum % 2 != 0) { //大单
                goresultlist += "<td><span class='icon'>大</span></td><td></td><td><span class='icon'>单</span></td><td></td><td><span class='icon'>大单</span></td><td></td><td></td><td></td>";
                //<td>大</td><td>小</td><td>单</td><td>双</td><td>大单</td><td>大双</td><td>小单</td><td>小双</td>
                if (step[0] == 20) {//大
                    step[0] = i;
                }
                if (step[2] == 20) {
                    step[2] = i;
                }
                if (step[4] == 20) {
                    step[4] = i;
                }
            } else {//大双
                goresultlist += "<td><span class='icon'>大</span></td><td></td><td></td><td><span class='icon'>双</span></td><td></td><td><span class='icon'>大双</span></td><td></td><td></td>";
                //<td>大</td><td>小</td><td>单</td><td>双</td><td>大单</td><td>大双</td><td>小单</td><td>小双</td>
                if (step[0] == 20) {//大
                    step[0] = i;
                }
                if (step[3] == 20) {
                    step[3] = i;
                }
                if (step[5] == 20) {
                    step[5] = i;
                }
            }
            goresultlist += "</tr>";
            //预测
        }
    }
    $(id1).html(openlistresult);
    goresultlist = "<tr><th>间隔</th><th></th><th>" + step[0] + "</th><th>" + step[1] + "</th><th>" + step[2] + "</th><th>"
        + step[3] + "</th><th>" + step[4] + "</th><th>" + step[5] + "</th><th>" + step[6] + "</th><th>" + step[7] + "</th></tr>" + goresultlist;
    $(id2).html(goresultlist);
    $(id3).html(butlist);
}

//加载预测
function LoadForecastList(gamename, id) {
    var openlist = [];
    if (gamename == "比特币")
        openlist = bjforecastlist;
    else if (gamename == "加拿大")
        openlist = jndforecastlist;
    else
        openlist = xjpforecastlist;
    var openlistresult = "";
    if (openlist == null) return;
    for (var i = 0; i < openlist.length; i++) {
        if (i == 0)
            openlistresult += "<tr><td>" + openlist[i].issue + "</td><td>" + openlist[i].opencode + "</td><td>" + openlist[i].forecast + "</td><td></td></tr >";
        else
            openlistresult += "<tr><td>" + openlist[i].issue + "</td><td>" + openlist[i].opencode + "</td><td>" + openlist[i].forecast + "</td><td><img src='img/" + openlist[i].isforecast + ".png' class='ztpic'></td></tr >";

    }
    $(id).html(openlistresult);
}