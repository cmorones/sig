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
 * @property string $fecha_solucion
 * @property integer $estado
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 */
class Turnos extends CActiveRecord
{
	public $docto_search;
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
			array('fecha_plazo, fecha_solucion, solucion, destinatario', 'required'),
			array('folio, id_corresp, remitente, estado_rem, destinatario, estado_dest, instruccion1, caracter, estado,  estado_sol, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('instruccion_adicional', 'length', 'max'=>500),
			array('doc_respuesta', 'length', 'max'=>100),
			array('solucion', 'length', 'max'=>5000),
			array('docto_search, fecha_solucion, fecha_plazo, fecha_reg, fecha_mod, fecha_turno', 'safe'),
			array('fecha_solucion, fecha_plazo, fecha_reg, fecha_mod, fecha_turno', 'default', 'value'=>null),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, folio, docto_search, id_corresp, remitente, estado_rem, destinatario, estado_dest, instruccion1, instruccion2, instruccion_adicional, caracter, fecha_plazo, doc_respuesta, fecha_solucion, estado, estado_sol, fecha_reg, fecha_mod, user_reg, user_mod', 'safe', 'on'=>'search'),
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

	/**CatStatusTurno
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'folio' => 'Folio:',
			'id_corresp' => 'Id Corresp',
			'remitente' => 'Turna:',
			'estado_rem' => 'Estado Rem',
			'destinatario' => 'Turnado a:',
			'estado_dest' => 'Estado Dest',
			'instruccion1' => 'Instruccion1:',
			'instruccion2' => 'Instruccion2:',
			'instruccion_adicional' => 'Instruccion Adicional',
			'caracter' => 'Caracter',
			'fecha_plazo' => 'Fecha Plazo',
			'doc_respuesta' => 'Doc Respuesta',
			'solucion' => 'Solucion:',
			'estado_sol' => 'Condición',
			'fecha_solucion' => 'Fecha Solucion',
			'estado' => 'Estado',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_reg' => 'User Reg',
			'user_mod' => 'User Mod',
			'docto_search'=>'Documento',
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

		//$criteria->with = array('rem.areas','corresp.docto');
		$criteria->with = array('corresp.docto');

		//$criteria->compare('docto.documento',$this->docto_search,true);
	    //$criteria->compare('areas.id',$id_area);
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
	    $criteria->compare('estado_sol',$this->estado_sol);
	    $criteria->compare('t.estado',1);
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
	 * @return Turnos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
