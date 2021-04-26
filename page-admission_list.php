<?php
/**
* Template Name: 説明会一覧
*/
global $my_global_var;
$messege = $my_global_var;
$my_global_var = "";
get_header(); ?>
<?php custom_breadcrumb();?>
  <div id="container" class="cf school-life">
        <div id="main" class="to-studens_briefing-main">
            <?php get_sidebar('admission');?>
            <div class="right-wrap">
                <div class="ttl-area">
                    <h2 class="to-studens_briefing-ttl">入学説明会一覧<p>2/20の土曜説明会は中止になりました。<!--<br><span>（詳細は<a href="/">トップページ</a>でご確認ください）</span>--></p></h2>
                    <p><span>本校では、一人でも多くの方々に本校を知っていただくために、<br>年間を通して各種説明会や受験生向け体験イベントを実施しています。<br>また、在校生徒や保護者だけでなく、受験生や保護者の方が見学可能な学校行事もあります。 </span>説明会の種類ごとに日程が異なります。<br>日程を確認するには、各説明会のボタンをクリックしてください。</p>
                </div>
                <div class="link-inpage">
                    <a href="#event" class="link-btn-text"><div class="text-center"><div class="link-btn-text"><span>見学可能な<br>学校行事</span></div>2019年度、<br>見学可能な学校行事の<br>一覧です。</div></a>
                    <a href="#general" class="link-btn-text"><div class="text-center"><div class="link-btn-text"><span>学校説明会</span></div>攻玉社の教育、<br>学校生活・入試制度等に<br>ついての説明会です。</div></a>
                    <a href="#entrance" class="link-btn-text"><div class="text-center"><div class="link-btn-text"><span>入試説明会</span></div>入試問題の傾向と対策、<br>入試要項、校内施設<br>見学等の説明会です。</div></a>
                    <a href="#entrance_international" class="link-btn-text"><div class="text-center"><div class="link-btn-text"><span>国際学級<br>入試説明会</span></div>海外帰国生徒・<br>保護者を対象とした<br>説明会です。</div></a>
                    <a href="#saturday" class="link-btn-text"><div class="text-center"><div class="link-btn-text"><span>土曜説明会</span></div>攻玉社の教育、<br>学校生活等についての<br>ミニ説明会です。</div></a>
                    <a href="#open_school" class="link-btn-text"><div class="text-center"><div class="link-btn-text"><span>オープン<br>スクール</span></div>理科実験教室、クラブ体験等、<br>実際に体験できる<br>数少ないイベントです。</div></a>
                    <a href="#international" class="link-btn-text"><div class="text-center"><div class="link-btn-text"><span>学外の<br>学校説明会</span></div>本校が参加する、<br>外部の団体・学習塾等主催の<br>説明会です。</div></a>
                </div>
                <p class="txt-area">※｢土曜説明会｣｢オープンスクール｣は、このホームページの｢申し込みフォーム｣からのみ受け付けており、お電話による申し込み・キャンセル等は一切受け付けておりません。皆様のご理解とご協力をお願いいたします。</p>
				    <div class="calendar-area calendar-sp">
        <div class="calendar-ttl">入試関連イベント・年間カレンダー</div>
        <div class="calendar">
<iframe src="//kogyokusha.ed.jp/admission/guidance/calender/" id="calendar"></iframe></div>
        <div class="calendar-txt">
            <p class="calendar-txt-ttl">日付下の<span class="purple">■</span><span class="green">■</span><span class="red">■</span>をClick!</p>
            <div class="calendar-txt-description"><p><span class="purple">■</span>校内での説明会開催日</p>
            <p><span class="green">■</span>学外での説明会開催日</p>
            <p><span class="red">■</span>土曜説明会・オープンスクール申し込み受付開始日<br>※申し込み受付開始は、実施日の2週間前の土曜9:00〜となります。</p></div>
        </div>
    </div>
                <div class="grade-list-warp">
                    <!-- ▽ 見学可能な学校行事 ▽ -->
                    <div class="ttl-area table-ttl briefing-table" id="event">
                        <p><span class="to-studens_briefing-ttl-sub">見学可能な学校行事（2019年度）</span></p>
                    </div>
