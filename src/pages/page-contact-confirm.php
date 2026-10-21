<?php
/*
Template Name: contact-confirm
*/
?>

<?php get_header(); ?>
<main class="page-contact page-contact-confirm l-main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="l-page">
        <div class="p-container--lg">
          <div class="l-page__header">
            <div class="l-page__title">
              <div class="en"><span>CONTACT</span></div>
              <h1 class="ja">お問い合わせ確認</h1>
            </div>
          </div>
          <div class="l-page__container">
            <div class="l-page__breadcrumb">
              <?php get_template_part('template-parts/breadcrumb'); ?>
            </div>
            <div class="p-container">
              <?php the_content(); ?>

              <?php /* ContactForm7（確認画面）用
              <span class="p-country-name" style="display:none;">Japan</span>
              <div class="p-form">
                <div class="p-form__group">
                  <dl class="p-form__row p-form__row--labeled">
                    <dt>
                      <label>お名前</label>
                      <span class="tag tag--required">必須</span>
                    </dt>
                    <dd>
                      <div class="p-form-controls">
                        <div class="p-form-control">
                          <div class="c-input">
                            <label>姓</label>
                            [multiform "your-name-last"]
                          </div>
                        </div>
                        <div class="p-form-control">
                          <div class="c-input">
                            <label>名</label>
                            [multiform "your-name-first"]
                          </div>
                        </div>
                      </div>
                    </dd>
                  </dl>
                  <dl class="p-form__row p-form__row--labeled">
                    <dt>
                      <label>フリガナ</label>
                      <span class="tag tag--required">必須</span>
                    </dt>
                    <dd>
                      <div class="p-form-controls">
                        <div class="p-form-control">
                          <div class="c-input">
                            <label>姓</label>
                            [multiform "your-kana-last"]
                          </div>
                        </div>
                        <div class="p-form-control">
                          <div class="c-input">
                            <label>名</label>
                            [multiform "your-kana-first"]
                          </div>
                        </div>
                      </div>
                    </dd>
                  </dl>
                </div>
                <div class="p-form__group">
                  <dl class="p-form__row">
                    <dt>
                      <label>電話番号</label>
                      <span class="tag tag--required">必須</span>
                    </dt>
                    <dd>
                      <div class="p-form-control">
                        <div class="c-input">
                          [multiform "your-tel"]
                        </div>
                      </div>
                    </dd>
                  </dl>
                </div>
                <div class="p-form__group">
                  <dl class="p-form__row">
                    <dt>
                      <label>メールアドレス</label>
                      <span class="tag tag--required">必須</span>
                    </dt>
                    <dd>
                      <div class="p-form-control">
                        <div class="c-input">
                          [multiform "your-email"]
                        </div>
                      </div>
                    </dd>
                  </dl>
                  <dl class="p-form__row">
                    <dt>
                      <label>メールアドレス確認</label>
                      <span class="tag tag--required">必須</span>
                    </dt>
                    <dd>
                      <div class="p-form-control">
                        <div class="c-input">
                          [multiform "your-email-confirm"]
                        </div>
                      </div>
                    </dd>
                  </dl>
                </div>
                <div class="p-form__group">
                  <dl class="p-form__row p-form__row--labeled">
                    <dt>
                      <label>ご住所</label>
                      <span class="tag">任意</span>
                    </dt>
                    <dd>
                      <div class="p-form-control p-form-control--zip">
                        <div class="c-input">
                          <label>郵便番号</label>
                          [multiform "your-zip-01"]
                        </div>
                        <div class="c-input">
                          <label>　</label>
                          [multiform "your-zip-02"]
                        </div>
                      </div>
                      <div class="p-form-control">
                        <div class="c-input">
                          [multiform "your-address"]
                        </div>
                      </div>
                    </dd>
                  </dl>
                </div>
                <div class="p-form__group">
                  <dl class="p-form__row">
                    <dt>
                      <label>連絡手段</label>
                      <span class="tag tag--required">必須</span>
                    </dt>
                    <dd>
                      <div class="p-form-radios p-form-radios--horizontal">
                        [multiform "your-contact-way"]
                      </div>
                    </dd>
                  </dl>
                </div>
                <div class="p-form__group">
                  <dl class="p-form__row">
                    <dt>
                      <label>お問い合わせ内容</label>
                      <span class="tag tag--required">必須</span>
                    </dt>
                    <dd>
                      <div class="p-form-control">
                        <div class="c-select">
                          [multiform "your-subject"]
                        </div>
                      </div>
                    </dd>
                  </dl>
                  <dl class="p-form__row p-form__row--top">
                    <dt>
                      <label>お問い合わせ詳細</label>
                      <span class="tag tag--required">必須</span>
                    </dt>
                    <dd>
                      <div class="p-form-control">
                        [multiform "your-detail"]
                      </div>
                    </dd>
                  </dl>
                </div>
                <div class="p-form__actions">
                  [previous class:c-link "入力画面に戻る"]
                  [submit id:confirm-submit class:c-button "送信する"]
                  [multistep multistep-submit last_step send_email "/contact/complete/"]
                </div>
              </div>
              */ ?>
            </div>
          </div>
        </div>
      </div>
  <?php endwhile;
  endif; ?>
</main>
<?php get_footer(); ?>