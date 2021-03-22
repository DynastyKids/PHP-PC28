var bjTimer, jndTimer;
var bjinner, jndinner;
var bjopenlist, jndopenlist;
var bjforecastlist, jndforecastlist;

$(function () {
    LoadBaseInfomation();
    bjinner = parseInt($("#BjNexSecond").val());
    jndinner = parseInt($("#JndNexSecond").val());

    bjTimer = setInterval(BjTimmerInterval, 1000);
    jndTimer = setInterval(JndTimmerInterval, 1000);

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
});

function BjTimmerInterval() {
    bjinner = bjinner - 1;
    if (bjinner <= 0) {
        //到了准备开奖的时间了
        $("#BjNexSecond").html("<dd><em>0</em></dd><dd><em>0</em></dd><dt>:</dt><dd><em>0</em></dd><dd><em>0</em></dd>");
        //暂停一下
        clearInterval(bjTimer);
        //获取开奖结果
        bjTimer = setInterval(function () {
            GetNextInformation("北京", 1);
        }, 2000);

    } else {
       /* if (bjinner > 1800) {
            $("#BjNexSecond").html("<dd><em>0</em></dd><dd><em>0</em></dd><dt>:</dt><dd><em>0</em></dd><dd><em>0</em></dd>");
            return;
        }*/
        timers(bjinner, "#bj_next_down");
    }
}

function JndTimmerInterval() {
    jndinner = jndinner - 1;
    if (jndinner <= 0) {
        //$("#JndNexSecond").html("<dd><em>正</em></dd><dd><em>在</em></dd><dt>:</dt><dd><em>计</em></dd><dd><em>算</em></dd>");
        document.getElementById("JndNexSecond").innerHTML = "<dd><em>0</em></dd><dd><em>0</em></dd><dt>:</dt><dd><em>0</em></dd><dd><em>0</em></dd>";
        //暂停一下
        clearInterval(jndTimer);
        jndTimer = setInterval(function () {
            GetNextInformation("加拿大", 2);
        }, 2000);
        //获取开奖结果
        //GetNextInformation("加拿大", 2);
    } else {
        /*if (jndinner > 1800) {
            $("#JndNexSecond").html("<dd><em>0</em></dd><dd><em>0</em></dd><dt>:</dt><dd><em>0</em></dd><dd><em>0</em></dd>");
            return;
        }*/
        timers(jndinner, "#jnd_next_down");
    }

}


//倒计时函数， 每一秒计算一次
function timers(allsecond, id) {
    //由秒数计算分秒
    var clock = addPreZero(parseInt(allsecond / 60 / 60));//小时
    var mintue = addPreZero(parseInt(allsecond / 60));//分钟
    var second = addPreZero(parseInt(allsecond % 60));//秒

    $(id).html("<dd><em>" + clock.substr(0, 1) + "</em></dd><dd><em>"//小时的十位
        + clock.substr(1, 1) + "</em></dd><dt>:</dt><dd><dd><em>"//小时的个位
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
                console.log(JSON.stringify(result.data));
                //组装开奖结果
                var codes = result.data.opencode.split(',');
                var sum = parseInt(codes[0]) + parseInt(codes[1]) + parseInt(codes[2]);
                var big = "大", both = "双";
                if (sum < 14) big = "小";
                if (sum % 2 != 0) both = "单";
                var openresult = "<dd>" + addPreZero(codes[0]) + "</dd><dt>+</dt ><dd>" + addPreZero(codes[1]) + "</dd><dt>+</dt><dd>"
                    + addPreZero(codes[2]) + "</dd><dt>=</dt><dd class='zong'>" + addPreZero(sum) + "</dd><dt>（" + big + "，" + both + "）</dt>";
                //更新数据
                if (flag == 1) {//北京
                    bjinner = result.data.nextInval;
                    clearInterval(bjTimer);
                    bjTimer = setInterval(BjTimmerInterval, 1000);
                    $("#bjIssue").html(result.data.nextissue);
                    $("#bjOpenCode").html(openresult);
                } else {//加拿大
                    jndinner = result.data.nextInval;
                    clearInterval(jndTimer);//把之前的那个干掉
                    jndTimer = setInterval(JndTimmerInterval, 1000);
                    //把数据更新
                    $("#jndIssue").html(result.data.nextissue);
                    $("#jndOpenCode").html(openresult);
                    //$("#jndIssueList").html(result.data.nextissue);
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
                            LoadOpenList("北京", "#bjopencodelist", "#bjresultlist");
                        }
                        else {
                            jndopenlist = result.data;
                            LoadOpenList("加拿大", "#jndopencodelist", "#jndresultlist");
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
                            LoadForecastList("北京", "#bjgameforecastlist");
                        }
                        else {
                            jndforecastlist = result.data;
                            LoadForecastList("加拿大", "#jndgameforecastlist");
                        }
                    },
                });
            } 
        },
    });
}

