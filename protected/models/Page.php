<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property string $name
 * @property string $seo_title
 * @property integer $is_default
 * @property integer $environment_id
 * @property string $status
 * @property string $title
 * @property string $description
 * @property string $thumb
 * @property string $share_text
 * @property string $theater_share_text
 * @property string $share_url
 * @property integer $header
 * @property integer $footer
 * @property integer $partners
 * @property string $date_created
 * @property string $date_modified
 *
 * The followings are the available model relations:
 * @property PageGalleries[] $pageGalleries
 * @property PageViews[] $pageViews
 * @property PageWidgets[] $pageWidgets
 */
class Page extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $widget;
        public $gallery_id;
        public $is_gallery=0;
        public function tableName()
	{
		return 'pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, seo_title,', 'required'),
			array('is_default, environment_id, header, footer, partners', 'numerical', 'integerOnly'=>true),
			array('name, title, thumb, share_url', 'length', 'max'=>255),
			array('seo_title', 'length', 'max'=>64),
			array('description, share_text, theater_share_text', 'safe'),
            array('widget, gallery_id','safe'),
                    array('gallery_id','safe'),
                    array('is_gallery','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, seo_title, is_default, environment_id, status, title, description, thumb, share_text, theater_share_text, share_url, header, footer, partners, date_created, date_modified', 'safe', 'on'=>'search'),
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
			'pageGalleries' => array(self::HAS_MANY, 'PageGalleries', 'page_id'),
			'pageViews' => array(self::HAS_MANY, 'PageViews', 'page_id'),
			'pageWidgets' => array(self::HAS_MANY, 'PageWidgets', 'page_id'),
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
			'seo_title' => 'Seo Title',
			'is_default' => 'Is Phase Landing Page',
			'environment_id' => 'Distribution Points',
			'status' => 'Status',
			'title' => 'Title',
			'description' => 'Description',
			'thumb' => 'Thumb',
			'share_text' => 'Share Text',
			'theater_share_text' => 'Theater Share Text',
			'share_url' => 'Share Url',
			'header' => 'Page Header',
			'footer' => 'Page Footer',
			'partners' => 'Partners Module',
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
		$criteria->compare('seo_title',$this->seo_title,true);
		$criteria->compare('is_default',$this->is_default);
		$criteria->compare('environment_id',$this->environment_id);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('share_text',$this->share_text,true);
		$criteria->compare('theater_share_text',$this->theater_share_text,true);
		$criteria->compare('share_url',$this->share_url,true);
		$criteria->compare('header',$this->header);
		$criteria->compare('footer',$this->footer);
		$criteria->compare('partners',$this->partners);
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
	 * @return Page the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function beforeValidate() {
            
            if ($this->isNewRecord){
                $this->date_created = new CDbExpression('NOW()');
            }
                
            $this->date_modified = new CDbExpression('NOW()');

            return parent::beforeSave();
        }
}
