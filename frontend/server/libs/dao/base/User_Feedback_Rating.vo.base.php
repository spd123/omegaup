<?php

/** ******************************************************************************* *
  *                    !ATENCION!                                                   *
  *                                                                                 *
  * Este codigo es generado automaticamente. Si lo modificas tus cambios seran      *
  * reemplazados la proxima vez que se autogenere el codigo.                        *
  *                                                                                 *
  * ******************************************************************************* */

/** Value Object file for table User_Feedback_Rating.
  *
  * VO does not have any behaviour.
  * @access public
  *
  */

class UserFeedbackRating extends VO
{
	/**
	  * Constructor de UserFeedbackRating
	  *
	  * Para construir un objeto de tipo UserFeedbackRating debera llamarse a el constructor
	  * sin parametros. Es posible, construir un objeto pasando como parametro un arreglo asociativo
	  * cuyos campos son iguales a las variables que constituyen a este objeto.
	  */
	function __construct($data = NULL)
	{
		if (isset($data))
		{
			if (is_string($data))
				$data = self::object_to_array(json_decode($data));

			if (isset($data['user_id'])) {
				$this->user_id = $data['user_id'];
			}
			if (isset($data['entity_id'])) {
				$this->entity_id = $data['entity_id'];
			}
			if (isset($data['feature_id'])) {
				$this->feature_id = $data['feature_id'];
			}
			if (isset($data['create_date'])) {
				$this->create_date = $data['create_date'];
			}
			if (isset($data['rating'])) {
				$this->rating = $data['rating'];
			}
			if (isset($data['comments'])) {
				$this->comments = $data['comments'];
			}
		}
	}

	/**
	  * Obtener una representacion en String
	  *
	  * Este metodo permite tratar a un objeto UserFeedbackRating en forma de cadena.
	  * La representacion de este objeto en cadena es la forma JSON (JavaScript Object Notation) para este objeto.
	  * @return String
	  */
	public function __toString( )
	{
		$vec = array(
			"user_id" => $this->user_id,
			"entity_id" => $this->entity_id,
			"feature_id" => $this->feature_id,
			"create_date" => $this->create_date,
			"rating" => $this->rating,
			"comments" => $this->comments
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
			parent::toUnixTime(array("create_date"));
	}

	/**
	  *  [Campo no documentado]
	  * Llave Primaria
	  * @access public
	  * @var int(11)
	  */
	public $user_id;

	/**
	  *  [Campo no documentado]
	  * @access public
	  * @var int(11)
	  */
	public $entity_id;

	/**
	  *  [Campo no documentado]
	  * @access public
	  * @var int(11)
	  */
	public $feature_id;

	/**
	  *  [Campo no documentado]
	  * @access public
	  * @var timestamp
	  */
	public $create_date;

	/**
	  *  [Campo no documentado]
	  * @access public
	  * @var float
	  */
	public $rating;

	/**
	  *  [Campo no documentado]
	  * @access public
	  * @var text,
	  */
	public $comments;
}
