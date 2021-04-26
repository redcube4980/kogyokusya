<?php

// メインコンテンツの幅を指定
if ( ! isset( $content_width ) ) $content_width = 600;

// RSS2 の feed リンクを出力
add_theme_support( 'automatic-feed-links' );

// カスタムメニューを有効化
add_theme_support( 'menus' );

// カスタムメニューの「場所」を設定
register_nav_menu( 'header-navi', 'ヘッダーのナビゲーション' );

// サイドバーウィジットを有効化
register_sidebar( array(
	'name' => 'サイドバーウィジット-1',
	'id' => 'sidebar-1',
	'description' => 'サイドバーのウィジットエリアです。',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
) );

// 管理バーにログアウトを追加
function add_new_item_in_admin_bar() {
 global $wp_admin_bar;
 $wp_admin_bar->add_menu(array(
 'id' => 'new_item_in_admin_bar',
 'title' => __('ログアウト'),
 'href' => wp_logout_url()
 ));
 }

add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');

// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');

// バージョン更新を非表示にする
add_filter('pre_site_transient_update_core', '__return_zero');

//プラグイン更新通知を非表示
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

// APIによるバージョンチェックの通信をさせない
remove_action('wp_version_check', 'wp_version_check');
remove_action('admin_init', '_maybe_update_core');


// フッターWordPressリンクを非表示に
function custom_admin_footer() {
 echo '';
 }
add_filter('admin_footer_text', 'custom_admin_footer');


function remove_menus () {
    global $menu;
    unset($menu[15]); // リンク
    unset($menu[25]); // コメント
}
add_action('admin_menu', 'remove_menus');

function custom_post_labels($labels) {
    $labels->name = 'News'; // 投稿
    $labels->singular_name = 'News'; // 投稿
    $labels->add_new = '新規追加'; // 新規追加
    $labels->add_new_item = 'Newsを追加'; // 新規投稿を追加
    $labels->edit_item = '投稿の編集'; // 投稿の編集
    $labels->new_item = '新規News'; // 新規投稿
    $labels->view_item = 'Newsを表示'; // 投稿を表示
    $labels->search_items = 'Newsを検索'; // 投稿を検索
    $labels->not_found = 'Newsが見つかりませんでした。'; // 投稿が見つかりませんでした。
    $labels->not_found_in_trash = 'ゴミ箱内にNewsが見つかりませんでした。'; // ゴミ箱内に投稿が見つかりませんでした。
    $labels->parent_item_colon = ''; // (なし)
    $labels->all_items = 'News一覧'; // 投稿一覧
    $labels->archives = 'Newsアーカイブ'; // 投稿アーカイブ
    $labels->insert_into_item = 'Newsに挿入'; // 投稿に挿入
    $labels->uploaded_to_this_item = 'このNewsへのアップロード'; // この投稿へのアップロード
    $labels->featured_image = 'アイキャッチ画像'; // アイキャッチ画像
    $labels->set_featured_image = 'アイキャッチ画像を設定'; // アイキャッチ画像を設定
    $labels->remove_featured_image = 'アイキャッチ画像を削除'; // アイキャッチ画像を削除
    $labels->use_featured_image = 'アイキャッチ画像として使用'; // アイキャッチ画像として使用
    $labels->filter_items_list = 'Newsリストの絞り込み'; // 投稿リストの絞り込み
    $labels->items_list_navigation = 'Newsリストナビゲーション'; // 投稿リストナビゲーション
    $labels->items_list = 'Newsリスト'; // 投稿リスト
    $labels->menu_name = 'News'; // 投稿
    $labels->name_admin_bar = 'News'; // 投稿
    return $labels;
}
add_filter('post_type_labels_post', 'custom_post_labels');

//add_action('init', 'custom_single_post_permastruct');
//function add_article_post_permalink( $permalink ) {
    //$permalink = '/news-archive/%category%' . $permalink;
    //return $permalink;
//}
//add_filter( 'pre_post_link', 'add_article_post_permalink' );
 
//function add_article_post_rewrite_rules( $post_rewrite ) {
    //$return_rule = array();
    //foreach ( $post_rewrite as $regex => $rewrite ) {
        //$return_rule['/news-archive/%category%' . $regex] = $rewrite;
    //}
    //return $return_rule;
//}


function post_has_archive( $args, $post_type ) {
 
    if ( 'post' == $post_type ) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'news-archive'; //任意のスラッグ名
    }
    return $args;
 
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_year()) {
	    $title = get_the_time('Y年');
	}  elseif (is_month()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});


// ログイン画面 ロゴ変区
function login_logo_image() {
    echo '<style type="text/css">
            #login h1 a {
                background: url(' . get_bloginfo('template_directory') . '/img/logo-blue.png) no-repeat;
                width: 100%;
                background-size: 100% auto;
                height: 90px;
            }
    </style>';
}
add_action('login_head', 'login_logo_image');

