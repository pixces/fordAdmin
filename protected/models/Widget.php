<?php

/**
 * This is the model class for table "widgets".
 *
 * The followings are the available columns in table 'widgets':
 * @property integer $id
 * @property string $name
 * @property integer $widget_type_id
 * @property string $data
 * @property string $status
 * @property string $date_created
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property PageWidgets[] $pageWidgets
 * @property WidgetTypes $widgetType
 */
class Widget extends CActiveRecord
{
	
    public $image;
    public $social_facebook;
    public $social_twitter;
    public $social_gplus;
    public $social_instagram;
    public $social_pinterest;
    public $social_youtube;
    public $label;
    public $link_url;
    public $title;
    public $content;
    public $countdown_time;
//    public $image1;
//    public $image2;
//    public $image3;
//    public $image4;
    public $widget_type;
    public $propertiesArray = array('id','widget_type_id','name','status','data','attributes','isNewRecord','date_created','date_modified');
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'widgets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('widget_type_id, name', 'required'),
			array('widget_type_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('status', 'length', 'max'=>8),
			array('data', 'safe'),
			//array('image', 'safe'),
//                        array('image1', 'safe'),
//                        array('image2', 'safe'),
//                        array('image3', 'safe'),
//                        array('image4', 'safe'),   
                        
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, widget_type_id, data, status, date_created, date_modified', 'safe', 'on'=>'search'),
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
			'pageWidgets' => array(self::HAS_MANY, 'PageWidgets', 'widget_id'),
			'widgetType' => array(self::BELONGS_TO, 'WidgetType', 'widget_type_id'),
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
			'widget_type_id' => 'Widget Type',
			'data' => 'Data',
			'status' => 'Status',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
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
		$criteria->compare('widget_type_id',$this->widget_type_id);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Widget the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
         public function beforeValidate() {
            
            if ($this->isNewRecord){
                $this->date_created = new CDbExpression('NOW()');
                $this->status = 'active';
            }
                
            $this->date_modified = new CDbExpression('NOW()');

            return parent::beforeSave();
        }
        
        
         /**
         * Returns the value for a dynamic attribute, if not, falls back to parent
         * method
         * 
         * @param type $name
         * @return type 
         */
        public function __get($name) {
             if(in_array($name,$this->propertiesArray)) 
			return parent::__get($name);
             else 
                 return $this->$name;
                        
               
        }

        public function __set($name, $value) {
            
            if(in_array($name,$this->propertiesArray)) 
				parent::__set($name,$value);
            else
                $this->$name = $value;
		
               
        }

       
}
