<?php

/**
 * This is the model class for table "historico_periodos".
 *
 * The followings are the available columns in table 'historico_periodos':
 * @property integer $id
 * @property integer $id_ind
 * @property string $nombre
 * @property string $config
 * @property string $titulo1
 * @property string $titulo2
 * @property string $titulo3
 * @property string $nota1
 * @property string $nota2
 * @property string $nota3
 * @property string $fuente
 * @property integer $validado
 * @property integer $autorizado
 * @property string $fecha_reg
 * @property integer $user_reg
 * @property string $fecha_mod
 * @property integer $user_mod
 */
class HistoricoPeriodos extends CActiveRecord
{
	public $entidades;
	public $anios_ini;
	public $anios_fin;
    public $mes_ini;
    public $mes_fin;
    public $_archivo;
    public $filename2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'historico_periodos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre,titulo1,fuente', 'required'),
			array('id_ind, validado, autorizado, user_reg, user_mod', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>200),
			array('config, titulo1, titulo2, titulo3, nota1, nota2, nota3, fuente,_archivo, filename2, fecha_reg, filename, fecha_mod, anios_ini, anios_fin, mes_ini, mes_fin,imagen', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_ind, nombre, config, titulo1, titulo2, titulo3, nota1, nota2, nota3, fuente, filename, filename2, validado, autorizado, fecha_reg, user_reg, fecha_mod, user_mod', 'safe', 'on'=>'search'),
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
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_ind' => 'Id Ind',
			'nombre' => 'Nombre del Periodo:',
			'config' => 'Config',
			'titulo1' => 'Titulo del Indicador:',
			'titulo2' => 'Subtítulo del indicador:',
			'titulo3' => 'Subtíutlo extra(opcional):',
			'nota1' => 'Notas al pie:',
			'nota2' => 'Nota 2',
			'nota3' => 'Nota 3',
			'fuente' => 'Fuente:',
			'imagen' => 'Imagen',
			'filename' => 'Archivo imagen',
			'validado' => 'Validado',
			'autorizado' => 'Autorizado',
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
		$criteria->compare('id_ind',$this->id_ind);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('config',$this->config,true);
		$criteria->compare('titulo1',$this->titulo1,true);
		$criteria->compare('titulo2',$this->titulo2,true);
		$criteria->compare('titulo3',$this->titulo3,true);
		$criteria->compare('nota1',$this->nota1,true);
		$criteria->compare('nota2',$this->nota2,true);
		$criteria->compare('nota3',$this->nota3,true);
		$criteria->compare('fuente',$this->fuente,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('validado',$this->validado);
		$criteria->compare('autorizado',$this->autorizado);
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
	 * @return HistoricoPeriodos the static model class
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
        
        public function periodo($id){
                //llamar al config
                //solo autorizado

                $sql = "SELECT * from historico_periodos  where id_ind=$id and autorizado =1";
                //$sql = "SELECT * from historico_periodos  where id_ind=$id"; 

                $indicador = Yii::app()->db->createCommand($sql)->queryRow();
                $arr = json_decode($indicador['config'], true);
                
                return $arr;
        }
        
        public function datosIndicador($id){
             $sql = "SELECT * from historico_periodos  where id_ind=$id and autorizado =1"; 
             //$sql = "SELECT * from historico_periodos  where id_ind=$id"; 

             $indicador = Yii::app()->db->createCommand($sql)->queryRow();
             return $indicador;
            
        }

        public function periodo_back($id){
                //llamar al config
                //solo autorizado

                //$sql = "SELECT * from historico_periodos  where id_ind=$id and autorizado =1";
                $sql = "SELECT * from historico_periodos  where id=$id"; 

                $indicador = Yii::app()->db->createCommand($sql)->queryRow();
                $arr = json_decode($indicador['config'], true);
                
                return $arr;
        }
        
        public function datosIndicador_back($id){
             //$sql = "SELECT * from historico_periodos  where id_ind=$id and autorizado =1"; 
             $sql = "SELECT * from historico_periodos  where id=$id"; 

             $indicador = Yii::app()->db->createCommand($sql)->queryRow();
             return $indicador;
            
        }




        //estas son las listas para cada crud de los indicadores
        public function getEstados()
		{
			 return CHtml::dropDownList('estados', $select, 
	              array(
	              	'0' => 'Total Nacional', 
	              	'1' => 'Aguascalientes',
					'2' => 'Baja California',
					'3' => 'Baja California Sur',
					'4' => 'Campeche',
					'5' => 'Coahuila',
					'6' => 'Colima',
					'7' => 'Chiapas',
					'8' => 'Chihuahua',
					'9' => 'Distrito Federal',
					'10' => 'Durango',
					'11' => 'Guanajuato',
					'12' => 'Guerrero',
					'13' => 'Hidalgo',
					'14' => 'Jalisco',
					'15' => 'Estado de México',
					'16' => 'Michoacan',
					'17' => 'Morelos',
					'18' => 'Nayarit',
					'19' => 'Nuevo León',
					'20' => 'Oaxaca',
					'21' => 'Puebla',
					'22' => 'Queretaro',
					'23' => 'Quintana Roo',
					'24' => 'San Luis Potosi',
					'25' => 'Sinaloa',
					'26' => 'Sonora',
					'27' => 'Tabasco',
					'28' => 'Tamaulipas',
					'29' => 'Tlaxcala',
					'30' => 'Veracruz',
					'31' => 'Yucatan',
					'32' => 'Zacatecas'),
	              	array('empty' => '(Selecciona una opción)'));
		}

		public function getMeses()
		{
			 return CHtml::dropDownList('estados', $select, 
	              array(
	              	'0' => 'Total Nacional', 
	              	'1' => 'Enero',
					'2' => 'Febrero',
					'3' => 'Marzo',
					'4' => 'Abril',
					'5' => 'Mayo',
					'6' => 'Junio',
					'7' => 'Julio',
					'8' => 'Agosto',
					'9' => 'Septiembre',
					'10' => 'Octubre',
					'11' => 'Noviembre',
					'12' => 'Diciembre'),
	              	array('empty' => '(Selecciona una opción)'));
		}

		public function getAnios()
		{
		   //saco el promedio del periodo que solicitan para df
           $sql = "SELECT nombre from cat_anios"; 
           $anios = Yii::app()->db->createCommand($sql)->query();
           
           return CHtml::dropDownList('anios', $select, $anios);
		}

		public function getImprime(){
			return $this->id;
		}

		public function getEntidad($pk,$indx=1)
	    {
	            $entidad = Entidades::model()->findByPk($pk); 
	        	if($pk>0 and $pk!=9000 and $pk!=40 and $pk!=41){
	        		$nombre=$entidad->nombre;
	        	}  elseif($pk==0 or $pk==9000 or $pk==40 or $pk==41){

	        		$nombre="Total";

	        		if($indx=="40"){
		        		$nombre="Nacional";
		        	}elseif($indx=="41"){
		        		$nombre="Urbano";
		        	}
	        	} 

	            return $nombre;
	    }

	    
	    public function getApartado($pk)
	    {
	            $menus = Menus::model()->findByPk($pk); 
	        

	            return $menus->label;;
	    }

	    public function getDelegacion($pk)
	    {
	            $entidad = Delegaciones::model()->findByPk($pk); 
	        	if($pk>0 and $pk!=9000){
	        		$nombre=$entidad->nombre;
	        	}  elseif($pk==0 or $pk==9000) {
	        		$nombre="Total";
	        	} 

	            return $nombre;
	    }
	    public function getRelacion($id, $indicador)
	    {
	            $sql1 = "SELECT titulo from relaciones where columna =$id and indicador='$indicador'"; 
            	$relacion = Yii::app()->db->createCommand($sql1)->queryRow();
	        	

	            return $relacion['titulo'];
	    }

	        public function suma_valorcensal1($id,$periodo){
                //llamar al config
                //solo autorizado

                //$sql = "SELECT * from historico_periodos  where id_ind=$id and autorizado =1";
                $sql = "SELECT sum(valor) as suma from ap1Ind1  where municipio=$id and periodo_id=$periodo"; 

                $suma = Yii::app()->db->createCommand($sql)->queryRow();
                $arr = $suma['suma'];
                
                return $arr;
        }

        public function suma_valorcensal2($id,$periodo){
                //llamar al config
                //solo autorizado

                //$sql = "SELECT * from historico_periodos  where id_ind=$id and autorizado =1";
                $sql = "SELECT sum(valor) as suma from ap1Ind1  where entidad=$id and periodo_id=$periodo"; 

                $suma = Yii::app()->db->createCommand($sql)->queryRow();
                $arr = $suma['suma'];
                
                return $arr;
        }

           public function suma_valorcensalg($id,$periodo){
                
                $sql = "SELECT sum(valor) as suma from ap1Ind1  where municipio=$id and periodo_id=$periodo"; 

                $suma = Yii::app()->db->createCommand($sql)->queryRow();
                $arr = $suma['suma']/1000000;
                
                return $arr;
        }
}
