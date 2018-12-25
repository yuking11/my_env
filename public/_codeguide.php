
<?php
  $slug = 'codeguide';// includeなどの条件分岐用
	//$slug_child = 'slug_child';// includeなどの条件分岐用
	$title = 'Code Guide';
	$description = 'html, css, jsのcodeguideです。';
	$keywords = 'html,css,javascript,codeguide';
	$image_index = 1;// 0:index 1:noimageindex
	$search_index = 1;// 0:index 1:noindex,nofolow
	include_once(__DIR__ . "/assets/include/site_config.php");
	include_once(__DIR__ . "/assets/include/_html_header.php");
?>
<body class="<?php echo $body_class; ?>">
<?php
	include_once(__DIR__ . "/assets/include/_start_of_body.php");
?>

<header id="l-header" class="l-header l-header-fixed" data-scroll-header>

  <h1>Code Guide</h1>
  <p>PHP version： <?php echo phpversion(); ?></p>

</header>

<section class="l-content-wide" style="margin-top: 130px;">
  <div class="l-inner">
    <h2 class="u-mb10">スムーズスクロールテスト</h2>
    <p>
      <a href="#grid_layout" data-scroll>"Grid Layout"へ</a>&nbsp;&nbsp;
      <a href="#vue-test" data-scroll>"Vue.js テスト"へ</a>&nbsp;&nbsp;
      <a href="#image_effetcs" data-scroll>"Image Effects"へ</a>&nbsp;&nbsp;
      <a href="#tab_css" data-scroll>"タブ切り替え（css only）"へ</a>&nbsp;&nbsp;
      <a href="#acc_css" data-scroll>"アコーディオン（css only）"へ</a>&nbsp;&nbsp;
      <a href="#movie" data-scroll>"埋め込み動画レスポンシブ"へ</a>&nbsp;&nbsp;
      <a href="#table" data-scroll>"テーブルレイアウト"へ</a>&nbsp;&nbsp;
      <a href="#movie" data-scroll>"埋め込みiframeレスポンシブ"へ</a>&nbsp;&nbsp;
      <a href="#buttons" data-scroll>"ボタンレイアウト"へ</a>&nbsp;&nbsp;
      <a href="#form_layout" data-scroll>"フォーム"へ</a>&nbsp;&nbsp;
      <a href="#cards" data-scroll>"Cards"へ</a>&nbsp;&nbsp;
      <a href="#tooltip" data-scroll>"Tooltip"へ</a>&nbsp;&nbsp;
      <a href="#others" data-scroll>"その他"へ</a>&nbsp;&nbsp;
    </p>
  </div><!-- /.l-inner -->
</section><!-- /.l-content-wide -->

<section id="vue-test" class="l-content-wide u-mt40">
  <div class="l-inner">
    <h2 class="u-mb10">Vue.js テスト</h2>
    <div id="app">
      Count<br> {{ count }} <br>
      <button @click="countUp">add</button>
    </div>

    <div id="vue-carousel" class="vue-carousel">
      <!-- スライドする部分。keyを持たせることで、それぞれが個別の要素であることを示す。 -->
      <transition :name="transition_name">
        <div class="vue-carousel_body"
          :key="index"
          v-for="(content, index) in contents"
          v-if="visible_content == index"
          :style="{backgroundColor: content.bg_color}">
          {{ content.title }}
        </div>
      </transition>
      <!-- 「PREV」「NEXT」と現在地のドット -->
      <div class="vue-carousel_footer">
        <button @click="back()" <?php // :disabled="visible_content == 0"  ?>>PREV</button>
        <div class="vue-carousel_footer_dot"
          v-for="(contents, index) in contents"
          @click="move(index)"
          :class="{'is-visible' : visible_content == index}"></div>
        <button @click="next()" <?php // :disabled="visible_content == contents.length - 1"  ?>>NEXT</button>
      </div>
    </div>

  </div><!-- /.l-inner -->
</section><!-- /.l-content-wide -->

