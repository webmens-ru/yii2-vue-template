<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "finance_payment_plan_fact_directory".
 *
 * @property int $id
 * @property string $name
 *
 * @property FinancePayments[] $financePayments
 */
class PaymentPlanFactDirectory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_payment_plan_fact_directory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[FinancePayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['plan-fact' => 'id']);
    }
}