<!--<p style="font-weight: bold;">現在今年度の日程を調整中です。<br>確定次第公開します。</p>-->
                    <table border class="lines" cellspacing="0" width="100%">

                        <tr>
                        	<th width="">行事名</th>
                            <th>期　日</th>
                            <th>時　間</th>
                            <th>場　所</th>
                        </tr>
                        <?php if(have_rows('event')): ?>
							<?php while(have_rows('event')): the_row(); ?>
								<tr>
			                        <td><?php the_sub_field('event_name'); ?></td>
			                        <td><?php the_sub_field('date_txt'); ?></td>
			                        <td><?php the_sub_field('time_target'); ?></td>
			                        <td><?php the_sub_field('place'); ?></td>
			                    </tr>
							<?php endwhile; ?>
						<?php else:?>
						<?php endif; ?>

                    </table>


                    <p class="h5"></p>
                    <p class="txtnarrow">
                    ※学校行事については、天候等により、変更または中止する場合がありますので、事前にお電話でご確認されることをおすすめします。
                    </p>

                    <!-- △ 見学可能な学校行事 △ -->
                    <!-- ▽ 学校説明会 ▽ -->
                    <div class="ttl-area table-ttl briefing-table" id="general" name="general">
                        <p><span class="to-studens_briefing-ttl-sub">学校説明会（一般生徒・父母対象/事前申込不要）</span></p>
                    </div>
<!--<p style="font-weight: bold;">現在今年度の日程を調整中です。<br>確定次第公開します。</p>-->
                     <table border class="lines" cellspacing="0" width="100%">

                        <tr>
                        	<th width="10%">回</th>
	                        <th width="25%">時　間</th>
	                        <th width=40%>時間（対象学年）</th>
	                        <th width=25%>場　所</th>
	                    </tr>
	                    <?php if(have_rows('general')): $i = 1;?>
							<?php while(have_rows('general')): the_row(); ?>
								<tr>
									<td><?php echo $i;?></td>
			                        <td><?php echo mysql2date('Y年n月j日 (D)',get_sub_field('date')); ?></td>
			                        <td><?php the_sub_field('time_target'); ?></td>
			                        <td><?php the_sub_field('place'); ?></td>
			                    </tr>
							<?php $i++; endwhile; ?>
						<?php else:?>
						<?php endif; ?>

                    </table>


                    <p class="h5"></p>
                    <p class="txtnarrow">

                    ※上履き不要。</p>

                    <!-- △ 学校説明会 △ -->
                    <!-- ▽ 入試説明会 ▽ -->
                    <div class="ttl-area table-ttl briefing-table" id="entrance">
                        <p><span class="to-studens_briefing-ttl-sub">入試説明会（一般生徒・父母対象/事前申込不要）</span></p>
                    </div>
					<p style="font-weight: bold;color: red;">※動画配信になる場合がございます。開催日の3週間前にご確認ください。</p>
					<p style="font-weight: bold;">※各回とも説明内容は同じです。</p>
                     <table border class="lines" cellspacing="0" width="100%">

                        <tr>
                        	<th width="10%">回</th>
	                        <th width="25%">期　日</th>
	                        <th width=40%>時間（対象学年）</th>
	                        <th width=25%>場　所</th>
	                    </tr>
	                    <?php if(have_rows('entrance')): $i = 1;?>
							<?php while(have_rows('entrance')): the_row(); ?>
								<tr>
									<td><?php echo $i;?></td>
			                        <td><?php echo mysql2date('Y年n月j日 (D)',get_sub_field('date')); ?></td>
			                        <td><?php the_sub_field('time_target'); ?></td>
			                        <td><?php the_sub_field('place'); ?></td>
			                    </tr>
							<?php $i++; endwhile; ?>
						<?php else:?>
						<?php endif; ?>
                        
                    </table>

                    <p class="h5"></p>
                    <p class="txtnarrow">
                    ※上履き不要。</p>

                    <!-- △ 入試説明会 △ -->
                    <!-- ▽ 国際学級入試説明会 ▽ -->
                    <div class="ttl-area table-ttl" id="entrance_international">
                        <p><span class="to-studens_briefing-ttl-sub briefing-table" id="briefing-table4">国際学級入試説明会（海外帰国生徒・父母対象/事前申込不要）</span></p>
                    </div>