<section id="grid_layout" class="l-content-wide u-mt40">
  <div class="l-inner">

    <h2 class="u-mb10">Grid Layout</h2>

    <div class="row">
      <div class="col-1 col-debug">.col-1</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col-2 col-debug">.col-2</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col-3 col-debug">.col-3</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col-4 col-debug">.col-4</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col-5 col-debug">.col-5</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col-6 col-debug">.col-6</div>
      <div class="col-6 col-debug">.col-6</div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-md-3 col-lg-2 col-xl-1 col-debug">
        .col-sm-12<br>
        .col-md-3<br>
        .col-lg-2<br>
        .col-xl-1
      </div>
      <div class="col-sm-12 col-md-9 col-lg-10 col-xl-11 col-debug">
        .col-sm-12<br>
        .col-md-9<br>
        .col-lg-10<br>
        .col-xl-11
      </div>
    </div>

    <div class="row">
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col col-sm-3 col-debug">.col</div>
      <div class="col col-sm-3 col-debug">.col</div>
      <div class="col col-sm-3 col-debug">.col</div>
      <div class="col col-sm-3 col-debug">.col</div>
      <div class="col col-sm-3 col-debug">.col</div>
      <div class="col col-sm-3 col-debug">.col</div>
      <div class="col col-sm-3 col-debug">.col</div>
      <div class="col col-sm-3 col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col col-sm-4 col-debug">.col</div>
      <div class="col col-sm-4 col-debug">.col</div>
      <div class="col col-sm-4 col-debug">.col</div>
      <div class="col col-sm-4 col-debug">.col</div>
      <div class="col col-sm-4 col-debug">.col</div>
      <div class="col col-sm-4 col-debug">.col</div>
      <div class="col col-sm-4 col-debug">.col</div>
      <div class="col col-sm-4 col-debug">.col</div>
      <div class="col col-sm-4 col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col col-sm-6 col-debug">.col</div>
      <div class="col col-sm-6 col-debug">.col</div>
      <div class="col col-sm-6 col-debug">.col</div>
      <div class="col col-sm-6 col-debug">.col</div>
      <div class="col col-sm-6 col-debug">.col</div>
      <div class="col col-sm-6 col-debug">.col</div>
      <div class="col col-sm-6 col-debug">.col</div>
      <div class="col col-sm-6 col-debug">.col</div>
      <div class="col col-sm-6 col-debug">.col</div>
      <div class="col col-sm-6 col-debug">.col</div>
    </div>

    <div class="row">
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
    </div>

    <div class="row u-mb20">
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
      <div class="col col-sm-2 col-debug">.col</div>
    </div>

    <h3 class="u-mb10">start</h3>

    <div class="row row-start u-mb20">
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
    </div>

    <h3 class="u-mb10">end</h3>

    <div class="row row-end u-mb20">
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
    </div>

    <h3 class="u-mb10">center</h3>

    <div class="row row-center u-mb20">
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
    </div>

    <h3 class="u-mb10">between</h3>

    <div class="row row-between u-mb20">
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
      <div class="col col-debug">.col</div>
    </div>

  </div>
  <!-- /.l-inner -->
</section>
<!-- /.l-content-wide -->


<section id="image_effetcs" class="l-content-wide u-mt40">
  <div class="l-inner">

    <h2 class="u-mb10">Image Effects</h2>

    <h3>hover on/off</h3>
    <img class="over" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/sample.jpg" alt="">

    <h3>effects</h3>
    <div class="row">
      <div class="col col-sm-12">
        <div class="no-effect sample_img" title="default"></div>
      </div>
      <div class="col col-sm-12">
        <div class="pencil-effect sample_img" title="pencil-effect"></div>
      </div>
    </div>

    <div class="row">
      <div class="col col-sm-12">
        <div class="watercolor-effect sample_img" title="watercolor-effect"></div>
      </div>
      <div class="col col-sm-12">
        <div class="emboss-effect sample_img" title="emboss-effect"></div>
      </div>
    </div>

    <div class="row">
      <div class="col col-sm-12">
        <div class="colored-pencil-effect sample_img" title="colored-pencil-effect"></div>
      </div>
      <div class="col col-sm-12">
        <div class="chalkboard-effect sample_img" title="chalkboard-effect"></div>
      </div>
    </div>

    <div class="row">
      <div class="col col-sm-12">
        <div class="colored-chalkboard-effect sample_img" title="colored-chalkboard-effect"></div>
      </div>
      <div class="col col-sm-12">
        <div class="airbrush-effect sample_img" title="airbrush-effect"></div>
      </div>
    </div>

    <div class="row">
      <div class="col col-sm-12">
        <div class="hallucination-effect sample_img" title="hallucination-effect"></div>
      </div>
      <div class="col col-sm-12">
        <div class="flannel-effect sample_img" title="flannel-effect"></div>
      </div>
    </div>

    <div class="row">
      <div class="col col-sm-12">
        <div class="low-ink-x-effect sample_img" title="low-ink-x-effect"></div>
      </div>
      <div class="col col-sm-12">
        <div class="low-ink-y-effect sample_img" title="low-ink-y-effect"></div>
      </div>
    </div>

    <div class="row">
      <div class="col col-sm-12">
        <div class="collage-effect sample_img" title="collage-effect"></div>
      </div>
      <div class="col col-sm-12">
        <div class="mosaic-effect sample_img" title="mosaic-effect"></div>
      </div>
    </div>

    <div class="row">
      <div class="col col-sm-12">
        <div class="photo-border-effect sample_img" title="photo-border-effect"></div>
      </div>
      <div class="col col-sm-12">
        <div class="infrared-effect sample_img" title="infrared-effect"></div>
      </div>
    </div>

    <div class="row">
      <div class="col col-sm-12">
        <div class="night-vision-effect sample_img" title="night-vision-effect"></div>
      </div>
      <div class="col col-sm-12">
        <div class="warhol-effect sample_img" title="warhol-effect"></div>
      </div>
    </div>

    <div class="row">
      <div class="col col-sm-12">
        <div class="selective-color-effect sample_img" title="selective-color-effect"></div>
      </div>
      <div class="col col-sm-12">
        <div class="mirror-x-effect sample_img" title="mirror-x-effect"></div>
      </div>
    </div>

    <div class="row">
      <div class="col col-sm-12">
        <div class="mirror-y-effect sample_img" title="mirror-y-effect"></div>
      </div>
      <div class="col col-sm-12">
        <div class="sample_img" title="empty"></div>
      </div>
    </div>

  </div>
  <!-- /.l-inner -->
