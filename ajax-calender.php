<?php
/**
* Template Name: カレンダー
*/?>
<!DOCTYPE html>
<html>
<head>
    <title>カレンダー</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/calender.css">
</head>
<body>

    <?php
    $url = $_SERVER["REQUEST_URI"];
    $url = str_replace('/admission/guidance/calender/', '', $url);
    if(strpos($url,'?cal=&') !== false){
        $str = str_replace('?cal=&', '', $url);
        $str = explode("&", $str);
        $key = $str[0].sprintf('%02d', $str[1]);
    }
    $key = ($key) ? $key : date('Ym');
    $calen = array();
    //土曜,イブニング,オープンスクール
        $args = array(
            'posts_per_page' => -1,
            'order' => 'ASC',
            'meta_key' => 'deadline',
            'orderby' => 'meta_value',
            'post_type' => array('saturday','evening','open_school'),
            'meta_query' => array(
                    'key' => 'deadline',
                    'value' => $key,
                    'compare' => 'LIKE'
                )
        );
    
    $the_query = new WP_Query( $args );
    if ($the_query->have_posts()):?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
            <?php $calen[] = array(get_post_type_object(get_post_type())->name,date("j", strtotime(get_field('deadline'))),'blue');?>
        <?php endwhile;?>
    <?php endif;wp_reset_postdata();?>

    <?php
    $dd = date("Y-m", strtotime($key.'01'));
    // 開始日
    $args = array(
            'posts_per_page' => -1,
            'order' => 'ASC',
            'post_type' => array('saturday','evening','open_school')
        );
    
    $the_query = new WP_Query( $args );
    if ($the_query->have_posts()):?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
            <?php if(strpos(get_field('start_time'),$dd) !== false):?>
                <?php $calen[] = array(get_post_type_object(get_post_type())->name,date("j", strtotime(get_field('start_time'))),'red');?>
            <?php endif;?>
        <?php endwhile;?>
    <?php endif;wp_reset_postdata();?>



    <?php
    //説明会一覧ページ
    $args = array(
        'posts_per_page' => -1,
        'page_id' => 472
    );
    $the_query = new WP_Query( $args );
    if ($the_query->have_posts()):?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>

            <!-- 見学可能な学校行事 -->
            <?php if(have_rows('event')):?>
                <?php while(have_rows('event')): the_row(); ?>
                    <?php if(strpos(get_sub_field('date'),$key) !== false):?>
                        <?php $calen[] = array('event',date("j", strtotime(get_sub_field('date'))),'blue');?>
                    <?php endif;?>
                <?php  endwhile; ?>
            <?php endif; ?>
            <!-- 学校説明会（一般・特別選抜入試受験者対象） -->
            <?php if(have_rows('general')):?>
                <?php while(have_rows('general')): the_row(); ?>
                    <?php if(strpos(get_sub_field('date'),$key) !== false):?>
                        <?php $calen[] = array('general',date("j", strtotime(get_sub_field('date'))),'blue');?>
                    <?php endif;?>
                <?php  endwhile; ?>
            <?php endif; ?>
            <!-- 入試説明会（一般・特別選抜入試受験者対象） -->
            <?php if(have_rows('entrance')):?>
                <?php while(have_rows('entrance')): the_row(); ?>
                    <?php if(strpos(get_sub_field('date'),$key) !== false):?>
                        <?php $calen[] = array('entrance',date("j", strtotime(get_sub_field('date'))),'blue');?>
                    <?php endif;?>
                <?php  endwhile; ?>
            <?php endif; ?>
            <!--  国際学級入試説明会（＝海外帰国生徒・保護者対象）-->
            <?php if(have_rows('entrance_international')):?>
                <?php while(have_rows('entrance_international')): the_row(); ?>
                    <?php if(strpos(get_sub_field('date'),$key) !== false):?>
                        <?php $calen[] = array('entrance_international',date("j", strtotime(get_sub_field('date'))),'blue');?>
                    <?php endif;?>
                <?php  endwhile; ?>
            <?php endif; ?>
            <!-- 学校説明会（学外） -->
            <?php if(have_rows('international')):?>
                <?php while(have_rows('international')): the_row(); ?>
                    <?php if(strpos(get_sub_field('date'),$key) !== false):?>
                        <?php $calen[] = array('international',date("j", strtotime(get_sub_field('date'))),'green');?>
                    <?php endif;?>
                <?php  endwhile; ?>
            <?php endif; ?>
           
        <?php endwhile;?>
    <?php endif;wp_reset_postdata();?>
    <?php $php_json = json_encode($calen);?>

