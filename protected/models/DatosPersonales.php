<?php

/**
 * This is the model class for table "datos_personales".
 *
 * The followings are the available columns in table 'datos_personales':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido_p
 * @property string $apellido_m
 * @property string $genero
 * @property string $fecha_nac
 * @property string $email
 * @property integer $status
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 */
class DatosPersonales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'datos_personales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido_p, apellido_m, email', 'length', 'max'=>100),
			array('genero', 'length', 'max'=>10),
			array('fecha_nac, fecha_reg, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido_p, apellido_m, genero, fecha_nac, email, status, fecha_reg, fecha_mod, user_reg, user_mod', 'safe', 'on'=>'search'),
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
			'apellido_p' => 'Apellido Paterno',
			'apellido_m' => 'Apellido Materno',
			'genero' => 'Genero',
			'fecha_nac' => 'Fecha Nacimiento',
			'email' => 'Email',
			'status' => 'Status',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_p',$this->apellido_p,true);
		$criteria->compare('apellido_m',$this->apellido_m,true);
		$criteria->compare('genero',$this->genero,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('user_reg',$this->user_reg);
		$criteria->compare('user_mod',$this->user_mod);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 15),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DatosPersonales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getOptions()
{

return CHtml::listData($this->model()->findAll((array(
  //  'condition'=>'bandera=1',
   //'condition'=>"bandera=1 and subprog=$subprog",
  	'select'=>'id,nombre',
    'condition'=>"status=38",
   'order'=>'nombre',
	))),'id','nombre');
}
}
