<?php

/******************************************
 Asisten Pemrogaman 12 & 13 & 14
******************************************/

class Template{
	var $filename = ''; // handle file
	var $content = ''; // handle isi file

	function __construct($filename = ''){
		// konstruktor
		$this->filename = $filename;

		// membaca file tampilan
		$this->content = implode('', @file($filename));
	}

	function clear(){

		$this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);

	}

	function write(){

		$this->clear();

		print $this->content;

	}

	function getContent(){

		$this->clear();

		return $this->content;
	}

	function replace($old = '', $new = ''){

		if(is_int($new)){

			$value = sprintf("%d", $new);

		}elseif(is_float($new)){
			$value = sprintf("%f", $new);
		}elseif(is_array($new)){
			$value = '';
			foreach( $new as $item){
				$value .= $item. '';
			}

		}else{

			$value = $new;
		}

		$this->content = preg_replace("/$old/",  $value, $this->content);

	}
}
