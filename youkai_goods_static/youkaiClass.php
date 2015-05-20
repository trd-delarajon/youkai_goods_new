<?
	define('LINK_PATH', dirname(__FILE__));
	define('MAX_ITEM', 4);
	Class youkaiClass {
		// const linkpath = dirname(__FILE__).'';
		private $CSV_data;
		private $single_page_link;
		private $total_items;
		private $total_index;

		// public function __construct(){
		// 	$single_page_link = array();
		// }

		public function setCSVData($indexdata){
			$this->CSV_data = $indexdata;
			$this->processLinks();
			$this->setTotal_items();
			$this->setTotal_index();
		}

		public function getCSVData(){
			return $this->CSV_data;
		}

		public function processLinks(){
			for ($link=0; $link < count($this->CSV_data); $link++) { 
				$this->single_page_link[] = LINK_PATH .'/' .$link;
			}
		}

		public function getSingle_page_link(){
			return $this->single_page_link;
		}

		public function setTotal_items(){
			$this->total_items = count($this->CSV_data);
		}

		public function getTotal_items(){
			return $this->total_items;
		}

		public function setTotal_index(){
			$this->total_index = (int)($this->total_items / MAX_ITEM);
		}

		public function getTotal_index(){
			return $this->total_index;
		}

		public function getMaxItem(){
			return MAX_ITEM;
		}
	}
?>