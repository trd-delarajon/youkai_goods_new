<?php /* Smarty version 3.1.23, created on 2015-05-27 05:34:53
         compiled from "templates/single.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17933728255653b5dd672b6_50547925%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff6a218cd2d6ea50c6e79f3b0810a44764d965af' => 
    array (
      0 => 'templates/single.tpl',
      1 => 1432193089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17933728255653b5dd672b6_50547925',
  'variables' => 
  array (
    'indexItem' => 0,
    'img_path_array' => 0,
    'csvData' => 0,
    'newIcon' => 0,
    'var' => 0,
    'prod_desc_array' => 0,
    'external_links_array' => 0,
    'external_links_label_array' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.23',
  'unifunc' => 'content_55653b5def3da7_51714985',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55653b5def3da7_51714985')) {
function content_55653b5def3da7_51714985 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '17933728255653b5dd672b6_50547925';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

</head>
<body class="single single-post postid-2218 single-format-standard" data-twttr-rendered="true">
	<div id="wrapper">
		<div class="header-wrapper">
			<div class="header-v1">
				<header id="header">
					<div class="avada-row" style="margin-top:0px;margin-bottom:0px;">
						<div class="logo_v1">
							<div class="face">
								<img src="../../wp-content/themes/Avada/images/img/header/logo_face.png" alt="妖怪ウォッチ　グッズ" class="normal_logo">
							</div>
							<div class="goods_logo1"><a href="http://youkai-world.com/" target="_blank"></a></div>
						</div>
						<nav id="nav" class="nav-holder">
							<ul id="nav" class="menu">
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-50"><a href="http://www.youkai-watch.jp/" target="_blank">ゲーム</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53"><a href="http://www.corocoro.tv/" target="_blank">マンガ</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-51"><a href="http://ani.tv/youkai-watch/" target="_blank">アニメ</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-54"><a href="http://yw.b-boys.jp/" target="_blank">おもちゃ</a></li>
								<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52"><a href="http://www.ukiukipedia.com/" target="_blank">カード</a></li>
							</ul>
						</nav>
					</div>
				</header>
			</div>
		</div>
		<header id="header" class="sticky-header">
			<div class="avada-row">
				<div class="logo">
					<div class="face">
						<img src="../../wp-content/themes/Avada/images/img/header/logo_face.png" alt="妖怪ウォッチ　グッズ" class="normal_logo">
					</div>
					<div class="goods_logo"><a href="http://youkai-world.com/" target="_blank"></a></div>
				</div>
				<nav id="nav" class="nav-holder">
					<ul id="nav" class="menu">
					</ul>
				</nav>
			</div>
		</header>
		<div id="sliders-container">
		</div>
		<div class="page-title-container">
			<div class="page-title">
				<div class="page-title-wrapper">
					<h1 class="entry-title">ジバニャンのふわチョコモナカ</h1>
					<ul class="breadcrumbs"><li> <a href="http://youkai-world.com/goods">Home</a></li><li><a href="http://youkai-world.com/goods/category/product/food/" title="食品">食品</a></li><li>ジバニャンのふわチョコモナカ</li></ul>									</div>
				</div>
			</div>
			<div id="main" class="">
				<div class="avada-row" style="">
				
					<div id="content" style="float:left;">
						<div id="post-2218" class="post-2218 post type-post status-publish format-standard hentry category-food post">
							<div class="center single_top_pad">
								<div class="cat_img">
									<div class="left">
									</div>
									<div class="rght_date">
										<div class="social_but">
										</div>
										<p class="single-line-meta"></p>
									</div>
								</div>
								
								<div class="Post_Content">
									<div class="Con_img_title">
										<div class="left_con_img"><a class="fancybox-thumb" style="display:block!important;" rel="fancybox-thumb" href="<?php echo $_smarty_tpl->tpl_vars['img_path_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value][0];?>
"><img width="250" height="250" src="<?php echo $_smarty_tpl->tpl_vars['img_path_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value][0];?>
"></a></div>
										<div class="right_con">
											<?php if ($_smarty_tpl->tpl_vars['csvData']->value[2]=='1') {?>
												<div class="post-new">
													<img alt="youkai_new_show_important" src="<?php echo $_smarty_tpl->tpl_vars['newIcon']->value;?>
">	
												</div>
											<?php } else { ?>
												<div class="post-new">
												</div>
											<?php }?>
											<div class="Post_title"><h1 class="entry-title"><?php echo $_smarty_tpl->tpl_vars['csvData']->value[3];?>
</h1></div>
										</div>
									</div>
									<div class="small_con_img">
										<?php if (count($_smarty_tpl->tpl_vars['img_path_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value])!=1) {?>
											<ul class="S_img_con">
												<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? count($_smarty_tpl->tpl_vars['img_path_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value])-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['img_path_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value])-1)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
													<?php if ($_smarty_tpl->tpl_vars['var']->value!=0) {?>
													<li class="s_size S_img1">
														<div class="img-container">
															<a class="fancybox-thumb" rel="fancybox-thumb" href="<?php echo $_smarty_tpl->tpl_vars['img_path_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value][$_smarty_tpl->tpl_vars['var']->value];?>
"><img width="100" height="100" src="<?php echo $_smarty_tpl->tpl_vars['img_path_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value][$_smarty_tpl->tpl_vars['var']->value];?>
"></a>
														</div>
													</li>
													<?php }?>
												<?php }} ?>
											</ul>
										<?php }?>
									</div>
									<div class="text_con">
										<div class="con_txtone">
											<div class="date_con">
												<span><?php echo $_smarty_tpl->tpl_vars['csvData']->value[6];?>
</span>
											</div>
											<div class="text_content">
												<?php if ($_smarty_tpl->tpl_vars['csvData']->value[4]!="null") {?>
													<p><?php echo $_smarty_tpl->tpl_vars['csvData']->value[4];?>
</p>
													<p>&nbsp;</p>
												<?php }?>
												<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? count($_smarty_tpl->tpl_vars['prod_desc_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value])-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['prod_desc_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value])-1)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
													<p><?php echo $_smarty_tpl->tpl_vars['prod_desc_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value][$_smarty_tpl->tpl_vars['var']->value];?>
</p>
												<?php }} ?>
												<?php if ($_smarty_tpl->tpl_vars['external_links_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value][0]!="null") {?>
													<p>&nbsp;</p>
													<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? count($_smarty_tpl->tpl_vars['external_links_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value])-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['external_links_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value])-1)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
														<address>
															<strong>
																<a href="<?php echo $_smarty_tpl->tpl_vars['external_links_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value][$_smarty_tpl->tpl_vars['var']->value];?>
" target="_blank"><font><?php echo $_smarty_tpl->tpl_vars['external_links_label_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value][$_smarty_tpl->tpl_vars['var']->value];?>
</font></a>
															</strong>
														</address>
														<?php if ($_smarty_tpl->tpl_vars['var']->value!=count($_smarty_tpl->tpl_vars['external_links_array']->value[$_smarty_tpl->tpl_vars['indexItem']->value])-1) {?>
															<address>&nbsp;</address>
														<?php }?>
													<?php }} ?>
												<?php }?>
											</div>
											<div class="text_price">
												■価格:<?php if ($_smarty_tpl->tpl_vars['csvData']->value[7]!="null") {
echo $_smarty_tpl->tpl_vars['csvData']->value[7];
}?>
											</div>
										</div>
										<div class="con_texttwo_img">
											<div class="headbckgrnd">このグッズに関するお問い合わせ先</div>
											<div class="textcon_two">
												株式会社バンダイお客様相談センター<br>
												〒277-8511　柏市豊四季241-22<br>
												電話番号：0570-041-101<br>
											ＵＲＬ：http://www.bandai.co.jp/candy/						</div>
										</div>
									</div>
									<hr class="bord_top">
									<div class="related_prduct_con">
										<div class="Product_name">
											<img class="img" src="../../wp-content/themes/Avada/images/img/home/menu_hover12.png">
										</div>
										<div class="postdet_block">
											<div class="postdet_list">
												<div class="postdet_img">
													<a href="http://youkai-world.com/goods/p2103/"><img alt="main_image" src="./wp-content/uploads/2015/03/food-妖怪プニプニぶどうグミ.jpg"></a>
												</div>
												<div class="postdet_det">
													<div class="titledet_post">
														<a href="http://youkai-world.com/goods/p2103/">
														妖怪ウォッチ　妖怪プニプニぶどうグミ...									</a>
													</div>
												</div>
											</div>
											<div class="postdet_list">
												<div class="postdet_img">
													<a href="http://youkai-world.com/goods/p2105/"><img alt="main_image" src="./wp-content/uploads/2015/03/food-ようかいふしぎキャンディー_1.jpg"></a>
												</div>
												<div class="postdet_det">
													<div class="titledet_post">
														<a href="http://youkai-world.com/goods/p2105/">
														ようかいふしぎキャンディー（２）...									</a>
													</div>
												</div>
											</div>
											<div class="postdet_list">
												<div class="postdet_img">
													<a href="http://youkai-world.com/goods/p1646/"><img alt="main_image" src="./wp-content/uploads/2014/11/food-アイスオレっちオレンジ_1.jpg"></a>
												</div>
												<div class="postdet_det">
													<div class="titledet_post">
														<a href="http://youkai-world.com/goods/p1646/">
														ＤＣＤ妖怪ウォッチ<br>ともだちウキウキ<br>ペディ...									</a>
													</div>
												</div>
											</div>
											<div class="postdet_list">
												<div class="postdet_img">
													<a href="http://youkai-world.com/goods/p1406/"><img alt="main_image" src="./wp-content/uploads/2014/09/food-ジバニャンのチョコボー.jpg"></a>
												</div>
												<div class="postdet_det">
													<div class="titledet_post">
														<a href="http://youkai-world.com/goods/p1406/">
														ジバニャンのチョコボー...									</a>
													</div>
												</div>
											</div>
											<div class="postdet_list">
												<div class="postdet_img">
													<a href="http://youkai-world.com/goods/p1408/"><img alt="main_image" src="./wp-content/uploads/2014/09/food-ようかいふしぎキャンディー_1.jpg"></a>
												</div>
												<div class="postdet_det">
													<div class="titledet_post">
														<a href="http://youkai-world.com/goods/p1408/">
														ようかいふしぎキャンディー...									</a>
													</div>
												</div>
											</div>
											<div class="postdet_list">
												<div class="postdet_img">
													<a href="http://youkai-world.com/goods/p1230/"><img alt="main_image" src="./wp-content/uploads/2014/08/food-妖怪ウォッチやきそば_差し替え.jpg"></a>
												</div>
												<div class="postdet_det">
													<div class="titledet_post">
														<a href="http://youkai-world.com/goods/p1230/">
														日清　妖怪ウォッチやきそば　ジバニャンのニャポリタン味ソース...									</a>
													</div>
												</div>
											</div>
											<div class="postdet_list">
												<div class="postdet_img">
													<a href="http://youkai-world.com/goods/p1209/"><img alt="main_image" src="./wp-content/uploads/2014/08/food-妖怪ウォッチパン-ジバニャン.jpg"></a>
												</div>
												<div class="postdet_det">
													<div class="titledet_post">
														<a href="http://youkai-world.com/goods/p1209/">
														妖怪ウォッチパン									</a>
													</div>
												</div>
											</div>
											<div class="postdet_list">
												<div class="postdet_img">
													<a href="http://youkai-world.com/goods/p1220/"><img alt="main_image" src="./wp-content/uploads/2014/08/food-妖怪ウォッチカレー.jpg"></a>
												</div>
												<div class="postdet_det">
													<div class="titledet_post">
														<a href="http://youkai-world.com/goods/p1220/">
														妖怪ウォッチカレー									</a>
													</div>
												</div>
											</div>
											<div class="postdet_list">
												<div class="postdet_img">
													<a href="http://youkai-world.com/goods/p1224/"><img alt="main_image" src="./wp-content/uploads/2014/08/food-妖怪ウォッチふりかけ表.jpg"></a>
												</div>
												<div class="postdet_det">
													<div class="titledet_post">
														<a href="http://youkai-world.com/goods/p1224/">
														妖怪ウォッチふりかけ									</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/end Post Detail -->
								<div class="">
									<div class="post-content">
										<p id="youkai_content_2">
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

					<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
<?php }
}
?>