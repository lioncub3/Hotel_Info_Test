<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MessageOtelStat;
use app\models\MessageOtelStatForm;
use app\models\MessageEdit;
use app\models\MessageEditForm;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //вся статистика о сообщениях на месенджеры
        $statistic = MessageOtelStat::find()->all();
        //Тут будет доставать данные по id отельера из БД
        $otelier_info = null;
        if(MessageEdit::find()->where(['idOtelier' => 1])->exists())
        {
            $otelier_info = MessageEdit::findOne(['idOtelier' => 1]);
        }
        //
        $edit_model = new MessageEditForm();
        if (Yii::$app->request->isPost && $edit_model->load(Yii::$app->request->post()) && $edit_model->validate())
        {
            //Тут нужно будет проверят на наличие существующих данных по id отельера
            if(MessageEdit::find()->where(['idOtelier' => 1])->exists() == true)
            {
                $me = MessageEdit::findOne(['idOtelier' => 1]);
                $me->name_otelier = $edit_model->name_otelier;
                $me->hotel_name = $edit_model->hotel_name;
                $me->whatsapp = $edit_model->whatsapp;
                $me->telegram = $edit_model->telegram;
                $me->viber = $edit_model->viber;

                $me->save();
            }
            //В случае если нету записи мы создадим новую
            else
            {
                $me = new MessageEdit();
                $me->name_otelier = $edit_model->name_otelier;
                $me->hotel_name = $edit_model->hotel_name;
                $me->whatsapp = $edit_model->whatsapp;
                $me->telegram = $edit_model->telegram;
                $me->viber = $edit_model->viber;
                //Вместо "1" будет id отельера из таблицы отельеров
                $me->idOtelier = 1;

                $me->save();
            }
            return $this->refresh();
        }
        //----------------------------
        $model = new MessageOtelStatForm();
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->validate())
        {
            $mos = new MessageOtelStat();
            $mos->name = $model->name;
            $mos->messanger = $model->messanger;
            $mos->message = $model->message;
            $mos->tel = $model->tel;
            date_default_timezone_set('Europe/Kiev');
            $mos->time_send = date('m/d/Y h:i:s a', time());
            $mos->otelier = "<отельер>";
            $mos->save();
            header('Location: viber://chat?number='. $model->messanger .'');
            exit;
        }
        //----------------------------
        return $this->render('index', ['model' => $model, 'statistic' => $statistic, 'edit_model' => $edit_model, 'otelier_info' => $otelier_info]);
    }
}
