<?php
/**
 * Created by PhpStorm.
 * User: info
 * Date: 10.12.2015
 * Time: 19:06
 */

namespace julianb90\seomanager\component;

use yii;
use julianb90\seomanager\models\Seomanager;

class SeomanagerHelper
{

    public $seoPage;

    public function run()
    {
        if ($this->_checkRoute()) {

            if(!empty($this->seoPage->title)) {
                $this->_setTitle($this->seoPage->title);
            }

            if(!empty($this->seoPage->keywords)) {
                $this->_setKeyWords($this->seoPage->keywords);
            }

            if(!empty($this->seoPage->description)) {
                $this->_setDescription($this->seoPage->description);
            }

            if(!empty($this->seoPage->canonical)) {
                $this->_setCanonical($this->seoPage->canonical);
            }
        }
    }

    private function _checkRoute()
    {
        $route = Yii::$app->request->getPathInfo();

        /** @var Module $module */
        $module = Yii::$app->getModule('seomanager');

        if($module->cache) {

            $cacheKey = 'seomanager.route' . $route;

            $this->seoPage = Yii::$app->cache->get($cacheKey);

            if($this->seoPage === false) {

                $this->seoPage = Seomanager::findOne(['route' => $route]);

                if ($this->seoPage === null) {
                    // for routes that doesn´t add to the seomanger
                    $cacheKey = 'seomanager.route.notfound';
                }

                Yii::$app->cache->set($cacheKey, $this->seoPage, 300);
            }

        } else {
            $this->seoPage = Seomanager::findOne(['route' => $route]);
        }

        if ($this->seoPage !== null) {

            $module->seoPage = $this->seoPage;

            return true;
        }

        return false;
    }

    private function _setTitle($titel)
    {
        Yii::$app->view->title = $titel;
    }

    private function _setDescription($description)
    {
        Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
    }

    private function _setCanonical($href)
    {
        Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => $href]);
    }

    private function _setKeyWords($keywords)
    {
        Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords], 'keywords');
    }

    /**
     * @return mixed
     */
    public function getContent() {

        if($this->_checkRoute()) {

            if($this->seoPage !== null && !empty($this->seoPage->data)) {

                $data = json_decode($this->seoPage->data, true);

                if (isset($data['content'])) {
                    return $data['content'];
                }
            }
        }

        return null;
    }

}
