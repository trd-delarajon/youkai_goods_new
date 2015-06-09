<?php /* Smarty version 3.1.23, created on 2015-06-09 11:06:21
         compiled from "templates/sidebar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8067758675576ac8d282751_88880591%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8357569c5ab8907c3c4fd1a7f73e1f9a9309954a' => 
    array (
      0 => 'templates/sidebar.tpl',
      1 => 1433829904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8067758675576ac8d282751_88880591',
  'variables' => 
  array (
    'pageType' => 0,
    'folderversion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.23',
  'unifunc' => 'content_5576ac8d34b368_46137044',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5576ac8d34b368_46137044')) {
function content_5576ac8d34b368_46137044 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '8067758675576ac8d282751_88880591';
?>
<div id="sidebar" style="float:right;">
	
	<div id="sidebar" style="">
		<div id="sticker">
			<div class="greyback">
				<table>
				</table>
			</div>
			
			<!-- <div id="sticker">
											
			</div>-->
			<div id="sticker">
				<a href="index.html"><div class="side1"></div></a>
				<div class="goods_menu">

					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='index') {?>
						<div class="page_item_menu1 slug current" href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/indexPage1.html'></div>
					<?php } else { ?>
						<div class="page_item_menu1 slug" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/indexPage1.html'"></div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='toy') {?>
						<div class="page_item_menu2 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_toy1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu2 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_toy1.html'"></div>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='dcd') {?>
						<div class="page_item_menu3 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_dcd1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu3 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_dcd1.html'"></div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='carddas') {?>
						<div class="page_item_menu4 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_carddas1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu4 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_carddas1.html'"></div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='gashapon') {?>
						<div class="page_item_menu5 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_gashapon1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu5 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_gashapon1.html'"></div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='pramo') {?>
						<div class="page_item_menu11 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_pramo1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu11 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_pramo1.html'"></div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='candy') {?>
						<div class="page_item_menu6 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_candy1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu6 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_candy1.html'"></div>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='dailynec') {?>
						<div class="page_item_menu7 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_dailynec1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu7 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_dailynec1.html'"></div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='fashionaccessories') {?>
						<div class="page_item_menu8 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_fashionaccessories1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu8 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_fashionaccessories1.html'"></div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='prize') {?>
						<div class="page_item_menu9 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_prize1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu9 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_prize1.html'"></div>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='stationery') {?>
						<div class="page_item_menu10 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_stationery1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu10 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_stationery1.html'"></div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['pageType']->value==='food') {?>
						<div class="page_item_menu12 current" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_food1.html'"></div>
					<?php } else { ?>
						<div class="page_item_menu12 " onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/category_food1.html'"></div>
					<?php }?>
				</div>
				<div class="nkb" onclick="location.href='http://localhost/youkai_goods_new/youkai_goods_static/HTML-Files/<?php echo $_smarty_tpl->tpl_vars['folderversion']->value;?>
/indexPage1.html'"></div>
				<div class="nyan"></div>
			</div>
		</div>
	</div>
	
</div>
</div>
</div>
<?php }
}
?>