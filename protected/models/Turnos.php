<?php

/**
 * This is the model class for table "turnos".
 *
 * The followings are the available columns in table 'turnos':
 * @property integer $id
 * @property integer $folio
 * @property integer $id_corresp
 * @property integer $remitente
 * @property integer $estado_rem
 * @property integer $destinatario
 * @property integer $estado_dest
 * @property integer $instruccion1
 * @property integer $instruccion2
 * @property string $instruccion_adicional
 * @property integer $caracter
 * @property string $fecha_plazo
 * @property string $doc_respuesta
 * @property string $solucion
 * @property string $fecha_turno
 * @property string $fecha_solucion
 * @property integer $estado_sol
 * @property integer $estado
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 * @property string $num_expediente
 */
class Turnos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Turnos the static model class
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
		return 'turnos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('num_expediente', 'required','message'=>'Este campo es requerido'),
			array('folio, id_corresp, remitente, estado_rem, destinatario, estado_dest, instruccion1, instruccion2, caracter, estado_sol, estado, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('instruccion_adicional', 'length', 'max'=>500),
			array('num_expediente, doc_respuesta', 'length', 'max'=>200),
			array('solucion', 'length', 'max'=>5000),
			array('fecha_plazo, fecha_turno, fecha_solucion, fecha_reg, fecha_mod', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, folio, id_corresp, remitente, estado_rem, destinatario, estado_dest, instruccion1, instruccion2, instruccion_adicional, caracter, fecha_plazo, doc_respuesta, solucion, fecha_turno, fecha_solucion, estado_sol, estado, fecha_reg, fecha_mod, user_reg, user_mod', 'safe', 'on'=>'search'),
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

			'corresp'=>array(self::BELONGS_TO,'Correspondencia','id_corresp'),
			'rem'=>array(self::BELONGS_TO,'Directorio','remitente'),
			'dest'=>array(self::BELONGS_TO,'Directorio','destinatario'),
			'estatus'=>array(self::BELONGS_TO,'CatStatusTurno','estado_sol'),
			'tipo_caracter'=>array(self::BELONGS_TO, 'CatCaracter', 'caracter'),
			'inst1'=>array(self::BELONGS_TO, 'CatInstrucciones', 'instruccion1'),
			'inst2'=>array(self::BELONGS_TO, 'CatInstrucciones', 'instruccion2'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'folio' => 'Folio',
			'id_corresp' => 'Id Corresp',
			'remitente' => 'Remitente',
			'estado_rem' => 'Estado Rem',
			'destinatario' => 'Destinatario',
			'estado_dest' => 'Estado Dest',
			'instruccion1' => 'Instruccion1',
			'instruccion2' => 'Instruccion2',
			'instruccion_adicional' => 'Instruccion Adicional',
			'caracter' => 'Caracter',
			'fecha_plazo' => 'Fecha Plazo',
			'doc_respuesta' => 'Doc Respuesta',
			'solucion' => 'Solucion',
			'fecha_turno' => 'Fecha Turno',
			'fecha_solucion' => 'Fecha Solucion',
			'estado_sol' => 'Estado Sol',
			'estado' => 'Estado',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_reg' => 'User Reg',
			'user_mod' => 'User Mod',
			'num_expediente' => 'Expediente para Archivo',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('folio',$this->folio);
		$criteria->compare('id_corresp',$this->id_corresp);
		$criteria->compare('remitente',$this->remitente);
		$criteria->compare('estado_rem',$this->estado_rem);
		$criteria->compare('destinatario',$this->destinatario);
		$criteria->compare('estado_dest',$this->estado_dest);
		$criteria->compare('instruccion1',$this->instruccion1);
		$criteria->compare('instruccion2',$this->instruccion2);
		$criteria->compare('instruccion_adicional',$this->instruccion_adicional,true);
		$criteria->compare('caracter',$this->caracter);
		$criteria->compare('fecha_plazo',$this->fecha_plazo,true);
		$criteria->compare('doc_respuesta',$this->doc_respuesta,true);
		$criteria->compare('solucion',$this->solucion,true);
		$criteria->compare('fecha_turno',$this->fecha_turno,true);
		$criteria->compare('fecha_solucion',$this->fecha_solucion,true);
		$criteria->compare('estado_sol',$this->estado_sol);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('user_reg',$this->user_reg);
		$criteria->compare('user_mod',$this->user_mod);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}