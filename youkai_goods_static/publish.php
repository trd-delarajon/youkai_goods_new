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
	private $link_path;
	
	private static $CATEGORIES = array("toy","dcd","carddas","gashapon",
										"pramo","candy","dailynec",
										"fashionaccessories","prize","stationery","food");
	const SINGLE_FILE_NAME = 'singlePage';
	const INDEX_FILE_NAME = 'indexPage';
	const CATEGORY_FILE_NAME = 'categoryPage';
	const MAX_CATEGORY = 14;
	const MAX_ITEM = 20;
	
	public function __construct($csvFile){
		include __DIR__.'/youkaiClass.php';
		include __DIR__. '/smarty/libs/Smarty.class.php';
		$this->smarty = new Smarty();
		$this->smarty->template_dir = 'templates';
		$this->smarty->compile_dir = 'cache';
		$this->youkaiGoods = new youkaiClass();
		$this->youkaiGoods->setCSVData($this->readCSV($csvFile));
		$this->link_path = $this->youkaiGoods->getBaseUrl();
		$this->newIcon = $this->link_path."wp-content/themes/Avada/images/img/new_icon.png";
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
		$numIndex = $this->youkaiGoods->TotalItem_index($this->total_item, SELF::MAX_ITEM);
		$indexLink = $this->link_path.self::SINGLE_FILE_NAME;
		$max_item = $this->youkaiGoods->getMaxItem();
		for($index = 0; $index < $this->total_item; $index++){
			$dataToSmarty[] =  $this->CSVDATA[$index];
			$singleLinkSmarty[] = $this->CSVSingleLink[$index];
			if($counter == $max_item){
				$properties = array(
					"csvData" => $dataToSmarty,
					"singleLink" => $singleLinkSmarty,
					"img_path_array" => $this->img_path_array,
					"numIndex" => $numIndex,
					"indexPage" => $pageIndex,
					"indexLink" => $indexLink,
					"newIcon" => $this->newIcon);
				$htmlOutput[] = $this->generateSmarty($this->smarty, $properties, 'index');
				$dataToSmarty = null;
				$singleLinkSmarty = null;
				$counter=-1;
				$pageIndex++;
			}
			$counter++;
		}
		if($counter > 0){
			$properties = array(
					"csvData" => $dataToSmarty,
					"singleLink" => $singleLinkSmarty,
					"img_path_array" => $this->img_path_array,
					"numIndex" => $numIndex,
					"indexPage" => $pageIndex,
					"indexLink" => $indexLink,
					"newIcon" => $this->newIcon);
			$htmlOutput[] = $this->generateSmarty($this->smarty, $properties, 'index');
		}
		return $htmlOutput;
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
		$indexHTML;
		
		$this->processGeneralData();
		
// 		$singleHTML = $this->generateSinglePageHTML();
// 		$limit = count($singleHTML);
// 		for($count = 0;$count < $limit ;$count++){
// 			file_put_contents(
// 					$this->html_file_path
// 				    ."/".self::SINGLE_FILE_NAME.($count+1)
// 					.".html", $singleHTML[$count]);
// 		}
		
// 		$indexHTML = $this->generateIndexHTML();
// 		$limit = count($indexHTML);
// 		for($count = 0;$count < $limit ; $count++){
// 			echo 'hello<br>';
// 			file_put_contents(
// 					$this->html_file_path
// 					."/".self::INDEX_FILE_NAME.($count+1)
// 					.".html", $indexHTML[$count]);
// 		}
		
		$this->generateCategoryHTML();
	}
	
	private function processGeneralData(){
		$this->total_item = $this->youkaiGoods->getTotal_items();
		$this->CSVDATA = $this->youkaiGoods->getCSVData();
		$this->CSVSingleLink = $this->youkaiGoods->getSingle_page_link();
		$this->img_path_array = $this->youkaiGoods->getImg_Path_Array();
	}

	private function generateSmarty($smarty, $properties, $type){
		$smarty->assign('csvData', $properties["csvData"]);
		$smarty->assign('img_path_array', $properties["img_path_array"]);
		$smarty->assign('newIcon', $properties["newIcon"]);
		if($type === 'single'){
			$smarty->assign('prod_desc_array', $properties["prod_desc_array"]);
			$smarty->assign('external_links_array', $properties["external_links_array"]);
			$smarty->assign('external_links_label_array', $properties["external_links_label_array"]);
			$smarty->assign('indexItem', $properties["indexItem"]);
		}elseif ($type === 'index'){
			$smarty->assign('singleLink',$properties["singleLink"]);
			$smarty->assign('indexPage',$properties["indexPage"]);
			$smarty->assign('indexLink',$properties["indexLink"]);
			$smarty->assign('numIndex',$properties["numIndex"]);
		}
		
		return $smarty->fetch($type.'.tpl');
	}
	
	private function generateCategoryHTML(){
		$category;
		$htmlOutput;
		$counter = 0;
		$pageIndex = 1;
		
		for($var = 0; $var < count(SELF::$CATEGORIES); $var++){
			$category = $this->filterCategory(SELF::$CATEGORIES[$var]);
			if($category == null){
				echo 'hello<br>';
			}
			else{
				$itemIndex = array_keys($category);
				$dataToSmarty;
				$indexImgPathArr;
				$singleLinkSmarty;
				$indexPage = $this->youkaiGoods->TotalItem_index(count($category), SELF::MAX_ITEM);
				
				for($counter = 0; $counter < count($category); $counter++){
					$dataToSmarty[] = $category[$itemIndex[$counter]];
					$indexImgPathArr[] = $this->img_path_array[$itemIndex[$counter]];
					$singleLinkSmarty[] = $this->CSVSingleLink[$itemIndex[$counter]];
					if($counter == SELF::MAX_CATEGORY){
						$property = array(
								"dataToSmarty" => $dataToSmarty,
								"numIndex" => $indexPage,
								"indexPage" => $pageIndex,
								"img_path_array" => $indexImgPathArr,
								"singleLinkSmarty" => $singleLinkSmarty,
								"newIcon" => $this->newIcon,
								"categoryLink" => SELF::$CATEGORIES[$var]);
						$htmlOutput[SELF::$CATEGORIES[$var]] = $this->generateSmarty($this->smarty, $property, SELF::$CATEGORIES[$var]);
						$dataToSmarty = null;
						$indexImgPathArr = null;
						$singleLinkSmarty = null;
						$counter=-1;
						$pageIndex++;
					}
					$counter++;
				}
				if($counter > 0){
					$property = array(
							"dataToSmarty" => $dataToSmarty,
							"numIndex" => $indexPage,
							"indexPage" => $pageIndex,
							"img_path_array" => $indexImgPathArr,
							"singleLinkSmarty" => $singleLinkSmarty,
							"newIcon" => $this->newIcon,
							"categoryLink" => SELF::$CATEGORIES[$var]);
					$htmlOutput[SELF::$CATEGORIES[$var]] = $this->generateSmarty($this->smarty, $property, SELF::$CATEGORIES[$var]);
				}
			}
				
		}
		
	}
	
	private function filterCategory($category){
		return $myCategory[$category] = array_filter($this->youkaiGoods->getCSVData(),
									function($csvdata) use ($category){
										return $csvdata[0] === $category;
									});
	}
}

 $shit = new publish('csv_file/sampleData2.csv');
?>