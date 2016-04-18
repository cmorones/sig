<?php

/**
 * This is the model class for table "documentos".
 *
 * The followings are the available columns in table 'documentos':
 * @property integer $id
 * @property integer $remitente
 * @property string $documento
 * @property string $referencia
 * @property integer $tipo_docto
 * @property string $asunto
 * @property integer $tipo_caracter
 * @property string $fecha
 * @property integer $estado
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 */
class Documentos extends CActiveRecord
{
	public $destinatario;
	public $copias;
	public $tipocopias;
	public $copiasIds;
	public $fecha_search;

	public $numcopias = array();
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'documentos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('remitente, destinatario, tipo_docto, asunto, fecha', 'required','message'=>'Este campo es requerido'),
			array('remitente, destinatario, copias, tipo_docto, tipo_caracter, estado, user_reg, user_mod', 'numerical', 'integerOnly'=>true, 'message'=>'Este campo es requerido'),
			array('copiasIds, numcopias,tipocopias, documento, referencia, asunto, fecha, fecha_reg, fecha_mod, fecha_search', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, remitente, documento, referencia, tipo_docto, asunto, tipo_caracter, fecha, estado, fecha_search, fecha_reg, fecha_mod, user_reg, user_mod', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.,
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'remitentes'=>array(self::BELONGS_TO, 'Directorio', 'remitente'),
			'caracter'=>array(self::BELONGS_TO, 'CatCaracter', 'tipo_caracter'),
			'tipo'=>array(self::BELONGS_TO, 'TipoDoc', 'tipo_docto'),
			
			


		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'remitente' => 'Remitente',
			'destinatario' => 'Destinatario',
			'documento' => 'Documento',
			'referencia' => 'Referencia documental',
			'tipo_docto' => 'Tipo Documento',
			'asunto' => 'Asunto',
			'tipo_caracter' => 'Clasificación Documento',
			'fecha' => 'Fecha de documento',
			'estado' => 'Estado',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_reg' => 'User Reg',
			'user_mod' => 'User Mod',
			'tipocopias' => 'COPIAS',
			'copiasIds' => 'C.c.c.e.p. Con Copia de conocimiento electronica para:',
			'fecha_search'=>'Fecha de Documento'
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
		$criteria->with = array('remitentes.areas');
		//$criteria->with = array('dest');
		//$criteria->with = array('dest.areas');
		$criteria->compare('areas.id',$id_area);

		$criteria->compare('id',$this->id);
		$criteria->compare('remitente',$this->remitente);
		$criteria->compare('documento',$this->documento,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('tipo_docto',$this->tipo_docto);
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('tipo_caracter',$this->tipo_caracter);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('estado',$this->estado);
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
	 * @return Documentos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
}
