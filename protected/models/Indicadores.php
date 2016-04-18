<?php

/**
 * This is the model class for table "indicadores".
 *
 * The followings are the available columns in table 'indicadores':
 * @property integer $id
 * @property integer $id_ind
 * @property string $descripcion
 * @property string $img
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 */
class Indicadores extends CActiveRecord
{
	public $_archivo;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'indicadores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_ind, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('img', 'length', 'max'=>100),
			array('descripcion, fecha_reg, fecha_mod,_archivo', 'safe'),
			//array('_archivo', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_ind, descripcion, img, fecha_reg, fecha_mod, user_reg, user_mod', 'safe', 'on'=>'search'),
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
			'apartados' => array(self::BELONGS_TO, 'Entidades', 'entidad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_ind' => 'Apartado',
			'descripcion' => 'Resumen',
			'img' => 'Imágen',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_reg' => 'User Reg',
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
		$criteria->compare('id_ind',$this->id_ind);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('img',$this->img,true);
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
	 * @return Indicadores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
