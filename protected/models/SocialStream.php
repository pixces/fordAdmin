<?php

/**
 * This is the model class for table "social_streams".
 *
 * The followings are the available columns in table 'social_streams':
 * @property integer $id
 * @property string $title
 * @property string $keyword
 * @property string $is_phrase
 * @property string $is_profile
 * @property string $is_twitter
 * @property string $is_facebook
 * @property string $is_gplus
 * @property string $status
 * @property string $created_date
 * @property string $modified_date
 *
 * The followings are the available model relations:
 * @property SocialCalls[] $socialCalls
 * @property SocialPosts[] $socialPosts
 */
class SocialStream extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'social_streams';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keyword', 'required'),
			array('title, keyword', 'length', 'max'=>250),
			array('is_phrase, is_profile, is_twitter, is_facebook, is_gplus', 'length', 'max'=>1),
			array('status', 'length', 'max'=>8),
			array('created_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, keyword, is_phrase, is_profile, is_twitter, is_facebook, is_gplus, status, created_date, modified_date', 'safe', 'on'=>'search'),
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
			'socialCalls' => array(self::HAS_MANY, 'SocialCalls', 'stream_id'),
			'socialPosts' => array(self::HAS_MANY, 'SocialPosts', 'stream_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'keyword' => 'Keyword',
			'is_phrase' => 'Match Phrase',
			'is_profile' => 'Is Twitter Profile',
			'is_twitter' => 'Twitter',
			'is_facebook' => 'Facebook',
			'is_gplus' => 'Google Plus',
			'status' => 'Status',
			'created_date' => 'Created Date',
			'modified_date' => 'Modified Date',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('is_phrase',$this->is_phrase,true);
		$criteria->compare('is_profile',$this->is_profile,true);
		$criteria->compare('is_twitter',$this->is_twitter,true);
		$criteria->compare('is_facebook',$this->is_facebook,true);
		$criteria->compare('is_gplus',$this->is_gplus,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SocialStream the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
