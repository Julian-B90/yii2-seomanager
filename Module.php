<?php
/**
 * @author Julian Böhnke <tr@julianb.de>
 * @since 1.0
 */

namespace julianb90\seomanager;

class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'julianb90\seomanager\controllers';

    public $layout = 'main';

    public function init()
    {
        parent::init();
    }
}
