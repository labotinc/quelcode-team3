<main>
<section>
<h1>ログイン</h1>
<div class="form-wrapper">
    <?= $this->Form->create(null) ?>
    <fieldset>
        <?php
        echo $this->Form->control('email', ['placeholder' => 'メールアドレス','class'=>'login-email','label' => false]);
        echo $this->Form->control('password', ['placeholder' => 'パスワード','class'=>'login-password','label' => false]);
        ?>
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
