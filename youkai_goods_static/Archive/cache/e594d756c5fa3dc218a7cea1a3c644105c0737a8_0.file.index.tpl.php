<?php /* Smarty version 3.1.23, created on 2015-05-18 20:21:22
         compiled from "templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1495466107555a2da2abeec7_20124572%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e594d756c5fa3dc218a7cea1a3c644105c0737a8' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1431973280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1495466107555a2da2abeec7_20124572',
  'variables' => 
  array (
    'num_rec_per_page' => 0,
    'start_from' => 0,
    'csvarr' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.23',
  'unifunc' => 'content_555a2da2b61fb4_47664961',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_555a2da2b61fb4_47664961')) {
function content_555a2da2b61fb4_47664961 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '1495466107555a2da2abeec7_20124572';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<body class="home blog">
	<div id="wrapper">
		<div class="header-wrapper">
			<div class="header-v1">
				<header id="header">
					<div class="avada-row" style="margin-top:0px;margin-bottom:0px;">
						<div class="logo_v1">
							<div class="face">
								<img src="wp-content/themes/Avada/images/img/header/logo_face.png" alt="妖怪ウォッチ　グッズ" class="normal_logo" />
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
							<img src="wp-content/themes/Avada/images/img/header/logo_face.png" alt="妖怪ウォッチ　グッズ" class="normal_logo" />
						</div>
						<div class="goods_logo"><a href="../index.html" target="_blank"></a></div>
					</div>
					
					<nav id="nav" class="nav-holder">
						<ul id="nav" class="menu">
						</ul>
					</nav>
				</div>
			</header>
			<div id="sliders-container">
			</div>
			<div id="main" class="" >
				<div class="avada-row" style="">
					<div id="content" >
						<div id="posts-container">
							<!-- public posts  -->
							<div class="" id="public_site_container">
								<div id="public_site_block">	<div class="">
									<div class="">
										<div id="post-goods">
											<div class="post-content-container">
												<div class="goods_nav">
													<!-- <span class="page-numbers current">1</span>
													<a class="page-numbers" href="http://youkai-world.com/goods/page/2/">2</a>
													<a class="page-numbers" href="http://youkai-world.com/goods/page/3/">3</a>
													<span class="page-numbers dots">…</span>
													<a class="page-numbers" href="http://youkai-world.com/goods/page/11/">11</a>
													<a class="next page-numbers" href="http://youkai-world.com/goods/page/2/">次へ »</a> -->
												<?php echo $_smarty_tpl->tpl_vars['num_rec_per_page']->value;?>
	
												<?php echo $_smarty_tpl->tpl_vars['start_from']->value;?>
	


												</div>
												<?php
$_from = $_smarty_tpl->tpl_vars['csvarr']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$foreachItemSav = $_smarty_tpl->tpl_vars['value'];
?>
												
												<div class="post_list">
													<div class="post_img">
														<a href="<?php echo $_smarty_tpl->tpl_vars['value']->value[0];?>
"><img alt="main_image" src="<?php echo $_smarty_tpl->tpl_vars['value']->value[1];?>
"></a>
													</div>
													<div class="post_det">
														<?php if ($_smarty_tpl->tpl_vars['value']->value[2]=='') {?>
														<?php } else { ?>
														<div class="post-new">
															<img alt="youkai_new_show_important" src="<?php echo $_smarty_tpl->tpl_vars['value']->value[2];?>
">
														</div>
														<?php }?>
														<div class="title_post">
															<a href="<?php echo $_smarty_tpl->tpl_vars['value']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value[3];?>
</a>
														</div>
														
													</div>
												</div>
												<?php
$_smarty_tpl->tpl_vars['value'] = $foreachItemSav;
}
?>
												
											</div>
											<div style="clear:both;"></div>
											<div class="meta-info"></div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<br />
					</div>
				</div>
				<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
<?php }
}
?>