//获取页面的基本信息
function LoadBaseInfomation() {
    //加载历史列表
    $.ajax({
        type: "POST",
        url: "/api/GameResult/GetResultList",
        data: JSON.stringify({ "GameName": "北京", "Page": 1, "Rows": 20 }),
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            console.log(JSON.stringify(result.data));
            bjopenlist = result.data;
            LoadOpenList("加拿大", "#bjopencodelist", "#bjresultlist");
        },
    });
    $.ajax({
        type: "POST",
        url: "/api/GameResult/GetResultList",
        data: JSON.stringify({ "GameName": "加拿大", "Page": 1, "Rows": 20 }),
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            console.log(JSON.stringify(result.data));
            jndopenlist = result.data;
            LoadOpenList("加拿大", "#jndopencodelist", "#jndresultlist");
        },
    });

    //预测
    $.ajax({
        type: "POST",
        url: "/api/GameResult/GetForecastList",
        data: JSON.stringify({ "GameName": "北京", "Page": 1, "Rows": 20 }),
        contentType: "application/json",
        dataType: "json",
        success: function (result) {
            bjforecastlist = result.data;
            LoadForecastList("北京", "#bjgameforecastlist");
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
}

function LoadOpenList(gamenane, id1, id2) {
    var openlist = [];
    if (gamenane == "北京")
        openlist = bjopenlist;
    else
        openlist = jndopenlist;
    var openlistresult = "", goresultlist = "", gastresultlist = "";
    for (var i = 0; i < openlist.length; i++) {
        var codes = openlist[i].finalResult.split(',');
        var sum = parseInt(codes[0]) + parseInt(codes[1]) + parseInt(codes[2]);
        openlistresult += "<tr><td>" + openlist[i].issue + "</td><td>" + openlist[i].finalOpenTime.replace("T", " ") + "</td><td>" + codes[0] + " + " + codes[1] + " + " + codes[2] + " = " + sum + "</td></tr>";

        //加载走势、 预测
        if (i == 0) {
            goresultlist += "<tr><th>间隔</th><th></th><th>5</th><th>0</th><th>2</th><th>0</th><th>8</th><th>5</th><th>2</th><th>0</th></tr>";
        }
        if (i < (openlist.length - 1)) {
            //走势
            goresultlist += "<tr><td>" + openlist[i].issue + "</td><td>" + sum + "</td>";
            if (sum < 14 && sum % 2 != 0) {//小单
                goresultlist += "<td></td><td><span class='icon'>小</span></td><td><span class='icon'>单</span></td><td></td><td></td><td></td><td><span class='icon'>小单</span></td><td></td>";
            } else if (sum < 14 && sum % 2 == 0) {//小双
                goresultlist += "<td></td><td><span class='icon'>小</span></td><td></td><td><span class='icon'>双</span></td><td></td><td></td><td></td><td><span class='icon'>小双</span></td>";
            } else if (sum >= 14 && sum % 2 != 0) { //大单
                goresultlist += "<td><span class='icon'>大</span></td><td></td><td><span class='icon'>单</span></td><td></td><td><span class='icon'>大单</span></td><td></td><td></td><td></td>";
            } else {//大双
                goresultlist += "<td><span class='icon'>大</span></td><td></td><td></td><td><span class='icon'>双</span></td><td></td><td><span class='icon'>大双</span></td><td></td><td></td>";
            }
            goresultlist += "</tr>";
            //预测

        }
    }
    //$("#opencodelist").html(openlistresult);
    //$("#go_resultlist").html(goresultlist);
    $(id1).html(openlistresult);
    $(id2).html(goresultlist);
}

//加载预测
function LoadForecastList(gamename ,id) {
    var openlist = [];
    if (gamename == "北京")
        openlist = bjforecastlist;
    else
        openlist = jndforecastlist;
    var openlistresult = "";
    for (var i = 0; i < openlist.length; i++) {
        if (i == 0)
            openlistresult += "<tr><td>" + openlist[i].issue + "</td><td>" + openlist[i].opencode + "</td><td>" + openlist[i].forecast + "</td><td></td></tr >";
        else
            openlistresult += "<tr><td>" + openlist[i].issue + "</td><td>" + openlist[i].opencode + "</td><td>" + openlist[i].forecast + "</td><td><img src='img/" + openlist[i].isforecast + ".png' class='ztpic'></td></tr >";
    }
    //$("#gameforecastlist").html(openlistresult);
    $(id).html(openlistresult);
}