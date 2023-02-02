<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_category".
 *
 * @property int $id
 * @property string $name
 *
 * @property ParentProductCategory[] $parentProductCategories
 * @property ParentProductCategory[] $parentProductCategories0
 * @property Product $product
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

    /**
     * Gets query for [[ParentProductCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentProductCategories()
    {
        return $this->hasMany(ParentProductCategory::class, ['id_category' => 'id']);
    }

    /**
     * Gets query for [[ParentProductCategories0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentProductCategories0()
    {
        return $this->hasMany(ParentProductCategory::class, ['id_parent_category' => 'id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id_category' => 'id']);
    }
}
