<?php

/**
 * This is the model class for table "try_user".
 *
 * The followings are the available columns in table 'try_user':
 * @property string $user_id
 * @property string $user_name
 * @property string $user_detail
 * @property integer $is_real_user
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'try_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, user_name', 'required'),
			array('is_real_user', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>20),
			array('user_name', 'length', 'max'=>100),
			array('user_detail', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, user_name, user_detail, is_real_user', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => Yii::t('base','User'),
			'user_name' => Yii::t('base','User Name'),
			'user_detail' => Yii::t('base','User Detail'),
			'is_real_user' => Yii::t('base','Is Real User'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('user_detail',$this->user_detail,true);
		$criteria->compare('is_real_user',$this->is_real_user);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}