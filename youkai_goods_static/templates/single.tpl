{include file="header.tpl"}
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
										<div class="left_con_img"><a class="fancybox-thumb" style="display:block!important;" rel="fancybox-thumb" href="{$img_path_array[$indexItem][0]}"><img width="250" height="250" src="{$img_path_array[$indexItem][0]}"></a></div>
										<div class="right_con">
											{if $csvData[2] == '1'}
												<div class="post-new">
													<img alt="youkai_new_show_important" src="{$newIcon}">	
												</div>
											{else}
												<div class="post-new">
												</div>
											{/if}
											<div class="Post_title"><h1 class="entry-title">{$csvData[3]}</h1></div>
										</div>
									</div>
									<div class="small_con_img">
										{if count($img_path_array[$indexItem]) != 1}
											<ul class="S_img_con">
												{for $var=0 to count($img_path_array[$indexItem])-1}
													{if $var != 0}
													<li class="s_size S_img1">
														<div class="img-container">
															<a class="fancybox-thumb" rel="fancybox-thumb" href="{$img_path_array[$indexItem][$var]}"><img width="100" height="100" src="{$img_path_array[$indexItem][$var]}"></a>
														</div>
													</li>
													{/if}
												{/for}
											</ul>
										{/if}
									</div>
									<div class="text_con">
										<div class="con_txtone">
											<div class="date_con">
												<span>{$csvData[6]}</span>
											</div>
											<div class="text_content">
												{if $csvData[4] != "null"}
													<p>{$csvData[4]}</p>
													<p>&nbsp;</p>
												{/if}
												{for $var=0 to count($prod_desc_array[$indexItem])-1}
													<p>{$prod_desc_array[$indexItem][$var]}</p>
												{/for}
												{if $external_links_array[$indexItem][0] != "null"}
													<p>&nbsp;</p>
													{for $var=0 to count($external_links_array[$indexItem])-1}
														<address>
															<strong>
																<a href="{$external_links_array[$indexItem][$var]}" target="_blank"><font>{$external_links_label_array[$indexItem][$var]}</font></a>
															</strong>
														</address>
														{if $var != count($external_links_array[$indexItem])-1}
															<address>&nbsp;</address>
														{/if}
													{/for}
												{/if}
											</div>
											<div class="text_price">
												■価格:{if $csvData[7] != "null"}{$csvData[7]}{/if}
											</div>
										</div>
										<div class="con_texttwo_img">
											<div class="headbckgrnd">このグッズに関するお問い合わせ先</div>
											<div class="textcon_two">
												{$prodInq[$indexItem]};
											</div>
										</div>
									</div>
									<hr class="bord_top">
									<div class="related_prduct_con">
										<div class="Product_name">
											<img class="img" src="../../wp-content/themes/Avada/images/img/home/menu_hover12.png">
										</div>
										<div class="postdet_block">

											{for $var = 0 to count($category)-1}
												{if $csvData[3] != $category[$itemIndex[$var]][3]}
													<div class="postdet_list">
														<div class="postdet_img">
															<a href="{$singleLink[$itemIndex[$var]]}"><img alt="main_image" src="{$img_path_array[$itemIndex[$var]][0]}"></a>
														</div>
														<div class="postdet_det">
															<div class="titledet_post">
																<a href="{$singleLink[$itemIndex[$var]]}">{$category[$itemIndex[$var]][3]}</a>
															</div>
														</div>
													</div>
												{/if}
											{/for}
											<!-- <div class="postdet_list">
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
											</div> -->
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
					{include file="sidebar.tpl"}
					{include file="footer.tpl"}