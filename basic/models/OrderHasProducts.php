<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "order_has_products".
 *
 * @property int $id
 * @property int $id_order
 * @property int $id_product
 * @property int $count
 *
 * @property Order $order
 * @property Product $product
 */
class OrderHasProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_has_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_product', 'count'], 'required'],
            [['id_order', 'id_product', 'count'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['id_order' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id заказа',
            'id_product' => 'Id продукта',
            'count' => 'Количество',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'id_order']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'id_product']);
    }
    
    public static function dropDownListOrder(){
        return ArrayHelper::map(Order::find()->all(), 'id', 'id');
    }
    public static function dropDownListProduct(){
        return ArrayHelper::map(Product::find()->all(), 'id', 'name');
    }
}
