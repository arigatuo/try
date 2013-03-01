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
    public $oldRecord;
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
			array('media_position, media_url', 'required'),
			array('media_position', 'length', 'max'=>30),
			array('media_url, media_photo, media_text', 'length', 'max'=>255),
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
            'pagination' => array(
                'pageSize' => 20,
            ),
            'sort' => array(
                'defaultOrder' => 'media_id desc',
            ),
		));
	}

    public function beforeSave(){
        if($this->isNewRecord){
            $this->media_ctime = time();
        }
        if(!is_numeric($this->media_ctime))
            $this->media_ctime = strtotime($this->media_ctime);
        if(!empty($this->media_photo) && !empty($this->oldRecord->media_photo) && $this->media_photo !=
            $this->oldRecord->media_photo){
                //删除更新前的图片文件
                CommonHelper::unlinkRelationPic($this->oldRecord->media_photo);
        }
        return parent::beforeSave();
    }

    public function afterFind(){
        if(is_numeric($this->media_ctime))
            $this->media_ctime = CommonHelper::formatDate($this->media_ctime);
        $this->oldRecord = clone $this;

        return parent::afterFind();
    }

    /**
     * 按条件返回列表
     * @param $position 媒体位
     * @param int $limit 个数限制
     * @param int $useCache 是否使用缓存 默认1使用
     * @return array
     */
    public function readList($position, $limit = 5, $useCache = 1){
        $resultList = array();
        $defaultLimit = 5;
        $cacheKey = md5(__CLASS__.__FUNCTION__.$position.$limit);
        $cacheTime = Yii::app()->params['cacheTime']['5min'];
        $cacheVal = Yii::app()->cache->get($cacheKey);
        if(!empty($cacheVal) && !$useCache){
            $resultList = $cacheVal;
        }else{
            $criteria = new CDbCriteria();
            $criteria->addCondition("`media_position`=:position");
            $criteria->params = array(
                ':position' => $position
            );
            $criteria->order = "media_id desc";
            $criteria->limit = !empty($limit) ? $limit : $defaultLimit;

            $resultList = self::model()->findAll($criteria);
            if(!empty($resultList))
                Yii::app()->cache->set($cacheKey, $resultList, $cacheTime);
        }

        return $resultList;
    }
}