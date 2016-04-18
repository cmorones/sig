<?php

/**
 * This is the model class for table "sis_estructura".
 *
 * The followings are the available columns in table 'sis_estructura':
 * @property integer $id
 * @property string $nombre
 * @property string $alias
 * @property string $link
 * @property integer $id_parent
 * @property integer $orden
 */
class SisEstructura extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sis_estructura';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_parent, orden', 'numerical', 'integerOnly'=>true),
			array('nombre, alias, link', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, alias, link, id_parent, orden', 'safe', 'on'=>'search'),
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
			'nombre' => 'Nombre',
			'alias' => 'Alias',
			'link' => 'Link',
			'id_parent' => 'Id Parent',
			'orden' => 'Orden',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('id_parent',$this->id_parent);
		$criteria->compare('orden',$this->orden);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SisEstructura the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
