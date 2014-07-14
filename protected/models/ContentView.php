<?php

/**
 * This is the model class for table "content_views".
 *
 * The followings are the available columns in table 'content_views':
 * @property integer $content_id
 * @property string $date
 * @property string $views
 * @property integer $environment_id
 *
 * The followings are the available model relations:
 * @property Environments $environment
 * @property Content $content
 */
class ContentView extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'content_views';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content_id, date, environment_id', 'required'),
			array('content_id, environment_id', 'numerical', 'integerOnly'=>true),
			array('views', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('content_id, date, views, environment_id', 'safe', 'on'=>'search'),
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
			'environment' => array(self::BELONGS_TO, 'Environments', 'environment_id'),
			'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'content_id' => 'Content',
			'date' => 'Date',
			'views' => 'Views',
			'environment_id' => 'Environment',
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

		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('views',$this->views,true);
		$criteria->compare('environment_id',$this->environment_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ContentView the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeValidate() {
            
            if ($this->isNewRecord)
                $this->date = new CDbExpression('NOW()');
            return parent::beforeSave();
        }
}
