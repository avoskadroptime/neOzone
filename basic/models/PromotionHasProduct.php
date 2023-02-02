<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promotion_has_product".
 *
 * @property int $id
 * @property int $id_promotion
 * @property int $id_product
 *
 * @property Product $product
 * @property Promotion $promotion
 */
class PromotionHasProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotion_has_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_promotion', 'id_product'], 'required'],
            [['id_promotion', 'id_product'], 'integer'],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
            [['id_promotion'], 'exist', 'skipOnError' => true, 'targetClass' => Promotion::class, 'targetAttribute' => ['id_promotion' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_promotion' => 'Id акции',
            'id_product' => 'Id продукта',
        ];
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

    /**
     * Gets query for [[Promotion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPromotion()
    {
        return $this->hasOne(Promotion::class, ['id' => 'id_promotion']);
    }
}
