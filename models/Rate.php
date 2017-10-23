<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rate".
 *
 * @property integer $id
 * @property string $currency
 * @property double $old_value
 * @property double $new_value
 */
class Rate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency'], 'required'],
            [['old_value', 'new_value'], 'number'],
            [['currency'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency' => 'Криптовалюта',
            'old_value' => 'Старый курс',
            'new_value' => 'Новый курс',
        ];
    }
}
