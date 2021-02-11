<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "finance_payments".
 *
 * @property int $id
 * @property int $type
 * @property int $plan-fact
 * @property string $date
 * @property int $summ
 * @property int $deal_id
 * @property string|null $deal_name
 * @property int $article_id
 * @property string $comment
 *
 * @property FinancePaymentTypesDirectory $type0
 * @property FinancePaymentPlan-factDirectory $plan-fact0
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'plan-fact', 'date', 'summ', 'deal_id', 'article_id', 'comment'], 'required'],
            [['type', 'plan-fact', 'summ', 'deal_id', 'article_id'], 'integer'],
            [['date'], 'safe'],
            [['deal_name', 'comment'], 'string', 'max' => 255],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentTypesDirectory::className(), 'targetAttribute' => ['type' => 'id']],
            [['plan-fact'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentPlan-factDirectory::className(), 'targetAttribute' => ['plan-fact' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'plan_fact' => 'Plan Fact',
            'date' => 'Date',
            'summ' => 'Summ',
            'deal_id' => 'Deal ID',
            'deal_name' => 'Deal Name',
            'article_id' => 'Article ID',
            'comment' => 'Comment',
        ];
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(PaymentTypesDirectory::className(), ['id' => 'type']);
    }

    /**
     * Gets query for [[Plan-fact0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanFact()
    {
        return $this->hasOne(PaymentPlanFactDirectory::className(), ['id' => 'plan-fact']);
    }
}
