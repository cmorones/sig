<?php

/**
 * This is the model class for table "salida_view".
 *
 * The followings are the available columns in table 'salida_view':
 * @property integer $folio
 * @property string $documento
 * @property string $fecha
 * @property integer $estado_acuse
 * @property integer $id_area
 * @property string $nombre
 * @property integer $id
 * @property string $tipoc
 * @property string $asunto
 */
class SalidaView extends CActiveRecord
{
	public $copias;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SalidaView the static model class
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
		return 'salida_view';
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
			array('folio, estado_acuse, estado, id_area, id, idc, tipo', 'numerical', 'integerOnly'=>true),
			array('nombre, tipoc', 'length', 'max'=>100),
			array('documento, fecha, asunto', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('folio, documento, fecha, estado_acuse, id_area, nombre, id, idc, tipoc, asunto', 'safe', 'on'=>'search'),
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
			'folio' => 'Folio',
			'documento' => 'Documento',
			'fecha' => 'Fecha',
			'estado_acuse' => 'Condición',
			'id_area' => 'Id Area',
			'nombre' => 'Nombre',
			'id' => 'ID',
			'tipoc' => 'Tipoc',
			'asunto' => 'Asunto',
			'copias' => 'Copias',
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
		$id_area = Yii::app()->user->id_area;
		$criteria=new CDbCriteria;

		$criteria->compare('folio',$this->folio);
		$criteria->compare('documento',$this->documento,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('estado_acuse',$this->estado_acuse);
		$criteria->compare('id_area',$id_area);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('estado',1);
		$criteria->compare('tipo',1);
		//$criteria->compare('tipoc',$this->tipoc,true);
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->order = 'id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 15),
		));
	}

		public function getImagen(){

	//	$imagen="validado.png";
		if($this->estado_acuse=='1'){
		$imagen="<div class=\"label label-success\"><i class=\"fa fa-check-circle\"></i> CONFIRMADO</button></div>";
		}
	    if($this->estado_acuse=='0'){
		$imagen="<div class=\"label label-danger\"><i class=\"fa fa-danger\"></i> SIN CONFIRMAR</div>";	
		}


		return $imagen;

		}

		public function getCopiasf(){

	//	$imagen="validado.png";
		
$query ="SELECT count(correspondencia.id) as cuenta
FROM 
  public.correspondencia 
 WHERE 
   correspondencia.estado=1 and
   correspondencia.id_docto= ".$this->id." and
   correspondencia.TIPO = 2";

$resultrem=Yii::app()->db->createCommand($query)->queryRow();

$copiasf = $resultrem['cuenta'];

		return $copiasf;

		}
}