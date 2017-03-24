<?php

namespace creditanalytics\cleave;

use yii\base\Exception;
use yii\base\Widget;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * Cleave.js Component
 */
class CleaveWidget extends InputWidget
{
    public $id;
    public $delimiters;
    public $delimiter;
    public $blocks;

    public function init()
    {
        parent::init();

        $this->id = Html::getInputId($this->model, $this->attribute);
        $this->hiddenId = Html::getInputId($this->model, $this->hidden);

        if (!$this->token || !$this->id)
            throw new Exception('Не правильный конфиг');

        if (!in_array($this->type, $this->types))
            throw new Exception('Не правильный тип данных.');
    }

    public function run()
    {
        CleaveAsset::register($this->view);
        $value = Html::getAttributeValue($this->model, $this->attribute);
        $options = ArrayHelper::merge($this->options, $this->field->inputOptions);

        $contents[] = Html::activeInput('text', $this->model, $this->attribute, $options);

        $this->regJs();

        return implode("\n", $contents);
    }

    protected function regJs()
    {
        $this->view->registerJs(
            'var cleave__' . $this->attribute . '= new Cleave("#' . $this->id . '", {' .
                (empty($this->delimiters) ? '' : .'delimiters: ' . $this->delimiters . ',' .
                (empty($this->delimiter || !empty($this->delimiters) ? '' : .'delimiter: ' . $this->delimiter . ',' .
                (empty($this->blocks) ? '' : .'blocks: ' . $this->blocks . ',
            });'
        );
    }
}
