<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property integer $id_area
 * @property integer $id_dp
 * @property integer $id_perfil
 * @property string $usuario
 * @property string $password
 * @property integer $status
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 * @property string $ip
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $nombre;
	public $apellido_p;
	public $apellido_m;
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_area, id_dp, id_perfil, status, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('usuario, password, ip', 'length', 'max'=>255),
			array('fecha_reg, fecha_mod, nombre, apellido_p, apellido_m', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_area, id_dp, id_perfil, usuario, password, status, fecha_reg, fecha_mod, user_reg, user_mod, ip', 'safe', 'on'=>'search'),
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
			'Areas'=>array(self::BELONGS_TO, 'Areas', 'id_area'),
			'Perfil'=>array(self::BELONGS_TO, 'CatPerfiles', 'id_perfil'),
			'Persona'=>array(self::BELONGS_TO, 'DatosPersonales', 'id_dp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_area' => 'Area',
			'id_dp' => 'Nombre',
			'id_perfil' => 'Perfil',
			'usuario' => 'Usuario',
			'password' => 'Password',
			'status' => 'Status',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_reg' => 'User Reg',
			'user_mod' => 'User Mod',
			'ip' => 'Ip',
			'nombre' => 'nombre',
			'apellido_p' => 'Apellido Paterno',
			'apellido_m' => 'Appellido Materno',
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
		//$criteria->with = array('Persona.nombre');

		$criteria->compare('id',$this->id);
		$criteria->compare('id_area',$this->id_area);
		$criteria->compare('id_dp',$this->id_dp);
		$criteria->compare('id_perfil',$this->id_perfil);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('password',$this->password,true);
		//$criteria->compare('persona.nombre',$this->nombre,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('user_reg',$this->user_reg);
		$criteria->compare('user_mod',$this->user_mod);
		$criteria->compare('ip',$this->ip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 15),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password)
	{
		return $this->hashPassword($password)===$this->password;
	}

	public function hashPassword($password)
	{
		return md5($password);
	}

	public function generateSalt()
	{
		return uniqid('',true);
	}

	 public function getPerfil($pk)
	    {
	            $nombre = CatPerfiles::model()->findByPk($pk); 
	        	return $nombre->nombre;
	    }

	   public function getImagen(){

	//	$imagen="validado.png";
		if($this->status=='1'){
		$imagen="<div class=\"label label-success\"><i class=\"fa fa-check-circle\"></i> ACTIVO</button></div>";
		}
	    if($this->status=='2'){
		$imagen="<div class=\"label label-warning\"><i class=\"fa fa-warning\"></i> INACTIVO</div>";	
		}

		return $imagen;

		}
}
