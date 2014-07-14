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
 * @property string $phone
 * @property string $mobile
 * @property string $dob
 * @property string $city
 * @property string $country
 * @property string $occupation
 * @property string $profile_image
 * @property string $passport
 * @property string $facebook
 * @property string $twitter
 * @property string $google_plus
 * @property string $youtube
 * @property string $instagram
 * @property string $linkedin
 * @property string $status
 * @property string $verification_code
 * @property string $role
 * @property string $last_login_time
 * @property string $date_created
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property Content[] $contents
 */
class User extends CActiveRecord
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
			array('first_name, email, password, verification_code, date_created, date_modified', 'required'),
			array('first_name, last_name, city, country, occupation, facebook, twitter, google_plus, youtube, instagram, linkedin, verification_code', 'length', 'max'=>100),
			array('email', 'unique'),
            array('email, profile_image', 'length', 'max'=>256),
			array('password', 'length', 'max'=>128),
			array('phone, mobile', 'length', 'max'=>25),
			array('passport', 'length', 'max'=>1),
			array('status', 'length', 'max'=>7),
			array('role', 'length', 'max'=>5),
			array('dob, last_login_time', 'safe'),
            array('password_repeat', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, password, phone, mobile, dob, city, country, occupation, profile_image, passport, facebook, twitter, google_plus, youtube, instagram, linkedin, status, verification_code, role, last_login_time, date_created, date_modified', 'safe', 'on'=>'search'),
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
			'email' => 'Email Address',
			'password' => 'Password',
			'phone' => 'Phone',
			'mobile' => 'Mobile',
			'dob' => 'Dob',
			'city' => 'City',
			'country' => 'Country',
			'occupation' => 'Occupation',
			'profile_image' => 'Profile Image',
			'passport' => 'Passport',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'google_plus' => 'Google Plus',
			'youtube' => 'Youtube',
			'instagram' => 'Instagram',
			'linkedin' => 'Linkedin',
			'status' => 'Status',
			'verification_code' => 'Verification Code',
			'role' => 'Role',
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
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('occupation',$this->occupation,true);
		$criteria->compare('profile_image',$this->profile_image,true);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('google_plus',$this->google_plus,true);
		$criteria->compare('youtube',$this->youtube,true);
		$criteria->compare('instagram',$this->instagram,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('verification_code',$this->verification_code,true);
		$criteria->compare('role',$this->role,true);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    /**
     * add the date created to all records
     */
    public function beforeValidate(){

        if ($this->isNewRecord) {
            // set the create date, last updated date
            // and the user doing the creating
            $this->date_created = $this->date_modified = new CDbExpression('NOW()');
        } else {
            //not a new record, so just set the last updated time
            //and last updated user id
            $this->date_modified = new CDbExpression('NOW()');
        }
        return parent::beforeValidate();
    }


    /**
     * Function to encrypt string
     * using mg5 function
     * @param $string
     * @return string
     */
    public function encrypt($string){
        return md5($string);
    }

}
