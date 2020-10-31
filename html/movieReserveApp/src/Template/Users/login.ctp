<main class="login-outer-wrapper">
    <section class="login-main">
        <h1>ログイン</h1>
        <div class="login-form-wrapper">
            <?= $this->Form->create(null, ['class' => 'login-form', 'novalidate' => true,]) ?>
            <fieldset class="login-fieldset">
                <?php
                echo $this->Form->control('email', ['type' => 'email', 'placeholder' => 'メールアドレス', 'required' => false, 'label' => false, 'class' => 'login-email']); ?>
                <?php if (isset($mail_error)) {
                    // エラー文にclassを付与するためのhtmlヘルパー
                    echo $this->Html->tag('div', $mail_error, array('class' => 'login-email-error'));
                }; ?>
                <?php if (isset($mail_vacant)) {
                    echo $this->Html->tag('div', $mail_vacant, array('class' => 'login-email-error'));
                }; ?>
                <?= $this->Form->control('password', ['type' => 'password', 'placeholder' => 'パスワード', 'required' => false, 'label' => false, 'class' => 'login-password']) ?>
                <?php if (isset($pass_error)) {
                    echo $this->Html->tag('div', $pass_error, array('class' => 'login-password-error'));
                }; ?>
                <?php if (isset($password_vacant)) {
                    echo $this->Html->tag('div', $password_vacant, array('class' => 'login-password-error'));
                }; ?>
            </fieldset>
            <?php
            echo $this->Form->submit(__('ログイン'), [
                'class' => 'login-btn'
            ]);
            echo $this->Form->end();
            ?>
            <div class='registration'>
                <?= $this->Html->link(
                    "会員登録",
                    [
                        "controller" => "Users",
                        "action" => "add"
                    ]
                ) ?>
            </div>
            <div class='password-re-registration'>
                <?= $this->Html->link(
                    "パスワードを忘れた方はコチラ",
                    "#"
                ) ?>
            </div>
        </div>
    </section>
</main>
