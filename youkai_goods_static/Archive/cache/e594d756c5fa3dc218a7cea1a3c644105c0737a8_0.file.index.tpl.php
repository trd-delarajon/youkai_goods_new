<?php /* Smarty version 3.1.23, created on 2015-05-16 00:36:42
         compiled from "templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1013658484555674fa40fdc9_37575748%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e594d756c5fa3dc218a7cea1a3c644105c0737a8' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1431729361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1013658484555674fa40fdc9_37575748',
  'variables' => 
  array (
    'csvarr' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.23',
  'unifunc' => 'content_555674fa55a6d5_57469688',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_555674fa55a6d5_57469688')) {
function content_555674fa55a6d5_57469688 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '1013658484555674fa40fdc9_37575748';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

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
										<span class="page-numbers current">1</span>
										<a class="page-numbers" href="http://youkai-world.com/goods/page/2/">2</a>
										<a class="page-numbers" href="http://youkai-world.com/goods/page/3/">3</a>
										<span class="page-numbers dots">…</span>
										<a class="page-numbers" href="http://youkai-world.com/goods/page/11/">11</a>
										<a class="next page-numbers" href="http://youkai-world.com/goods/page/2/">次へ »</a>	
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