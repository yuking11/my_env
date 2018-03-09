<?php
  $slug = 'slug';// includeなどの条件分岐用
  $slug_child = '';// includeなどの条件分岐用
  $title = 'タイトル';
  $description = 'ディスクリプション';
  $keywords = 'キーワード1,キーワード2,キーワード3';
  $image_index = 0;// 0:index 1:noimageindex
  $search_index = 0;// 0:index 1:noindex,nofolow
  include_once(__DIR__ . "/assets/include/site_config.php");
  include_once(__DIR__ . "/assets/include/_html_header.php");
?>
<body class="<?php echo $body_class; ?>">
<?php
  include_once(__DIR__ . "/assets/include/_start_of_body.php");
  include_once(__DIR__ . "/assets/include/_header.php");
  include_once(__DIR__ . "/assets/include/_nav.php");
?>


<div class="l-content">
  <div class="l-inner">

    <main class="l-main p-main" role="main">
      Main Contents
    </main>
    <!-- /.l-main.p-main -->

<?php
    include_once(__DIR__ . "/assets/include/_side.php");
?>

  </div>
  <!-- /.l-inner -->
</div>
<!-- /.l-content -->

<?php
  include_once(__DIR__ . "/assets/include/_footer.php");
  include_once(__DIR__ . "/assets/include/_end_of_body.php");
?>

</body>
</html>