</section>
<!-- /.l-content-wide -->


<section id="tab_css" class="l-content-wide u-mt40">
  <div class="l-inner">

    <h2 class="u-mb10">タブ切り替え（css only）</h2>
    <div class="c-tab">
      <input type="radio" name="c-tab" id="c-tab_ctrl-01" class="c-tab_ctrl" checked="checked">
      <input type="radio" name="c-tab" id="c-tab_ctrl-02" class="c-tab_ctrl">
      <input type="radio" name="c-tab" id="c-tab_ctrl-03" class="c-tab_ctrl">
      <ul class="c-tab_list">
        <li class="list_item"><label for="c-tab_ctrl-01" id="c-tab_label-01" class="c-tab_label">HTML</label></li>
        <li class="list_item"><label for="c-tab_ctrl-02" id="c-tab_label-02" class="c-tab_label">SCSS</label></li>
        <li class="list_item"><label for="c-tab_ctrl-03" id="c-tab_label-03" class="c-tab_label">JavaScript</label></li>
      </ul>
      <!-- /.c-tab_label -->
      <ul class="c-tab_panel">
        <li id="c-tab_panel-01" class="panel_item">
          <pre class="mg0"><code>&lt;div class=&quot;c-tab&quot;&gt;
  &lt;input type=&quot;radio&quot; name=&quot;c-tab&quot; id=&quot;c-tab_ctrl-01&quot; class=&quot;c-tab_ctrl&quot; checked=&quot;checked&quot;&gt;
  &lt;input type=&quot;radio&quot; name=&quot;c-tab&quot; id=&quot;c-tab_ctrl-02&quot; class=&quot;c-tab_ctrl&quot;&gt;
  &lt;input type=&quot;radio&quot; name=&quot;c-tab&quot; id=&quot;c-tab_ctrl-03&quot; class=&quot;c-tab_ctrl&quot;&gt;
  &lt;ul class=&quot;c-tab_list&quot;&gt;
    &lt;li class=&quot;list_item&quot;&gt;&lt;label for=&quot;c-tab_ctrl-01&quot; id=&quot;c-tab_label-01&quot; class=&quot;c-tab_label&quot;&gt;Tab 1&lt;/label&gt;&lt;/li&gt;
    &lt;li class=&quot;list_item&quot;&gt;&lt;label for=&quot;c-tab_ctrl-02&quot; id=&quot;c-tab_label-02&quot; class=&quot;c-tab_label&quot;&gt;Tab 2&lt;/label&gt;&lt;/li&gt;
    &lt;li class=&quot;list_item&quot;&gt;&lt;label for=&quot;c-tab_ctrl-03&quot; id=&quot;c-tab_label-03&quot; class=&quot;c-tab_label&quot;&gt;Tab 3&lt;/label&gt;&lt;/li&gt;
  &lt;/ul&gt;
  &lt;!-- /.c-tab_label --&gt;
  &lt;ul class=&quot;c-tab_panel&quot;&gt;
    &lt;li id=&quot;c-tab_panel-01&quot; class=&quot;panel_item&quot;&gt;
      Tab Contents 1
    &lt;/li&gt;
    &lt;li id=&quot;c-tab_panel-02&quot; class=&quot;panel_item&quot;&gt;
      Tab Contents 2
    &lt;/li&gt;
    &lt;li id=&quot;c-tab_panel-03&quot; class=&quot;panel_item&quot;&gt;
      Tab Contents 3
    &lt;/li&gt;
  &lt;/ul&gt;
  &lt;!-- /.c-tab_contents --&gt;
