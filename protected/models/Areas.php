<?php

/**
 * This is the model class for table "areas".
 *
 * The followings are the available columns in table 'areas':
 * @property integer $id
 * @property integer $id_dep
 * @property string $acronimo
 * @property string $nombre
 * @property integer $nivel
 * @property integer $status
 * @property string $fecha_reg
 * @property string $fecha_mod
 * @property integer $user_reg
 * @property integer $user_mod
 */
class Areas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'areas';
	}



	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dep, nivel, status, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('acronimo', 'length', 'max'=>100),
			array('nombre', 'length', 'max'=>255),
			array('fecha_reg, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_dep, acronimo, nombre, nivel, status, fecha_reg, fecha_mod, user_reg, user_mod', 'safe', 'on'=>'search'),
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

			'remitenteses'=>array(self::HAS_MANY, 'Directorio', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_dep' => 'Dependencia de adscripción',
			'acronimo' => 'Acronimo',
			'nombre' => 'Nombre',
			'nivel' => 'Nivel',
			'status' => 'Status',
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
		$criteria->compare('id_dep',$this->id_dep);
		$criteria->compare('acronimo',$this->acronimo,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nivel',$this->nivel);
		//$criteria->compare('status',1);
		$criteria->compare('fecha_reg',$this->fecha_reg,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('user_reg',$this->user_reg);
		$criteria->compare('user_mod',$this->user_mod);
		$criteria->order = 'status,id asc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 100),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Areas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


		  public function listaSimple($arreglo){
            
               
                $a ='';
                if(is_array($arreglo)){
                foreach ($arreglo as $k=>$v){
                    $a .= $v.',';
                }
                    $a= substr( $a, 0,-1);
                }else {
                    $a ='';	
                }

                return $a;
            
        }

		public function getOptions()
{
return CHtml::listData($this->findAll("status=1 order by nombre"),'id','nombre');
}

public function getImagen(){

	//	$imagen="validado.png";
		if($this->status=='1'){
		$imagen="<div class=\"label label-success\"><i class=\"fa fa-check-circle\"></i> ACTIVO</button></div>";
		}
	    if($this->status=='2'){
		$imagen="<div class=\"label label-warning\"><i class=\"fa fa-warning\"></i> INACTIVO</div>";	
		}

		return $imagen;

		}
}
