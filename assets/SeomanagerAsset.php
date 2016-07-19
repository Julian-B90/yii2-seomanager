<?php

namespace julianb90\seomanager\assets;

use yii\web\AssetBundle;

/**
 * Seomanger asset bundle
 *
 * @author Julian Böhnke <tr@julianb.de>
 * @since 1.0
 */
class SeomanagerAsset extends AssetBundle
{
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
