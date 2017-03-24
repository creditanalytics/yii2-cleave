<?php
// INN validator (10-digit for legals, 12-digits for person)
//  in rules()   [['inn'], 'app\components\validators\validateInn'],
// for test purpose use fake INN number 1234567894 or 123456789110

namespace creditanalytics\cleave;

use Yii;
use yii\validators\Validator;


class CleaveValidator extends Validator
{
    public $type;
    public $hidden;
    public $parts = [];

    public function validateAttribute($model, $attribute)
    {


        // $attributes = $model->behaviors['fakeAttributes']->attributes;
        // $this->addError($model, $attribute, $this->type);
        // if (!array_key_exists($attribute . '__dadata', $attributes)) {
            // $this->addError($model, $attribute, serialize($attributes));
        // }else {
        //     $suggestion = json_decode($attributes[$attribute . '_data']);

        //     foreach ($this->parts as $key => $errorMessage) {
        //         if (!array_key_exists($key, $suggestion)) {
        //             $this->addError($model, $attribute, $errorMessage);
        //         }
        //     }
        // }
    }
}
