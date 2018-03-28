<?php

  // ブラウザアクセス拒否
  if ( basename($_SERVER['SCRIPT_FILENAME']) === basename(__FILE__) ) { exit; }


  /*
   * URL設定
   */
  define('LOCAL_URI', 'gh_my_env.local.test');

  $base_url = isset($_SERVER['HTTPS']) &&
              strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
  $base_url .= '://' . $_SERVER['HTTP_HOST'];

  $host = $_SERVER["HTTP_HOST"];
  $host_productions = array('example.com', 'www.example.com');
  $host_develop = LOCAL_URI;
  $host_local  = 'localhost'.strstr($host, ':');

  if( in_array($host, $host_productions) ) {
    //define("HTTP", 'http://www.example.com');
  } else if($host === $host_develop){
    //define("HTTP", 'http://dev.example.com');
  } else if($host === $host_local){
    //define("HTTP", 'http://example.local.test');
  }
  define("HTTP", htmlspecialchars($base_url, ENT_QUOTES));

  $current_url = $base_url . $_SERVER['REQUEST_URI'];
  define("CURRENT_URL", htmlspecialchars($current_url, ENT_QUOTES));


  /*
   * 関数
   */

  // ローカル判定
  function is_local() {
    $host        = $_SERVER["HTTP_HOST"];
    $host_local  = 'localhost'.strstr($host, ':');
    $host_locals = array(
                      $host_local,
                      LOCAL_URI,
                    );
    return in_array($host, $host_locals);
  }

  // ホームURL取得
  function home_url( $atts = null ) {
    if( !empty($atts) ){
      $url = HTTP . $atts;
    } else {
      $url = HTTP;
    }
    return $url;
  }

  // themeディレクトリパス取得
  function get_template_directory_uri( $atts = null ) {
    if( !empty($atts) ){
      $url = HTTP . '/assets' . $atts;
    } else {
      $url = HTTP . '/assets';
    }
    return $url;
  }

  // escape
  function esc_url( $atts ) {
    $url = htmlspecialchars($atts, ENT_QUOTES);
    return $url;
  }

  // モバイル判定
  function is_mobile() {
    $ua = array(
      'iPhone',         // Apple iPhone
      'iPod',           // Apple iPod touch
      'iPad',           // Apple iPad
      'Android',        // 1.5+ Android
      'dream',          // Pre 1.5 Android
      'CUPCAKE',        // 1.5+ Android
      'blackberry9500', // Storm
      'blackberry9530', // Storm
      'blackberry9520', // Storm v2
      'blackberry9550', // Storm v2
      'blackberry9800', // Torch
      'webOS',          // Palm Pre Experimental
      'incognito',      // Other iPhone browser
      'webmate'         // Other iPhone browser
    );
    $pattern = '/'.implode('|', $ua).'/i';
    $agent = $_SERVER['HTTP_USER_AGENT'];
    return preg_match($pattern, $agent);
  }


  /*
   * サイト設定
   */

  // サイト名
  define("SITE_NAME", htmlspecialchars('サイトタイトル', ENT_QUOTES));

	// body class
  $body_class = ( isset($slug_child) && !empty($slug_child) ) ? $slug . '__' . $slug_child : $slug;

  // PAGE_NAME
  define('PAGE_NAME', htmlspecialchars($body_class, ENT_QUOTES));