<p style="font-weight: bold;">※各回とも説明内容は同じです。</p>
                     <table border class="lines" cellspacing="0" width="100%">

                        <tr>
                        	<th width="10%">回</th>
	                        <th width="25%">期　日</th>
	                        <th width=40%>時間（対象学年）</th>
	                        <th width=25%>場　所</th>
                        </tr>
                        <?php if(have_rows('entrance_international')): $i = 1;?>
							<?php while(have_rows('entrance_international')): the_row(); ?>
								<tr>
									<td><?php echo $i;?></td>
			                        <td><?php echo mysql2date('Y年n月j日 (D)',get_sub_field('date')); ?></td>
			                        <td><?php the_sub_field('time'); ?></td>
			                        <td><?php the_sub_field('place'); ?></td>
			                    </tr>
							<?php $i++; endwhile; ?>
						<?php else:?>
						<?php endif; ?>
                    </table>

                    <p class="h5"></p>
                    <p class="txtnarrow">
                    ※事前予約不要。※上履き不要。</p>

                    <!-- △ 国際学級入試説明会 △ -->
                    <!-- ▽ 土曜説明会 ▽ -->
                    <div class="ttl-area table-ttl briefing-table" id="saturday">
                        <p><span class="to-studens_briefing-ttl-sub">土曜説明会</span></p>
                    </div>
					<p style="font-weight: bold;color: red;">※中止になる場合がございます。開催日の3週間前にご確認ください。</p>
					<p style="font-weight: bold;">※実施日を追加する場合もあります。</p>
                    <p class="table-txt">攻玉社の教育、学校生活等についてのミニ説明会です。中学２年生が案内する校内主要施設のミニツアーが好評です。<br>学食で昼食をとることもできます。<span>インターネットによる事前予約が必要です。定員に達し「受付終了」となっていても、キャンセルが発生した場合には、自動的に受付が再開されます。</span></p>
					<p class="table-txt" style="color: red">申し込み受付開始は実施日の2週間前の土曜9：00〜となります。</p>
                     <table border class="lines" cellspacing="0" width="100%">
                        <tr>
                        	<th width="10%">回</th>
	                        <th width="20%">期　日</th>
	                        <th width=30%>時　間</th>
	                        <th width=20%>場　所</th>
	                        <th width=10%>定員</th>
	                        <th width=10%%>受付状況</th>
                        </tr>
                        </tr>
                        <?php
                        $args = array(
	                        'posts_per_page' => -1,
	                        'order' => 'ASC',
	                        'meta_key' => 'deadline',
	                        'orderby' => 'meta_value',
					        'post_type' => 'saturday'
					    );
                        $the_query = new WP_Query( $args );
						if ($the_query->have_posts()):$i = 1;?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
								<?php
                                // $deadline = get_field('deadline');
                                $deadline = date('Ymd', strtotime('+1 day', strtotime(mysql2date('Y-m-d H:i:s',get_field('deadline')))));
								$start_time = mysql2date('YmdHis',get_field('start_time'));
								$end_time = mysql2date('YmdHis',get_field('end_time'));
								$capacity = get_field('capacity');

								$idd = get_the_ID();
								?>
								<tr>
									<td><?php echo $i;?></td>
			                        <td><?php echo mysql2date('Y年n月j日 (D)',get_field('deadline')); ?></td>
			                        <td><?php the_field('time'); ?></td>
			                        <td><?php the_field('place'); ?></td>
			                        <td><?php the_field('capacity'); ?></td>
		                        	<?php
		                        	$arg = array(
										'post_type' => 'mwf_1672',
										'posts_per_page' => -1,
										'post_status' => 'publish',
										'meta_key' => '説明会番号',
								        'meta_value' => $idd, 
								        'meta_compare' => '='
								    );
								   $qquery = new WP_Query( $arg );
									if ($qquery->have_posts()):$c = 0;?>
										<?php while ( $qquery->have_posts() ) : $qquery->the_post();?>
											<?php $c = $c+(int)get_field('参加人数');?>
										<?php endwhile;?>
			                        <?php endif;wp_reset_postdata();?>
								    <?php if(date('Ymd') < $deadline && date('YmdHis') > $start_time && date('YmdHis') < $end_time):?>
			                        	<?php if($capacity > (int)$c):?>
			                        	    <td style="background-color: #aeefec;"><a href="/std-form/?post_id=<?php echo $idd; ?>">応募する</a></td>
		                        	    <?php else:?>
		                        	    	<td style="background-color: #a7a7a7;">受付終了</td>
		                        	    <?php endif;?>
		                        	<?php elseif($deadline > date('Ymd') && date('YmdHis') < $start_time):?>
		                                <td style="background-color: #a7a7a7;">申し込み準備中</td>
									<?php elseif($deadline > date('Ymd') && date('YmdHis') < $end_time):?>
		                                <td style="background-color: #a7a7a7;">受付終了</td>
		                            <?php elseif($deadline > date('Ymd')):?>
		                                <td style="background-color: #a7a7a7;">受付終了</td>
	                        	    <?php else:?>
	                        	        <td style="background-color: #a7a7a7;">説明会終了</td>
	                        	    <?php endif;?>
			                    </tr>
	                        <?php $i++;$c = 0; endwhile;?>
                        <?php else:?>
		                <?php endif;wp_reset_postdata();?>
                    </table>


                    <p class="h5"></p>
                    <p class="txtnarrow">
                    ※上履き不要。<br/>
                    </p>
                    <!-- <div align="center" class="table-btn"><input type="button" value="土曜説明会の申し込みはこちら" onClick="std()" ><input type="button" value="土曜説明会のキャンセルはこちら" onClick="std_cnc()"></div> -->
                    <!-- <div class="table-btn">
                        <div><a href=""><p>土曜説明会の<span>申し込みはこちら</span></p><img src="<?php echo get_template_directory_uri();?>/img/icon-btn-arrow.png"></a></div>
                        <div><a href=""><p>土曜説明会の<span>キャンセルはこちら</span></p><img src="<?php echo get_template_directory_uri();?>/img/icon-btn-arrow-gray.png"></a></div>
                    </div> -->

                    <!-- △ 土曜説明会 △ -->
                    <!-- ▽ イブニング説明会 ▽ -->
                   <!-- <div class="ttl-area table-ttl briefing-table" id="evening">
                        <p><span class="to-studens_briefing-ttl-sub">イブニング説明会</span></p>
                    </div>
