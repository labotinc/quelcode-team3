<?=
  $this->Html->css('user.css');
?>
<main>
  <section>
    <h1>会員登録</h1>
    <div class="form-wrapper">
      <?=
        $this->Form->create($user, [
          'type'=>'post',
          'url'=>['controller'=>'Users', 'action'=>'add'],
          'novalidate'=>true
        ]);
      ?>
      <fieldset>
        <?php
        echo $this->Form->control('email', [
          'type' => 'email',
          'placeholder' => 'メールアドレス',
          'required' => false,
          'label' => false
        ]);
        echo $this->Form->control('password', [
          'type' => 'password',
          'placeholder' => 'パスワード',
          'required' => false,
          'label' => false
        ]);
        echo $this->Form->control('password_check', [
          'type' => 'password',
          'placeholder' => 'パスワード（確認用）',
          'required' => false,
          'label' => false,
          'class' => 'password_check'
        ]);
        ?>
      </fieldset>
      <?php
      echo $this->Form->submit(__('会員登録'), [
        'class' => 'submission-btn'
      ]);
      echo $this->Form->end();
      ?>
    </div>
  </section>
</main>