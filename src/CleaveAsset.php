<?php

namespace creditanalytics\cleave;

use yii\web\AssetBundle;

/**
 * Cleave.js Asset AssetBundle
 */
class CleaveAsset extends AssetBundle
{
    public $sourcePath = '@bower/cleave.js/dist';

    public $js = [
        'cleave.min.js'
    ];
}
