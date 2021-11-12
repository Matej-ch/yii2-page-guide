<?php

namespace matejch\pageGuide\controllers;

use matejch\pageGuide\models\PageGuide;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageGuideController extends Controller
{
    public function behaviors()
    {
        return [
            'access' =>[
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index','update','create','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => PageGuide::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new PageGuide();

        $post = Yii::$app->request->post();
        if(Yii::$app->request->isPost) {
            $post['Guide']['url'] = parse_url($post['Guide']['url'],PHP_URL_PATH);

            $post['Guide']['rules'] = array_filter($post['Guide']['rules'], static function ($val) {
                return !empty($val['element']);
            });

            $post['Guide']['rules'] = Json::encode($post['Guide']['rules']);

            PageGuide::deleteAll(['url' => $post['Guide']['url']]);

            if ($model->load($post) && $model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $post['Guide']['rules'] = Json::encode($post['Guide']['rules']);

            if ($model->load($post) && $model->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        try {
            $model = $this->findModel($id);
        } catch (NotFoundHttpException $e) {
           Yii::$app->session->setFlash('warning',$e->getMessage());
            return $this->redirect(['index']);
        }

        if($model) {
            $model->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return PageGuide|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id): ?PageGuide
    {
        if (($model = PageGuide::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('view','Not found'));
    }
}