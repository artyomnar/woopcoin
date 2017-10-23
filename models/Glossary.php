<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "glossary".
 *
 * @property integer $id
 * @property string $item
 * @property string $description
 */
class Glossary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'glossary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item', 'description'], 'required'],
            [['description'], 'string'],
            [['item'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item' => 'Термин',
            'description' => 'Описание',
        ];
    }
}
