<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
/**
 * MessageEdit
 */
class MessageEdit extends ActiveRecord{
    public static function tableName(){
        return "{{message_edit}}";
    }
    public function getData(){
        return ["name_otelier"=>$this->name_otelier,
                    "hotel_name"=>$this->hotel_name,
                    "whatsapp"=>$this->whatsapp,
                    "telegram"=>$this->telegram,
                    "viber"=>$this->viber,
                    "idOtelier"=>$this->idOtelier];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [           
            [['name_otelier','hotel_name','whatsapp','telegram','viber', 'idOtelier'], 'required'],      
            [['name_otelier','hotel_name','whatsapp', 'telegram', 'viber'], 'string'],
            [['idOtelier'],'integer'],
            ];
    }
}