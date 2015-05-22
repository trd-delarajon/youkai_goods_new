{include file="header.tpl"}
{literal}
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
{/literal}
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

										{if $numIndex < 3}
											{for $var=1 to $numIndex}
												{if $indexPage == $var}
													<span class="page-numbers current">{$indexPage}</span>
												{else}
													<a class="page-numbers" href="{$indexLink}{$var}.html">{$var}</a>
												{/if}
											{/for}
										{else}
											{if $indexPage > 1}
												<a class="prev page-numbers" href="{$indexLink}{$indexPage-1}.html">« 前へ</a>
											{/if}

											{if $indexPage >= 5}
												<a class="page-numbers" href="{$indexLink}1.html">1</a>
												<span class="page-numbers dots">…</span>
											{/if}

											{if $indexPage >= 5}
												{for $var=$indexPage-2 to $numIndex max=5}
													{if $indexPage == $var}
														<span class="page-numbers current">{$indexPage}</span>
													{elseif $var != $numIndex}
														<a class="page-numbers" href="{$indexLink}{$var}.html">{$var}</a>
													{/if}
												{/for}
											{elseif $indexPage <= ($numIndex*0.70)}
												{for $var=1 to $numIndex max=3+($indexPage-1)}
													{if $indexPage == $var}
														<span class="page-numbers current">{$indexPage}</span>
													{elseif $var != $numIndex}
														<a class="page-numbers" href="{$indexLink}{$var}.html">{$var}</a>
													{/if}
												{/for}
											{else}
												{for $var=$indexPage to $numIndex}
													{if $indexPage == $var}
														<span class="page-numbers current">{$indexPage}</span>
													{elseif $var != $numIndex}
														<a class="page-numbers" href="{$indexLink}{$var}.html">{$var}</a>
													{/if}
												{/for}
											{/if}

											{if $indexPage <= ($numIndex*0.72)}
												<span class="page-numbers dots">…</span>
											{/if}
											
											{if $indexPage != $numIndex}
												<a class="page-numbers" href="{$indexLink}{$indexPage}.html">{$indexPage}</a>
											{/if}
											{if $indexPage != $numIndex}
												<a class="next page-numbers" href="{$indexLink}{$indexPage+1}.html">次へ »</a>
											{/if}		
										{/if}
									</div>
										{for $var=0 to count($csvData)-1}
											<div class="post_list">
												<div class="post_img">
													<a href="{$singleLink[$var]}"><img alt="main_image" src="{$img_path_array[$var][0]}"></a>
												</div>
												<div class="post_det">
													{if $csvData[$var][2] == '1'}
														<div class="post-new">
															<img alt="youkai_new_show_important" src="{$newIcon}">	
														</div>
													{else}
														<div class="post-new">
														</div>
													{/if}
													<div class="title_post">
														<a href="{$singleLink[$var]}">{$csvData[$var][3]}</a>
													</div>
												</div>
											</div>
										{/for}
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