<!--<p style="font-weight: bold;">現在今年度の日程を調整中です。<br>確定次第公開します。</p>-->
                   <!-- <p class="table-txt">平日夜に開催するミニ説明会です。攻玉社の教育、学校生活等についての説明、質疑応答など。<br><span>インターネットによる事前予約が必要です。定員に達し「受付終了」となっていても、キャンセルが発生した場合には、自動的に受付が再開されます。</span></p>
                    <table border class="lines" cellspacing="0" width="100%">

                        <tr>
                        	<th width="10%">回</th>
	                        <th width="20%">期　日</th>
	                        <th width=30%>時　間</th>
	                        <th width=20%>場　所</th>
	                        <th width=10%>定員</th>
	                        <th width=10%>受付状況</th>
                        </tr>
                        <?php
                        $args = array(
	                        'posts_per_page' => -1,
	                        'order' => 'ASC',
	                        'meta_key' => 'deadline',
	                        'orderby' => 'meta_value',
					        'post_type' => 'evening'
					    );
                        $the_query = new WP_Query( $args );
						if ($the_query->have_posts()):$i = 1;?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
								<?php
								$deadline = get_field('deadline');
								$start_time = mysql2date('YmdHis',get_field('start_time'));
								$end_time = mysql2date('YmdHis',get_field('end_time'));
								$capacity = get_field('capacity');
								
								$idd = get_the_ID();
								?>
								<tr>
									<td><?php echo $i;?></td>
			                        <td><?php echo mysql2date('Y年n月j日 (D)',get_field('deadline')); ?></td>
			                        <td><?php the_field('time'); ?></td>
			                        <td><?php the_field('place'); ?></td>
			                        <td><?php the_field('capacity'); ?></td>
		                        	<?php
		                        	$arg = array(
								      'post_type' => 'mwf_1673',
								      'posts_per_page' => -1,
								      'post_status' => 'publish',
								      'meta_key' => '説明会番号',
								      'meta_value' => $idd, 
								      'meta_compare' => '='
								    );
								   $qquery = new WP_Query( $arg );
									if ($qquery->have_posts()):$c = 0;?>
										<?php while ( $qquery->have_posts() ) : $qquery->the_post();?>
											<?php $c = $c+(int)get_field('参加人数');?>
										<?php endwhile;?>
			                        <?php endif;wp_reset_postdata();?>
								    <?php if(date('Ymd') < $deadline && date('YmdHis') > $start_time && date('YmdHis') < $end_time):?>
			                        	<?php if($capacity > (int)$c):?>
			                        	    <td style="background-color: #aeefec;"><a href="/eve-form/?post_id=<?php echo $idd; ?>">応募する</a></td>
		                        	    <?php else:?>
		                        	    	<td style="background-color: #a7a7a7;">受付終了</td>
		                        	    <?php endif;?>
		                        	<?php elseif($deadline > date('Ymd') && date('YmdHis') < $start_time):?>
		                                <td style="background-color: #a7a7a7;">申し込み準備中</td>
		                            <?php elseif($deadline > date('Ymd') && date('YmdHis') < $end_time):?>
		                                <td style="background-color: #a7a7a7;">受付終了</td>
		                            <?php elseif($deadline > date('Ymd')):?>
		                                <td style="background-color: #a7a7a7;">受付終了</td>
	                        	    <?php else:?>
	                        	        <td style="background-color: #a7a7a7;">説明会終了</td>
	                        	    <?php endif;?>
			                    </tr>
	                        <?php $i++;$c = 0; endwhile;?>
                        <?php else:?>
		                <?php endif;wp_reset_postdata();?>

                    </table>

                    <p class="h5"></p>
                    <p class="txtnarrow">
                    ※上履き不要。</p>
                    <!-- <div align="center" class="table-btn"><input type="button" value="イブニング説明会の申し込みはこちら" onClick="std()" ><input type="button" value="イブニング説明会のキャンセルはこちら" onClick="std_cnc()"></div> -->
                    <!-- <div class="table-btn">
                        <div><a href=""><p>イブニング説明会の<span>申し込みはこちら</span></p><img src="<?php echo get_template_directory_uri();?>/img/icon-btn-arrow.png"></a></div>
                        <div><a href=""><p>イブニング説明会の<span>キャンセルはこちら</span></p><img src="<?php echo get_template_directory_uri();?>/img/icon-btn-arrow-gray.png"></a></div>
                    </div> -->

                    <!-- △ イブニング説明会 △ -->
                    <!-- ▽ オープンスクール ▽ -->
           
                    <div class="ttl-area table-ttl briefing-table" id="open_school">
                        <p><span class="to-studens_briefing-ttl-sub">オープンスクール</span></p>
                    </div>
