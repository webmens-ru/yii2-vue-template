<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "finance_payment_types_directory".
 *
 * @property int $id
 * @property string $name
 *
 * @property PaymentArticlesDirectory[] $financePaymentArticlesDirectories
 * @property Payments[] $financePayments
 */
class PaymentTypesDirectory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_payment_types_directory';
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
     * Gets query for [[FinancePaymentArticlesDirectories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentArticlesDirectories()
    {
        return $this->hasMany(PaymentArticlesDirectory::className(), ['payment_type' => 'id']);
    }

    /**
     * Gets query for [[FinancePayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::className(), ['type' => 'id']);
    }
}
