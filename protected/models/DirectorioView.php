<?php

/**
 * This is the model class for table "directorio_view".
 *
 * The followings are the available columns in table 'directorio_view':
 * @property string $area_nom
 * @property string $nombre
 * @property string $apellido_p
 * @property string $apellido_m
 * @property string $cargo
 * @property integer $status
 * @property integer $id_dp
 * @property integer $id
 * @property integer $id_area
 */
class DirectorioView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DirectorioView the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'directorio_view';
	}

	public function primaryKey()
    {
            return 'id';
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, id_dp, id, id_grupo, id_area, fecha_reg', 'numerical', 'integerOnly'=>true),
			array('area_nom', 'length', 'max'=>255),
			array('nombre, apellido_p, apellido_m', 'length', 'max'=>200),
			array('cargo', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('area_nom, nombre, apellido_p, apellido_m, cargo, status, id_dp, id, id_area', 'safe', 'on'=>'search'),
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
			'Areas'=>array(self::BELONGS_TO,'Areas','id_area'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'area_nom' => 'Area Nom',
			'nombre' => 'Nombre',
			'apellido_p' => 'Apellido P',
			'apellido_m' => 'Apellido M',
			'cargo' => 'Cargo',
			'status' => 'Status',
			'id_dp' => 'Id Dp',
			'id' => 'ID',
			'id_area' => 'Id Area',
			'fecha_reg' => 'fecha_reg',
			'id_grupo' => 'Grupo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('area_nom',$this->area_nom,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_p',$this->apellido_p,true);
		$criteria->compare('apellido_m',$this->apellido_m,true);
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('id_dp',$this->id_dp);
		$criteria->compare('id',$this->id);
		$criteria->compare('id_area',$this->id_area);
		$criteria->compare('id_grupo',$this->id_grupo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 25),
		));
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