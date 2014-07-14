<?php

/**
 * This is the model class for table "widget_types".
 *
 * The followings are the available columns in table 'widget_types':
 * @property integer $id
 * @property string $name
 * @property string $display_name
 * @property string $form_name
 * @property string $description
 * @property string $status
 * @property string $date_created
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property Widgets[] $widgets
 */
class WidgetType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'widget_types';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_created, date_modified', 'required'),
			array('name', 'length', 'max'=>50),
			array('display_name, form_name', 'length', 'max'=>150),
			array('description', 'length', 'max'=>250),
			array('status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, display_name, form_name, description, status, date_created, date_modified', 'safe', 'on'=>'search'),
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
			'widgets' => array(self::HAS_MANY, 'Widgets', 'widget_type_id'),
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
			'display_name' => 'Display Name',
			'form_name' => 'Form Name',
			'description' => 'Description',
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
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('form_name',$this->form_name,true);
		$criteria->compare('description',$this->description,true);
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
	 * @return WidgetType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
