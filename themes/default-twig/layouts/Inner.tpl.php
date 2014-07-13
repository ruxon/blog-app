<?php if (!defined('RUXON_VALID')) die("Access Denied!");?>
<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo $this->getMetaKeywords()?>" />
    <meta name="description" content="<?php echo $this->getMetaDescription()?>" />
    <title><?php echo $this->getMetaTitle()?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <?php echo Core::app()->client()->renderAll();?>
    
    <link rel="stylesheet" type="text/css" href="<?php echo $this->getUrl()?>/css/common.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $this->getUrl()?>/css/custom.css" />
    <!--[if lte IE 6]>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->getUrl()?>/css/common-ie6.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->getUrl()?>/css/custom-ie6.css" />
    <![endif]-->
    
    <!--[if lt IE 9]> 
	 	<script type="text/javascript" src="<?php echo $this->getUrl()?>/js/html5.js"></script> 
	<![endif]-->
</head>
<body>
    <div id="panel">
        <?php $this->showPanel();?>
    </div>
    <div id="wrapper">
        <div id="central-box">
            
            <!-- header start -->
            <header id="main">
                <nav id="top-nav">
                    <ul>
                        <li><a href="/about">О нас</a></li>
                        <li><a href="/dostavka-i-oplata">Доставка и оплата</a></li>
                        <li><a href="/kontakty">Контакты</a></li>
                    </ul>
                </nav>
                
                <a href="/" class="logo">
                    <?php echo Core::app()->getSite()->getName()?>
                </a>
                <div id="cart_auth_box">
                    <ul>
                        <?php if (Core::app()->checkInstalledModule('Shop')):?>
                            <li class="cart_icon"><?php echo $this->widget('Shop', 'CartBlock')?></li>
                        <?php endif;?>
                            
                        <li class="user_icon">
                            <?php echo $this->widget('Users', 'Auth')?>
                        </li>
                    </ul>
                </div>
                <br class="clear" />
            </header>
            <!-- header end -->
            
            <!-- navigation start -->
            <nav id="header_menu_box">
                <?php echo $this->widget('Structure', 'Menu', array('Level' => 1))?>
            </nav>
            <!-- navigation end -->

            
            <!-- content start -->
            <div id="content" class="inner-page">
                <aside class="left-col">
                    
                    <?php if (Core::app()->checkInstalledModule('Search')):?>
                        <?php echo $this->widget('Search', 'SearchForm', 
                            array('ModuleAlias' => 'Catalogue', 'ResultPageUrl' => '/search')
                        )?>
                    <?php endif;?>
                    
                    <?php echo $this->widget('Structure', 'Menu', array(
                        'Level' => 2, 
                        'ListClass' => 'cat-menu',
                        'Title' => Core::app()->getPage()->getParentId() ? Core::app()->getPage()->getParent()->getHeader() : Core::app()->getPage()->getHeader()
                    ))?>
                    
                    <?php if (Core::app()->checkInstalledModule('Catalogue')):?>
                        <?php echo $this->widget('Catalogue', 'Categories', 
                            array('Title' => 'Категории', 'PageUrl' => '/catalogue')
                        )?>
                    <?php endif;?>
                    
                    <?php if (Core::app()->checkInstalledModule('News')):?>
                        <?php $this->widget('News', 'LastNews');?>
                    <?php endif;?>
                    
                </aside>
                
                <div class="center-col">

                    <?php echo $this->getContent()?>

                </div>
                <br class="clear" />
                
            </div>
            <!-- content end -->
            
            <footer>
                <div>© <?php echo date("Y")?> <?php echo Core::app()->getSite()->getName()?>. Все права защищены.</div>
                <nav id="bottom-nav">
                    <ul>
                        <li><a href="/about">О нас</a></li>
                        <li><a href="/dostavka-i-oplata">Доставка и оплата</a></li>
                        <li><a href="/kontakty">Контакты</a></li>
                        <li><a href="/map">Карта сайта</a></li>
                        <li><a href="/sitemap.xml">Google.Sitemap</a></li>
                    </ul>
                </nav>
                <br class="clear" />
            </footer>
            
        </div>
    </div>
</body>
</html>