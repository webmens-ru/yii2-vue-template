<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "finance_payment_articles_directory".
 *
 * @property int $id
 * @property int $payment_type
 * @property int $name
 *
 * @property PaymentTypesDirectory $paymentType
 */
class PaymentArticlesDirectory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_payment_articles_directory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'payment_type', 'name'], 'required'],
            [['id', 'payment_type', 'name'], 'integer'],
            [['id'], 'unique'],
            [['payment_type'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentTypesDirectory::className(), 'targetAttribute' => ['payment_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_type' => 'Payment Type',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[PaymentType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentType()
    {
        return $this->hasOne(PaymentTypesDirectory::className(), ['id' => 'payment_type']);
    }
}
