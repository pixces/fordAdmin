<?php

/**
 * This is the model class for table "social_calls".
 *
 * The followings are the available columns in table 'social_calls':
 * @property integer $id
 * @property integer $stream_id
 * @property string $source
 * @property string $keyword_string
 * @property string $base_api_url
 * @property integer $post_count
 * @property integer $frequency
 * @property string $last_call_time
 * @property string $next_call_time
 * @property string $date_added
 *
 * The followings are the available model relations:
 * @property SocialStreams $stream
 */
class SocialCall extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'social_calls';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('stream_id, source, keyword_string, base_api_url, date_created', 'required'),
			array('stream_id, post_count, frequency', 'numerical', 'integerOnly'=>true),
			array('source', 'length', 'max'=>10),
			array('last_call_time, next_call_time', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, stream_id, source, keyword_string, base_api_url, post_count, frequency, last_call_time, next_call_time, date_added', 'safe', 'on'=>'search'),
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
			'stream' => array(self::BELONGS_TO, 'SocialStream', 'stream_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'stream_id' => 'Stream',
			'source' => 'Source',
			'keyword_string' => 'Keyword String',
			'base_api_url' => 'Base Api Url',
			'post_count' => 'Post Count',
			'frequency' => 'Frequency',
			'last_call_time' => 'Last Call Time',
			'next_call_time' => 'Next Call Time',
			'date_created' => 'Date Created',
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
		$criteria->compare('stream_id',$this->stream_id);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('keyword_string',$this->keyword_string,true);
		$criteria->compare('base_api_url',$this->base_api_url,true);
		$criteria->compare('post_count',$this->post_count);
		$criteria->compare('frequency',$this->frequency);
		$criteria->compare('last_call_time',$this->last_call_time,true);
		$criteria->compare('next_call_time',$this->next_call_time,true);
		$criteria->compare('date_added',$this->date_added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SocialCall the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
