<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video_review".
 *
 * @property int $id
 * @property int $id_review
 * @property string $video_name Название видиофайла с расширением
 *
 * @property Review $review
 */
class VideoReview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video_review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_review', 'video_name'], 'required'],
            [['id_review'], 'integer'],
            [['video_name'], 'string', 'max' => 255],
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
            'video_name' => 'Название видео-файла с расширением',
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
