<?php
/*
Template Name: contact-mwwpform
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
              <?php /* mwwpform用
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
                        [mwform_text name="name_last" size="60" placeholder="例）山田"]
                      </div>
                    </div>
                    <div class="p-form-control">
                      <div class="c-input">
                        <label>名</label>
                        [mwform_text name="name_first" size="60" placeholder="例）太郎"]
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
                        [mwform_text name="kana_last" size="60" placeholder="例）ヤマダ"]
                      </div>
                    </div>
                    <div class="p-form-control">
                      <div class="c-input">
                        <label>名</label>
                        [mwform_text name="kana_first" size="60" placeholder="例）タロウ"]
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
                      [mwform_text name="tel" size="60" placeholder="例）090-1234-5678"]
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
                      [mwform_email name="email" size="60" placeholder="例）t.yamada@example.com"]
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
                      [mwform_text name="zip_01" size="3" maxlength="3" placeholder="例）920" class="p-postal-code"]
                    </div>
                    <div class="c-input">
                      <label>　</label>
                      [mwform_text name="zip_02" size="4" maxlength="4" placeholder="例）0059" class="p-postal-code"]
                    </div>
                  </div>
                  <div class="p-form-control">
                    <div class="c-input">
                      [mwform_text name="address" size="60" placeholder="例）石川県金沢市1-1-1" class="p-region p-locality p-street-address p-extended-address"]
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
                    [mwform_radio name="contact-way" children="どちらでも,電話,メール"]
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
                    [mwform_select name="subject" children="選択してください,Aについて,Bについて,その他"]
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
                    [mwform_textarea name="detail" cols="50" rows="4" placeholder="お問い合わせの内容をご入力ください。"]
                  </div>
                </dd>
              </dl>
            </div>
            <div class="p-form__actions">
              [mwform_bconfirm class="c-button" value="confirm"]送信内容を確認する[/mwform_bconfirm]
              [mwform_bsubmit name="submit" class="c-button" value="send"]送信する[/mwform_bsubmit]
              [mwform_bback class="c-link" value="back"]入力画面に戻る[/mwform_bback]
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