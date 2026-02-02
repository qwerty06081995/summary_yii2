<?php

namespace app\modules\summary\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
class SummaryController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGenerate()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $payload = Yii::$app->request->getRawBody();

        $ch = curl_init('http://127.0.0.1:5000/api/generate_slides');

        curl_setopt_array($ch, [
            CURLOPT_POST            => true,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HTTPHEADER      => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payload)
            ],
            CURLOPT_POSTFIELDS      => $payload,
            CURLOPT_TIMEOUT         => 120,
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            return [
                'error' => true,
                'message' => curl_error($ch)
            ];
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            return [
                'error' => true,
                'status' => $httpCode,
                'response' => $response
            ];
        }

        return json_decode($response, true);
    }

}
