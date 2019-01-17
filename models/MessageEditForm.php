<?php
namespace app\models;
use Yii;
use yii\base\Model;
/**
 * Message edit form
 */
class MessageEditForm extends Model {
  
    public $name_otelier;
    public $hotel_name;
    public $whatsapp;
    public $telegram;
    public $viber;
  
    public function rules()
    {
        return [           
            [['name_otelier', 'hotel_name', 'whatsapp', 'telegram', 'viber'], 'required'],      
            [['name_otelier', 'hotel_name', 'whatsapp', 'telegram', 'viber'], 'string'],
        ];
    }


}