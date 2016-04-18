<?php

/**
 * This is the model class for table "entrada_view".
 *
 * The followings are the available columns in table 'entrada_view':
 * @property integer $folio
 * @property string $fecha
 * @property string $documento
 * @property integer $estado_acuse
 * @property integer $id_area
 * @property string $nombre
 * @property string $nombre2
 * @property integer $id
 */
class EntradaView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EntradaView the static model class
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
		return 'entrada_view';
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
			array('folio, estado_acuse, id_area, id', 'numerical', 'integerOnly'=>true),
			array('nombre, nombre2', 'length', 'max'=>100),
			array('fecha, documento, asunto', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('folio, fecha, documento, asunto, estado_acuse, id_area, nombre, nombre2, id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'folio' => 'Folio',
			'fecha' => 'Fecha',
			'documento' => 'Documento',
			'asunto' => 'Asunto',
			'estado_acuse' => 'Estado Acuse',
			'id_area' => 'Id Area',
			'nombre' => 'Tipo Oficio',
			'nombre2' => 'Tipo copia',
			'id' => 'ID',
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
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('documento',$this->documento,true);
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('estado_acuse',1);
		$criteria->compare('id_area',$id_area);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nombre2',$this->nombre2,true);
		$criteria->compare('id',$this->id);
		$criteria->order = 'fecha desc';


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 15),
		));
	}

	public function getImagen(){

	//	$imagen="validado.png";



  $sql = "SELECT count(id) as cuenta from turnos where id_corresp=$this->id"; 
  $turnos = Yii::app()->db->createCommand($sql)->queryRow();



		if($this->estado_acuse=='1'){
		$imagen="<div class=\"label label-success\"><i class=\"fa fa-check-circle\"></i> CONFIRMADO</button></div>";
		}

		if($this->estado_acuse=='1' && $turnos['cuenta']>0){
		$imagen="<div class=\"label label-warning\"><i class=\"fa fa-check-circle\"></i> TURNADO</button></div>";
		}

		


		return $imagen;

		}



}