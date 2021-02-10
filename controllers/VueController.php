<?php
/**
 * Email: srdjan.drakul@2amigos.us
 * Date: 10/8/2019
 * Time: 22:10
 */

namespace app\controllers;

use app\models\Payments;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class VueController extends Controller
{

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        // set the specific layout for pages that will render vue
        $this->layout = 'vue_main';

        // override bundle configuration if needed
        Yii::$app->assetManager->bundles = [];

        // render page
        return $this->render('vue_page');
    }

    public function actionGetData()
    {
        $model = Payments::find()->all();
        return json_encode(ArrayHelper::toArray($model));
    }

    public function actionSetData()
    {
        $model = Yii::$app->request->post();
        Yii::warning($model, 'vue-model');
    }
}