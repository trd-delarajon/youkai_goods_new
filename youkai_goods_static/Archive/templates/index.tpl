{include file="header.tpl"}
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

									{foreach $csvarr as $value}
								
										<div class="post_list">
											<div class="post_img">
												<a href="{$value.0}"><img alt="main_image" src="{$value.1}"></a>
											</div>
											<div class="post_det">
												{if $value.2 == ''}
											
												{else}
												<div class="post-new">
												<img alt="youkai_new_show_important" src="{$value.2}">
												</div>
												{/if}
												<div class="title_post">
													<a href="{$value.0}">{$value.3}</a>
												</div>
											
											</div>
										</div>

									{/foreach}

										
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
		{include file="sidebar.tpl"}
		{include file="footer.tpl"}