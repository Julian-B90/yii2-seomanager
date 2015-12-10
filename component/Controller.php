<?php
/**
 * Created by PhpStorm.
 * User: info
 * Date: 09.12.2015
 * Time: 23:46
 */

namespace julianb90\seomanager\component;

class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $seoHelper = new SeomanagerHelper();
        $seoHelper->run();

        return parent::beforeAction($action);
    }
}
