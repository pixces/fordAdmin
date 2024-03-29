<?php

/**
 * This is the model class for table "activity_logs".
 *
 * The followings are the available columns in table 'activity_logs':
 * @property integer $id
 * @property string $date
 * @property string $activity
 * @property integer $user_id
 * @property integer $content_id
 * @property string $comment
 */
class ActivityLogs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'activity_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, user_id, content_id, comment', 'required'),
			array('user_id, content_id', 'numerical', 'integerOnly'=>true),
			array('activity', 'length', 'max'=>10),
			array('comment', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, activity, user_id, content_id, comment', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'date' => 'Date',
			'activity' => 'Activity',
			'user_id' => 'User',
			'content_id' => 'Content',
			'comment' => 'Comment',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('activity',$this->activity,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ActivityLogs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
         /**
     * @return bool
     */
    public function beforeValidate() {
        
           $this->date = new CDbExpression('NOW()');
           
           return parent::beforeSave();
        }
}
