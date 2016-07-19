<?php

namespace julianb90\seomanager\controllers;

use Yii;
use julianb90\seomanager\models\Seomanager;
use julianb90\seomanager\models\search\SeomanagerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * @author Julian Böhnke <tr@julianb.de>
 * @since 1.0
 * SeoController implements the CRUD actions for Seo model.
 */
class SeomanagerController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Seo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeomanagerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Seo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Seomanager();

        if ($model->load(Yii::$app->request->post())) {

            $model->created = time();

            $model->data = json_encode([
                'content' => $model->content,
                'position' => $model->position
            ]);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Seo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $data = json_decode($model->data, true);

        $model->content = (isset($data['content'])) ? $data['content'] : '';
        $model->position = (isset($data['position'])) ? $data['position'] : '';

        if ($model->load(Yii::$app->request->post())) {

            $model->updated = time();

            $model->data = json_encode([
                'content' => $model->content,
                'position' => $model->position
            ]);

            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Seo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Seo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seomanager::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionClearCache($id) {

        $model = Seomanager::findOne($id);

        if ($model !== null) {

            $key = 'seomanager.route' . $model->route;

            Yii::$app->cache->delete($key);
        }

        return $this->redirect(['update', 'id' => $id]);
    }
}
