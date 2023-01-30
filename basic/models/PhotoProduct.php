<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo_product".
 *
 * @property int $id
 * @property int $id_product
 * @property string $photo_name название фотографии вместе с расширением файла
 *
 * @property Product $product
 */
class PhotoProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photo_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'photo_name'], 'required'],
            [['id_product'], 'integer'],
            [['photo_name'], 'string', 'max' => 255],
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
            'id_product' => 'Id Product',
            'photo_name' => 'название фотографии вместе с расширением файла',
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
}
