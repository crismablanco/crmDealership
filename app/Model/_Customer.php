<?php 

/**
* 
*/
class Customer extends AppModel
{
	public $validate = array(
		'first_name' => array(
				'rule'=>'notBlank'
				),
		'last_name' => array(
				'rule'=>'notBlank'
				),
		'email' => array(
				'notEmpty' => array(
					'rule'=>'notBlank'),
				'unique' => array(
					'rule'=>'isUnique',
					'message'=>'Email already exist for other customer!')
					)
		);

}
 ?>