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
class TurnosView extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TurnosView the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function primaryKey()
    {
            return 'id';
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'turnos_view';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('folio, estado_sol, id_area, id', 'numerical', 'integerOnly'=>true),
			//array('fecha_turno', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('folio, estado_sol, documento, asunto, id_area, id, fecha_turno', 'safe', 'on'=>'search'),
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
			'estado_sol' => 'Estado Sol',
			'documento' => 'Documento',
			'asunto' => 'Asunto',
			'id_area' => 'Id Area',
			'id' => 'ID',
			'fecha_turno' => 'Fecha Turno',
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

		$criteria->compare('folio',$this->folio);
		$criteria->compare('estado_sol',$this->estado_sol);
		$criteria->compare('documento',$this->documento,true);
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('id_area',6);
		$criteria->compare('id',$this->id);
		$criteria->compare('fecha_turno',$this->fecha_turno,true);
	//	$criteria->order = 'id desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}