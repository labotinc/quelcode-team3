<main class="card-registration-main">
    <section class="creditcard-registration-main">
        <h1>決済情報</h1>
        <div class="creditcard-registration-wrapper">
            <?=
                $this->Form->create($creditCard, [
                    'type' => 'post',
                    'url' => ['controller' => 'CreditCards', 'action' => 'add'],
                    'novalidate' => true,
                    'class' => 'creditcard-registration-form'
                ]);
            ?>
            <fieldset class="creditcard-registration-fieldset">
                <?php
                echo $this->Form->control('user_id', [
                    'type' => 'hidden',
                    'value' => $authuser['id']
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
                ?>
                <fieldset class="creditcard-registration-fieldset-medium">
                    <?php
                    echo $this->Form->control('expire_on', [
                        'type' => 'textbox',
                        'placeholder' => '有効期限',
                        'required' => false,
                        'label' => false,
                        'class' => 'expire-on'
                    ]);
                    echo $this->Form->control('security_code', [
                        'placeholder' => 'セキュリティコード',
                        'required' => false,
                        'label' => false,
                        'class' => 'security-code'
                    ]);
                    ?>
                </fieldset>
                <fieldset class="creditcard-registration-fieldset-below">
                    <?php
                    echo $this->Form->control('privacy_policy', [
                        'type' => 'checkbox',
                        'required' => 'false',
                        'label' => '利用規約・プライバシーポリシーに同意の上、ご確認ください。',
                        'class' => 'privacy-policy'
                    ]);
                    ?>
                </fieldset>

            </fieldset>
            <?php
            echo $this->Form->submit(__('会員登録'), [
                'class' => 'creditcard-registration-submission-btn'
            ]);

            echo $this->Form->end();
            ?>
        </div>
    </section>
</main>
