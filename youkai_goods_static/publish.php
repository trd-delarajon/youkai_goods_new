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
	
	private $html_file_path;
	private $link_path;
	private $folderVersion;
	
	//constant value
	private static $CATEGORIES = array("toy","dcd","carddas","gashapon",
										"pramo","candy","dailynec",
										"fashionaccessories","prize","stationery","food");
	const SINGLE_FILE_NAME = 'singlePage';
	const INDEX_FILE_NAME = 'indexPage';
	const CATEGORY_FILE_NAME = 'categoryPage';
	const MAX_CATEGORY = 14;
	const MAX_ITEM = 20;
	
	public function __construct($csvFile, $verFile = "HTML_version"){
		include __DIR__.'/youkaiClass.php';
		include "smarty/libs/Smarty.class.php";
		$this->smarty = new Smarty();
		$this->smarty->template_dir = 'templates';
		$this->smarty->compile_dir = 'cache';
		$this->youkaiGoods = new youkaiClass();
		$this->youkaiGoods->setCSVData($this->readCSV('csv_file/'.$csvFile));
		$this->youkaiGoods->setSingle_page_link(SELF::SINGLE_FILE_NAME, $verFile);
		$this->link_path = $this->youkaiGoods->getBaseUrl();
		$this->newIcon = "../../uploadimages/system-images/new_icon.png";
		$this->html_file_path = dirname(__FILE__).'/HTML-Files/'.$verFile;
		$this->folderVersion = $verFile;
		$this->generateHTML();
	}
	
	//read the data inside the CSV file
	private function readCSV($csvFile){
		$data;
		
		$file_handle = fopen($csvFile, 'r');
		while (!feof($file_handle) ) {
			$data[] = fgetcsv($file_handle);
		}
		fclose($file_handle);
		return $data;
	}
	
	//prepare the generalData to be used in order to generate static HTML
	private function processGeneralData(){
		$this->total_item = $this->youkaiGoods->getTotal_items();
		$this->CSVDATA = $this->youkaiGoods->getCSVData();
		$this->CSVSingleLink = $this->youkaiGoods->getSingle_page_link();
		$this->img_path_array = $this->youkaiGoods->getImg_Path_Array();
	}
	
	//generates all the index pages, not yet physical
	private function generateIndexHTML(){
		$htmlOutput;
		$dataToSmarty;
		$img_path_array;
		$counter = 0;
		$pageIndex=1;
		$singleLinkSmarty;
		$numIndex = $this->TotalItem_index($this->total_item, SELF::MAX_ITEM);
		$indexLink = $this->link_path.'HTML-Files/'.$this->folderVersion.'/'.self::INDEX_FILE_NAME;
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
					"folderversion" => $this->folderVersion,
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
					"folderversion" => $this->folderVersion,
					"pageType" => 'index');
			$htmlOutput[] = $this->generateSmarty($this->smarty, $properties, 'index');
		}
		return $htmlOutput;
	} 
	
	//generates all the single/product detail pages, not yet physical
	private function generateSinglePageHTML(){
		$htmlOutput;
		
		$prod_desc_array = $this->youkaiGoods->getProd_Desc_Array();
		$external_links_array = $this->youkaiGoods->getExternal_Links_Array();
		$external_links_label_array = $this->youkaiGoods->getExternal_Links_Label_Array();
		$prodInquiry_array = $this->youkaiGoods->getProductInquiry();
		for($count = 0; $count < $this->total_item; $count++){
			$category = $this->filterCategory($this->CSVDATA[$count][0]);
			$itemIndex = array_keys($category);
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
					"prodInquiry" => $prodInquiry_array,
					"singleLink" => $this->CSVSingleLink,
					"folderversion" => $this->folderVersion,
					"pageType" => $this->CSVDATA[$count][0]);
			$htmlOutput[] = $this->generateSmarty($this->smarty, $properties, 'single');
		}
		
		return $htmlOutput;
	}
	
	//generates all the category pages, not yet physical
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
			$categoryLink = $this->link_path.'HTML-Files/'.$this->folderVersion.'/category_'.$curCategory;
			
			for($index = 0; $index < count($category[$curCategory]); $index++){
				$dataToSmarty[] = $category[$curCategory][$itemIndex[$index]];
				$indexImgPathArr[] = $this->img_path_array[$itemIndex[$index]];
				$singleLinkSmarty[] = $this->CSVSingleLink[$itemIndex[$index]];
				if($counter == SELF::MAX_CATEGORY-1){
					$property = array(
							"csvData" => $dataToSmarty,
							"numIndex" => $indexPage,
							"indexPage" => $pageIndex,
							"img_path_array" => $indexImgPathArr,
							"singleLink" => $singleLinkSmarty,
							"newIcon" => $this->newIcon,
							"categoryLink" => $categoryLink,
							"folderversion" => $this->folderVersion,
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
				$property = array(
						"csvData" => $dataToSmarty,
						"numIndex" => $indexPage,
						"indexPage" => $pageIndex,
						"img_path_array" => $indexImgPathArr,
						"singleLink" => $singleLinkSmarty,
						"newIcon" => $this->newIcon,
						"categoryLink" => $categoryLink,
						"folderversion" => $this->folderVersion,
						"pageType" => $curCategory);
				$htmlOutput[] = $this->generateSmarty($this->smarty, $property, 'category');
				$counter=-1;
			}
		}
		return $htmlOutput;
	}
	
	//this is the method here that generates the static html physically
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
	
	//params: $smarty - the smarty Object; $properties - the data to be pass in the smarty object;
	//type - type of page
	private function generateSmarty($smarty, $properties = null, $type){
		
		if(!empty($properties)){
			$smarty->assign('csvData', $properties["csvData"]);
			$smarty->assign('img_path_array', $properties["img_path_array"]);
			$smarty->assign('newIcon', $properties["newIcon"]);
			$smarty->assign('pageType', $properties["pageType"]);
			$smarty->assign('singleLink',$properties["singleLink"]);
			$smarty->assign('folderversion', $properties["folderversion"]);
			if($type === 'single'){
				$smarty->assign('prod_desc_array', $properties["prod_desc_array"]);
				$smarty->assign('external_links_array', $properties["external_links_array"]);
				$smarty->assign('external_links_label_array', $properties["external_links_label_array"]);
				$smarty->assign('indexItem', $properties["indexItem"]);
				$smarty->assign('itemIndex', $properties["itemIndex"]);
				$smarty->assign('category', $properties["category"]);
				$smarty->assign('prodInq', $properties["prodInquiry"]);
			}elseif ($type === 'index'){
				$smarty->assign('indexPage',$properties["indexPage"]);
				$smarty->assign('indexLink',$properties["indexLink"]);
				$smarty->assign('numIndex',$properties["numIndex"]);
			}elseif ($type === 'category'){
				$smarty->assign('numIndex',$properties["numIndex"]);
				$smarty->assign('indexPage',$properties["indexPage"]);
				$smarty->assign('categoryLink',$properties["categoryLink"]);
			}
		}
		else{ $smarty->assign('folderversion', $this->folderVersion); }
		
		return $smarty->fetch($type.'.tpl');
	}
	
	//calculates the total index of a page depending on the max_item
	public function TotalItem_index($total_items, $max_item){
		if(($total_items % $max_item) != 0)
			return (int)($total_items / $max_item) + 1;
	
		return $total_items / $max_item;
	}
	
	//method that filters/arrange the array by category 
	private function filterCategory($category){
		return $myCategory[$category] = array_filter($this->youkaiGoods->getCSVData(),
									function($csvdata) use ($category){
										return $csvdata[0] === $category;
									});
	}
}

//please erase this, this is here for testing purpose only
$shit = new publish('sampleData5.csv','folderSample');
?>