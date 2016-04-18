<?php

/**
 * This is the model class for table "entradas_salidas".
 *
 * The followings are the available columns in table 'entradas_salidas':
 * @property integer $id
 * @property integer $id_suc
 * @property integer $tipo
 * @property integer $id_prod
 * @property integer $cantidad
 * @property string $fecha
 * @property string $fecha_reg
 * @property integer $user_reg
 * @property string $fecha_mod
 * @property integer $user_mod
 */
class EntradasSalidas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entradas_salidas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_suc, tipo, id_prod, cantidad, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('fecha, fecha_reg, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_suc, tipo, id_prod, cantidad, fecha, fecha_reg, user_reg, fecha_mod, user_mod', 'safe', 'on'=>'search'),
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
			'tipo' => 'Tipo',
			'id_prod' => 'Producto',
			'cantidad' => 'Cantidad',
			'fecha' => 'Fecha',
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
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('id_prod',$this->id_prod);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('fecha',$this->fecha,true);
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
	 * @return EntradasSalidas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
