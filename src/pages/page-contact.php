<?php
/*
Template Name: contact
*/
?>

<?php get_header(); ?>
<main class="page-contact l-main">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="l-page">
        <div class="p-container--lg">
          <div class="l-page__header">
            <div class="l-page__title">
              <div class="en"><span>CONTACT</span></div>
              <h1 class="ja">お問い合わせ</h1>
            </div>
          </div>
          <div class="l-page__container">
            <div class="l-page__breadcrumb">
              <?php get_template_part('template-parts/breadcrumb'); ?>
            </div>
            <div class="p-container">
              <?php // the_content();
              ?>
              <?php // 通常フォーム
              ?>
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
                            <input type="text" placeholder="例）山田" />
                          </div>
                        </div>
                        <div class="p-form-control">
                          <div class="c-input">
                            <label>名</label>
                            <input type="text" placeholder="例）太郎" />
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
                            <input type="text" placeholder="例）ヤマダ" />
                          </div>
                        </div>
                        <div class="p-form-control">
                          <div class="c-input">
                            <label>名</label>
                            <input type="text" placeholder="例）タロウ" />
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
                          <input type="tel" placeholder="例）090-1234-5678" />
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
                          <input type="email" placeholder="例）t.yamada@example.com" />
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
                          <input type="number" placeholder="例）920" class="p-postal-code" />
                        </div>
                        <div class="c-input">
                          <label>　</label>
                          <input type="number" placeholder="例）0059" class="p-postal-code" />
                        </div>
                      </div>
                      <div class="p-form-control">
                        <div class="c-input">
                          <input type="text" placeholder="例）石川県金沢市示野町西32番地" class="p-region p-locality p-street-address p-extended-address" />
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
                        <div class="c-radio">
                          <label>
                            <input type="radio" name="radio">
                            <span class="text">どちらでも</span>
                          </label>
                        </div>
                        <div class="c-radio">
                          <label>
                            <input type="radio" name="radio">
                            <span class="text">電話</span>
                          </label>
                        </div>
                        <div class="c-radio">
                          <label>
                            <input type="radio" name="radio">
                            <span class="text">メール</span>
                          </label>
                        </div>
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
                          <select name="" id="">
                            <option>選択してください</option>
                            <option>Aについて</option>
                            <option>Bについて</option>
                            <option>その他</option>
                          </select>
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
                        <textarea name="" rows="4" placeholder="お問い合わせ詳細をご入力ください。"></textarea>
                      </div>
                    </dd>
                  </dl>
                </div>
                <div class="p-form__actions">
                  <a href="<?php echo home_url(); ?>" class="c-button">送信内容を確認する</a>
                </div>
              </div>

              <?php /* ContactForm7(入力画面)用
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
                            [text* your-name-last placeholder "例）山田"]
                          </div>
                        </div>
                        <div class="p-form-control">
                          <div class="c-input">
                            <label>名</label>
                            [text* your-name-first placeholder "例）太郎"]
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
                            [text* your-kana-last placeholder "例）ヤマダ"]
                          </div>
                        </div>
                        <div class="p-form-control">
                          <div class="c-input">
                            <label>名</label>
                            [text* your-kana-first placeholder "例）タロウ"]
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
                          [tel* your-tel placeholder "例）090-1234-5678"]
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
                          [email* your-email placeholder "例）t.yamada@example.com"]
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
                          [email* your-email-confirm placeholder "例）t.yamada@example.com"]
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
                          [text your-zip-01 class:p-postal-code placeholder "例）920"]
                        </div>
                        <div class="c-input">
                          <label>　</label>
                          [text your-zip-02 class:p-postal-code placeholder "例）0059"]
                        </div>
                      </div>
                      <div class="p-form-control">
                        <div class="c-input">
                          [text your-address class:p-region class:p-locality class:p-street-address class:p-extended-address placeholder "例）石川県金沢市1-1-1"]
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
                        [radio your-contact-way use_label_element default:1 "どちらでも" "電話" "メール"]
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
                          [select* your-subject "選択してください" "Aについて" "Bについて" "その他"]
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
                        [textarea* your-detail placeholder "お問い合わせの内容をご入力ください。"]
                      </div>
                    </dd>
                  </dl>
                </div>
                <div class="p-form__actions">
                  [submit id:confirm class:c-button "送信内容を確認する"]
                  [multistep multistep-confirm first_step "/contact/confirm/"]
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