<table align="center" border="5" bordercolor="#8DB0BD" cellpadding="8" cellspacing="0" id="calendar">
    <script language="JavaScript">
        let js_array = <?php echo $php_json; ?>;
        today    = new Date();
if(location.search.indexOf("&") > 0) {                    //　年月取得
        query    = new Array();
        query    = location.search.split("&");
        year    = parseInt(query[1]);                    //　年
        month    = parseInt(query[2]);                    //　月
    }
    else {
        today    = new Date();
        year    = today.getFullYear();                    //　今日の年
        month    = today.getMonth() + 1;                    //　今日の月
    }
    start        = new Date(year + "/" + month + "/1");
    startday    = start.getDay();                    //　１日の曜日
    days        = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    if(month == 2 && (year % 4 == 0 && year % 100 != 0 || year % 400 == 0)) {
        days[1]++;                            //　うるう年
    }
    enddate        = days[month - 1];                    //　最後の日
    prevyear    = year;                            //　前月・次月
    prevmonth    = month - 1;
    nextyear    = year;
    nextmonth    = month + 1;
    if(prevmonth < 1) {
        prevyear--;
        prevmonth += 12;
    }
    else if(nextmonth > 12) {
        nextyear++;
        nextmonth -= 12;
    }
    document.write('<tr>');
    document.write('<td colspan="7" align="center">');
    document.write('<a href="//kogyokusha.ed.jp/admission/guidance/calender/?cal=&', prevyear, '&', prevmonth, '" style="font-size:10px">≪前月</a>　');
    document.write(year, '<span style="font-size:10px">年</span>');
    document.write(month, '<span style="font-size:10px">月</span>　');
    document.write('<a href="//kogyokusha.ed.jp/admission/guidance/calender/?cal=&', nextyear, '&', nextmonth, '" style="font-size:10px">次月≫</a>');
    document.write('</td>');
    document.write('</tr>');
    document.write('<tr>');
    document.write('<td align="center" style="font-size:12px;color:#ffffff;background-color:#ff8484;">日</td>');
    document.write('<td align="center" style="font-size:12px;background-color: #c5c5c5;">月</td>');
    document.write('<td align="center" style="font-size:12px;background-color: #c5c5c5;">火</td>');
    document.write('<td align="center" style="font-size:12px;background-color: #c5c5c5;">水</td>');
    document.write('<td align="center" style="font-size:12px;background-color: #c5c5c5;">木</td>');
    document.write('<td align="center" style="font-size:12px;background-color: #c5c5c5;">金</td>');
    document.write('<td align="center" style="font-size:12px;color:#ffffff;background-color:#6d6dff;">土</td>');
    document.write('</tr>');
    count = 0;
    for(i = 0 ; i < startday ; i++) {                    //　１日の曜日までの空欄
        if(count % 7 == 0) {
            document.write('<tr>');
        }
        document.write('<td>　</td>');
        ++count; 
    }
    for(i = 1 ; i <= enddate ; i++) {                    //　日付を書き出す
        var vv = undefined;
        if(count % 7 == 0) {
            document.write('<tr>');
        }
        document.write('<td align="right"  style="');
        if(count % 7 == 0) {
            document.write('color:red;');
        }
        if(count % 7 == 6) {
            document.write('color:blue;');
        }
        if(year == today.getFullYear() && month == today.getMonth() + 1 && i == today.getDate()){
            document.write('background-color: #f5c89a;');
        }
        document.write('">',i);
        js_array.forEach(function(v){
            if(v[1] == i){
                var d = "parent.location.href='/admission/guidance#"+v[0]+"'";
                document.write('<p><a style="text-decoration: none;color:',v[2],'" onClick="',d,'">■</a></p>');
            }
        });
        // for(var v of js_array) {
        //     if(v[1] == i){
        //         var d = "parent.location.href='/admission/guidance#"+v[0]+"'";
        //         document.write('<p><a style="text-decoration: none;color:',v[2],'" onClick="',d,'">■</a></p>');
        //     }
        // }
        document.write('</td>');
        ++count;
        if(count % 7 == 0) {
            document.write('</tr>');
        }
    }
    while(count % 7 != 0) {                            //　最後の日から土曜までの空欄
        document.write('<td>　</td>');
        ++count;
        if(count % 7 == 0) {
            document.write('</tr>');
        }
    }

</script>
</table>
</body>
</html>