&lt;/div&gt;
&lt;!-- /.c-tab --&gt;</code></pre>
        </li>
        <li id="c-tab_panel-02" class="panel_item">
          <pre class="mg0"><code>@include keyframes(c-tab_show) {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
// タブの数
$tab_length: 5;

.c-tab {

  .c-tab_list {
    display: flex;
    align-items: stretch;
    justify-content: flex-start;
    border-bottom: 1px solid #CCC;
    .list_item {
      &:not(:last-child) {
        margin-right: $ct_gutter;
      }// &:not(:first-child)
    }// .list_item
  }// .c-tab_list

  .c-tab_label {
    display: block;
    padding: $ct_gutter_half $ct_gutter;
    border: 1px solid #CCC;
    border-bottom: none;
    border-radius: 5px 5px 0 0;
  }// .c-tab_label

  .c-tab_ctrl {
    display: none;
  }// .c-tab_ctrl

  .c-tab_panel {
    border: 1px solid #CCC;
    border-top: none;
    .panel_item {
      display: none;
      padding: $ct_gutter;
    }// .panel_item
  }// .c-tab_panel

  $tmp: 0;
  @for $i from 1 through $tab_length {
    @if $i < 10 {
      $tmp: "0#{$i}";
    } @else {
      $tmp: $i;
    }// @if
    #c-tab_ctrl-#{$tmp}:checked {
      ~ .c-tab_list {
        #c-tab_label-#{$tmp} {
          background-color: #FFE;
        }// #c-tab_label-#{$tmp}
      }// ~ .c-tab_head
      ~ .c-tab_panel {
        #c-tab_panel-#{$tmp} {
          display: block;
          @include animation( $name: c-tab_show );
        }// #c-tab_panel-#{$tmp}
      }// ~ .c-tab_panel
    }// #c-tab_ctrl-#{$tmp}:checked
  }// @for

}// .c-tab</code></pre>
        </li>
        <li id="c-tab_panel-03" class="panel_item">
          <pre class="mg0"><code>panel 03 - JavaScript is not used.</code></pre>
        </li>
      </ul>
      <!-- /.c-tab_contents -->
    </div>
    <!-- /.c-tab -->

  </div>
  <!-- /.l-inner -->
</section>
<!-- /.l-content-wide -->


<section id="acc_css" class="l-content-wide u-mt40">
  <div class="l-inner">

    <h2 class="u-mb10">アコーディオン（css only）</h2>
    <p class="u-mb10"><code>type="radio"</code>を<code>type="checkbox"</code>に変更することで、個別開閉タイプに変更可能。</p>
    <ul class="c-acc">
      <li class="c-acc_item">
        <input type="radio" name="c-acc" id="c-acc_ctrl-1" class="c-acc_ctrl">
        <label for="c-acc_ctrl-1" class="c-acc_label">HTML</label>
        <div class="c-acc_contents">
          <div class="c-acc_contents_inner">
            <pre class="mg0"><code>&lt;ul class=&quot;c-acc&quot;&gt;
  &lt;li class=&quot;c-acc_item&quot;&gt;
    &lt;input type=&quot;radio&quot; name=&quot;c-acc&quot; id=&quot;c-acc_ctrl-1&quot; class=&quot;c-acc_ctrl&quot;&gt;
    &lt;label for=&quot;c-acc_ctrl-1&quot; class=&quot;c-acc_label&quot;&gt;Accordion 1&lt;/label&gt;
    &lt;div class=&quot;c-acc_contents&quot;&gt;
      &lt;div class=&quot;c-acc_contents_inner&quot;&gt;
        Accordion Contents 1
      &lt;/div&gt;
      &lt;!-- /.c-acc_contents_inner --&gt;
    &lt;/div&gt;
  &lt;/li&gt;
  &lt;!-- /.c-acc_item --&gt;
  &lt;li class=&quot;c-acc_item&quot;&gt;
    &lt;input type=&quot;radio&quot; name=&quot;c-acc&quot; id=&quot;c-acc_ctrl-2&quot; class=&quot;c-acc_ctrl&quot;&gt;
    &lt;label for=&quot;c-acc_ctrl-2&quot; class=&quot;c-acc_label&quot;&gt;Accordion 2&lt;/label&gt;
    &lt;div class=&quot;c-acc_contents&quot;&gt;
      &lt;div class=&quot;c-acc_contents_inner&quot;&gt;
        Accordion Contents 2
      &lt;/div&gt;
      &lt;!-- /.c-acc_contents_inner --&gt;
    &lt;/div&gt;
  &lt;/li&gt;
  &lt;!-- /.c-acc_item --&gt;
  &lt;li class=&quot;c-acc_item&quot;&gt;
    &lt;input type=&quot;radio&quot; name=&quot;c-acc&quot; id=&quot;c-acc_ctrl-3&quot; class=&quot;c-acc_ctrl&quot;&gt;
    &lt;label for=&quot;c-acc_ctrl-3&quot; class=&quot;c-acc_label&quot;&gt;Accordion 3&lt;/label&gt;
    &lt;div class=&quot;c-acc_contents&quot;&gt;
      &lt;div class=&quot;c-acc_contents_inner&quot;&gt;
        Accordion Contents 3
      &lt;/div&gt;
      &lt;!-- /.c-acc_contents_inner --&gt;
    &lt;/div&gt;
  &lt;/li&gt;
  &lt;!-- /.c-acc_item --&gt;
