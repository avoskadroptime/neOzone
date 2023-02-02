<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo_review".
 *
 * @property int $id
 * @property int $id_review
 * @property string $photo_name Название фото + его расширение файла
 *
 * @property Review $review
 */
class PhotoReview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photo_review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_review', 'photo_name'], 'required'],
            [['id_review'], 'integer'],
            [['photo_name'], 'string', 'max' => 255],
            [['id_review'], 'exist', 'skipOnError' => true, 'targetClass' => Review::class, 'targetAttribute' => ['id_review' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_review' => 'Id отзыва',
            'photo_name' => 'Название фото + его расширение файла',
        ];
    }

    /**
     * Gets query for [[Review]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReview()
    {
        return $this->hasOne(Review::class, ['id' => 'id_review']);
    }
}
