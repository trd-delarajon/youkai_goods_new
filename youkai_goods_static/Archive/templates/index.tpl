{include file="header.tpl"}
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

												{php}
															global $csvdata, $start_from, $num_rec_per_page, $page;

															$num_rec_per_page=4;
															if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
															 $start_from = ($page-1) * $num_rec_per_page; 

															$total_records =count($csvdata);

															$tpages = ceil($total_records / $num_rec_per_page);
															$adjacents  = 2;
															$reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;

															echo paginate_three($reload, $page, $tpages, $adjacents);
												

												echo '</div>';
												
												foreach(array_slice($csvdata,  $start_from, $num_rec_per_page)as $key => $value){
								
											echo '<div class="post_list">
													<div class="post_img">
														<a href="'.$value[0].'"><img alt="main_image" src="'.$value[1].'"></a>
													</div>

													<div class="post_det">';
													if($value[2]==""){

													}else{
													echo '	<div class="post-new">
																<img alt="youkai_new_show_important" src="'.$value[2].'">
															</div>';
													}		

												echo '	<div class="title_post">
															<a href="'.$value[0].'">'.$value[3].'</a>
														</div>
														
													</div>

												
												</div>';
												}
												{/php}
												
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