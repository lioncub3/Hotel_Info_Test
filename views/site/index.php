<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */

$this->title = 'Messanger_Form';
?>
<div class="site-index">
    <div class="table100 ver2 m-b-110">
        <div class="table100-head">
            <table>
                <thead>
                    <tr class="row100 head">
                        <th class="cell100 column1">Имя пользователя</th>
                        <th class="cell100 column2">Мессенджер</th>
                        <th class="cell100 column3">Телефон</th>
                        <th class="cell100 column4">Отельер</th>
                        <th class="cell100 column5">Сообщение</th>
                        <th class="cell100 column6">Время</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="table100-body js-pscroll">
            <table>
                <tbody>
                <?php
                foreach($statistic as $item){?>
                    <tr class="row100 body">
                        <td class="cell100 column1"><?= $item->name ?></td>
                        <td class="cell100 column2"><?= $item->messanger ?></td>
                        <td class="cell100 column3"><?= $item->tel ?></td>
                        <td class="cell100 column4"><?= $item->otelier ?></td>
                        <td class="cell100 column5"><?= $item->message ?></td>
                        <td class="cell100 column6"><?= $item->time_send ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="grid-conteiner">
        <?php $form = ActiveForm::begin(['class' => 'message-form-input']); ?>
            <?= $form->field($edit_model, 'name_otelier', ['template' => "{label}\n{input}"])->textInput()->label("Имя в сообщении:") ?>
            <?= $form->field($edit_model, 'hotel_name', ['template' => "{label}\n{input}"])->textInput()->label("Название готеля в сообщении:") ?>
            <?= $form->field($edit_model, 'whatsapp', ['template' => "{label}\n{input}"])->textInput()->label("Whatsapp") ?>
            <?= $form->field($edit_model, 'telegram', ['template' => "{label}\n{input}"])->textInput()->label("Telegram") ?>
            <?= $form->field($edit_model, 'viber', ['template' => "{label}\n{input}"])->textInput()->label("Viber") ?>
            <?= Html::submitButton('Сохранить', ['name' => 'Send', 'class' => 'message-input']) ?>
        <?php ActiveForm::end(); ?>
    </div>
    <?php if($otelier_info) { ?>
    <div class="message-box">
        <div class="message-form">
            <div class="grid-conteiner">
                <span class="message-close" type="button">&times;</span>
                <div class="grid-item">
                <!-- Тут будет первое фото из списка отеля -->
                    <img width="50" height="50" class="sender-img" src="/images/user.png" alt="" />
                </div>
                <div class="grid-item">
                    <p class="admin-message">Здравствуйте! Меня зовут <?= $otelier_info->name_otelier ?>, я администратор отеля <?= $otelier_info->hotel_name ?>. Жду от Вас вопрос через любой из мессенджеров</p>
                        <?php $form = ActiveForm::begin(['class' => 'message-form-input']); ?>
                            <?= $form->field($model, 'name', ['template' => "{input}"])->textInput()->input('name', ['placeholder' => "Ваше имя.."]) ?>
                            <?= $form->field($model, 'tel', ['template' => "{input}"])->textInput(['type' => 'number'])->input('tel', ['placeholder' => "Номер телефона.."]) ?>
                            <?= $form->field($model, 'message', ['template' => "{input}"])->textInput()->input('message', ['placeholder' => "Ваш вопрос.."]) ?>
                            <?php $messgr; ?>
                            <?= $form->field($model, 'messanger')->hiddenInput()->label(false); ?>
                            <?= Html::submitButton('Отправить', ['name' => 'Send', 'class' => 'message-input']) ?>
                        <?php ActiveForm::end(); ?>
                    <div class="messanger-items">
                        <button id="whatsapp" title="Whatsapp" value="<?= $otelier_info->whatsapp ?>"><img src="/images/whatsapp_icon.png" alt="Написать в Whatsapp" /></button>
                        <button id="telegram" title="Telegram" value="<?= $otelier_info->telegram ?>" target="_blank"><img src="/images/telegram_icon.png" alt="Написать в Telegram" /></button>
                        <button id="viber" title="Viber" value="<?= $otelier_info->viber ?>"><img src="/images/Viber_icon.png" alt="Написать в Viber" /></button>
                    </div>
                </div>
            </div>
    </div>
    <button class="message-button" type="button">
        <img src="/images/icons8-chat-filled-50.png" alt="message_image"/>
    </button>
    <p class="form-pointer">
        Задай вопрос<br/> отельеру
    </p>
    <?php } ?>
</div>
