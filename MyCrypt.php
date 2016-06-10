<?php
/**
* @author Carlos W. Gama (carloswgama@gmail.com)
* @package Bibliotecas
* @category Criptografia
* @license GPL 2.0
*/

class MyCrypt {
 	/**
 	* Chave usada
 	* @access private
 	* @var string
 	*/
 	private $key;

 	/**
 	* Construtor
 	* @access public
 	* @param $chave
 	*/
 	public function __construct($key) {
  		$this->key = ord($key); 
		// grava uma chave de criptografica personalizada , caso seja letra , transforma em número
 	}
 
 	/**
 	* Criptografa o conteudo
 	* @access public
 	* @param $data string
 	* @return string | Conteúdo criptografado
 	*/
 	public function encrypt($data) {
 		$str = '';
		$total = strlen($data);
		for($i=0;$i!=$total;$i++) { 
			//Pega cada caractere do conteudo, transforma em ascii e soma o valor da chave,retornando uma outra string
			$int_str = ord(substr($data,$i,1));
			$str.=chr($int_str+$this->key);
		}
	
		return base64_encode($str);
 	}
  
  	/**
 	* Descriptografa o conteudo
 	* @access public
 	* @param $data string | Conteúdo criptografado
 	* @return string | Conteúdo descriptografado
 	*/
  	public function decrypt($data) {
 		$data = base64_decode($data);
 		$str = '';
		$total = strlen($data);
		for($i=0;$i!=$total;$i++) { 
			// Faz o sentido inverso , subtraido o valor da chave para obter o conteudo
			$int_str = ord(substr($data,$i,1));
			$str.=chr($int_str-$this->key);
		}

		return $str;
 	}
}
?>