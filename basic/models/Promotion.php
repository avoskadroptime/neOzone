<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promotion".
 *
 * @property int $id
 * @property string $name
 *
 * @property PromotionHasProduct[] $promotionHasProducts
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 65],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название акции',
        ];
    }

    /**
     * Gets query for [[PromotionHasProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPromotionHasProducts()
    {
        return $this->hasMany(PromotionHasProduct::class, ['id_promotion' => 'id']);
    }
}
