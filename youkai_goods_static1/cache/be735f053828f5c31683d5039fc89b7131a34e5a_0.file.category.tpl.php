<?php /* Smarty version 3.1.23, created on 2015-06-09 11:06:21
         compiled from "templates/category.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2105978865576ac8d66b542_67933586%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be735f053828f5c31683d5039fc89b7131a34e5a' => 
    array (
      0 => 'templates/category.tpl',
      1 => 1432872546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2105978865576ac8d66b542_67933586',
  'variables' => 
  array (
    'csvData' => 0,
    'var' => 0,
    'singleLink' => 0,
    'img_path_array' => 0,
    'newIcon' => 0,
    'numIndex' => 0,
    'indexPage' => 0,
    'categoryLink' => 0,
    'indexLink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.23',
  'unifunc' => 'content_5576ac8d7c9a08_32697221',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5576ac8d7c9a08_32697221')) {
function content_5576ac8d7c9a08_32697221 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '2105978865576ac8d66b542_67933586';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<style>

			#post-goods {
			padding: 12px;
			}
			#posts-container{
			border: 1px solid #798bc4;
			}
			.post_list{
			float: left;
			width: 300px;
			display: inline-block;
			position: relative;
			}
			.post_list p{
			margin:0px;
			}
			#post-goods{
			padding: 12px;
			}
			/*div.catpost_right {
			float:right !important;
			width: 145px !important;
			}*/
			div.title_post {
			min-height: 75px;
			}
			div.post_img {
			float: left;
			border: 2px solid #cccccc;
			}
			div.post_img a img {
			width: 145px;
			height: 145px;
			}
			div.catpost_right div.title_post a{
			color: #0039FF;
			font-size: 14px;
			font-weight: bold;
			}

			.catlower {
			color: #000000;
			font-weight: bold;
			font-size: 11px;
			line-height: 1.4;
			}
			body.home div#wrapper div#main div.avada-row {
			/* margin-top: 24%; */
			}
			/*Content*/
			div#content {
			width: 660px;
			font-family:"メイリオ",Meiryo,"ヒラギノ角ゴ Pro W3","Hiragino Kaku Gothic Pro",Osaka,"ＭＳ Ｐゴシック","MS PGothic",sans-serif !important;
			}

			/*sumpay*/


			div.catpost_right {
			float:right !important;
			width: 145px !important;
			}

			div.catpost_right div.post-new {
			height:23px;
			}
			.cat_nopost{
			background: url('../../wp-content/themes/Avada/images/img/home/bg_goods.png');
			border-top: 3px solid #325DE6;
			border-bottom: 3px solid #325DE6;
			text-align:center;
			padding:107px;
			}
			.nopost_img{
			background: url('../../wp-content/themes/Avada/images/img/category/item2.png');
			width: 418px;
			height: 310px;
			display: inline-block;
			}
			/*Menu*/
			.side1{
			background:url('../../wp-content/themes/Avada/images/img/home/side1.png');
			width:252px;
			height:143px;
			display: inline-block;
			}
			body.home .grid-layout{
			/*width: 360px !important;*/
			float: left !important;
			}
			.post_head_image {
			width: 352px;
			max-width: none;
			}
			#public_site_block {
			/* width: 352px; */
			}
			#youkai_world_block {
			width: 352px;
			}
			html body.page div#wrapper div#main div.avada-row {
			/* background-image: url("../../wp-content/themes/Avada/images/img/home/goods_bg.png"); */
			padding-bottom:50px;
			width:980px;
			max-width:980px;
			}
			div#main,
			div#wrapper {
			margin : 0 auto 0 auto;
			width: 100%;
			/* max-width: 1468px !important; */
			}
			div.page-title-container {
			display: none !important;
			}
			#sidebar {
			float: left;
			}
			#content {
			float: right;
			}
			div.display_type_1   {
			background-image: url('../../wp-content/themes/Avada/images/img/category/cat_bg.png');
			width:323px;
			height: 174px;
			position: relative;
			display: inline-block;
			}
			.page-template-category-php #posts-container {
			border: none !important;
			}
			/*Sidebar*/
			#sidebar {
			float:left !important;
			display:inline-flex;
			}

			p.single-line-meta {
			margin-top: -10px !important;
			}