&lt;/ul&gt;
&lt;!-- /.c-acc --&gt;</code></pre>
          </div>
          <!-- /.c-acc_contents_inner -->
        </div>
      </li>
      <!-- /.c-acc_item -->
      <li class="c-acc_item">
        <input type="radio" name="c-acc" id="c-acc_ctrl-2" class="c-acc_ctrl">
        <label for="c-acc_ctrl-2" class="c-acc_label">SCSS</label>
        <div class="c-acc_contents">
          <div class="c-acc_contents_inner">
            <pre class="mg0"><code>.c-acc {

  border: 1px solid #CCC;
  border-bottom: none;

  .c-acc_label {
    display: block;
    padding: $ct_gutter_half $ct_gutter;
    border-bottom: 1px solid #CCC;
    &:hover {
      background-color: #FFE;
    }// &:hover
  }// .c-acc_label

  .c-acc_ctrl {
    display: none;
  }// .c-acc_ctrl

  .c-acc_contents {
    overflow: hidden;
    max-height: 0;
    transition: all .25s ease-out;
  }// .c-acc_contents

  .c-acc_contents_inner {
    padding: $ct_gutter;
    border-bottom: 1px solid #CCC;
  }// .c-acc_contents_inner

  .c-acc_ctrl:checked {
    & ~ .c-acc_label {
      background-color: #FFE;
    }// & ~ .c-acc_label
    & ~ .c-acc_contents {
      max-height: 1000vh;
      transition: all 1s ease-in;
    }// & ~ .c-acc_contents
  }// .c-acc_ctrl:checked

}// .c-acc</code></pre>
          </div>
          <!-- /.c-acc_contents_inner -->
        </div>
      </li>
      <!-- /.c-acc_item -->
      <li class="c-acc_item">
        <input type="radio" name="c-acc" id="c-acc_ctrl-3" class="c-acc_ctrl">
        <label for="c-acc_ctrl-3" class="c-acc_label">JavaScript</label>
        <div class="c-acc_contents">
          <div class="c-acc_contents_inner">
            <pre class="mg0"><code>panel 03 - JavaScript is not used.</code></pre>
          </div>
          <!-- /.c-acc_contents_inner -->
        </div>
      </li>
      <!-- /.c-acc_item -->
    </ul>
    <!-- /.c-acc -->

  </div>
  <!-- /.l-inner -->
</section>
<!-- /.l-content-wide -->


