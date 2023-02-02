<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cart_has_products".
 *
 * @property int $id
 * @property int $id_cart
 * @property int $id_product
 * @property int $count
 *
 * @property Cart $cart
 * @property Product $product
 */
class CartHasProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart_has_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cart', 'id_product', 'count'], 'required'],
            [['id_cart', 'id_product', 'count'], 'integer'],
            [['id_cart'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::class, 'targetAttribute' => ['id_cart' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cart' => 'Id корзины',
            'id_product' => 'Id продукта',
            'count' => 'Количество',
        ];
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::class, ['id' => 'id_cart']);
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
}
