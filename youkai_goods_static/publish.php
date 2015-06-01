<?PHP
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
	//commented because im trying to see if it doesnt need to be global
// 	private $prod_desc_array;
// 	private $external_links_array;
// 	private $external_links_label_array;
	
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
		$this->youkaiGoods->setSingle_page_link(SELF::SINGLE_FILE_NAME);
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
	
	private function processGeneralData(){
		$this->total_item = $this->youkaiGoods->getTotal_items();
		$this->CSVDATA = $this->youkaiGoods->getCSVData();
		$this->CSVSingleLink = $this->youkaiGoods->getSingle_page_link();
		$this->img_path_array = $this->youkaiGoods->getImg_Path_Array();
	}
	
	private function generateIndexHTML(){
		$htmlOutput;
		$dataToSmarty;
		$img_path_array;
		$counter = 0;
		$pageIndex=1;
		$singleLinkSmarty;
		$numIndex = $this->TotalItem_index($this->total_item, SELF::MAX_ITEM);
		$indexLink = $this->link_path.'HTML-Files/HTML_version/'.self::INDEX_FILE_NAME;
		$max_item = SELF::MAX_ITEM-1;
		for($index = 0; $index < $this->total_item; $index++){
			$dataToSmarty[] =  $this->CSVDATA[$index];
			$singleLinkSmarty[] = $this->CSVSingleLink[$index];
			$img_path_array[] = $this->img_path_array[$index];
			if($counter == $max_item){
				$properties = array(
					"csvData" => $dataToSmarty,
					"singleLink" => $singleLinkSmarty,
					"img_path_array" => $img_path_array,
					"numIndex" => $numIndex,
					"indexPage" => $pageIndex,
					"indexLink" => $indexLink,
					"newIcon" => $this->newIcon,
					"pageType" => 'index');
				$htmlOutput[] = $this->generateSmarty($this->smarty, $properties, 'index');
				$dataToSmarty = null;
				$singleLinkSmarty = null;
				$img_path_array = null;
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
					"newIcon" => $this->newIcon,
					"pageType" => 'index');
			$htmlOutput[] = $this->generateSmarty($this->smarty, $properties, 'index');
		}
		return $htmlOutput;
	} 
	
	private function generateSinglePageHTML(){
		$htmlOutput;
		//commented because im tryign to confirm if the variables are bnot needed to be global
// 		$this->prod_desc_array = $this->youkaiGoods->getProd_Desc_Array();
// 		$this->external_links_array = $this->youkaiGoods->getExternal_Links_Array();
// 		$this->external_links_label_array = $this->youkaiGoods->getExternal_Links_Label_Array();
		
		$prod_desc_array = $this->youkaiGoods->getProd_Desc_Array();
		$external_links_array = $this->youkaiGoods->getExternal_Links_Array();
		$external_links_label_array = $this->youkaiGoods->getExternal_Links_Label_Array();
		for($count = 0; $count < $this->total_item; $count++){
			$category = $this->filterCategory($this->CSVDATA[$count][0]);
			$itemIndex = array_keys($category);
			echo '<pre style="background: green;">';
			echo '$$itemIndex singlepage';
			print_r($itemIndex);
			echo '</pre>';
		
			echo '<pre style="background: red;">';
			echo '$$itemIndex singlepage';
			print_r($itemIndex);
			echo '</pre>';
			$properties = array( 
					"csvData" => $this->CSVDATA[$count],
					"img_path_array" => $this->img_path_array,
					"prod_desc_array" => $prod_desc_array,
					"external_links_array" => $external_links_array,
					"external_links_label_array" => $external_links_label_array,
					"newIcon" => $this->newIcon,
					"indexItem" => $count,
					"category" => $category,
					"itemIndex" => $itemIndex,
					"singleLink" => $this->CSVSingleLink,
					"pageType" => $this->CSVDATA[$count][0]);
			$htmlOutput[] = $this->generateSmarty($this->smarty, $properties, 'single');
		}
		
		return $htmlOutput;
	}
	
	private function generateCategoryHTML($curCategory){
		$category;
		$htmlOutput = array();
		$counter = 0;
		$pageIndex = 1;
	
		$category[$curCategory] = $this->filterCategory($curCategory);
		if($category[$curCategory] == null){
			$htmlOutput[$curCategory] = $this->generateSmarty($this->smarty, null, 'category');
		}
		else{
			$itemIndex = array_keys($category[$curCategory]);
			$dataToSmarty;
			$indexImgPathArr;
			$singleLinkSmarty;
			$indexPage = $this->TotalItem_index(count($category[$curCategory]), SELF::MAX_CATEGORY);
			$categoryLink = $this->link_path.'HTML-Files/HTML_version/category_'.$curCategory;
			echo $curCategory;
			echo ' '.count($category[$curCategory]).'<br/>';
			echo '<pre>';
			echo 'itemIndex';
			print_r($itemIndex);
			echo '</pre>';
			
			for($index = 0; $index < count($category[$curCategory]); $index++){
				$dataToSmarty[] = $category[$curCategory][$itemIndex[$index]];
				$indexImgPathArr[] = $this->img_path_array[$itemIndex[$index]];
				$singleLinkSmarty[] = $this->CSVSingleLink[$itemIndex[$index]];
				if($counter == SELF::MAX_CATEGORY-1){
					echo '<pre>';
					echo 'singleLinkSmarty';
					print_r($singleLinkSmarty);
					echo '</pre>';
					
					echo '<pre>';
					echo '$dataToSmarty';
					print_r($dataToSmarty);
					echo '</pre>';
					$property = array(
							"csvData" => $dataToSmarty,
							"numIndex" => $indexPage,
							"indexPage" => $pageIndex,
							"img_path_array" => $indexImgPathArr,
							"singleLink" => $singleLinkSmarty,
							"newIcon" => $this->newIcon,
							"categoryLink" => $categoryLink,
							"pageType" => $curCategory);
					$htmlOutput[] = $this->generateSmarty($this->smarty, $property, 'category');
					$dataToSmarty = null;
					$indexImgPathArr = null;
					$singleLinkSmarty = null;
					$counter=-1;
					$pageIndex++;
				}
				$counter++;
			}
			if($counter > 0){
				echo '<pre>';
				echo 'singleLinkSmarty';
				print_r($singleLinkSmarty);
				echo '</pre>';
				
				echo '<pre>';
				echo '$dataToSmarty';
				print_r($dataToSmarty);
				echo '</pre>';
				$property = array(
						"csvData" => $dataToSmarty,
						"numIndex" => $indexPage,
						"indexPage" => $pageIndex,
						"img_path_array" => $indexImgPathArr,
						"singleLink" => $singleLinkSmarty,
						"newIcon" => $this->newIcon,
						"categoryLink" => $categoryLink,
						"pageType" => $curCategory);
				$htmlOutput[] = $this->generateSmarty($this->smarty, $property, 'category');
				$counter=-1;
			}
		}
		return $htmlOutput;
	}
	
	private function generateHTML(){
		$singleHTML;
		$indexHTML;
		$categoryHTML;
		$this->processGeneralData();
		
		$singleHTML = $this->generateSinglePageHTML();
		$limit = count($singleHTML);
		for($count = 0;$count < $limit ;$count++){
			file_put_contents(
					$this->html_file_path
				    ."/".self::SINGLE_FILE_NAME.($count+1)
					.".html", $singleHTML[$count]);
		}	
		$indexHTML = $this->generateIndexHTML();
		$limit = count($indexHTML);
		for($count = 0;$count < $limit ; $count++){
			file_put_contents(
					$this->html_file_path
					."/".self::INDEX_FILE_NAME.($count+1)
					.".html", $indexHTML[$count]);
		}
		$limit = count(SELF::$CATEGORIES);
		for($count = 0; $count < $limit; $count++){
			$curCategory = SELF::$CATEGORIES[$count];
			$categoryHTML[$curCategory] = $this->generateCategoryHTML($curCategory);

			$htmlNumber = 1;
			foreach($categoryHTML[$curCategory] as $key => $value){
				file_put_contents(
					$this->html_file_path
					."/category_".$curCategory.($htmlNumber++)
					.".html", $value);
			}
		}
	}

	private function generateSmarty($smarty, $properties = null, $type){
		$smarty->assign('csvData', $properties["csvData"]);
		$smarty->assign('img_path_array', $properties["img_path_array"]);
		$smarty->assign('newIcon', $properties["newIcon"]);
		$smarty->assign('pageType', $properties["pageType"]);
		$smarty->assign('singleLink',$properties["singleLink"]);
		if($type === 'single'){
			$smarty->assign('prod_desc_array', $properties["prod_desc_array"]);
			$smarty->assign('external_links_array', $properties["external_links_array"]);
			$smarty->assign('external_links_label_array', $properties["external_links_label_array"]);
			$smarty->assign('indexItem', $properties["indexItem"]);
			$smarty->assign('itemIndex', $properties["itemIndex"]);
			$smarty->assign('category', $properties["category"]);
		}elseif ($type === 'index'){
			$smarty->assign('indexPage',$properties["indexPage"]);
			$smarty->assign('indexLink',$properties["indexLink"]);
			$smarty->assign('numIndex',$properties["numIndex"]);
		}elseif ($type === 'category'){
			echo '<pre>';
			echo 'singleLinkSmarty Im here';
// 			print_r($properties["singleLinkSmarty"]);
			echo '</pre>';
			$smarty->assign('numIndex',$properties["numIndex"]);
			$smarty->assign('indexPage',$properties["indexPage"]);
			$smarty->assign('categoryLink',$properties["categoryLink"]);
		}
		
		return $smarty->fetch($type.'.tpl');
	}
	
	public function TotalItem_index($total_items, $max_item){
		echo 'total_items/$max_item:'.$total_items.'/'.$max_item.'<br><br>';
		if(($total_items % $max_item) != 0)
			return (int)($total_items / $max_item) + 1;
	
		return $total_items / $max_item;
	}
	
	private function filterCategory($category){
		return $myCategory[$category] = array_filter($this->youkaiGoods->getCSVData(),
									function($csvdata) use ($category){
										return $csvdata[0] === $category;
									});
	}
}

 $shit = new publish('csv_file/sampleData4.csv');
?>