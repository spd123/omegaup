<?php

/** ******************************************************************************* *
  *                    !ATENCION!                                                   *
  *                                                                                 *
  * Este codigo es generado automaticamente. Si lo modificas tus cambios seran      *
  * reemplazados la proxima vez que se autogenere el codigo.                        *
  *                                                                                 *
  * ******************************************************************************* */

/** Value Object file for table Entity_Feedback_Rating.
  * 
  * VO does not have any behaviour.
  * @access public
  * 
  */

class EntityFeedbackRating extends VO
{
	/**
	  * Constructor de EntityFeedbackRating
	  * 
	  * Para construir un objeto de tipo EntityFeedbackRating debera llamarse a el constructor 
	  * sin parametros. Es posible, construir un objeto pasando como parametro un arreglo asociativo 
	  * cuyos campos son iguales a las variables que constituyen a este objeto.
	  */
	function __construct($data = NULL)
	{
		if (isset($data))
		{
			if (is_string($data))
				$data = self::object_to_array(json_decode($data));


			if (isset($data['feature_id'])) {
				$this->feature_id = $data['feature_id'];
			}
			if (isset($data['entity_id'])) {
				$this->entity_id = $data['entity_id'];
			}
			if (isset($data['rating'])) {
				$this->rating = $data['rating'];
			}
		}
	}

	/**
	  * Obtener una representacion en String
	  * 
	  * Este metodo permite tratar a un objeto EntityFeedbackRating en forma de cadena.
	  * La representacion de este objeto en cadena es la forma JSON (JavaScript Object Notation) para este objeto.
	  * @return String 
	  */
	public function __toString( )
	{ 
		$vec = array( 
			"feature_id" => $this->feature_id,
			"entity_id" => $this->entity_id,
			"rating" => $this->rating
		); 
	return json_encode($vec); 
	}

	/**
	 * Converts date fields to timestamps
	 **/
	public function toUnixTime(array $fields = array()) {
		if (count($fields) > 0)
			parent::toUnixTime($fields);
		else
			parent::toUnixTime(array());
	}

	/**
	  *  [Campo no documentado]
	  * Llave Primaria
	  * @access public
	  * @var int(11)
	  */
	public $feature_id;

	/**
	  *  [Campo no documentado]
	  * @access public
	  * @var int(11)
	  */
	public $entity_id;

	/**
	  *  [Campo no documentado]
	  * @access public
	  * @var float(2,2)
	  */
	public $rating;
}
