<?php

/**
 * This is the model class for table "inventario".
 *
 * The followings are the available columns in table 'inventario':
 * @property integer $id
 * @property integer $id_suc
 * @property integer $id_producto
 * @property integer $entradas
 * @property integer $salidas
 * @property integer $existencias
 * @property string $fecha_reg
 * @property integer $user_reg
 * @property string $fecha_mod
 * @property integer $user_mod
 */
class Inventario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inventario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_suc, id_producto, entradas, salidas, existencias, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('fecha_reg, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_suc, id_producto, entradas, salidas, existencias, fecha_reg, user_reg, fecha_mod, user_mod', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'id_suc' => 'Id Suc',
			'id_producto' => 'Id Producto',
			'entradas' => 'Entradas',
			'salidas' => 'Salidas',
			'existencias' => 'Existencias',
			'fecha_reg' => 'Fecha Reg',
			'user_reg' => 'User Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_mod' => 'User Mod',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('id_suc',$this->id_suc);
		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('entradas',$this->entradas);
		$criteria->compare('salidas',$this->salidas);
		$criteria->compare('existencias',$this->existencias);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('user_reg',$this->user_reg);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('user_mod',$this->user_mod);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Inventario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
