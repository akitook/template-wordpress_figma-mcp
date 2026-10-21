<?php
/*
Template Name: sample
*/
?>
<?php get_header(); ?>
<main class="page-sample l-main">
  <div class="l-page">
    <div class="p-container--lg">
      <div class="l-page__header">
        <div class="l-page__title">
          <div class="en"><span>sample</span></div>
          <h1 class="ja">サンプル集</h1>
        </div>
      </div>
      <div class="l-page__container">
        <div class="l-page__breadcrumb">
          <?php get_template_part('template-parts/breadcrumb'); ?>
        </div>
        <div class="p-container">
          <div class="sample__block block01">
            <h2 class="sample__title">ニュースリスト　デザイン</h2>
            <div class="sample__template sample-newslist__template01">
              <ul class="p-newslist">
                <li class="p-newslist__item">
                  <a href="<?php the_permalink(); ?>">
                    <div class="p-newslist__date">2000.00.00</div>
                    <div class="c-category">
                      <p class="c-category__item">カテゴリー</p>
                    </div>
                    <h2 class="p-newslist__title">ここにタイトルが入りますここにタイトルが入ります</h2>
                  </a>
                </li>
                <li class="p-newslist__item">
                  <a href="<?php the_permalink(); ?>">
                    <div class="p-newslist__date">2000.00.00</div>
                    <div class="c-category">
                      <p class="c-category__item">カテ</p>
                    </div>
                    <h2 class="p-newslist__title">ここにタイトルが入りますここにタイトルが入ります</h2>
                  </a>
                </li>
              </ul>
            </div>

            <div class="sample__template sample-newslist__template02">
              <ul class="p-newslist">
                <li class="p-newslist__item">
                  <a href="<?php the_permalink(); ?>">
                    <p class="p-newslist__date">2000.00.00</p>
                    <div class="p-newslist__content">
                      <ul class="c-category">
                        <li class="c-category__item">カテゴリー</li>
                        <li class="c-category__item">カテゴリー</li>
                      </ul>
                      <h3 class="p-newslist__title">ここにタイトルが入りますここにタイトルが入ります</h3>
                    </div>
                  </a>
                </li>
                <li class="p-newslist__item">
                  <a href="<?php the_permalink(); ?>">
                    <p class="p-newslist__date">2000.00.00</p>
                    <div class="p-newslist__content">
                      <ul class="c-category">
                        <li class="c-category__item">カテゴリー</li>
                        <li class="c-category__item">カテゴリー</li>
                      </ul>
                      <h3 class="p-newslist__title">ここにタイトルが入りますここにタイトルが入ります</h3>
                    </div>
                  </a>
                </li>
              </ul>
            </div>

            <div class="sample__template sample-newslist__template03">
              <ul class="p-newslist">
                <li class="p-newslist__item">
                  <a href="<?php the_permalink(); ?>">
                    <div class="p-newslist__info">
                      <p class="p-newslist__date">2000.00.00</p>
                      <ul class="c-category">
                        <li class="c-category__item">カテゴリー</li>
                        <li class="c-category__item">カテゴリー</li>
                      </ul>
                    </div>
                    <h3 class="p-newslist__title">ここにタイトルが入りますここにタイトルが入ります</h3>
                  </a>
                </li>
                <li class="p-newslist__item">
                  <a href="<?php the_permalink(); ?>">
                    <div class="p-newslist__info">
                      <p class="p-newslist__date">2000.00.00</p>
                      <ul class="c-category">
                        <li class="c-category__item">カテゴリー</li>
                        <li class="c-category__item">カテゴリー</li>
                      </ul>
                    </div>
                    <h3 class="p-newslist__title">ここにタイトルが入りますここにタイトルが入ります</h3>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <div class="sample__block block02">
            <h2 class="sample__title">ボタン・hover挙動リスト　デザイン</h2>

            <div class="sample__template sample-buttonlist__template01">
              <a class="sample-button" href="#">
                <div class="sample-button__text">ボタンサンプル01</div>
                <div class="sample-button__arrow"><span class="arrow"></span></div>
              </a>
            </div>

            <div class="sample__template sample-buttonlist__template02">
              <a class="sample-button" href="#">
                <div class="sample-button__text">ボタンサンプル02</div>
              </a>
            </div>

            <div class="sample__template sample-buttonlist__template03">
              <a class="sample-button" href="#">
                <div class="sample-button__text">
                  ボタンサンプル03
                </div>
                <div class="sample-button__subtext">
                  テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
                </div>
              </a>
            </div>

            <div class="sample__template sample-buttonlist__template04">
              <a class="sample-button" href="#">
                <div class="sample-button__text">ボタンサンプル04</div>
                <div class="sample-button__arrow"><span class="arrow"></span></div>
              </a>
            </div>

            <div class="sample__template sample-buttonlist__template05">
              <a class="sample-button" href="#">
                <div class="sample-button__text">ボタンサンプル05</div>
                <div class="sample-button__arrow"><span class="arrow"></span></div>
              </a>
            </div>

          </div>

          <div class="sample__block block03">
            <h2 class="sample__title">FAQリスト　デザイン</h2>

            <div class="sample__template sample-faqlist__template01">
              <ul class="p-faqlist js-accordion">
                <li>
                  <section>
                    <h3 class="p-faqlist__title">お見積もりの目安を教えてください。</h3>
                    <div class="p-faqlist__content">
                      <p>内容によって変化いたしますのでまずはお問い合わせフォームよりご相談ください。</p>
                    </div>
                  </section>
                </li>
                <li>
                  <section>
                    <h3 class="p-faqlist__title">地方ですが発注は可能でしょうか</h3>
                    <div class="p-faqlist__content">
                      <p>可能です。お気軽にご相談ください。</p>
                    </div>
                  </section>
                </li>
                <li>
                  <section>
                    <h3 class="p-faqlist__title">セミナーやイベントの出演を依頼したいのですが、どちらへ連絡すればよろしいでのでしょうか。連絡手段を知りたいです。</h3>
                    <div class="p-faqlist__content">
                      <p>お問い合わせフォームより日時や内容などをご記入いただきご相談ください。</p>
                    </div>
                  </section>
                </li>
              </ul>
            </div>

            <div class="sample__template sample-faqlist__template02">
              <ul class="p-faqlist">
                <li>
                  <div class="p-faqlist__title">
                    <h3>お見積もりの目安を教えてください。</h3>
                  </div>
                  <div class="p-faqlist__content">
                    <p>内容によって変化いたしますのでまずはお問い合わせフォームよりご相談ください。</p>
                  </div>
                </li>
                <li>
                  <div class="p-faqlist__title">
                    <h3>地方ですが発注は可能でしょうか</h3>
                  </div>
                  <div class="p-faqlist__content">
                    <p>可能です。お気軽にご相談ください。</p>
                  </div>
                </li>
                <li>
                  <div class="p-faqlist__title">
                    <h3>セミナーやイベントの出演を依頼したいのですが、どちらへ連絡すればよろしいでのでしょうか。連絡手段を知りたいです。</h3>
                  </div>
                  <div class="p-faqlist__content">
                    <p>お問い合わせフォームより日時や内容などをご記入いただきご相談ください。</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="sample__block block04">
            <h2 class="sample__title">タブリスト　デザイン</h2>

            <div class="sample__template sample-tablist__template01">
              <div class="p-tab js-tab">
                <!-- タブ -->
                <ul class="p-tab__button">
                  <li class="is-active">タブ1</li>
                  <li>タブ2</li>
                  <li>タブ3</li>
                </ul>
                <!-- 中身 -->
                <div class="p-tab__content">
                  <div class="is-show">タブ1の内容が入ります。<br>タブ1の内容が入ります。</div>
                  <div>タブ2の内容が入ります。<br>タブ2の内容が入ります。</div>
                  <div>タブ3の内容が入ります。<br>タブ3の内容が入ります。</div>
                </div>
              </div>
            </div>

            <div class="sample__template sample-tablist__template02">
              <div class="p-tab js-tab">
                <!-- タブ -->
                <ul class="p-tab__button">
                  <li class="is-active">タブ1</li>
                  <li>タブ2</li>
                  <li>タブ3</li>
                </ul>
                <!-- 中身 -->
                <div class="p-tab__content">
                  <div class="is-show">タブ1の内容が入ります。<br>タブ1の内容が入ります。</div>
                  <div>タブ2の内容が入ります。<br>タブ2の内容が入ります。</div>
                  <div>タブ3の内容が入ります。<br>タブ3の内容が入ります。</div>
                </div>
              </div>
            </div>

          </div>

          <div class="sample__block block05">
            <h2 class="sample__title">フィルター　サンプル</h2>
            <div class="sample-filterlist__template01">
              <div class="category">
                <p>カテゴリ一覧</p>
                <ul class="category__list">
                  <li data-filter="all" class="is-active">ALL</li>
                  <li class="a" data-filter="a">A</li>
                  <li class="b" data-filter="b">B</li>
                  <li class="c" data-filter="c">C</li>
                  <li class="d" data-filter="d">D</li>
                  <li class="e" data-filter="e">E</li>
                </ul>
              </div>

              <div class="item">
                <p>アイテム一覧</p>
                <ul class="item__list">
                  <li class="a" data-category="a">Aのアイテム</li>
                  <li class="a" data-category="a">Aのアイテム</li>
                  <li class="b" data-category="b">Bのアイテム</li>
                  <li class="b" data-category="b">Bのアイテム</li>
                  <li class="c" data-category="c">Cのアイテム</li>
                  <li class="d" data-category="d">Dのアイテム</li>
                  <li class="e" data-category="e">Eのアイテム</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="sample__block block06">
            <h2 class="sample__title">モーダルウィンドウ サンプル（ライブラリなし）</h2>

            <div class="sample-modallist__template01">
              <!-- タイトル -->
              <div class="title-content">
                <div class="title-item" data-title="1">モーダル1のタイトル</div>
                <div class="title-item" data-title="2">モーダル2のタイトル</div>
                <div class="title-item" data-title="3">モーダル3のタイトル</div>
              </div>

              <!-- モーダル -->
              <div class="modal" style="display: none;">
                <div class="modal-wrap modal-close"></div>
                <div class="modal-inner">
                  <div class="modal-close-button modal-close" aria-label="閉じる"><span class="close-line"></span></div>
                  <div class="modal-item" data-modal="1">モーダル1の内容</div>
                  <div class="modal-item" data-modal="2">モーダル2の内容</div>
                  <div class="modal-item" data-modal="3">モーダル3の内容</div>
                </div>
              </div>
            </div>
          </div>

          <div class="sample__block block07">
            <h2 class="sample__title">ドロップダウンナビ　サンプル</h2>
            <div class="sample-dropdownlist__template01">
              <div class="nav__block">
                <div class="nav-item u-hide-up-lg"><a href="#">トップ</a></div>
                <div class="nav-item"><a href="#">このサイトについて</a></div>
                <div class="nav-item"><a href="#">お知らせ</a></div>
                <div class="nav-item"><a href="#">コラム</a></div>
                <div class="nav-item nav-parent">
                  <span class="u-hide-down-xl">親ナビ</span>
                  <div class="nav-child">
                    <h3 class="nav-child__head">親ナビタイトル</h3>
                    <ul class="nav-child__inner">
                      <li><a href="#">子ナビ1</a></li>
                      <li><a href="#">子ナビ2</a></li>
                      <li><a href="#">子ナビ3</a></li>
                      <li><a href="#">子ナビ4</a></li>
                    </ul>
                  </div>
                </div>
                <div class="nav-item nav-parent">
                  <span class="u-hide-down-xl">親ナビ</span>
                  <div class="nav-child">
                    <h3 class="nav-child__head">親ナビタイトル</h3>
                    <ul class="nav-child__inner">
                      <li><a href="#">子ナビ1</a></li>
                      <li><a href="#">子ナビ2</a></li>
                      <li><a href="#">子ナビ3</a></li>
                      <li><a href="#">子ナビ4</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="sample__block block08">
            <h2 class="sample__title">繰り返しフィールド サンプル</h2>
            <div class="sample-repeatlist__template01">
            </div>
          </div>

          <div class="sample__block block09">
            <h2 class="sample__title">コンテナクエリ サンプル</h2>
            <div class="sample-container">
              <ul class="sample-container__main">
                <li>
                  <div class="sample-container__card">
                    <div class="thumbnail"><img src="https://placehold.jp/350x250.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="sample-container__card">
                    <div class="thumbnail"><img src="https://placehold.jp/350x250.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="sample-container__card">
                    <div class="thumbnail"><img src="https://placehold.jp/350x250.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="sample-container__card">
                    <div class="thumbnail"><img src="https://placehold.jp/350x250.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="sample-container__card">
                    <div class="thumbnail"><img src="https://placehold.jp/350x250.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="sample-container__card">
                    <div class="thumbnail"><img src="https://placehold.jp/350x250.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </div>
                </li>
              </ul>
              <div class="sample-container__sideber">
                <ul>
                  <li>
                    <div class="thumbnail"><img src="https://placehold.jp/150x150.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </li>
                  <li>
                    <div class="thumbnail"><img src="https://placehold.jp/150x150.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </li>
                  <li>
                    <div class="thumbnail"><img src="https://placehold.jp/150x150.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </li>
                  <li>
                    <div class="thumbnail"><img src="https://placehold.jp/150x150.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </li>
                  <li>
                    <div class="thumbnail"><img src="https://placehold.jp/150x150.png" alt=""></div>
                    <div class="textbody">
                      <p class="date">2000.00.00</p>
                      <p class="title">ここにタイトルが入ります</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
