<?php

/**
 * This is the model class for table "home_principal".
 *
 * The followings are the available columns in table 'home_principal':
 * @property integer $id
 * @property string $titulo
 * @property string $subtutulo
 * @property string $nombre_btn
 * @property string $archivo
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 */
class HomePrincipal extends CActiveRecord
{
	public $_archivo;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'home_principal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('titulo, subtutulo, nombre_btn, archivo, fecha_reg, fecha_mod, _archivo', 'safe'),
			//array('_archivo', 'file', 'types'=>'pdf', "allowEmpty"=>false,'maxSize'=>1024 * 1024 * 2 ,  'tooLarge'=>'Archivo debe ser menor a 2mb', "on"=>"update"),
           // array('_archivo', 'file', 'types'=>'xls', "allowEmpty"=>true,'maxSize'=>1024 * 1024 * 2,  'tooLarge'=>'Archivo debe ser menor a 2mb', "on"=>"update"),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, subtutulo, nombre_btn, archivo, fecha_reg, fecha_mod, user_reg, user_mod', 'safe', 'on'=>'search'),
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
			'titulo' => 'Título',
			'subtutulo' => 'Subtitulo',
			'nombre_btn' => 'Nombre que llevara el botón',
			'archivo' => 'Archivo',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_reg' => 'User Reg',
			'user_mod' => 'User Mod',
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
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('subtutulo',$this->subtutulo,true);
		$criteria->compare('nombre_btn',$this->nombre_btn,true);
		$criteria->compare('archivo',$this->archivo,true);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('user_reg',$this->user_reg);
		$criteria->compare('user_mod',$this->user_mod);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HomePrincipal the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
