<?php
/**
 * Created by PhpStorm.
 * User: info
 * Date: 01.05.2016
 * Time: 17:09
 */

namespace julianb90\seomanager\assets;

use yii\web\AssetBundle;

/**
 * Seomanger asset bundle
 *
 * @author Julian Böhnke <tr@julianb.de>
 * @since 1.0
 */
class CKEditorAsset extends AssetBundle
{
    public $sourcePath = '@bower/ckeditor';

    public $js = [
        'ckeditor.js',
    ];
}