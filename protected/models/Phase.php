<?php

/**
 * This is the model class for table "phases".
 *
 * The followings are the available columns in table 'phases':
 * @property integer $id
 * @property string $phase_name
 * @property integer $page_id
 * @property string $page_name
 * @property string $link_type
 * @property string $status
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property Pages $page
 */
class Phase extends CActiveRecord
{       
    
    public $landing_page;
    public $associate_page;
    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'phases';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('phase_name, page_id, page_name, date_modified', 'required'),
			array('page_id', 'numerical', 'integerOnly'=>true),
			array('phase_name, page_name', 'length', 'max'=>150),
			array('link_type', 'length', 'max'=>9),
			array('status', 'length', 'max'=>8),
                        array('landing_page','safe'),
                        array('associate_page','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, phase_name, page_id, page_name, link_type, status, date_modified', 'safe', 'on'=>'search'),
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
			'page' => array(self::BELONGS_TO, 'Pages', 'page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'phase_name' => 'Phase Name',
			'page_id' => 'Page',
			'page_name' => 'Page Name',
			'link_type' => 'Link Type',
			'status' => 'Status',
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
		$criteria->compare('phase_name',$this->phase_name,true);
		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('page_name',$this->page_name,true);
		$criteria->compare('link_type',$this->link_type,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Phase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function beforeValidate() {
            
            $this->date_modified = new CDbExpression('NOW()');
            if ($this->isNewRecord) {
                $this->status = 'inactive';
            }
            return parent::beforeValidate();
        }
}
