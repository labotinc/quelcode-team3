<main>
    <section class="signup-main">
        <h1>決済情報</h1>
        <div class="signup-form-wrapper">
            <?=
                $this->Form->create($creditCard, [
                    'type' => 'post',
                    'url' => ['controller' => 'CreditCards', 'action' => 'add'],
                    'novalidate' => true,
                    'class' => 'signup-form'
                ]);
            ?>
            <fieldset class="signup-fieldset">
                <?php
                echo $this->Form->control('user_id', [
                    'type' => 'hidden',
                    'value' => $user_id
                ]);

                echo $this->Form->control('number', [
                    'placeholder' => 'クレジットカード番号',
                    'required' => false,
                    'label' => false
                ]);
                echo $this->Form->control('holder_name', [
                    'placeholder' => 'クレジットカード名義',
                    'required' => false,
                    'label' => false
                ]);
                echo $this->Form->control('expire_on', [
                    'type' => 'textbox',
                    'placeholder' => '有効期限',
                    'required' => false,
                    'label' => false,
                    'class' => 'password_check'
                ]);
                ?>
                <p>/</p>
                <?php
                echo $this->Form->control('expire_on', [
                    'type' => 'textbox',
                    'placeholder' => '有効期限',
                    'required' => false,
                    'label' => false,
                    'class' => 'password_check'
                ]);

                ?>
            </fieldset>
            <?php
            echo $this->Form->submit(__('会員登録'), [
                'class' => 'signup-submission-btn'
            ]);
            echo $this->Form->end();
            ?>
        </div>
    </section>
</main>
