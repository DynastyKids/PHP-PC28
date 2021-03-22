$(function () {
    // jiang
    $('#' + $('.jiang .tab .on').data('id')).show();
    $('.jiang .tab li').each(function (index) {
        $(this).click(function () {
            div_id = $(this).data('id');
            $(this).addClass('on').siblings().removeClass();
            //console.log(div_id);
            if (div_id == 'qi_jnd') {
                $(".main #bj .tab").children(':first').addClass('on').siblings().removeClass();
                $('#qi_jnd').show();
                $('#qi_bj').hide();
                $('#qi_xjp').hide();
                $('#jnd').show();
                $('#bj').hide();
                $('#xjp').hide();
                $('#jndtable_jieguo').show();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').hide();
                $('#bjtable_jieguo').hide();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').hide();
                $('#xjptable_jieguo').hide();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').hide();
            } else if (div_id == 'qi_bj') {
                $(".main #jnd .tab").children(':first').addClass('on').siblings().removeClass();
                $('#qi_jnd').hide();
                $('#qi_xjp').hide();
                $('#qi_bj').show();
                $('#bj').show();
                $('#jnd').hide();
                $('#xjp').hide();
                $('#bjtable_jieguo').show();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').hide();
                $('#jndtable_jieguo').hide();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').hide();
                $('#xjptable_jieguo').hide();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').hide();
            } else {
                $('#qi_jnd').hide();
                $('#qi_xjp').show();
                $('#qi_bj').hide();
                $('#bj').hide();
                $('#jnd').hide();
                $('#xjp').show();
                $('#bjtable_jieguo').hide();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').hide();
                $('#jndtable_jieguo').hide();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').hide();
                $('#xjptable_jieguo').show();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').hide();
            }
        });
    });
    // main
    $('#' + $('.main .tab .on').data('id')).show();
    $('.main .tab li').each(function (index) {
        $(this).click(function () {
            table_id = $(this).data('id');
            $(this).addClass('on').siblings().removeClass();
            if (table_id == 'jndtable_jieguo') {
                $('#jndtable_jieguo').show();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').hide();
                $('#bjtable_jieguo').hide();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').hide();
                $('#xjptable_jieguo').hide();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').hide();
            } else if (table_id == 'jndtable_zoushi') {
                $('#jndtable_jieguo').hide();
                $('#jndtable_zoushi').show();
                $('#jndtable_yuce').hide();
                $('#bjtable_jieguo').hide();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').hide();
                $('#xjptable_jieguo').hide();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').hide();
            } else if (table_id == 'jndtable_yuce') {
                $('#jndtable_jieguo').hide();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').show();
                $('#bjtable_jieguo').hide();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').hide();
                $('#xjptable_jieguo').hide();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').hide();
            } else if (table_id == 'bjtable_jieguo') {
                $('#bjtable_jieguo').show();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').hide();
                $('#jndtable_jieguo').hide();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').hide();
                $('#xjptable_jieguo').hide();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').hide();
            } else if (table_id == 'bjtable_zoushi') {
                $('#bjtable_jieguo').hide();
                $('#bjtable_zoushi').show();
                $('#bjtable_yuce').hide();
                $('#jndtable_jieguo').hide();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').hide();
                $('#xjptable_jieguo').hide();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').hide();
            } else if (table_id == 'bjtable_yuce') {
                $('#bjtable_jieguo').hide();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').show();
                $('#jndtable_jieguo').hide();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').hide();
                $('#xjptable_jieguo').hide();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').hide();
            } else if (table_id == 'xjptable_jieguo') {
                $('#bjtable_jieguo').hide();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').hide();
                $('#jndtable_jieguo').hide();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').hide();
                $('#xjptable_jieguo').show();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').hide();
            } else if (table_id == 'xjptable_zoushi') {
                $('#bjtable_jieguo').hide();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').hide();
                $('#jndtable_jieguo').hide();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').hide();
                $('#xjptable_jieguo').hide();
                $('#xjptable_zoushi').show();
                $('#xjptable_yuce').hide();
            } else if (table_id == 'xjptable_yuce') {
                $('#bjtable_jieguo').hide();
                $('#bjtable_zoushi').hide();
                $('#bjtable_yuce').hide();
                $('#jndtable_jieguo').hide();
                $('#jndtable_zoushi').hide();
                $('#jndtable_yuce').hide();
                $('#xjptable_jieguo').hide();
                $('#xjptable_zoushi').hide();
                $('#xjptable_yuce').show();
            }

        });
    });
    /*qis_but*/
    $('.qis_but .t').each(function (index) {
        $(this).html($(this).siblings('ul').find('.on').html());
        $(this).click(function () {
            $(this).siblings('ul').toggle();
        });
    });
    $('.qis_but ul li').each(function (index) {
        $(this).click(function () {
            $(this).parent().siblings('.t').html($(this).html());
            $(this).addClass('on').siblings().removeClass();
            $(this).parent().toggle();
        });
    });
    $('.qis_but .prev').each(function (index) {
        $(this).click(function () {
            prev_html = $(this).siblings('ul').find('.on').prev().html();
            if (prev_html) {
                $(this).siblings('ul').find('.on').prev().addClass('on').siblings().removeClass('on');
                $(this).siblings('.t').html(prev_html);
            }
        });
    });
    $('.qis_but .next').each(function (index) {
        $(this).click(function () {
            next_html = $(this).siblings('ul').find('.on').next().html();
            if (next_html) {
                $(this).siblings('ul').find('.on').next().addClass('on').siblings().removeClass('on');
                $(this).siblings('.t').html(next_html);
            }
        });
    });
});