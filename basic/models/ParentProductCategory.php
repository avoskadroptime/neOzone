<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "parent_product_category".
 *
 * @property int $id
 * @property int $id_category
 * @property int $id_parent_category
 *
 * @property ProductCategory $category
 * @property ProductCategory $parentCategory
 */
class ParentProductCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parent_product_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_category', 'id_parent_category'], 'required'],
            [['id_category', 'id_parent_category'], 'integer'],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['id_category' => 'id']],
            [['id_parent_category'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::class, 'targetAttribute' => ['id_parent_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_category' => 'Id категории',
            'id_parent_category' => 'Id родительской категории',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[ParentCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentCategory()
    {
        return $this->hasOne(ProductCategory::class, ['id' => 'id_parent_category']);
    }

    // public function getFull(){
    //     return $this->id_category . " - " . $this->id_parent_category;
    // }

    // public function getFull(){
    //     return ArrayHelper::map(ProductCategory::find()->all(), 'id_category', 'name') . " - " . ArrayHelper::map(ProductCategory::find()->all(), 'id_parent_category', 'name');
    // }

    public static function dropDownListCategory(){
        return ArrayHelper::map(ProductCategory::find()->all(),  'id' , 'name');
    }
}

