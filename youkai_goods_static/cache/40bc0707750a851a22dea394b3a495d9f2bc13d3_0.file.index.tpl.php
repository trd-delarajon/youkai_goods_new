<?php /* Smarty version 3.1.23, created on 2015-05-27 05:34:54
         compiled from "templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:164395726055653b5e205291_11960075%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40bc0707750a851a22dea394b3a495d9f2bc13d3' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1432523296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164395726055653b5e205291_11960075',
  'variables' => 
  array (
    'numIndex' => 0,
    'indexPage' => 0,
    'var' => 0,
    'indexLink' => 0,
    'csvData' => 0,
    'singleLink' => 0,
    'img_path_array' => 0,
    'newIcon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.23',
  'unifunc' => 'content_55653b5e2df5d6_30549690',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55653b5e2df5d6_30549690')) {
function content_55653b5e2df5d6_30549690 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '164395726055653b5e205291_11960075';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<style>
			#post-goods{
			text-align: center;
			}
			.post_list{
			float: left;
			width: 165px;
			height: 222px;
			display: inline-block;
			position: relative;
			color: #003AFF;
			font-size: 14px;
			font-weight: bold;
			}
			div.post_img {
			width: 100px;
			height: 100px;
			margin-left: auto;
			margin-right: auto;
			border: 2px solid #cccccc;
			}

			.post_img{
			width: 100px;
			height: 100px;
			margin: 0 auto;
			}
</style>

</head>
<body class="home blog">
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
										<?php if ($_smarty_tpl->tpl_vars['numIndex']->value<=4) {?>
											<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? $_smarty_tpl->tpl_vars['numIndex']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['numIndex']->value)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
												<?php if ($_smarty_tpl->tpl_vars['indexPage']->value==$_smarty_tpl->tpl_vars['var']->value) {?>
													<span class="page-numbers current"><?php echo $_smarty_tpl->tpl_vars['indexPage']->value;?>
</span>
												<?php } else { ?>
													<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['indexLink']->value;
echo $_smarty_tpl->tpl_vars['var']->value;?>
.html"><?php echo $_smarty_tpl->tpl_vars['var']->value;?>
</a>
												<?php }?>
											<?php }} ?>
										<?php } else { ?>
											<?php if ($_smarty_tpl->tpl_vars['indexPage']->value>1) {?>
												<a class="prev page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['indexLink']->value;
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
														<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['indexLink']->value;
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
														<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['indexLink']->value;
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
														<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['indexLink']->value;
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
												<a class="page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['indexLink']->value;
echo $_smarty_tpl->tpl_vars['numIndex']->value;?>
.html"><?php echo $_smarty_tpl->tpl_vars['numIndex']->value;?>
</a>
											<?php }?>

											<?php if ($_smarty_tpl->tpl_vars['indexPage']->value!=$_smarty_tpl->tpl_vars['numIndex']->value) {?>
												<a class="next page-numbers" href="<?php echo $_smarty_tpl->tpl_vars['indexLink']->value;
echo $_smarty_tpl->tpl_vars['indexPage']->value+1;?>
.html">次へ »</a>
											<?php }?>		
										<?php }?>
									</div>	
										<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? count($_smarty_tpl->tpl_vars['csvData']->value)-1+1 - (0) : 0-(count($_smarty_tpl->tpl_vars['csvData']->value)-1)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
											<div class="post_list">
												<div class="post_img">
													<a href="<?php echo $_smarty_tpl->tpl_vars['singleLink']->value[$_smarty_tpl->tpl_vars['var']->value];?>
"><img alt="main_image" src="<?php echo $_smarty_tpl->tpl_vars['img_path_array']->value[$_smarty_tpl->tpl_vars['var']->value][0];?>
"></a>
												</div>
												<div class="post_det">
													<?php if ($_smarty_tpl->tpl_vars['csvData']->value[$_smarty_tpl->tpl_vars['var']->value][2]=='1') {?>
														<div class="post-new">
															<img alt="youkai_new_show_important" src="<?php echo $_smarty_tpl->tpl_vars['newIcon']->value;?>
">	
														</div>
													<?php } else { ?>
														<div class="post-new">
														</div>
													<?php }?>
													<div class="title_post">
														<a href="<?php echo $_smarty_tpl->tpl_vars['singleLink']->value[$_smarty_tpl->tpl_vars['var']->value];?>
"><?php echo $_smarty_tpl->tpl_vars['csvData']->value[$_smarty_tpl->tpl_vars['var']->value][3];?>
</a>
													</div>
												</div>
											</div>
										<?php }} ?>
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