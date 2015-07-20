<?php

/**
 * This is the model class for table "{{node}}".
 *
 * The followings are the available columns in table '{{node}}':
 * @property integer $id
 * @property string $guid
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $type
 * @property integer $parent
 * @property integer $lft
 * @property integer $rgt
 * @property integer $level
 * @property string $publication_date
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $create_time
 * @property string $update_time
 */
class Node extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{node}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author_id,parent, lft, rgt, level, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('guid, title, slug', 'length', 'max'=>255),
			array('content,status, type, publication_date, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, guid, title, slug, content, type, parent, lft, rgt, level, publication_date, created_by, updated_by, create_time, update_time', 'safe', 'on'=>'search'),
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
			'guid' => 'Guid',
			'title' => 'Title',
			'slug' => 'Slug',
			'content' => 'Content',
			'type' => 'Type',
			'status'=>'Status',
			'author_id'=>'Author',
			'parent' => 'Parent',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'level' => 'Level',
			'publication_date' => 'Publication Date',
			'created_by' => 'Created By',
			'updated_by' => 'Updated By',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		);
	}

	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Node the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function setPublicationDate($time) {
		$this->publication_date = $time;
	}

	public function getPublicationTime() {
		return $this->publication_date;
	}

	public function getUpdateTime() {
		return $this->update_date;
	}

	public function getCreateTime() {
		return $this->create_time;
	}

	public function afterFind() {
		if(!isset($this->publicationDate)) {
			$this->publicationDate = $this->createTime;
		}
		parent::afterFind();
	}

	public function behaviors() {
		return array(
			'slugable'=>array(
				'class'=>'SlugBehavior',
				'translator' => array(Yii::app()->trasliterator, 'transliterate'),
				),
			'timestampable' => array(
	 			'class' => 'zii.behaviors.CTimestampBehavior',
	 			'setUpdateOnCreate'=>true,
 			),
 			'nestedSet'=>array(
 				'class'=>'NestedSetBehavior',
 				'hasManyRoots'=>true,
 				'rootAttribute'=>'parent'
 				)
		);
	}
}