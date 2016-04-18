<?php

/**
 * This is the model class for table "correspondencia".
 *
 * The followings are the available columns in table 'correspondencia':
 * @property integer $id
 * @property integer $id_docto
 * @property integer $folio
 * @property integer $folio_inst
 * @property integer $destinatario
 * @property integer $tipo
 * @property integer $estado_acuse
 * @property string $fecha_acuse
 * @property integer $caracter
 * @property integer $estado_rem
 * @property integer $estado_dest
 * @property integer $estado
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 */
class Correspondencia extends CActiveRecord
{
	
	public $area_search;
	public $tipo_search;
	public $asunto_search;
	public $fecha_search;
	public $docto_search;/**
	public $fueratiempo;
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'correspondencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_acuse','required'),
			array('id_docto, folio, folio_inst, destinatario, tipo, estado_acuse, caracter, estado_rem, estado_dest, estado, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('tipo_search,area_search,asunto_search,fecha_search,docto_search,fecha_acuse, fecha_reg, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tipo_search,area_search,asunto_search,fecha_search,docto_search,id, id_docto, folio, folio_inst, destinatario, tipo, estado_acuse, fecha_acuse, caracter, estado_rem, estado_dest, estado, fecha_reg, fecha_mod, user_reg, user_mod', 'safe', 'on'=>'search'),
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

			'docto'=>array(self::BELONGS_TO,'Documentos','id_docto'),
			'dest'=>array(self::BELONGS_TO,'Directorio','destinatario'),
			'destinatario'=>array(self::BELONGS_TO,'Directorio','destinatario'),
			'tipoc'=>array(self::BELONGS_TO, 'TipoCopia', 'tipo'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_docto' => 'Id Docto',
			'folio' => 'Folio',
			'folio_inst' => 'Folio Inst',
			'destinatario' => 'Destinatario',
			'tipo' => 'Tipo Copia',
			'estado_acuse' => 'Estado Acuse',
			'fecha_acuse' => 'Fecha Acuse',
			'caracter' => 'Caracter',
			'estado_rem' => 'Estado Rem',
			'estado_dest' => 'Estado Dest',
			'estado' => 'Estado',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_reg' => 'User Reg',
			'user_mod' => 'User Mod',
			'docto_search'=>'Documento',
			'fecha_search'=>'Fecha',
			'asunto_search'=>'Asunto',
			'area_search'=>'Area',
			'tipo_search'=>'Tipo',
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
		$id_area = Yii::app()->user->id_area;
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('tipoc','docto','dest.areas');
		//$criteria->with = array('dest');
		//$criteria->with = array('dest.areas');
		$criteria->compare('areas.id',$id_area);
		$criteria->compare('docto.documento',$this->docto_search,true);
		$criteria->compare('docto.asunto',$this->asunto_search,true);
		$criteria->compare('docto.tipo_docto',$this->tipo_search);
		$criteria->compare('docto.fecha',$this->fecha_search);
		$criteria->compare('docto.estado',1);
		$criteria->compare('t.id',$this->id);
		$criteria->compare('id_docto',$this->id_docto);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('folio_inst',$this->folio_inst);
		$criteria->compare('destinatario',$this->destinatario);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('estado_acuse',0);
		$criteria->compare('fecha_acuse',$this->fecha_acuse,true);
		$criteria->compare('caracter',$this->caracter);
		$criteria->compare('estado_rem',$this->estado_rem);
		$criteria->compare('estado_dest',$this->estado_dest);
		$criteria->compare('t.estado',$this->estado);
		$criteria->order ="t.id desc";
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 20),
		));
		//var_dump($dataProvider->getData());

	}

    public function search2()
	{
		$id_area = Yii::app()->user->id_area;
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('docto','dest.areas');
		//$criteria->with = array('dest');
		//$criteria->with = array('dest.areas');
		$criteria->compare('areas.id',$id_area);
		$criteria->compare('docto.documento',$this->docto_search,true);
		$criteria->compare('docto.asunto',$this->asunto_search,true);
		$criteria->compare('docto.fecha',$this->fecha_search);
		$criteria->compare('docto.estado',1);
		$criteria->compare('t.id',$this->id);
		$criteria->compare('id_docto',$this->id_docto);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('folio_inst',$this->folio_inst);
		$criteria->compare('destinatario',$this->destinatario);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('estado_acuse',1);
		$criteria->compare('fecha_acuse',$this->fecha_acuse,true);
		$criteria->compare('caracter',$this->caracter);
		$criteria->compare('estado_rem',$this->estado_rem);
		$criteria->compare('estado_dest',$this->estado_dest);
		$criteria->compare('t.estado',$this->estado);
		$criteria->order ="t.id desc,t.folio desc";


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 20),
		));
		//var_dump($dataProvider->getData());

	}


	  public function search3()
	{
		$id_area = Yii::app()->user->id_area;
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with = array('docto','dest.areas');
		//$criteria->with = array('dest');
		//$criteria->with = array('dest.areas');
		$criteria->compare('areas.id',$id_area);
		$criteria->compare('docto.documento',$this->docto_search,true);
		$criteria->compare('docto.asunto',$this->asunto_search,true);
		$criteria->compare('docto.fecha',$this->fecha_search);
		$criteria->compare('docto.estado',1);
		$criteria->compare('t.id',$this->id);
		$criteria->compare('id_docto',$this->id_docto);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('folio_inst',$this->folio_inst);
		$criteria->compare('destinatario',$this->destinatario);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('estado_acuse',1);
		$criteria->compare('fecha_acuse',$this->fecha_acuse,true);
		$criteria->compare('caracter',$this->caracter);
		$criteria->compare('estado_rem',$this->estado_rem);
		$criteria->compare('estado_dest',$this->estado_dest);
		$criteria->compare('t.estado',$this->estado);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 20),
		));
		//var_dump($dataProvider->getData());

	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Correspondencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function getImagen(){

	//	$imagen="validado.png";
  $sql = "SELECT fecha from documentos where id=$this->id_docto"; 
  $fechadocto = Yii::app()->db->createCommand($sql)->queryRow();

   $fecha_reg = date("Y-m-d H:i:s");
   $dias = $this->dias_transcurridos($fechadocto['fecha'],$fecha_reg);

  

		if($dias>40){
		$imagen="<div class=\"label label-danger\"><i class=\"fa fa-info-circle\"> $dias dias</i> (FUERA DE TIEMPO)</button></div>";
		}else{
			$imagen="<div class=\"label label-success\"><i class=\"fa fa-check-circle\"></i>VIGENTE</button></div>";
		}
	  

		return $imagen;

		}

	function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}
// Ejemplo de uso:
}