<!--<p style="font-weight: bold;">現在今年度の日程を調整中です。<br>確定次第公開します。</p>-->
                    <p class="table-txt">理科実験教室、クラブ体験等、実際に小学生が体験できる数少ないイベントです。<br><span>インターネットによる事前予約が必要です。定員に達し「受付終了」となっていても、キャンセルが発生した場合には、自動的に受付が再開されます。</span></p>
					<p class="table-txt" style="color: red">申し込み受付開始は実施日の2週間前の土曜9：00〜となります。</p>
                     <table border class="lines" cellspacing="0" width="100%">

                        <tr>
                        	<th>回</th>
	                        <th>対　象</th>
	                        <th>内　容</th>
	                        <th>期　日</th>
	                        <th>時　間</th>
	                        <th>場　所</th>
	                        <th>定員</th>
	                        <th>受付状況</th>
                        </tr>
                        <?php
                        //var_dump(date('YmdHis'));
                        $args = array(
	                        'posts_per_page' => -1,
	                        'order' => 'ASC',
	                        'meta_key' => 'deadline',
	                        'orderby' => 'meta_value',
					        'post_type' => 'open_school'
					    );
                        $the_query = new WP_Query( $args );
						if ($the_query->have_posts()):$i = 1;?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
								<?php
                                // $deadline = get_field('deadline');
                                $deadline = date('Ymd', strtotime('+1 day', strtotime(mysql2date('Y-m-d H:i:s',get_field('deadline')))));
								$start_time = mysql2date('YmdHis',get_field('start_time'));
								$end_time = mysql2date('YmdHis',get_field('end_time'));
								$capacity = get_field('capacity');

								$idd = get_the_ID();
								?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo implode("・",get_field('target')); ?>年生</td>
									<td><?php the_field('content'); ?></td>
			                        <td><?php echo mysql2date('Y年n月j日 (D)',get_field('deadline')); ?></td>
			                        <td><?php the_field('time'); ?></td>
			                        <td><?php the_field('place'); ?></td>
			                        <td><?php the_field('capacity'); ?></td>
		                        	<?php
		                        	$arg = array(
								      'post_type' => 'mwf_1674',
								      'posts_per_page' => -1,
								      'post_status' => 'publish',
								      'meta_key' => '説明会番号',
								      'meta_value' => $idd, 
								      'meta_compare' => '='
								    );
								   $qquery = new WP_Query( $arg );

                                    // $cancel_arg = array(
                                    //   'post_type' => 'mwf_1693',
                                    //   'posts_per_page' => -1,
                                    //   'post_status' => 'publish',
                                    //   'meta_key' => '説明会番号',
                                    //   'meta_value' => $idd, 
                                    //   'meta_compare' => '='
                                    // );
                                    // $cancel_query = new WP_Query( $cancel_arg );
                                    // $cancel_array = [];
                                    // if ($cancel_query->have_posts()) {
                                    //     $cancel_array = [];
                                    //     while ($cancel_query->have_posts()) {
                                    //         $cancel_query->the_post();
                                    //         $cancel_array[] = get_field('お問い合わせ番号');
                                    //     }
                                    // }
									if ($qquery->have_posts()):$c = 0;?>
										<?php while ( $qquery->have_posts() ) : $qquery->the_post();?>
                                            <?php //if(array_search(get_field('tracking_number'), $cancel_array) === false): ?>
											<?php $c = $c+(int)get_field('参加人数');?>
                                            <?php //endif; ?>
										<?php endwhile;?>
			                        <?php endif;wp_reset_postdata();?>

								    <?php if(date('Ymd') < $deadline && date('YmdHis') > $start_time && date('YmdHis') < $end_time):?>
			                        	<?php if($capacity > (int)$c):?>
			                        	    <td style="background-color: #aeefec;"><a href="/open-form/?post_id=<?php echo $idd; ?>">応募する</a></td>
		                        	    <?php else:?>
		                        	    	<td style="background-color: #a7a7a7;">受付終了</td>
		                        	    <?php endif;?>
		                        	<?php elseif($deadline > date('Ymd') && date('YmdHis') < $start_time):?>
		                                <td style="background-color: #a7a7a7;">申し込み準備中</td>
		                            <?php elseif($deadline > date('Ymd') && date('YmdHis') < $end_time):?>
		                                <td style="background-color: #a7a7a7;">受付終了</td>
		                            <?php elseif($deadline > date('Ymd')):?>
		                                <td style="background-color: #a7a7a7;">受付終了</td>
	                        	    <?php else:?>
	                        	        <td style="background-color: #a7a7a7;">説明会終了</td>
	                        	    <?php endif;?>
			                    </tr>
	                        <?php $i++;$c = 0; endwhile;?>
                        <?php else:?>
		                <?php endif;wp_reset_postdata();?>
                    </table>


                    <p class="h5"></p>
                    <p class="txtnarrow">
                    ※すべてのカテゴリーで、小学４年生からご参加いただけます。</p>
                    <!-- <div align="center" class="table-btn"><div class="table-btn-"><input type="button" value="オープンスクールの申し込みはこちら" onClick="std()" ><span><img src="<?php echo get_template_directory_uri();?>/img/icon-btn-arrow.png"></span><input type="button" value="オープンスクールのキャンセルはこちら" onClick="std_cnc()"><span><img src="<?php echo get_template_directory_uri();?>/img/icon-btn-arrow.png"></span></div> -->
                    <!-- <div class="table-btn">
                        <div><a href=""><p>オープンスクールの<span>申し込みはこちら</span></p><img src="<?php echo get_template_directory_uri();?>/img/icon-btn-arrow.png"></a></div>
                        <div><a href=""><p>オープンスクールの<span>キャンセルはこちら</span></p><img src="<?php echo get_template_directory_uri();?>/img/icon-btn-arrow-gray.png"></a></div>
                    </div> -->

                    <!-- △ オープンスクール △ -->
                    <!-- ▽ 学校説明会（学外） ▽ -->

                    <div class="ttl-area table-ttl briefing-table" id="international">
                        <p><span class="to-studens_briefing-ttl-sub">学校説明会（学外）</span></p>
                    </div>
