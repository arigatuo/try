<?php
//todo 删除，更改条目后删除原图片
/**
 * This is the model class for table "try_brand".
 *
 * The followings are the available columns in table 'try_brand':
 * @property string $brand_id
 * @property string $brand_name
 * @property string $brand_ctime
 * @property string $brand_pic
 */
class Brand extends CActiveRecord
{
    public $oldRecord;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Brand the static model class
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
		return 'try_brand';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brand_name', 'required'),
			array('brand_name', 'length', 'max'=>20),
			array('brand_ctime', 'length', 'max'=>10),
			array('brand_pic', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('brand_id, brand_name, brand_ctime, brand_pic', 'safe', 'on'=>'search'),
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
			'brand_id' => 'Brand',
			'brand_name' => 'Brand Name',
			'brand_ctime' => 'Brand Ctime',
			'brand_pic' => 'Brand Pic',
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

		$criteria->compare('brand_id',$this->brand_id,true);
		$criteria->compare('brand_name',$this->brand_name,true);
		$criteria->compare('brand_ctime',$this->brand_ctime,true);
		$criteria->compare('brand_pic',$this->brand_pic,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function afterFind(){
        //保存更新前的记录
        $this->oldRecord = clone $this;
        return parent::afterFind();
    }

    public function beforeSave(){
        if($this->isNewRecord){
            $this->brand_ctime = time();
        }
        if(!empty($this->oldRecord->brand_pic) && $this->oldRecord->brand_pic != $this->brand_pic){
            /**
             * 删除更新之前的图片文件
             */
            CommonHelper::unlinkRelationPic($this->oldRecord->brand_pic);
        }
        return parent::beforeSave();
    }

    public function beforeDelete(){
        !empty($this->brand_pic) && CommonHelper::unlinkRelationPic($this->brand_pic);
        return parent::beforeDelete();
    }
}