</style>

</head>
<body class="page page-id-364 page-template page-template-category-php">
<div id="wrapper">
	<div class="header-wrapper">
		<div class="header-v1">
			<header id="header">
				<div class="avada-row" style="margin-top:0px;margin-bottom:0px;">
					<div class="logo_v1">
						<div class="face">
							<img src="../../wp-content/themes/Avada/images/img/header/logo_face.png" alt="妖怪ウォッチ　グッズ" class="normal_logo" />
						</div>
						<div class="goods_logo1"><a href="../index.html" target="_blank"></a></div>
					</div>
					<nav id="nav" class="nav-holder">
						<ul id="nav" class="menu">
							
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-50"><a href="http://www.youkai-watch.jp/" target="_blank">ゲーム</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53"><a href="http://www.corocoro.tv/" target="_blank">マンガ</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-51"><a href="http://ani.tv/youkai-watch/" target="_blank">アニメ</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-54"><a href="http://yw.b-boys.jp/" target="_blank">おもちゃ</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52"><a href="http://www.ukiukipedia.com"  target="_blank">カード</a></li>
						</ul>
					</nav>
				</div>
			</header>
		</div>		</div>
		<header id="header" class="sticky-header">
			<div class="avada-row">
				<div class="logo">
					<div class="face">
						<img src="../../wp-content/themes/Avada/images/img/header/logo_face.png" alt="妖怪ウォッチ　グッズ" class="normal_logo" />
					</div>
					<div class="goods_logo"><a href="index.php" target="_blank"></a></div>
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
					<h1 class="entry-title">
					商品カテゴリ							</h1>
					<ul class="breadcrumbs"><li> <a href="index.html">Home</a></li><li><a href="index.html" title="商品カテゴリ の投稿をすべて表示">商品カテゴリ</a><a href="food/index.html" title="食品 の投稿をすべて表示">食品</a></li></ul>									</div>
				</div>
			</div>
			
			<div id="main" class="">
				<div class="avada-row" style="">
					<div id="content" >
						
						<div id="posts-container">
							
							<!-- public posts  -->
							<div class="" id="public_site_container" >
								<div id="public_site_block">

									<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? count($_smarty_tpl->tpl_vars['csvData']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['csvData']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
										 <div class="display_type_1">
										 	<div class="home_post_border_1">
										 		<div id="post-goods">
										 			<div class="post-content-container" >
										 				<div class="post_list">
										 					<div class="post_img">
										 						<a href="<?php echo $_smarty_tpl->tpl_vars['singleLink']->value[$_smarty_tpl->tpl_vars['var']->value];?>
" >
										 							<img alt="main_image" src="<?php echo $_smarty_tpl->tpl_vars['img_path_array']->value[$_smarty_tpl->tpl_vars['var']->value][0];?>
" />
										 						</a>
										 					</div>
										 					<div class="catpost_right">
											 					<div class="title_post">
											 						<a href="<?php echo $_smarty_tpl->tpl_vars['singleLink']->value[$_smarty_tpl->tpl_vars['var']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['csvData']->value[$_smarty_tpl->tpl_vars['var']->value][3];?>
</a>
											 					</div>
											 					<div class="post-new">
											 						<?php if ($_smarty_tpl->tpl_vars['csvData']->value[$_smarty_tpl->tpl_vars['var']->value][2]=='1') {?>
											 							<img alt="youkai_new_show_important" src="<?php echo $_smarty_tpl->tpl_vars['newIcon']->value;?>
">	
											 						<?php }?>
											 					</div>
											 					<div class="catlower">
											 						<div class="post-date-youkai">
											 							<p class="single-line-meta"><?php echo $_smarty_tpl->tpl_vars['csvData']->value[$_smarty_tpl->tpl_vars['var']->value][6];?>
</p>
											 						</div>
											 						<div class="post-price">
											 							<?php if ($_smarty_tpl->tpl_vars['csvData']->value[$_smarty_tpl->tpl_vars['var']->value][7]!="null") {
echo $_smarty_tpl->tpl_vars['csvData']->value[$_smarty_tpl->tpl_vars['var']->value][7];
}?>
											 						</div>
											 					</div>
											 				</div>
										 				</div>
										 			</div>
										 			<div style="clear:both;"></div>
													<div class="meta-info"></div>
										 		</div>
										 	</div>
										 </div>
									<?php }} ?>
									<!-- <div class="display_type_1">
										<div class="home_post_border_1">
											<div id="post-goods">
												<div class="post-content-container" >
													<div class="post_list">
														<div class="post_img">
															<a href="p2218/index.html" ><img alt="main_image" src="sampol.jpg" /></a>
														</div>
														<div class="catpost_right">
															<div class="title_post">
																<a href="#">
																ジバニャンのふわチョコモナカ														</a>
															</div>
															<div class="post-new">
															<img alt="youkai_new_show_important" src="../../wp-content/themes/Avada/images/img/new_icon.png">													</div>
															<div class="catlower">
																<div class="post-date-youkai">
																	<p class="single-line-meta">
																	2015年 05月 25日発売														</p>
																</div>
																<div class="post-price">
																80円(税抜)													</div>
																<div class="post-publisher">
																株式会社バンダイ													</div>
															</div>
														</div>
													</div>
													
												</div>
												<div style="clear:both;"></div>
												<div class="meta-info"></div>
												
											</div>
										</div>
									</div> -->
									
									<!-- <div class="display_type_1">
										<div class="home_post_border_1">
											<div id="post-goods">
												<div class="post-content-container" >
													<div class="post_list">
														<div class="post_img">
															<a href="#" ><img alt="main_image" src="sampol.jpg" /></a>
														</div>
														<div class="catpost_right">
															<div class="title_post">
																<a href="../../p2211/index.html">
																妖怪ウォッチ カード付折りたたみウォレット２														</a>
															</div>
															<div class="post-new">
																<img alt="youkai_new_show_important" src="../../wp-content/themes/Avada/images/img/new_icon.png">
															</div>
															<div class="catlower">
																<div class="post-date-youkai">
																	<p class="single-line-meta">
																	5月19日より順次登場予定														</p>
																</div>
																<div class="post-price">
																</div>
																<div class="post-publisher">
																株式会社バンプレスト													</div>
															</div>
														</div>
													</div>
													
												</div>
												<div style="clear:both;"></div>
												<div class="meta-info"></div>
												
											</div>
										</div>
									</div> -->
									
									<div class="goods_nav">
										<?php if ($_smarty_tpl->tpl_vars['numIndex']->value<=4) {?>
											<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['numIndex']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['numIndex']->value)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
												<?php if ($_smarty_tpl->tpl_vars['indexPage']->value==$_smarty_tpl->tpl_vars['var']->value) {?>
													<span class="page-numbers current"><?php echo $_smarty_tpl->tpl_vars['indexPage']->value;?>
</span>
												<?php } else { ?>
													<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['categoryLink']->value;
echo $_smarty_tpl->tpl_vars['var']->value;?>
.html"><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</a>
												<?php }?>
											<?php }} ?>
										<?php } else { ?>
											<?php if ($_smarty_tpl->tpl_vars['indexPage']->value>1) {?>
												<a class="prev page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['categoryLink']->value;
echo $_smarty_tpl->tpl_vars['indexPage']->value-1;?>
.html">« 前へ</a>
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['indexPage']->value>=5) {?>
												<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['indexLink']->value;?>
1.html">1</a>
												<span class="page-numbers dots">…</span>
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['indexPage']->value>=5) {?>
												<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) min(ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['numIndex']->value+1 - ($_smarty_tpl->tpl_vars['indexPage']->value-2) : $_smarty_tpl->tpl_vars['indexPage']->value-2-($_smarty_tpl->tpl_vars['numIndex']->value)+1)/abs($_smarty_tpl->tpl_vars['var']->step)),5);
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = $_smarty_tpl->tpl_vars['indexPage']->value-2, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
													<?php if ($_smarty_tpl->tpl_vars['indexPage']->value==$_smarty_tpl->tpl_vars['var']->value) {?>
														<span class="page-numbers current"><?php echo $_smarty_tpl->tpl_vars['indexPage']->value;?>
</span>
													<?php } elseif ($_smarty_tpl->tpl_vars['var']->value!=$_smarty_tpl->tpl_vars['numIndex']->value) {?>
														<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['categoryLink']->value;
echo $_smarty_tpl->tpl_vars['var']->value;?>
.html"><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</a>
													<?php }?>
												<?php }} ?>
											<?php } elseif ($_smarty_tpl->tpl_vars['indexPage']->value<=($_smarty_tpl->tpl_vars['numIndex']->value*0.70)) {?>
												<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) min(ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['numIndex']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['numIndex']->value)+1)/abs($_smarty_tpl->tpl_vars['var']->step)),3+($_smarty_tpl->tpl_vars['indexPage']->value-1));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
													<?php if ($_smarty_tpl->tpl_vars['indexPage']->value==$_smarty_tpl->tpl_vars['var']->value) {?>
														<span class="page-numbers current"><?php echo $_smarty_tpl->tpl_vars['indexPage']->value;?>
</span>
													<?php } elseif ($_smarty_tpl->tpl_vars['var']->value!=$_smarty_tpl->tpl_vars['numIndex']->value) {?>
														<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['categoryLink']->value;
echo $_smarty_tpl->tpl_vars['var']->value;?>
.html"><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</a>
													<?php }?>
												<?php }} ?>
											<?php } else { ?>
												<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['numIndex']->value+1 - ($_smarty_tpl->tpl_vars['indexPage']->value) : $_smarty_tpl->tpl_vars['indexPage']->value-($_smarty_tpl->tpl_vars['numIndex']->value)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = $_smarty_tpl->tpl_vars['indexPage']->value, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
													<?php if ($_smarty_tpl->tpl_vars['indexPage']->value==$_smarty_tpl->tpl_vars['var']->value) {?>
														<span class="page-numbers current"><?php echo $_smarty_tpl->tpl_vars['indexPage']->value;?>
</span>
													<?php } elseif ($_smarty_tpl->tpl_vars['var']->value!=$_smarty_tpl->tpl_vars['numIndex']->value) {?>
														<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['categoryLink']->value;
echo $_smarty_tpl->tpl_vars['var']->value;?>
.html"><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</a>
													<?php }?>
												<?php }} ?>
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['indexPage']->value<=($_smarty_tpl->tpl_vars['numIndex']->value*0.70)) {?>
												<span class="page-numbers dots">…</span>
											<?php }?>
												
											<?php if ($_smarty_tpl->tpl_vars['indexPage']->value!=$_smarty_tpl->tpl_vars['numIndex']->value) {?>
												<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['categoryLink']->value;
echo $_smarty_tpl->tpl_vars['numIndex']->value;?>
.html"><?php echo $_smarty_tpl->tpl_vars['numIndex']->value;?>
</a>
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['indexPage']->value!=$_smarty_tpl->tpl_vars['numIndex']->value) {?>
												<a class="next page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['categoryLink']->value;
echo $_smarty_tpl->tpl_vars['indexPage']->value+1;?>
.html">次へ »</a>
											<?php }?>
										<?php }?>
										<!-- <span class='page-numbers current'>1</span>
										<a class='page-numbers' href='#'>2</a>
										<a class='page-numbers' href='#'>3</a>
										<span class="page-numbers dots">&hellip;</span>
										<a class='page-numbers' href='#'>15</a>
										<a class="next page-numbers" href="#">次へ &raquo;</a> -->
									</div>
								</div>
								<br />
							</div>
						</div>
					</div>
					<!-- SIDE BAR -->
					<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

					
				</div>
			</div>
			<!-- FOOTER -->
			<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
<?php }
}
?>