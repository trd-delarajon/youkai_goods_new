<?PHP
define('SINGLE_LINK', 'singlePage');
class publish{
	private $smarty;
	//general data
	private $youkaiGoods;
	private $newIcon;

	//common data
	private $total_item;
	private $CSVDATA;
	private $CSVSingleLink;
	private $img_path_array;
	
	//specific data for single page
	private $prod_desc_array;
	private $external_links_array;
	private $external_links_label_array;
	
	private $html_file_path;
	
	public function __construct($csvFile){
		include __DIR__.'/youkaiClass.php';
		include __DIR__. '/smarty/libs/Smarty.class.php';
		$this->smarty = new Smarty();
		$this->smarty->template_dir = 'templates';
		$this->smarty->compile_dir = 'cache';
		$this->youkaiGoods = new youkaiClass();
		$this->youkaiGoods->setCSVData($this->readCSV($csvFile));
		$this->newIcon = $this->youkaiGoods->getBaseUrl()."wp-content/themes/Avada/images/img/new_icon.png";
		$this->html_file_path = dirname(__FILE__).'/HTML-Files/HTML_version';
		$this->generateHTML();
	}
	
	private function readCSV($csvFile){
		$data;
		
		$file_handle = fopen($csvFile, 'r');
		while (!feof($file_handle) ) {
			$data[] = fgetcsv($file_handle);
		}
		fclose($file_handle);
		return $data;
	}
	
	private function generateIndexHTML(){
		$htmlOutput;
		$dataToSmarty;
		$counter = 0;
		$pageIndex=1;
		$singleLinkSmarty;
		for($index = 0; $index < $this->total_item; $index++){
			$dataToSmarty[] =  $this->CSVDATA[$index];
			$singleLinkSmarty[] = $this->CSVSingleLink[$index];
			if($counter == $max_item){
				$properties = array(
					"csvData" => $this->CSVDATA[$count],
					"singleLink" => $singleLinkSmarty,
					""
						);
			}
		}
	} 
	
	private function generateCategoryHTML(){
		
	}
	
	private function generateSinglePageHTML(){
		$htmlOutput;
		$this->prod_desc_array = $this->youkaiGoods->getProd_Desc_Array();
		$this->external_links_array = $this->youkaiGoods->getExternal_Links_Array();
		$this->external_links_label_array = $this->youkaiGoods->getExternal_Links_Label_Array();
		for($count = 0; $count < $this->total_item; $count++){
			$properties = array( 
					"csvData" => $this->CSVDATA[$count],
					"img_path_array" => $this->img_path_array,
					"prod_desc_array" => $this->prod_desc_array,
					"external_links_array" => $this->external_links_array,
					"external_links_label_array" => $this->external_links_label_array,
					"newIcon" => $this->newIcon,
					"indexItem" => $count);
			$htmlOutput[] = $this->generateSmarty($this->smarty, $properties, 'single');
		}
		
		return $htmlOutput;
	}
	
	private function generateHTML(){
		$singleHTML;
		$this->processGeneralData();
		$this->generateSinglePageHTML();
		
		$singleHTML = $this->generateSinglePageHTML();
		$limit = count($singleHTML);
		for($count = 0;$count < $limit ;$count++){
			file_put_contents(
					$this->html_file_path
				    ."/".$this->youkaiGoods->getSingleFileName().($count+1)
					.".html", $singleHTML[$count]);
		}
	}
	
	private function processGeneralData(){
		$this->total_item = $this->youkaiGoods->getTotal_items();
		$this->CSVDATA = $this->youkaiGoods->getCSVData();
		$this->CSVSingleLink = $this->youkaiGoods->getSingle_page_link();
		$this->img_path_array = $this->youkaiGoods->getImg_Path_Array();
	}

	private function generateSmarty($smarty, $properties, $type){
		$smarty->assign('csvData', $properties["csvData"]);
		if($type === 'single'){
			
			$smarty->assign('img_path_array', $properties["img_path_array"]);
			$smarty->assign('prod_desc_array', $properties["prod_desc_array"]);
			$smarty->assign('external_links_array', $properties["external_links_array"]);
			$smarty->assign('external_links_label_array', $properties["external_links_label_array"]);
			$smarty->assign('newIcon', $properties["newIcon"]);
			$smarty->assign('indexItem', $properties["indexItem"]);
		}elseif ($type === 'index'){
			$smarty->assign('singleLink',$singleLinkSmarty);
		}
		
		return $smarty->fetch($type.'.tpl');
	}
}

 $shit = new publish('csv_file/sampleData2.csv');
?>