<section id="table" class="l-content-wide u-mt40">
  <div class="l-inner">
    <h2 class="u-mb10">テーブルレイアウト</h2>
    <h3 class="u-mb10">default</h3>
    <table class="c-tbl u-mb20">
      <caption class="c-tbl_caption">caption</caption>
      <thead class="c-tbl_thead">
        <tr class="c-tbl_tr">
          <th class="c-tbl_th">thead</th>
          <th class="c-tbl_th">thead</th>
          <th class="c-tbl_th">thead</th>
        </tr>
      </thead>
      <!-- /.c-tbl_thead -->
      <tbody class="c-tbl_tbody">
        <tr class="c-tbl_tr">
          <th class="c-tbl_th">tbody th</th>
          <td class="c-tbl_td">tbody td</td>
          <td class="c-tbl_td">tbody td</td>
        </tr>
      </tbody>
      <!-- /.c-tbl_tbody -->
      <tfoot class="c-tbl_tfoot">
        <tr class="c-tbl_tr">
          <td class="c-tbl_td">tfoot td</td>
          <td class="c-tbl_td">tfoot td</td>
          <td class="c-tbl_td">tfoot td</td>
        </tr>
      </tfoot>
      <!-- /.c-tbl_tbody -->
    </table><!-- /.c-tbl -->

    <h3 class="u-mb10">scroll</h3>
    <div class="c-tbl_wrap">
      <table class="c-tbl-scroll">
        <caption class="c-tbl_caption">caption</caption>
        <thead class="c-tbl_thead">
          <tr class="c-tbl_tr">
            <th class="c-tbl_th" style="width: 110px;"></th>
            <th class="c-tbl_th" style="width: 220px;">thead</th>
            <th class="c-tbl_th" style="width: 220px;">thead</th>
            <th class="c-tbl_th" style="width: 220px;">thead</th>
          </tr>
        </thead>
        <!-- /.c-tbl_thead -->
        <tbody class="c-tbl_tbody">
          <tr class="c-tbl_tr">
            <th class="c-tbl_th">tbody th</th>
            <td class="c-tbl_td">tbody td</td>
            <td class="c-tbl_td">tbody td</td>
            <td class="c-tbl_td">tbody td</td>
          </tr>
        </tbody>
        <!-- /.c-tbl_tbody -->
        <tfoot class="c-tbl_tfoot">
          <tr class="c-tbl_tr">
            <td class="c-tbl_td">tfoot td</td>
            <td class="c-tbl_td">tfoot td</td>
            <td class="c-tbl_td">tfoot td</td>
            <td class="c-tbl_td">tfoot td</td>
          </tr>
        </tfoot>
        <!-- /.c-tbl_tbody -->
      </table><!-- /.c-tbl-scroll -->
    </div><!-- /.c-tbl_wrap -->

  </div><!-- /.l-inner -->
</section><!-- /.l-content-wide -->


<section id="movie" class="l-content-wide u-mt40">
  <div class="l-inner">
    <h2 class="u-mb10">埋め込みiframeレスポンシブ</h2>
    <div class="c-framewrap">
      <iframe src="https://www.youtube.com/embed/RhRy-Re68uE" frameborder="0" allowfullscreen></iframe>
    </div>
    <!-- /.movie -->
  </div><!-- /.l-inner -->
</section><!-- /.l-content-wide -->


<section id="buttons" class="l-content-wide u-mt40">
  <div class="l-inner">
    <h2 class="u-mb10">ボタン</h2>
    <h3 class="u-mb10">Default</h3>
    <div class="u-mt10 u-mb10">
      <button type="button" class="c-btn">Button</button>
      <button type="button" class="c-btn c-btn-primary">Primary</button>
      <button type="button" class="c-btn c-btn-secondary">Secondary</button>
      <button type="button" class="c-btn c-btn-success">Success</button>
      <button type="button" class="c-btn c-btn-caution">Caution</button>
      <button type="button" class="c-btn c-btn-warning">Warning</button>
      <button type="button" class="c-btn c-btn-dark">Dark</button>
      <button type="button" class="c-btn c-btn-link">Link</button>
    </div>
    <h3 class="u-mb10">rounded</h3>
    <div class="u-mt10 u-mb10">
      <button type="button" class="c-btn c-btn-rounded">Button</button>
      <button type="button" class="c-btn c-btn-rounded c-btn-primary">Primary</button>
      <button type="button" class="c-btn c-btn-rounded c-btn-secondary">Secondary</button>
      <button type="button" class="c-btn c-btn-rounded c-btn-success">Success</button>
      <button type="button" class="c-btn c-btn-rounded c-btn-caution">Caution</button>
      <button type="button" class="c-btn c-btn-rounded c-btn-warning">Warning</button>
      <button type="button" class="c-btn c-btn-rounded c-btn-dark">Dark</button>
    </div>
    <h3 class="u-mb10">pill</h3>
    <div class="u-mt10 u-mb10">
      <button type="button" class="c-btn c-btn-pill">Button</button>
      <button type="button" class="c-btn c-btn-pill c-btn-primary">Primary</button>
      <button type="button" class="c-btn c-btn-pill c-btn-secondary">Secondary</button>
      <button type="button" class="c-btn c-btn-pill c-btn-success">Success</button>
      <button type="button" class="c-btn c-btn-pill c-btn-caution">Caution</button>
      <button type="button" class="c-btn c-btn-pill c-btn-warning">Warning</button>
      <button type="button" class="c-btn c-btn-pill c-btn-dark">Dark</button>
    </div>
    <h3 class="u-mb10">outline</h3>
    <div class="u-mt10 u-mb10">
      <button type="button" class="c-btn c-btn-outline">Button</button>
      <button type="button" class="c-btn c-btn-outline c-btn-primary">Primary</button>
      <button type="button" class="c-btn c-btn-outline c-btn-secondary">Secondary</button>
      <button type="button" class="c-btn c-btn-outline c-btn-success">Success</button>
      <button type="button" class="c-btn c-btn-outline c-btn-caution">Caution</button>
      <button type="button" class="c-btn c-btn-outline c-btn-warning">Warning</button>
      <button type="button" class="c-btn c-btn-outline c-btn-dark">Dark</button>
    </div>
    <h3 class="u-mb10">size</h3>
    <div class="u-mt10 u-mb10">
      <button type="button" class="c-btn c-btn-primary c-btn-small">Small</button>
      <button type="button" class="c-btn c-btn-primary">Default</button>
      <button type="button" class="c-btn c-btn-primary c-btn-large">Large</button>
      <button type="button" class="c-btn c-btn-primary c-btn-xlarge">X-Large</button>
    </div>
    <h3 class="u-mb10">block</h3>
    <div class="u-mt10 u-mb10">
      <button type="button" class="c-btn c-btn-block">Button</button>
      <button type="button" class="c-btn c-btn-block c-btn-primary">Primary</button>
      <button type="button" class="c-btn c-btn-block c-btn-secondary">Secondary</button>
      <button type="button" class="c-btn c-btn-block c-btn-success">Success</button>
      <button type="button" class="c-btn c-btn-block c-btn-caution">Caution</button>
      <button type="button" class="c-btn c-btn-block c-btn-warning">Warning</button>
      <button type="button" class="c-btn c-btn-block c-btn-dark">Dark</button>
    </div>
    <h3 class="u-mb10">disabled</h3>
    <div class="u-mt10 u-mb10">
      <button type="button" class="c-btn" disabled>Button</button>
      <button type="button" class="c-btn c-btn-primary" disabled>Primary</button>
      <button type="button" class="c-btn c-btn-secondary" disabled>Secondary</button>
      <button type="button" class="c-btn c-btn-success" disabled>Success</button>
      <button type="button" class="c-btn c-btn-caution" disabled>Caution</button>
      <button type="button" class="c-btn c-btn-warning" disabled>Warning</button>
      <button type="button" class="c-btn c-btn-dark" disabled>Dark</button>
    </div>
  </div><!-- /.l-inner -->
