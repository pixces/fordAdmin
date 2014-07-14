<?php

/**
 * This is the model class for table "environments".
 *
 * The followings are the available columns in table 'environments':
 * @property integer $id
 * @property string $name
 * @property string $shortcode
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property ContentViews[] $contentViews
 * @property ContentVotes[] $contentVotes
 * @property PageViews[] $pageViews
 */
class Environment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'environments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('shortcode', 'required'),
			array('id, is_active', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>64),
			array('shortcode', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, shortcode, is_active', 'safe', 'on'=>'search'),
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
			'contentViews' => array(self::HAS_MANY, 'ContentViews', 'environment_id'),
			'contentVotes' => array(self::HAS_MANY, 'ContentVotes', 'environment_id'),
			'pageViews' => array(self::HAS_MANY, 'PageViews', 'environment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'shortcode' => 'Shortcode',
			'is_active' => 'Is Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('shortcode',$this->shortcode,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Environment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function getEnvironmentByName($name){
                
                $criteria=new CDbCriteria;
                $criteria->compare('name',$name);
                $result = Environment::model()->find($criteria);
                return $result->id;
        }
}
