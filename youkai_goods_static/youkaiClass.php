<?
	Class youkaiClass {
		private $baseUrl;
		private $CSV_data;
		private $single_page_link;
		private $total_items;
		private $prod_desc_array;
		private $img_path_array;
		private $external_links_array;
		private $external_links_label_array;
		
		public function setCSVData($indexdata){
			$this->CSV_data = $indexdata;
			$this->setTotal_items();
			$this->setTotalItem_index();
			$this->baseUrl = $this->setBaseUrl();
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
				$this->CSV_data[$index][4] = str_replace("\\n", "</br>", $this->CSV_data[$index][4]);
			}
		}
		
		private function setBaseUrl(){
			$currentPath = $_SERVER['PHP_SELF'];
			
			// output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
			$pathInfo = pathinfo($currentPath);
			
			// output: localhost
			$hostName = $_SERVER['HTTP_HOST'];
			
			// output: http://
			$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
			
			// return: http://localhost/myproject/
			return $protocol.$hostName.$pathInfo['dirname']."/";
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

		public function TotalItem_index($total_items, $max_item){
			if(($total_items % $max_item) != 0)
				return (int)(total_items / $max_item) + 1;
			else
				return total_items / $max_item;
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
		
		public function getBaseUrl(){
			return $this->baseUrl;
		}
		/**05-27-2015**/
// 		public function getSingleFileName(){
// 			return $this->single_file_name;
// 		}
		
// 		public function getSingleFileName(){
// 			return $this->index_file_name;
// 		}
		
// 		public function getSingleFileName(){
// 			return $this->category_file_name;
// 		}
	}
?>