</section><!-- /.l-content-wide -->


<section id="tooltip" class="l-content-wide u-mt40">
  <div class="l-inner">
    <h2 class="u-mb10">Tooltip</h2>
    <div class="u-mt10 u-mb10">
      <button type="button" class="c-btn c-tooltip c-tooltip-top" data-tooltip="Tooltip top">Default</button>
      <button type="button" class="c-btn c-tooltip c-tooltip-right" data-tooltip="Tooltip right">Right</button>
      <button type="button" class="c-btn c-tooltip c-tooltip-bottom" data-tooltip="Tooltip bottom">Bottom</button>
      <button type="button" class="c-btn c-tooltip c-tooltip-left" data-tooltip="Tooltip left">Left</button>
      <button type="button" class="c-btn c-tooltip c-tooltip-top" data-tooltip="line1&#13;&#10;line2">line-break</button>
    </div>
  </div><!-- /.l-inner -->
</section><!-- /.l-content-wide -->


<section id="form_layout" class="l-content-wide u-mt40">
  <div class="l-inner">
    <h2 class="u-mb10">フォーム</h2>
    <form action="#" method="post" id="form" class="c-form">

      <h3 class="u-mb10">text, password, email, tel, number</h3>
      <p class="u-mb10"><input type="text" name="name1" class="c-form_input " placeholder="name"></p>
      <p class="u-mb10"><input type="text" name="name2" class="c-form_input c-form-wide" placeholder="name"></p>
      <p class="u-mb20"><input type="text" name="name3" class="c-form_input" value="name" disabled></p>

      <h3 class="u-mb10">textarea</h3>
      <p class="u-mb10"><textarea name="message1" class="c-form_textarea">テキストエリア</textarea></p>
      <p class="u-mb10"><textarea name="message2" class="c-form_textarea c-form-wide">テキストエリア</textarea></p>
      <p class="u-mb20"><textarea name="message2" class="c-form_textarea" disabled>テキストエリア</textarea></p>

      <h3 class="u-mb10">checkbox</h3>
      <ul class="row row-start u-mb20">
        <li class="col">
          <label class="c-form_label-check">
            <input type="checkbox" name="check[]" value="c1">
            <span>check1</span>
          </label>
        </li>
        <li class="col">
          <label class="c-form_label-check">
            <input type="checkbox" name="check[]" value="c2">
            <span>check2</span>
          </label>
        <li class="col">
          <label class="c-form_label-check">
            <input type="checkbox" name="check[]" value="c3">
            <span>check3<br>check3</span>
          </label>
        </li>
        <li class="col">
          <label class="c-form_label-check">
            <input type="checkbox" name="check[]" value="c4"  disabled="disabled">
            <span>check4</span>
          </label>
        </li>
      </ul>

      <h3 class="u-mb10">radio</h3>
      <ul class="row row-start u-mb20">
        <li class="col">
          <label class="c-form_label-radio">
            <input type="radio" name="radio" value="r1">
            <span>radio1</span>
          </label>
        </li>
        <li class="col">
          <label class="c-form_label-radio">
            <input type="radio" name="radio" value="r2">
            <span>radio2</span>
          </label>
        </li>
        <li class="col">
          <label class="c-form_label-radio">
            <input type="radio" name="radio" value="r3">
            <span>radio3<br>radio3</span>
          </label>
        </li>
        <li class="col">
          <label class="c-form_label-radio">
            <input type="radio" name="radio" value="r4"  disabled="disabled">
            <span>radio4</span>
          </label>
        </li>
      </ul>

      <h3 class="u-mb10">select</h3>
      <label class="c-form_select-label">
        <select name="select1" class="c-form_select">
          <option value="s1">option1</option>
          <option value="s2">option2</option>
          <option value="s3">option3</option>
          <option value="s4">option4</option>
          <option value="s5">option5</option>
        </select>
      </label>
      <label class="c-form_select-label c-form-wide u-mt10">
        <select name="select2" class="c-form_select">
          <option value="s1">option1</option>
          <option value="s2">option2</option>
          <option value="s3">option3</option>
          <option value="s4">option4</option>
          <option value="s5">option5</option>
        </select>
      </label>
      <label class="c-form_select-label c-form-wide u-mt10">
        <select name="select3" class="c-form_select" disabled="disabled">
          <option value="s1">option1</option>
          <option value="s2">option2</option>
          <option value="s3">option3</option>
          <option value="s4">option4</option>
          <option value="s5">option5</option>
        </select>
      </label>

    </form>
  </div><!-- /.l-inner -->