<!--<p style="font-weight: bold;">現在今年度の日程を調整中です。<br>確定次第公開します。</p>-->
                     <table border class="linesL" cellspacing="0" width="100%">

                        <tr>
                        	<th style="text-align:center">回</th>
                            <th style="text-align:center">期　日</th>
                            <th style="text-align:center">説明会名称（主催者）</th>
                            <th style="text-align:center">会場</th>
                        </tr>
                        <?php if(have_rows('international')): $i = 1;?>
							<?php while(have_rows('international')): the_row(); ?>
								<tr>
									<td style="text-align:center;" class="smartheight"><?php echo $i;?></td>
			                        <td style="text-align:center"><?php echo mysql2date('Y年n月j日 (D)',get_sub_field('date')); ?></td>
			                        <td><a target="_blank" href="<?php the_sub_field('link');?>" target="_blank"><?php the_sub_field('entrance_name'); ?></a>（<?php the_sub_field('organizer');?>）</td>
			                        <td><?php the_sub_field('venue'); ?></td>
			                    </tr>
							<?php $i++; endwhile; ?>
						<?php else:?>
						<?php endif; ?>
                    </table>


                    <p class="h5"></p>
                    <p class="txtnarrow">
                    ※攻玉社のブースを用意し、相談を受け付けます。<br />
                    今年度も、各会場で行われる進学相談会に参加します（日時・会場が変更されることがあります）。<br />
                    各説明会での説明内容に違いはありませんので、都合のよい日時お近くの会場にお越しください。</p>
                    <!-- △ 学校説明会（学外） △ -->
                </div>
                <div class="table-btn">
                        <div class="table-btn-cancel"><a style="background: #858585;" href="/cnc-form/"><p><span>キャンセルはこちら</span></p><img src="<?php echo get_template_directory_uri();?>/img/icon-btn-arrow-gray.png"></a></div>
                    </div>
            </div>
        </div>
    </div>
    <?php if($messege !== ''):?>
    <div class="error-modal-area" <?php echo ($messege == '') ? 'style="display: none;"': 'style="display: block;"';?>>
      <div class="error-modal">
        <div class="modal-txt"><p class="red">※<?php echo $messege; ?></p></div>
        <div class="modal-btn"><p>確認</p></div>
      </div>
      <div class="modal-bg"></div>
    </div>
   <?php endif?>
<?php get_footer(); ?>