<?
	define('LINK_PATH', dirname(__FILE__).'/HTML-Files/HTML_version');
	define('MAX_ITEM', 20);
	define('INDEX_LINK', 'topPage');
	define('SINGLE_LINK', 'singlePage');
	Class youkaiClass {
		private $CSV_data;
		private $single_page_link;
		private $total_items;
		private $total_index;
		private $prod_desc_array;
		private $img_path_array;
		private $external_links_array;
		private $external_links_label_array;
		
		public function setCSVData($indexdata){
			$this->CSV_data = $indexdata;
			$this->setTotal_items();
			$this->setTotal_index();
			$this->process();
		}

		public function getCSVData(){
			return $this->CSV_data;
		}

		public function process(){
			for ($index=0; $index < count($this->CSV_data); $index++) {
				$desc_arr = explode("\\n", $this->CSV_data[$index][5]);
				$img_arr = explode("\\n", $this->CSV_data[$index][1]);
				$ext_link_arr = explode("\\n", $this->CSV_data[$index][8]);
				$ext_link_lbl_arr = explode("\\n", $this->CSV_data[$index][9]);
				$this->prod_desc_array[$index] = $desc_arr;
				$this->img_path_array[$index] = $img_arr;
				$this->external_links_array[$index] = $ext_link_arr;
				$this->external_links_label_array[$index] = $ext_link_lbl_arr;
				$this->single_page_link[$index] = SINGLE_LINK.($index+1).'.html';
				$this->CSV_data[$index][4] = str_replace("\\n", "</br>", $this->CSV_data[$index][4]);
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
		
		public function getProd_Desc_Array(){
			return $this->prod_desc_array;
		}
		
		public function getImg_Path_Array(){
			return $this->img_path_array;
		}
		
		public function getExternal_Links_Array(){
			return $this->external_links_array;
		}
		
		public function getExternal_Links_Label_Array(){
			return $this->external_links_label_array;
		}
	}
?>