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
		
		public function setSingle_page_link($fileName, $verFile = "HTML_version"){
			for($count = 0; $count < $this->total_items; $count++){
				$this->single_page_link[$count] = $this->baseUrl.'HTML-Files/'.$verFile.
				'/'.$fileName.($count+1).'.html';
			}
		}
		
		public function getSingle_page_link(){
			return $this->single_page_link;
		}

		public function setTotal_items(){
			$this->total_items = count($this->CSV_data);
			echo 'total_items:'.$this->total_items.'<br><br>';
		}

		public function getTotal_items(){
			return $this->total_items;
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

	}
?>