<?php

/**
 * This is the model class for table "directorio".
 *
 * The followings are the available columns in table 'directorio':
 * @property integer $id
 * @property integer $id_area
 * @property integer $id_dp
 * @property string $cargo
 * @property integer $status
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 */
class Directorio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $personas;
	public function tableName()
	{
		return 'directorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_area, id_grupo,id_dp, status, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('cargo', 'length', 'max'=>300),
			array('fecha_reg, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_area, id_dp, cargo, status, fecha_reg, fecha_mod, user_reg, user_mod', 'safe', 'on'=>'search'),
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
			'personas'=>array(self::BELONGS_TO, 'DatosPersonales', 'id_dp'),
			'areas'=>array(self::BELONGS_TO, 'Areas', 'id_area'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_area' => 'Area de adscripción',
			'id_dp' => 'Datos Personales',
			'cargo' => 'Cargo',
			'status' => 'Status',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_reg' => 'User Reg',
			'user_mod' => 'User Mod',
			'Personas' => 'Nombre',
			'id_grupo' => 'Grupo',
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
		//$criteria->with = array('personas');

		$criteria->compare('id',$this->id);
		//$criteria->compare('personas.nombre',$this->personas,true);
		$criteria->compare('id_area',$this->id_area);
		$criteria->compare('id_dp',$this->id_dp);
		$criteria->compare('status',$this->status);
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('user_reg',$this->user_reg);
		$criteria->compare('user_mod',$this->user_mod);
		 $criteria->order = 'id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 20),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Directorio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
