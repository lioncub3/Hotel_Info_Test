<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
/**
 * MessageOtelStat
 */
class MessageOtelStat extends ActiveRecord{
    public static function tableName(){
        return "{{messageotelstat}}";
    }
    public function getData(){
        return ["name"=>$this->name,
                    "messanger"=>$this->messanger,
                    "tel"=>$this->tel,
                    "message"=>$this->message,
                    "time_send"=>$this->time_send,
                    "otelier"=>$this->otelier];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [           
            [['name', 'messanger','tel','message','time_send','otelier'], 'required'],      
            [['name', 'messanger', 'message','otelier', 'time_send'], 'string'], 
            [['tel'],'integer'],
            ];
    }
}