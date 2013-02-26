<?php

/**
 * This is the model class for table "try_media".
 *
 * The followings are the available columns in table 'try_media':
 * @property string $media_id
 * @property string $media_position
 * @property string $media_url
 * @property string $media_photo
 * @property string $media_text
 * @property string $media_ctime
 */
class Media extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Media the static model class
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
		return 'try_media';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('media_position, media_url, media_ctime', 'required'),
			array('media_position', 'length', 'max'=>30),
			array('media_url, media_photo, media_text', 'length', 'max'=>255),
			array('media_ctime', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('media_id, media_position, media_url, media_photo, media_text, media_ctime', 'safe', 'on'=>'search'),
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
			'media_id' => 'Media',
			'media_position' => 'Media Position',
			'media_url' => 'Media Url',
			'media_photo' => 'Media Photo',
			'media_text' => 'Media Text',
			'media_ctime' => 'Media Ctime',
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

		$criteria->compare('media_id',$this->media_id,true);
		$criteria->compare('media_position',$this->media_position,true);
		$criteria->compare('media_url',$this->media_url,true);
		$criteria->compare('media_photo',$this->media_photo,true);
		$criteria->compare('media_text',$this->media_text,true);
		$criteria->compare('media_ctime',$this->media_ctime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}