<?php
/**
 * @author Julian Böhnke <tr@julianb.de>
 * @since 1.0
 */

namespace julianb90\seomanager;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\orbitstation\controllers';

    public $layout = 'main';

    public function init()
    {
        $this->params = ['params' =>
            [
                'label' => 'Belboon <i class="icon-chevron-right"></i>', 'url' => ['/orbitstation/webapi/belboon']
            ]
        ];
        parent::init();
        // custom initialization code goes here
    }
}