</section><!-- /.l-content-wide -->


<section id="cards" class="l-content-wide u-mt40">
  <div class="l-inner">
    <h2 class="u-mb10">Cards</h2>
    <div class="row">
      <div class="col c-card" style="width: 20rem;">
        <img src="http://placehold.jp/720x480.png?text=Card Img" alt="" class="c-card_img">
        <div class="c-card_body">
          <h3 class="c-card_ttl">Card title</h3>
          <p class="c-card_txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, magnam, ipsam? Harum magni labore tempora incidunt, voluptatibus sit explicabo eos quas odit, eius natus saepe ipsam ad quidem recusandae beatae!</p>
          <a href="#" class="c-btn c-btn-primary u-mta">Button</a>
        </div>
      </div>
      <div class="col c-card" style="width: 20rem;">
        <img src="http://placehold.jp/720x480.png?text=Card Img" alt="" class="c-card_img">
        <div class="c-card_body">
          <h3 class="c-card_ttl">Card title</h3>
          <p class="c-card_txt">Lorem ipsum dolor sit amet!</p>
          <a href="#" class="c-btn c-btn-primary u-mta">Button</a>
        </div>
      </div>
      <div class="col c-card" style="width: 20rem;">
        <img src="http://placehold.jp/720x480.png?text=Card Img" alt="" class="c-card_img">
        <div class="c-card_body">
          <h3 class="c-card_ttl">Card title</h3>
          <p class="c-card_txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, magnam, ipsam? Harum magni labore tempora incidunt, voluptatibus sit explicabo eos quas odit, eius natus saepe ipsam ad quidem recusandae beatae!</p>
        </div>
      </div>
    </div>
  </div><!-- /.l-inner -->
</section><!-- /.l-content-wide -->


<section id="others" class="l-content-wide u-mt40">
  <div class="l-inner">
    <h2 class="u-mb10">Others</h2>
    <h3 class="u-mb10">line-break</h3>
    <p>改行位置をレスポンシブ指定する。<br class="u-disp-sp">
      window 700px未満 だとここで改行される。<br class="u-disp-pc">
      window 700px以上 だとここで改行される。</p>
  </div><!-- /.l-inner -->
</section><!-- /.l-content-wide -->


<div class="l-content-wide u-mt40 u-mb40">
  <div class="l-inner">
    <p style="margin-top: 750px;"><a href="#" data-scroll>Page Top</a></p>
  </div>
  <!-- /.l-inner -->
</div>
<!-- /.l-content-wide u-mt40 -->

<a href="#" class="p-pagetop" data-scroll data-pagetop="500">Page<br>Top</a>

<?php
	include_once(__DIR__ . "/assets/include/_end_of_body.php");
?>
</body>
</html>
