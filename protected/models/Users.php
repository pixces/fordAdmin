<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $status
 * @property string $verification_code
 * @property integer $is_verified
 * @property string $role
 * @property integer $is_shortlisted
 * @property integer $is_winner
 * @property string $last_login_time
 * @property string $date_created
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property Content[] $contents
 * @property UserProfiles[] $userProfiles
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, email, password, date_created, date_modified', 'required'),
			array('is_verified, is_shortlisted, is_winner', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, verification_code', 'length', 'max'=>100),
			array('email', 'length', 'max'=>256),
			array('password', 'length', 'max'=>128),
			array('status', 'length', 'max'=>7),
			array('role', 'length', 'max'=>10),
			array('last_login_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, password, status, verification_code, is_verified, role, is_shortlisted, is_winner, last_login_time, date_created, date_modified', 'safe', 'on'=>'search'),
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
			'contents' => array(self::HAS_MANY, 'Content', 'user_id'),
            'userProfiles' => array(self::HAS_ONE, 'UserProfiles', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'password' => 'Password',
			'status' => 'Status',
			'verification_code' => 'Verification Code',
			'is_verified' => 'Is Verified',
			'role' => 'Role',
			'is_shortlisted' => 'Is Shortlisted',
			'is_winner' => 'Is Winner',
			'last_login_time' => 'Last Login Time',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('verification_code',$this->verification_code,true);
		$criteria->compare('is_verified',$this->is_verified);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('is_shortlisted',$this->is_shortlisted);
		$criteria->compare('is_winner',$this->is_winner);
		$criteria->compare('last_login_time',$this->last_login_time,true);
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
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
