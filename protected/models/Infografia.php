<?php

/**
 * This is the model class for table "infografia".
 *
 * The followings are the available columns in table 'infografia':
 * @property integer $id
 * @property string $nombre
 * @property string $filename
 * @property string $alt
 * @property integer $status
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 */
class Infografia extends CActiveRecord
{
	public $_archivo;
	public $_archivo2;
	/**
	 * @return string the associated database table name
	 */
	private $_uploads;
	
	public function tableName()
	{
		return 'infografia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('nombre, filename, alt', 'length', 'max'=>200),
			array('fecha_reg, fecha_mod, $_archivo2, $_archivo', 'safe'),
			array('nombre', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, filename, alt, status, fecha_reg, fecha_mod, user_reg, user_mod', 'safe', 'on'=>'search'),
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
			'nombre' => 'Nombre',
			'filename' => 'Archivo pdf',
			'alt' => 'Imágen',
			'status' => 'Status',
			'fecha_reg' => 'Fecha Reg',
			'fecha_mod' => 'Fecha Mod',
			'user_reg' => 'User Reg',
			'user_mod' => 'User Mod',
		);
	}

	 public function getImageParam() {
            if (empty($this->_uploads))
                $this->_uploads=Yii::app()->params['uploads']."/";
            return $this->_uploads;
        }
        public function getUrl() {
            return $this->getImageParam().CHtml::encode($this->filename);
        }
        public function getThumb() {
            return $this->getImageParam()."thumbs/".CHtml::encode($this->filename);
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('alt',$this->alt,true);
		$criteria->compare('status',$this->status);
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
	 * @return Infografia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
