<?php
namespace app\models;
use Yii;
use yii\base\Model;
/**
 * Message otelier statistic form
 */
class MessageOtelStatForm extends Model {
  
    public $name;
    public $messanger;
    public $tel;
    public $message;
  
    public function rules()
    {
        return [           
            [['name', 'messanger', 'tel','message'], 'required'],      
            [['name', 'messanger', 'message'], 'string'],
            [['tel'],'integer'],
        ];
    }


}