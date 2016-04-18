<?php

/**
 * This is the model class for table "turnos_view".
 *
 * The followings are the available columns in table 'turnos_view':
 * @property integer $folio
 * @property integer $estado_sol
 * @property string $documento
 * @property integer $id_area
 * @property integer $id
 * @property string $fecha_turno
 */
class TurnosList extends CActiveRecord
{
	public $fecha_search;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TurnosList the static model class
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
		return 'turnos_view';
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
			array('folio, estado, estado_sol, id_area, id_area2, id', 'numerical', 'integerOnly'=>true),
			array('documento, fecha_turno, fecha_search', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('folio, estado_sol, documento, asunto,  id_area, id_area2, id, fecha_turno, remitente, fecha_search', 'safe', 'on'=>'search'),
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

			'tipoc'=>array(self::BELONGS_TO, 'CatStatusTurno', 'estado_sol'),
			'Areas'=>array(self::BELONGS_TO,'Areas','id_area'),
			'Areas2'=>array(self::BELONGS_TO,'Areas','id_area2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'folio' => 'Folio',
			'estado_sol' => 'Estado',
			'documento' => 'Documento',
			'asunto' => 'Asunto',
			'id_area' => 'Id Area',
			'id' => 'ID',
			'fecha_turno' => 'Fecha Turno',
			'fecha_search'=>'Fecha de Turno',
			'id_area2'=>'Area Remitente',
			'id_area'=>'Area Destinatario',
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
		$destinatario = Yii::app()->user->id;
		$id_area = Yii::app()->user->id_area;

		$criteria=new CDbCriteria;

		$criteria->compare('folio',$this->folio);
		$criteria->compare('estado_sol',$this->estado_sol);
		$criteria->compare('id_area2',$this->id_area2);
		$criteria->compare('id_area',$this->id_area);
		$criteria->compare('documento',$this->documento,true);
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('estado',1);
		$criteria->compare('id',$this->id);
		$criteria->compare('fecha_turno',$this->fecha_search);
	    $criteria->addCondition("id_area=$id_area or id_area2=$id_area");

		$criteria->order = 'id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 20),
		));
	}

	 	public function getImagen(){

	//	$imagen="validado.png";
		if($this->estado_sol=='1'){
		$imagen="<div class=\"label label-success\"><i class=\"fa fa-check-circle\"></i> SOLUCIONADO</button></div>";
		}
	    if($this->estado_sol=='0'){
		$imagen="<div class=\"label label-warning\"><i class=\"fa fa-warning\"></i> PENDIENTE</div>";	
		}

		return $imagen;

		}

	public function getImagen2(){

	//	$imagen="validado.png";
			if($this->estado_sol=='1'){
		$imagen="correcto.png";
		}
		if($this->estado_sol=='0'){
		$imagen="incorrecto.png";	
		}
		return Yii::app()->baseurl.'/images/'.$imagen;

	}
}