// ロゴのリンク先を指定
function my_login_logo_url() {
 return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// ロゴのtitleテキストを指定
function my_login_logo_tit() {
 return get_option( 'blogname' );
}
add_filter( 'login_headertitle', 'my_login_logo_tit' );

//　改行の時に自動的にPタグが挿入されるのを防ぐ
remove_filter('the_content', 'wpautop');
remove_filter( 'the_excerpt', 'wpautop' );

// オートフォーマット関連の無効化
// add_action('init', function() {
//     remove_filter('the_title', 'wptexturize');
//     remove_filter('the_content', 'wptexturize');
//     remove_filter('the_excerpt', 'wptexturize');
//     remove_filter('the_title', 'wpautop');
//     remove_filter('the_content', 'wpautop');
//     remove_filter('the_excerpt', 'wpautop');
//     remove_filter('the_editor_content', 'wp_richedit_pre');
// });
// オートフォーマット関連の無効化 TinyMCE
function override_mce_options( $init_array ) {
    $init_array['indent']  = true;
    $init_array['wpautop'] = false;

    return $init_array;
}

add_filter( 'tiny_mce_before_init', 'override_mce_options' );

function custom_pagination($uri, $current, $last, $range = 5){
    $showitems = ($range * 2)+1;
    if(preg_match('/\\?/', $uri)){
        $uri .= '&';
    } else {
        $uri .= '?';
    }
    if(1 !== (int)$last){
        $prev = $current-1;
        $next = $current+1;
        $currentPage = false;
        $beforePage = false;
        $afterNum = 0;
        $path = get_template_directory_uri();
        echo "<ul class=\"pagination\">";
        for ($i=1; $i <= $last; $i++){
            if($i === 1 && $current !== 1){
                echo "<li class=\"page-item\"><a class=\"page-link\" href=\"{$uri}page={$prev}\"><img src=\"{$path}/images/pagi01.png\"></a></li>";
            }
            if($current === $i){
                echo "<li class=\"page-item active\"><a href=\"#\" onclick=\"return false;\" class=\"page-link\">{$current}</a></li>";
            } else {
                echo "<li class=\"page-item\"><a href=\"{$uri}page={$i}\" class=\"page-link\">{$i}</a></li>";
            }
            if($i == $last && $current != $last){
                echo "<li class=\"page-item\"><a class=\"page-link\" href=\"{$uri}page={$next}\"><img src=\"{$path}/images/pagi02.png\"></a></li>";
            }
        }
         echo "</ul>";
    }
}

/**
 * MW WP Form Error Message
 */
function add_mwform_validation_rule_name_for11( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['name1'] ) ) {
        $Validation->set_rule( 'name1', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['name2'] ) ) {
        $Validation->set_rule( 'name2', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-11', 'add_mwform_validation_rule_name_for11', 10, 2 );

function add_mwform_validation_rule_furikana_for11( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['furikana1'] ) ) {
        $Validation->set_rule( 'furikana1', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['furikana2'] ) ) {
        $Validation->set_rule( 'furikana2', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-11', 'add_mwform_validation_rule_furikana_for11', 10, 2 );

function add_mwform_validation_rule_exam_for11( $Validation, $data ) {
    $validation_message = 'ふりがなで入力してください。';
    if ( !empty( $data['furikana1']) && !preg_match('/^[ぁ-んァ-ヶー]+$/',$data['furikana1']) ) {
        $Validation->set_rule( 'furikana1', 'kana', array( 'message' => $validation_message ) );
    } elseif ( !empty( $data['furikana2'] ) && !preg_match('/^[ぁ-んァ-ヶー]+$/',$data['furikana2']) ) {
        $Validation->set_rule( 'furikana2', 'kana', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-11', 'add_mwform_validation_rule_exam_for11', 10, 2 );


function add_mwform_validation_rule_flname_for11( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['fname'] ) ) {
        $Validation->set_rule( 'fname', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['lname'] ) ) {
        $Validation->set_rule( 'lname', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-11', 'add_mwform_validation_rule_flname_for11', 10, 2 );

function add_mwform_validation_rule_birthday_for11( $Validation, $data ) {
    $validation_message = '未入力です。';
    $validation_messag = '半角数字で入力してください。';
    if ( empty( $data['byear'] ) ) {
        $Validation->set_rule( 'byear', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['bmonth'] ) ) {
        $Validation->set_rule( 'bmonth', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['bday'] ) ) {
        $Validation->set_rule( 'bday', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-11', 'add_mwform_validation_rule_birthday_for11', 10, 2 );


function add_mwform_validation_rule_bnum_for11( $Validation, $data ) {
  $validation_message = '半角数字で入力してください。';
  if ( !empty( $data['byear'] ) && !preg_match('/^[0-9]+$/',$data['byear']) ) {
    $Validation->set_rule( 'byear', 'numeric', array( 'message' => $validation_message ) );
  } elseif ( !empty( $data['bmonth'] ) && !preg_match('/^[0-9]+$/',$data['bmonth'])) {
    $Validation->set_rule( 'bmonth', 'numeric', array( 'message' => $validation_message ) );
  } elseif ( !empty( $data['bday'] ) && !preg_match('/^[0-9]+$/',$data['bday'])) {
    $Validation->set_rule( 'bday', 'numeric', array( 'message' => $validation_message ) );
  }
  return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-11', 'add_mwform_validation_rule_bnum_for11', 10, 2 );


// function add_mwform_validation_rule_date_for11( $Validation, $data ) {
//     $validation_message = '未入力です。';
//     if ( empty( $data['year'] ) ) {
//         $Validation->set_rule( 'year', 'noempty', array( 'message' => $validation_message ) );
//     } elseif ( empty( $data['month'] ) ) {
//         $Validation->set_rule( 'month', 'noempty', array( 'message' => $validation_message ) );
//     } elseif ( empty( $data['day'] ) ) {
//         $Validation->set_rule( 'day', 'noempty', array( 'message' => $validation_message ) );
//     } 
//     return $Validation;
// }
// add_filter( 'mwform_validation_mw-wp-form-11', 'add_mwform_validation_rule_date_for11', 10, 2 );

// function add_mwform_validation_rule_datenum_for11( $Validation, $data ) {
//     $validation_message = '半角数字で入力してください。';
//     if ( !empty( $data['year'] )  && !preg_match('/^[0-9]+$/',$data['year'])  ) {
//         $Validation->set_rule( 'year', 'numeric', array( 'message' => $validation_message ) );
//     } elseif ( !empty( $data['month'] )  && !preg_match('/^[0-9]+$/',$data['month'])  ) {
//         $Validation->set_rule( 'month', 'numeric', array( 'message' => $validation_message ) );
//     } elseif ( !empty( $data['day'] )  && !preg_match('/^[0-9]+$/',$data['day'])  ) {
//         $Validation->set_rule( 'day', 'numeric', array( 'message' => $validation_message ) );
//     } 
//     return $Validation;
// }
// add_filter( 'mwform_validation_mw-wp-form-11', 'add_mwform_validation_rule_datenum_for11', 10, 2 );

function my_validation_rule_3( $Validation ) {
    $Validation->set_rule( 'language', 'required', array(
        'message' => '必須項目です。'
    ) );
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-13', 'my_validation_rule_3' );




function add_mwform_validation_rule_name_for13( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['name1'] ) ) {
        $Validation->set_rule( 'name1', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['name2'] ) ) {
        $Validation->set_rule( 'name2', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-13', 'add_mwform_validation_rule_name_for13', 10, 2 );

function add_mwform_validation_rule_furikana_for13( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['furikana1'] ) ) {
        $Validation->set_rule( 'furikana1', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['furikana2'] ) ) {
        $Validation->set_rule( 'furikana2', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-13', 'add_mwform_validation_rule_furikana_for13', 10, 2 );

function add_mwform_validation_rule_kana_for13( $Validation, $data ) {
    $validation_message = 'ふりがなで入力してください。';
    if ( !empty( $data['furikana1'] )  && !preg_match('/^[ぁ-んァ-ヶー]+$/',$data['furikana1']) ) {
        $Validation->set_rule( 'furikana1', 'kana', array( 'message' => $validation_message ) );
    } 
    elseif ( !empty( $data['furikana2'] )  && !preg_match('/^[ぁ-んァ-ヶー]+$/',$data['furikana2']) ) {
        $Validation->set_rule( 'furikana2', 'kana', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-13', 'add_mwform_validation_rule_kana_for13', 10, 2 );

function add_mwform_validation_rule_flname_for13( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['fname'] ) ) {
        $Validation->set_rule( 'fname', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['lname'] ) ) {
        $Validation->set_rule( 'lname', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-13', 'add_mwform_validation_rule_flname_for13', 10, 2 );

function add_mwform_validation_rule_birthday_for13( $Validation, $data ) {
    $validation_message = '未入力です。';
    if ( empty( $data['byear'] ) ) {
        $Validation->set_rule( 'byear', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['bmonth'] ) ) {
        $Validation->set_rule( 'bmonth', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['bday'] )) {
        $Validation->set_rule( 'bday', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-13', 'add_mwform_validation_rule_birthday_for13', 10, 2 );

function add_mwform_validation_rule_bnum_for13( $Validation, $data ) {
    $validation_message = '半角数字で入力してください。';
    if ( !empty( $data['byear'] ) && !preg_match('/^[0-9]+$/',$data['byear']) ) {
        $Validation->set_rule( 'byear', 'numeric', array( 'message' => $validation_message ) );
    } elseif ( !empty( $data['bmonth'] ) && !preg_match('/^[0-9]+$/',$data['bmonth']) ) {
        $Validation->set_rule( 'bmonth', 'numeric', array( 'message' => $validation_message ) );
    } elseif ( !empty( $data['bday'] ) && !preg_match('/^[0-9]+$/',$data['bday']) ) {
        $Validation->set_rule( 'bday', 'numeric', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-13', 'add_mwform_validation_rule_bnum_for13', 10, 2 );

function add_mwform_validation_rule_date_for13( $Validation, $data ) {
    $validation_message = '未入力です。';
    if ( empty( $data['year'] ) ) {
        $Validation->set_rule( 'year', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['month'] ) ) {
        $Validation->set_rule( 'month', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['day'] ) ) {
        $Validation->set_rule( 'day', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-13', 'add_mwform_validation_rule_date_for13', 10, 2 );

function add_mwform_validation_rule_datenum_for13( $Validation, $data ) {
    $validation_message = '半角数字で入力してください。';
    if ( !empty( $data['year'] )  && !preg_match('/^[0-9]+$/',$data['year']) ) {
        $Validation->set_rule( 'year', 'numeric', array( 'message' => $validation_message ) );
    } elseif ( !empty( $data['month'] ) && !preg_match('/^[0-9]+$/',$data['month']) ) {
        $Validation->set_rule( 'month', 'numeric', array( 'message' => $validation_message ) );
    } elseif ( !empty( $data['day'] )  && !preg_match('/^[0-9]+$/',$data['day']) ) {
        $Validation->set_rule( 'day', 'numeric', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-13', 'add_mwform_validation_rule_datenum_for13', 10, 2 );




function add_mwform_validation_rule_name_for14( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['name1'] ) ) {
        $Validation->set_rule( 'name1', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['name2'] ) ) {
        $Validation->set_rule( 'name2', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-14', 'add_mwform_validation_rule_name_for14', 10, 2 );

function add_mwform_validation_rule_furikana_for14( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['furikana1'] ) ) {
        $Validation->set_rule( 'furikana1', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['furikana2'] ) ) {
        $Validation->set_rule( 'furikana2', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-14', 'add_mwform_validation_rule_furikana_for14', 10, 2 );

function add_mwform_validation_rule_kana_for14( $Validation, $data ) {
    $validation_message = 'ふりかなで入力してください。';
    if ( !empty( $data['furikana1'] )  && !preg_match('/^[ぁ-んァ-ヶー]+$/',$data['furikana1']) ) {
        $Validation->set_rule( 'furikana1', 'kana', array( 'message' => $validation_message ) );
    } 
    elseif ( !empty( $data['furikana2'] )  && !preg_match('/^[ぁ-んァ-ヶー]+$/',$data['furikana2']) ) {
        $Validation->set_rule( 'furikana2', 'kana', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-14', 'add_mwform_validation_rule_kana_for14', 10, 2 );



function my_validation_rule( $Validation ) {
    $Validation->set_rule( 'sender', 'required', array(
        'message' => '必須項目です。'
    ) );
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-15', 'my_validation_rule' );

function add_mwform_validation_rule_name_for15( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['name1'] ) ) {
        $Validation->set_rule( 'name1', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['name2'] ) ) {
        $Validation->set_rule( 'name2', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-15', 'add_mwform_validation_rule_name_for15', 10, 2 );

function add_mwform_validation_rule_furikana_for15( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['furikana1'] ) ) {
        $Validation->set_rule( 'furikana1', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['furikana2'] ) ) {
        $Validation->set_rule( 'furikana2', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-15', 'add_mwform_validation_rule_furikana_for15', 10, 2 );

function add_mwform_validation_rule_kana_for15( $Validation, $data ) {
    $validation_message = 'ふりかなで入力してください。';
    if ( !empty( $data['furikana1'] )  && !preg_match('/^[ぁ-んァ-ヶー]+$/',$data['furikana1']) ) {
        $Validation->set_rule( 'furikana1', 'kana', array( 'message' => $validation_message ) );
    } 
    elseif ( !empty( $data['furikana2'] )  && !preg_match('/^[ぁ-んァ-ヶー]+$/',$data['furikana2']) ) {
        $Validation->set_rule( 'furikana2', 'kana', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-15', 'add_mwform_validation_rule_kana_for15', 10, 2 );





function my_validation_rule_2( $Validation ) {
    $Validation->set_rule( 'sender', 'required', array(
        'message' => '必須項目です。'
    ) );
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-16', 'my_validation_rule_2' );


function add_mwform_validation_rule_name_for16( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['name1'] ) ) {
        $Validation->set_rule( 'name1', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['name2'] ) ) {
        $Validation->set_rule( 'name2', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-16', 'add_mwform_validation_rule_name_for16', 10, 2 );

function add_mwform_validation_rule_furikana_for16( $Validation, $data ) {
    $validation_message = '姓もしくは名を入力してください。';
    if ( empty( $data['furikana1'] ) ) {
        $Validation->set_rule( 'furikana1', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['furikana2'] ) ) {
        $Validation->set_rule( 'furikana2', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-16', 'add_mwform_validation_rule_furikana_for16', 10, 2 );

function add_mwform_validation_rule_kana_for16( $Validation, $data ) {
    $validation_message = 'ふりかなで入力してください。';
    if ( !empty( $data['furikana1'] )  && !preg_match('/^[ぁ-んァ-ヶー]+$/',$data['furikana1']) ) {
        $Validation->set_rule( 'furikana1', 'kana', array( 'message' => $validation_message ) );
    } 
    elseif ( !empty( $data['furikana2'] )  && !preg_match('/^[ぁ-んァ-ヶー]+$/',$data['furikana2']) ) {
        $Validation->set_rule( 'furikana2', 'kana', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-16', 'add_mwform_validation_rule_kana_for16', 10, 2 );


function the_pagination() {
  global $wp_query;
  $bignum = 999999999;
  if ($wp_query->max_num_pages <= 1)
    return;
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace($bignum, '%#%', str_replace('page/','?paged=',esc_url(get_pagenum_link($bignum)))),
    'format'       => '?paged=%#%',
    'current'      => max(1, get_query_var('paged')),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '&laquo;',
    'next_text'    => '&raquo;',
    'type'         => 'plain',
    'end_size'     => 3,
    'mid_size'     => '...'
  ) );
  echo '</nav>';
}

add_shortcode('tp', 'shortcode_tp');
function shortcode_tp($atts, $content = '') {
    return get_template_directory_uri().$content;
}

add_shortcode('sidebar', 'shortcode_sidebar');
function shortcode_sidebar($atts, $content = '') {
    ob_start();
    get_template_part('sidebar', $atts['div']);
    return ob_get_clean();
}

add_shortcode('club_news', 'shortcode_club_news');
function shortcode_club_news($atts, $content = '') {
    ob_start();
    get_template_part('part', 'club_news');
    return ob_get_clean();
}
add_filter('redirect_canonical','my_disable_redirect_canonical');

function my_disable_redirect_canonical( $redirect_url ) {

    if ( is_archive() ){
        $subject = $redirect_url;
        $pattern = '/\/page\//'; // URLに「/page/」があるかチェック
        preg_match($pattern, $subject, $matches);

        if ($matches){
        //リクエストURLに「/page/」があれば、リダイレクトしない。
        $redirect_url = false;
        return $redirect_url;
        }
    }

}

//パンくず
if ( ! function_exists( 'custom_breadcrumb' ) ) {
    function custom_breadcrumb( $wp_obj = null ) {
        // トップページでは何も出力しない
        if ( is_home() || is_front_page() ) return false;
        //そのページのWPオブジェクトを取得
        $wp_obj = $wp_obj ?: get_queried_object();
        echo '<div id="breadcrumb">'.  //id名などは任意で
                '<ul>'.
                    '<li>'.
                        '<a href="'. home_url() .'">トップ</a>'.
                    '</li>';
        if ( is_attachment() ) {
            /**
             * 添付ファイルページ ( $wp_obj : WP_Post )
             * ※ 添付ファイルページでは is_single() も true になるので先に分岐
             */
            echo '<li>'. $wp_obj->post_title .'</li>';
        } elseif ( is_single() ) {
            /**
             * 投稿ページ ( $wp_obj : WP_Post )
             */
            $post_id    = $wp_obj->ID;
            $post_type  = $wp_obj->post_type;
            $post_title = $wp_obj->post_title;
            // カスタム投稿タイプかどうか
            if ( $post_type !== 'post' ) {
                $the_tax = "";  //そのサイトに合わせ、投稿タイプごとに分岐させて明示的に指定してもよい
                // 投稿タイプに紐づいたタクソノミーを取得 (投稿フォーマットは除く)
                $tax_array = get_object_taxonomies( $post_type, 'names');
                foreach ($tax_array as $tax_name) {
                    if ( $tax_name !== 'post_format' ) {
                        $the_tax = $tax_name;
                        break;
                    }
                }
                //カスタム投稿タイプ名の表示
                echo '<li>'.
                        '<a href="'. get_post_type_archive_link( $post_type ) .'">'.
                            ''. get_post_type_object( $post_type )->label .''.
                        '</a>'.
                     '</li>';
            } else {
                $the_tax = 'category';  //通常の投稿の場合、カテゴリーを表示
            }
            // タクソノミーが紐づいていれば表示
            if ( $the_tax !== "" ) {
                $child_terms = array();   // 子を持たないタームだけを集める配列
                $parents_list = array();  // 子を持つタームだけを集める配列
                // 投稿に紐づくタームを全て取得
                $terms = get_the_terms( $post_id, $the_tax );
                if ( !empty( $terms ) ) {
                    //全タームの親IDを取得
                    foreach ( $terms as $term ) {
                        if ( $term->parent !== 0 ) $parents_list[] = $term->parent;
                    }
                    //親リストに含まれないタームのみ取得
                    foreach ( $terms as $term ) {
                        if ( ! in_array( $term->term_id, $parents_list ) ) $child_terms[] = $term;
                    }
                    // 最下層のターム配列から一つだけ取得
                    $term = $child_terms[0];
                    if ( $term->parent !== 0 ) {
                        // 親タームのIDリストを取得
                        $parent_array = array_reverse( get_ancestors( $term->term_id, $the_tax ) );
                        foreach ( $parent_array as $parent_id ) {
                            $parent_term = get_term( $parent_id, $the_tax );
                            echo '<li>'.
                                    '<a href="'. get_term_link( $parent_id, $the_tax ) .'">'.
                                      ''. $parent_term->name .''.
                                    '</a>'.
                                 '</li>';
                        }
                    }
                    // 最下層のタームを表示
                    echo '<li>'.
                            '<a href="'. get_term_link( $term->term_id, $the_tax ). '">'.
                              ''. $term->name .''.
                            '</a>'.
                         '</li>';
                }
            }
            // 投稿自身の表示
            echo '<li>'. $post_title .'</li>';
        } elseif ( is_page() ) {
            /**
             * 固定ページ ( $wp_obj : WP_Post )
             */
            $page_id    = $wp_obj->ID;
            $page_title = $wp_obj->post_title;

            // 親ページがあれば順番に表示
            if ( $wp_obj->post_parent !== 0 ) {
                $parent_array = array_reverse( get_post_ancestors( $page_id ) );
                foreach( $parent_array as $parent_id ) {
                    echo '<li>'.
                            '<a href="'. get_permalink( $parent_id ).'">'.
                                ''.get_the_title( $parent_id ).''.
                            '</a>'.
                         '</li>';
                }
            }
            // 投稿自身の表示
            echo '<li>'. $page_title .'</li>';
        } elseif ( is_post_type_archive() ) {
            /**
             * 投稿タイプアーカイブページ ( $wp_obj : WP_Post_Type )
             */
            echo '<li>'. $wp_obj->label .'</li>';
        } elseif ( is_date() ) {
            /**
             * 日付アーカイブ ( $wp_obj : null )
             */
            $year  = get_query_var('year');
            $month = get_query_var('monthnum');
            $day   = get_query_var('day');
            if ( $day !== 0 ) {
                //日別アーカイブ
                echo '<li><a href="'. get_year_link( $year ).'">'. $year .'年</a></li>'.
                     '<li><a href="'. get_month_link( $year, $month ). '">'. $month .'月</a></li>'.
                     '<li>'. $day .'日</li>';
            } elseif ( $month !== 0 ) {
                //月別アーカイブ
                echo '<li><a href="'. get_year_link( $year ).'">'.$year.'年</a></li>'.
                     '<li>'.$month . '月</li>';
            } else {
                //年別アーカイブ
                echo '<li>'.$year.'年</li>';
            }
        } elseif ( is_author() ) {
            /**
             * 投稿者アーカイブ ( $wp_obj : WP_User )
             */
            echo '<li>'. $wp_obj->display_name .' の執筆記事</li>';
        } elseif ( is_archive() ) {
            /**
             * タームアーカイブ ( $wp_obj : WP_Term )
             */
            $term_id   = $wp_obj->term_id;
            $term_name = $wp_obj->name;
            $tax_name  = $wp_obj->taxonomy;
            /* ここでタクソノミーに紐づくカスタム投稿タイプを出力しても良いでしょう。 */
            // 親ページがあれば順番に表示
            if ( $wp_obj->parent !== 0 ) {
                $parent_array = array_reverse( get_ancestors( $term_id, $tax_name ) );
                foreach( $parent_array as $parent_id ) {
                    $parent_term = get_term( $parent_id, $tax_name );
                    echo '<li>'.
                            '<a href="'. get_term_link( $parent_id, $tax_name ) .'">'.
                                ''. $parent_term->name .''.
                            '</a>'.
                         '</li>';
                }
            }
            // ターム自身の表示
            echo '<li>'.
                    ''. $term_name .''.
                '</li>';
        } elseif ( is_search() ) {
            /**
             * 検索結果ページ
             */
            echo '<li>「'. get_search_query() .'」で検索した結果</li>';
        } elseif ( is_404() ) {
            /**
             * 404ページ
             */
            echo '<li>お探しの記事は見つかりませんでした。</li>';
        } else {
            /**
             * その他のページ（無いと思うが一応）
             */
            echo '<li>'. get_the_title() .'</li>';
        }
        echo '</ul></div>';  // 冒頭に合わせて閉じタグ
    }
}
add_shortcode('sc_mytheme_breadcrumb', 'custom_breadcrumb');



/**
 * カスタム投稿タイプ一覧に追加
 */
 
function manage_posts_columns($columns) {
    $columns['説明会番号'] = "説明会番号";
    $columns['deadline'] = "期日";
    $columns['time'] = "時間";
    $columns['capacity'] = "定員";
    $columns['予約人数'] = "予約人数";
    $columns['応募数'] = "応募数";
    return $columns;
}
function manage_posts_columns_open_school($columns) {
    $columns['説明会番号'] = "説明会番号";
    $columns['deadline'] = "期日";
    $columns['time'] = "時間";
    $columns['place'] = "場所";
    $columns['capacity'] = "定員";
    $columns['予約人数'] = "予約人数";
    $columns['応募数'] = "応募数";
    return $columns;
}
function add_column($column_name, $post_id) {
    global $typenow;
    if($typenow == 'saturday'){  /////土曜説明会
        if( $column_name == '説明会番号' ) {
            $stitle = $post_id;
        }
        if( $column_name == 'deadline' ) {
            $stitle = mysql2date('Y年n月j日 (D)',get_post_meta($post_id, 'deadline', true));
        }
        if( $column_name == 'time' ) {
            $stitle = get_post_meta($post_id, 'time', true);
        }
        if( $column_name == 'capacity' ) {
            $stitle = get_post_meta($post_id, 'capacity', true);
        }
        if( $column_name == '予約人数' ) {
            $arg = array(
              'post_type' => 'mwf_1672',
              'posts_per_page' => -1,
              'post_status' => 'publish',
              'meta_key' => '説明会番号',
              'meta_value' => $post_id, 
              'meta_compare' => '='
            );
            $qquery = new WP_Query( $arg );
            if ($qquery->have_posts()):
                $c = 0;
                while ( $qquery->have_posts() ) : $qquery->the_post();
                    $c = $c+(int)get_field('参加人数');
                endwhile;
            endif;
            wp_reset_postdata();
            $stitle = $c;
        }
        if( $column_name == '応募数' ) {
            $arg = array(
              'post_type' => 'mwf_1672',
              'posts_per_page' => -1,
              'post_status' => 'publish',
              'meta_key' => '説明会番号',
              'meta_value' => $post_id, 
              'meta_compare' => '='
            );
            $qquery = new WP_Query( $arg );
            if ($qquery->have_posts()):
                $c = 0;
                while ( $qquery->have_posts() ) : $qquery->the_post();
                    $c++;
                endwhile;
            endif;
            wp_reset_postdata();
            $stitle = $c;
        }
    }elseif($typenow == 'evening'){   //////イブニング説明会
        if( $column_name == '説明会番号' ) {
            $stitle = $post_id;
        }
        if( $column_name == 'deadline' ) {
            $stitle = mysql2date('Y年n月j日 (D)',get_post_meta($post_id, 'deadline', true));
        }
        if( $column_name == 'time' ) {
            $stitle = get_post_meta($post_id, 'time', true);
        }
        if( $column_name == 'capacity' ) {
            $stitle = get_post_meta($post_id, 'capacity', true);
        }
        if( $column_name == '予約人数' ) {
            $arg = array(
              'post_type' => 'mwf_1673',
              'posts_per_page' => -1,
              'post_status' => 'publish',
              'meta_key' => '説明会番号',
              'meta_value' => $post_id, 
              'meta_compare' => '='
            );
            $qquery = new WP_Query( $arg );
            if ($qquery->have_posts()):
                $c = 0;
                while ( $qquery->have_posts() ) : $qquery->the_post();
                    $c = $c+(int)get_field('参加人数');
                endwhile;
            endif;
            wp_reset_postdata();
            $stitle = $c;
        }
        if( $column_name == '応募数' ) {
            $arg = array(
              'post_type' => 'mwf_1673',
              'posts_per_page' => -1,
              'post_status' => 'publish',
              'meta_key' => '説明会番号',
              'meta_value' => $post_id, 
              'meta_compare' => '='
            );
            $qquery = new WP_Query( $arg );
            if ($qquery->have_posts()):
                $c = 0;
                while ( $qquery->have_posts() ) : $qquery->the_post();
                    $c++;
                endwhile;
            endif;
            wp_reset_postdata();
            $stitle = $c;
        }
    }elseif($typenow == 'open_school'){  //////オープンスクール
        if( $column_name == '説明会番号' ) {
            $stitle = $post_id;
        }
        if( $column_name == 'deadline' ) {
            $stitle = mysql2date('Y年n月j日 (D)',get_post_meta($post_id, 'deadline', true));
        }
        if( $column_name == 'time' ) {
            $stitle = get_post_meta($post_id, 'time', true);
        }
        if( $column_name == 'place' ) {
            $stitle = get_post_meta($post_id, 'place', true);
        }
        if( $column_name == 'capacity' ) {
            $stitle = get_post_meta($post_id, 'capacity', true);
        }
        if( $column_name == '予約人数' ) {
            $arg = array(
              'post_type' => 'mwf_1674',
              'posts_per_page' => -1,
              'post_status' => 'publish',
              'meta_key' => '説明会番号',
              'meta_value' => $post_id, 
              'meta_compare' => '='
            );
            $qquery = new WP_Query( $arg );
            if ($qquery->have_posts()):
                $c = 0;
                while ( $qquery->have_posts() ) : $qquery->the_post();
                    $c = $c+(int)get_field('参加人数');
                endwhile;
            endif;
            wp_reset_postdata();
            $stitle = $c;
        }
        if( $column_name == '応募数' ) {
            $arg = array(
              'post_type' => 'mwf_1674',
              'posts_per_page' => -1,
              'post_status' => 'publish',
              'meta_key' => '説明会番号',
              'meta_value' => $post_id, 
              'meta_compare' => '='
            );
            $qquery = new WP_Query( $arg );
            if ($qquery->have_posts()):
                $c = 0;
                while ( $qquery->have_posts() ) : $qquery->the_post();
                    $c++;
                endwhile;
            endif;
            wp_reset_postdata();
            $stitle = $c;
        }
    }
    if ( isset($stitle) && $stitle ) {
        echo attribute_escape($stitle);
    }
}
add_filter( 'manage_edit-saturday_columns', 'manage_posts_columns' );
add_filter( 'manage_edit-evening_columns', 'manage_posts_columns' );
add_filter( 'manage_edit-open_school_columns', 'manage_posts_columns_open_school' );
add_action( 'manage_posts_custom_column', 'add_column', 10, 2 );


/////土曜説明会 応募フォーム
function my_mwform_value_saturday( $value, $name ) {
    if ( $name == '期日' && !empty( $_GET['post_id'] ) && !is_array( $_GET['post_id'] ) ) {
        $id = (int) wp_unslash( $_GET['post_id'] );
        global $post;
        $q = new WP_Query("posts_per_page=1&post_type=saturday&p=".$id);
        if( $q->have_posts() ){
            while( $q->have_posts() ){ $q->the_post();
              $value = mysql2date('Y年n月j日 (D)',get_field('deadline'));
            }
        }
        wp_reset_postdata();
    }
    return $value;
}
add_filter( 'mwform_value_mw-wp-form-1672', 'my_mwform_value_saturday', 10, 2 );

function my_mwform_value_obj_saturday( $value, $name ) {
    if ( $name == '説明会名' && !empty( $_GET['post_id'] ) && !is_array( $_GET['post_id'] ) ) {
        $obj = get_post_type_object('saturday');
        $value = $obj->labels->singular_name;
    }
    return $value;
}
add_filter( 'mwform_value_mw-wp-form-1672', 'my_mwform_value_obj_saturday', 10, 2 );

/////イブニング説明会 応募フォーム
function my_mwform_value_evening( $value, $name ) {
    if ( $name == '期日' && !empty( $_GET['post_id'] ) && !is_array( $_GET['post_id'] ) ) {
        $id = (int) wp_unslash( $_GET['post_id'] );
        global $post;
        $q = new WP_Query("posts_per_page=1&post_type=evening&p=".$id);
        if( $q->have_posts() ){
            while( $q->have_posts() ){ $q->the_post();
              $value = mysql2date('Y年n月j日 (D)',get_field('deadline'));
            }
        }
        wp_reset_postdata();
    }
    return $value;
}
add_filter( 'mwform_value_mw-wp-form-1673', 'my_mwform_value_evening', 10, 2 );

function my_mwform_value_obj_evening( $value, $name ) {
    if ( $name == '説明会名' && !empty( $_GET['post_id'] ) && !is_array( $_GET['post_id'] ) ) {
        $obj = get_post_type_object('evening');
        $value = $obj->labels->singular_name;
    }
    return $value;
}
add_filter( 'mwform_value_mw-wp-form-1673', 'my_mwform_value_obj_evening', 10, 2 );

/////オープン説明会 応募フォーム
function my_mwform_value_open_school( $value, $name ) {
    if ( $name == '期日' && !empty( $_GET['post_id'] ) && !is_array( $_GET['post_id'] ) ) {
        $id = (int) wp_unslash( $_GET['post_id'] );
        global $post;
        $q = new WP_Query("posts_per_page=1&post_type=open_school&p=".$id);
        if( $q->have_posts() ){
            while( $q->have_posts() ){ $q->the_post();
              $value = mysql2date('Y年n月j日 (D)',get_field('deadline'));
            }
        }
        wp_reset_postdata();
    }
    return $value;
}
add_filter( 'mwform_value_mw-wp-form-1674', 'my_mwform_value_open_school', 10, 2 );

function my_mwform_value_obj_open_school( $value, $name ) {
    if ( $name == '説明会名' && !empty( $_GET['post_id'] ) && !is_array( $_GET['post_id'] ) ) {
        $obj = get_post_type_object('open_school');
        $value = $obj->labels->singular_name;
    }
    return $value;
}
add_filter( 'mwform_value_mw-wp-form-1674', 'my_mwform_value_obj_open_school', 10, 2 );

function my_mwform_value_target_open_school( $value, $name ) {
    if ( $name == '対象' && !empty( $_GET['post_id'] ) && !is_array( $_GET['post_id'] ) ) {
        $id = (int) wp_unslash( $_GET['post_id'] );
        global $post;
        $q = new WP_Query("posts_per_page=1&post_type=open_school&p=".$id);
        if( $q->have_posts() ){
            while( $q->have_posts() ){ $q->the_post();
              $value = implode("・",get_field('target')).'年生';
            }
        }
        wp_reset_postdata();
    }
    return $value;
}
add_filter( 'mwform_value_mw-wp-form-1674', 'my_mwform_value_target_open_school', 10, 2 );
//バリデーション
function add_mwform_validation_rule_date_for1674( $Validation, $data ) {
    $validation_message = '未入力です。';
    if ( empty( $data['誕生日年'] ) ) {
        $Validation->set_rule( '誕生日年', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['誕生日月'] ) ) {
        $Validation->set_rule( '誕生日月', 'noempty', array( 'message' => $validation_message ) );
    } elseif ( empty( $data['誕生日日'] ) ) {
        $Validation->set_rule( '誕生日日', 'noempty', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-1674', 'add_mwform_validation_rule_date_for1674', 10, 2 );

function add_mwform_validation_rule_bnum_for1674( $Validation, $data ) {
    $validation_message = '半角数字で入力してください。';
    if ( !empty( $data['誕生日年'] ) && !preg_match('/^[0-9]+$/',$data['誕生日年']) ) {
        $Validation->set_rule( '誕生日年', 'numeric', array( 'message' => $validation_message ) );
    } elseif ( !empty( $data['誕生日月'] ) && !preg_match('/^[0-9]+$/',$data['誕生日月']) ) {
        $Validation->set_rule( '誕生日月', 'numeric', array( 'message' => $validation_message ) );
    } elseif ( !empty( $data['誕生日日'] ) && !preg_match('/^[0-9]+$/',$data['誕生日日']) ) {
        $Validation->set_rule( '誕生日日', 'numeric', array( 'message' => $validation_message ) );
    } 
    return $Validation;
}
add_filter( 'mwform_validation_mw-wp-form-1674', 'add_mwform_validation_rule_bnum_for1674', 10, 2 );





///// MW WP FORM お問合せデータ　検索機能追加
function restrict_manage_posts_custom_field() {
    // 投稿タイプが投稿の場合 (カスタム投稿タイプのみに適用したい場合は 'post' をカスタム投稿タイプの内部名に変更してください)
    if(function_exists('get_current_screen')){
        if ( 'mwf_1672' == get_current_screen()->post_type ) {//土曜説明会
            // カスタムフィールドのキー(名称例)
            $meta_key = '説明会番号';
            $items = array( '' => 'すべての土曜説明会');
            $q = new WP_Query("post_type=saturday");
            if( $q->have_posts() ){
                while( $q->have_posts() ){ $q->the_post();
                  $items += array(get_the_ID() => mysql2date('Y年n月j日 (D)',get_field('deadline')));
                }
            }
            wp_reset_postdata();

            $selected_value = filter_input( INPUT_GET, $meta_key );
            $value2 = filter_input( INPUT_GET, 'tracking_number' );
     
            // プルダウンのHTML
            $output = '';
            $output .= '<select name="' . esc_attr($meta_key) . '">';
            foreach ( $items as $value => $text ) {
                $selected = selected( $selected_value, $value, false );
                $output .= '<option value="' . esc_attr($value) . '"' . $selected . '>'. esc_attr($value) .' '. esc_html($text) . '</option>';
            }
            $output .= '</select>';
            $output .= '<input type="text" name="tracking_number" value="'.$value2.'">';
     
            echo $output;
        }elseif('mwf_1673' == get_current_screen()->post_type ){//イブニング説明会
            // カスタムフィールドのキー(名称例)
            $meta_key = '説明会番号';
            $items = array( '' => 'すべてのイブニング説明会');
            $q = new WP_Query("post_type=evening");
            if( $q->have_posts() ){
                while( $q->have_posts() ){ $q->the_post();
                  $items += array(get_the_ID() => mysql2date('Y年n月j日 (D)',get_field('deadline')));
                }
            }
            wp_reset_postdata();

            $selected_value = filter_input( INPUT_GET, $meta_key );
            $value2 = filter_input( INPUT_GET, 'tracking_number' );
     
            // プルダウンのHTML
            $output = '';
            $output .= '<select name="' . esc_attr($meta_key) . '">';
            foreach ( $items as $value => $text ) {
                $selected = selected( $selected_value, $value, false );
                $output .= '<option value="' . esc_attr($value) . '"' . $selected . '>'. esc_attr($value) .' ' . esc_html($text) . '</option>';
            }
            $output .= '</select>';
            $output .= '<input type="text" name="tracking_number" value="'.$value2.'">';
     
            echo $output;

        }elseif('mwf_1674' == get_current_screen()->post_type ){//オープンスクール
            // カスタムフィールドのキー(名称例)
            $meta_key = '説明会番号';
            $items = array( '' => 'すべてのオープンスクール');
            $q = new WP_Query("post_type=open_school");
            if( $q->have_posts() ){
                while( $q->have_posts() ){ $q->the_post();
                  $items += array(get_the_ID() => mysql2date('Y年n月j日 (D)',get_field('deadline')));
                }
            }
            wp_reset_postdata();

            $selected_value = filter_input( INPUT_GET, $meta_key );
            $value2 = filter_input( INPUT_GET, 'tracking_number' );
     
            // プルダウンのHTML
            $output = '';
            $output .= '<select name="' . esc_attr($meta_key) . '">';
            foreach ( $items as $value => $text ) {
                $selected = selected( $selected_value, $value, false );
                $output .= '<option value="' . esc_attr($value) . '"' . $selected . '>'. esc_attr($value) .' ' . esc_html($text) . '</option>';
            }
            $output .= '</select>';
            $output .= '<input type="text" name="tracking_number" value="'.$value2.'">';
     
            echo $output;

        }
    }
}
add_action( 'restrict_manage_posts', 'restrict_manage_posts_custom_field' );
 
/**
 * 管理画面の投稿一覧に追加したカスタムフィールドの絞り込みの選択値を反映させます。
 * (絞り込みが必要なカスタムフィールドが1つの場合)]
 * @param WP_Query $query クエリオブジェクト
 */
function pre_get_posts_admin_custom_field( $query ) {
    // 管理画面 / 投稿タイプが投稿 / メインクエリ、のすべての条件を満たす場合 
    // (カスタム投稿タイプのみに適用したい場合は 'post' をカスタム投稿タイプの内部名に変更してください)
    if(function_exists('get_current_screen')){
        if ( is_admin() && 'mwf_1672' == get_current_screen()->post_type && $query->is_main_query() ) {//土曜説明会
            // カスタムフィールドのキー(名称例)
            $meta_key = '説明会番号';
            // 選択されている値
            // ( query_vars フィルタでカスタムフィールドのキーを登録している場合は get_query_var( $meta_key ) でも可です )
            $meta_value = filter_input( INPUT_GET, $meta_key );
            $meta_value2 = filter_input( INPUT_GET, 'tracking_number' );
            // クエリの検索条件に追加
            // (すでに他のカスタムフィールドの条件がセットされている場合は条件を引き継いで新しい条件を追加する形になります)
            if ( strlen( $meta_value ) || strlen($meta_value2) ) {
                $meta_query = $query->get( 'meta_query' );
                if ( ! is_array( $meta_query ) ) $meta_query = array();
                if(strlen($meta_value) != 0 && strlen($meta_value2) != 0){
                    $meta_query[] = array(
                        'relation' => 'AND',
                        array(
                            'key' => $meta_key,
                            'value' => (int) wp_unslash($meta_value)
                        ),
                        array(
                            'key' => 'tracking_number',
                            'value' => (int) wp_unslash($meta_value2)
                        )
                    );
                }elseif(strlen($meta_value) != 0 && strlen($meta_value2) == 0){
                    $meta_query[] = array(
                            'key' => $meta_key,
                            'value' => (int) wp_unslash($meta_value)
                        );
                }elseif(strlen($meta_value) == 0 && strlen($meta_value2) != 0){
                    $meta_query[] = array(
                            'key' => 'tracking_number',
                            'value' => (int) wp_unslash($meta_value2)
                        );
                }
     
                $query->set( 'meta_query', $meta_query );
            }
        }elseif(is_admin() && 'mwf_1673' == get_current_screen()->post_type && $query->is_main_query()){//イブニング説明会
            // カスタムフィールドのキー(名称例)
            $meta_key = '説明会番号';
            // 選択されている値
            // ( query_vars フィルタでカスタムフィールドのキーを登録している場合は get_query_var( $meta_key ) でも可です )
            $meta_value = filter_input( INPUT_GET, $meta_key );
            $meta_value2 = filter_input( INPUT_GET, 'tracking_number' );
            // クエリの検索条件に追加
            // (すでに他のカスタムフィールドの条件がセットされている場合は条件を引き継いで新しい条件を追加する形になります)
            if ( strlen( $meta_value ) || strlen($meta_value2) ) {
                $meta_query = $query->get( 'meta_query' );
                if ( ! is_array( $meta_query ) ) $meta_query = array();
                if(strlen($meta_value) != 0 && strlen($meta_value2) != 0){
                    $meta_query[] = array(
                        'relation' => 'AND',
                        array(
                            'key' => $meta_key,
                            'value' => (int) wp_unslash($meta_value)
                        ),
                        array(
                            'key' => 'tracking_number',
                            'value' => (int) wp_unslash($meta_value2)
                        )
                    );
                }elseif(strlen($meta_value) != 0 && strlen($meta_value2) == 0){
                    $meta_query[] = array(
                            'key' => $meta_key,
                            'value' => (int) wp_unslash($meta_value)
                        );
                }elseif(strlen($meta_value) == 0 && strlen($meta_value2) != 0){
                    $meta_query[] = array(
                            'key' => 'tracking_number',
                            'value' => (int) wp_unslash($meta_value2)
                        );
                }
     
                $query->set( 'meta_query', $meta_query );
            }
        }elseif(is_admin() && 'mwf_1674' == get_current_screen()->post_type && $query->is_main_query()){//オープンスクール
            // カスタムフィールドのキー(名称例)
            $meta_key = '説明会番号';
            // 選択されている値
            // ( query_vars フィルタでカスタムフィールドのキーを登録している場合は get_query_var( $meta_key ) でも可です )
            $meta_value = filter_input( INPUT_GET, $meta_key );
            $meta_value2 = filter_input( INPUT_GET, 'tracking_number' );
            // クエリの検索条件に追加
            // (すでに他のカスタムフィールドの条件がセットされている場合は条件を引き継いで新しい条件を追加する形になります)
            if ( strlen( $meta_value ) || strlen($meta_value2) ) {
                $meta_query = $query->get( 'meta_query' );
                if ( ! is_array( $meta_query ) ) $meta_query = array();
                if(strlen($meta_value) != 0 && strlen($meta_value2) != 0){
                    $meta_query[] = array(
                        'relation' => 'AND',
                        array(
                            'key' => $meta_key,
                            'value' => (int) wp_unslash($meta_value)
                        ),
                        array(
                            'key' => 'tracking_number',
                            'value' => (int) wp_unslash($meta_value2)
                        )
                    );
                }elseif(strlen($meta_value) != 0 && strlen($meta_value2) == 0){
                    $meta_query[] = array(
                            'key' => $meta_key,
                            'value' => (int) wp_unslash($meta_value)
                        );
                }elseif(strlen($meta_value) == 0 && strlen($meta_value2) != 0){
                    $meta_query[] = array(
                            'key' => 'tracking_number',
                            'value' => (int) wp_unslash($meta_value2)
                        );
                }
     
                $query->set( 'meta_query', $meta_query );
            }
        }
    }
}
add_action( 'pre_get_posts', 'pre_get_posts_admin_custom_field' );
/////


/////追加
function my_setup() {
    global $my_global_var;
    $url = esc_url($_SERVER['HTTP_REFERER']);
    if(strpos($url, '/open-form/') !== false){
        $my_global_var = '誠に申し訳ございませんが、定員に達しました。';
    }
}
add_action( 'after_setup_theme', 'my_setup' );

add_action( 'after_setup_theme', 'mytheme_setup_theme' );
if ( ! function_exists( 'mytheme_setup_theme' ) ) {
    function mytheme_setup_theme() {
        add_action( 'template_redirect', 'mytheme_template_redirect' );
    }
    function mytheme_template_redirect() {
        $queried = get_queried_object();
        if ( is_page('open-form') ) {
            $post_id = $_GET['post_id'];
            $arg = array(
              'post_type' => 'mwf_1674',
              'posts_per_page' => -1,
              'post_status' => 'publish',
              'meta_key' => '説明会番号',
              'meta_value' => $post_id, 
              'meta_compare' => '='
            );
            $qquery = new WP_Query( $arg );
            if ($qquery->have_posts()):
                $c = 0;
                while ( $qquery->have_posts() ) : $qquery->the_post();
                    $c = $c+(int)get_field('参加人数');
                endwhile;
            endif;
            wp_reset_postdata();



            $args = array(
                'posts_per_page' => -1,
                'order' => 'ASC',
                'meta_key' => 'deadline',
                'orderby' => 'meta_value',
                'post_type' => 'open_school',
                'p' => $post_id,
            );
            $the_query = new WP_Query( $args );
            if ($the_query->have_posts()):
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    $capacity = (int)get_field('capacity');
                endwhile;
            endif;
            wp_reset_postdata();
            if($capacity <= $c){
                header('Refresh: 0;url='.home_url('/admission/guidance/'));
                exit;
            }
        }
    }
}

/* MW WP From 自作バリデーション */

function mwform_validation_rule_over_people( $validation_rules ) {
    if ( ! class_exists("MW_Validation_Rule_over_people") ) {
        class MW_Validation_Rule_over_people extends MW_WP_Form_Abstract_Validation_Rule {
            /**
             * バリデーションルール名を指定
             *
             * @var string
             */
            protected $name = 'over_people';
            /**
             * バリデーションチェック
             *
             * @param string $key name属性
             * @param array  $option
             *
             * @return string エラーメッセージ
             */
            public function rule( $key, array $options = array() ) {
                $value = $this->Data->get( $key );

                $post_id = $_GET['post_id'];
                $arg = array(
                  'post_type' => 'mwf_1674',
                  'posts_per_page' => -1,
                  'post_status' => 'publish',
                  'meta_key' => '説明会番号',
                  'meta_value' => $post_id, 
                  'meta_compare' => '='
                );
                $c = 0;
                $qquery = new WP_Query( $arg );
                if ($qquery->have_posts()):
                    
                    while ( $qquery->have_posts() ) : $qquery->the_post();
                        $c = $c+(int)get_field('参加人数');
                    endwhile;
                endif;
                wp_reset_postdata();


                $args = array(
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'meta_key' => 'deadline',
                    'orderby' => 'meta_value',
                    'post_type' => 'open_school',
                    'p' => $post_id,
                );
                $the_query = new WP_Query( $args );
                if ($the_query->have_posts()):
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        $capacity = (int)get_field('capacity');
                    endwhile;
                endif;
                wp_reset_postdata();
                
                if($capacity < $c + (int)$value){
                    $defaults = array(
                        'message' => __( '定員オーバーします。', 'mw-wp-form' ),
                    );
                    $options  = array_merge( $defaults, $options );
                    return $options['message'];
                }

            }
            /**
             * 設定パネルに追加
             *
             * @param int   $key   バリデーションルールセットの識別番号
             * @param array $value バリデーションルールセットの内容
             */
            public function admin( $key, $value ) {
                ?>
                <label>
                    <input type="checkbox" <?php checked( $value[ $this->getName() ], 1 ); ?> name="<?php echo MWF_Config::NAME; ?>[validation][<?php echo $key; ?>][<?php echo esc_attr( $this->getName() ); ?>]" value="1" />
                    <?php esc_html_e( 'over_people', 'mw-wp-form' ); ?>
                </label>
                <?php
            }
        }
    }
    $instance = new MW_Validation_Rule_over_people();
    $validation_rules[$instance->getName()] = $instance;
    return $validation_rules;
}
add_filter( 'mwform_validation_rules', 'mwform_validation_rule_over_people' );

//概要（抜粋）の文字数調整
 function my_excerpt_length($length) {
 return 30;
 }
 add_filter('excerpt_length', 'my_excerpt_length');

function get_archives_by_fiscal_year( $args = '' ) {
    global $wpdb, $wp_locale;
    $defaults = array (
        'post_type' => 'post',
        'limit' => '',
        'format' => 'html',
        'before' => '',
        'after' => '',
        'show_post_count' => false,
        'echo' => 1
    );
    $r = wp_parse_args( $args, $defaults );
    extract ( $r, EXTR_SKIP );
    if ( '' != $limit ) {
        $limit = absint( $limit );
        $limit = ' LIMIT ' . $limit;
    }
    $arcresults = (array) $wpdb->get_results(
        "SELECT YEAR(ADDDATE(post_date, INTERVAL -3 MONTH)) AS `year`, COUNT(ID) AS `posts`
        FROM $wpdb->posts
        WHERE post_type = '$post_type' AND post_status = 'publish'
        GROUP BY YEAR(ADDDATE(post_date, INTERVAL -3 MONTH))
        ORDER BY post_date DESC
        $limit"
    );
    return $arcresults;
}


function change_posts_per_page($query) {
 /*  */
if ( is_admin() || ! $query->is_main_query() ){
     return;
 }

 /*  */
if ( $query->is_front_page() ) {
     $query->set( 'posts_per_page', '6' );
     return;
 }
if ( $query -> is_home() ) { 
	$query -> set( 'posts_per_page', 12 ); 
	return;

 }
}

?>