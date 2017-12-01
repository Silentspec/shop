            <a class="uk-navbar-brand uk-hidden-medium" href="/main"><span style="color: rgba(78,78,78,0.8)">Учебный </span><span style="color: rgba(206,60,70,0.8)">Блог</span></a>
            <ul class="uk-navbar-nav uk-navbar-left">
                <li <?php if(core\libs\Url::getSegment(0)=='main'):?>class="uk-active"<?php endif; ?>>
                    <a href="/main"><span class="uk-text-bold"><i class="uk-icon-small uk-icon-home uk-margin-right"></i>Главная</span></a></li>
		<?php if(isset($_SESSION['user']['id'])):?>
                <li class="uk-parent<?php if(core\libs\Url::getSegment(0)=='monitor' OR 
                                             core\libs\Url::getSegment(0)=='signals' OR 
                                             core\libs\Url::getSegment(0)=='copier' OR
                                             core\libs\Url::getSegment(0)=='instr'):?> uk-active<?php endif;?>" data-uk-dropdown>
                    <a href="/admin">
                    <span class="uk-text-bold"><i class="uk-icon-small uk-icon-cog uk-margin-right"></i>Настройки</span>
                    </a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li class="uk-text-bold"><a href="/admin">Админка</a></li>
                            <li class="uk-text-bold"><a href="/admin/posts">Посты</a></li>
                            <li class="uk-text-bold"><a href="/admin/users">Пользователи</a></li>
                            <li class="uk-text-bold"><a href="/admin/instr">Инструменты</a></li>
                        </ul>
                    </div>
                </li>
                <?php endif;?>
		<?php if(isset($_SESSION['user']['id'])):?>
                <li class="uk-parent<?php if(core\libs\Url::getSegment(0)=='user' OR 
                                             core\libs\Url::getSegment(0)=='users' OR 
                                             core\libs\Url::getSegment(0)=='blogs' OR
                                             core\libs\Url::getSegment(0)=='blogparser'):?> uk-active<?php endif;?>" data-uk-dropdown>
                    <a href="/admin">
                    <span class="uk-text-bold"><i class="uk-icon-small uk-icon-users uk-margin-right"></i>Сообщество</span>
                    </a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li class="uk-text-bold uk-hidden"><a href="">Лента</a></li>
                            <li class="uk-text-bold uk-hidden"><a href="">Пользователи</a></li>
                            <li class="uk-text-bold uk-hidden"><a href="">Блоги пользователей</a></li>
                            <li class="uk-text-bold uk-hidden"><a href="">В сети</a></li>
                            <li class="uk-text-bold"><a href="http://forum.tradelikeapro.ru/" target="_blank">Форум</a></li>
                            <li class="uk-text-bold uk-hidden"><a href="">Чат</a></li>
                        </ul>
                    </div>
                </li>
                <?php endif;?>
		<li class="uk-parent<?php if($urlSegment[0]=='info'):?> uk-active<?php endif; ?>" data-uk-dropdown>
                    <a href="/info">
			<span class="uk-text-bold"><i class="uk-icon-small uk-icon-info uk-margin-right"></i>О сайте</span>
                    </a>
                    <div class="uk-dropdown uk-dropdown-navbar">
			<ul class="uk-nav uk-nav-navbar">
                            <li class="uk-text-bold"><a href="/info">О сайте</a></li>
                            <li class="uk-text-bold"><a href="/info/news">Новости</a></li>
                            <li class="uk-nav-divider"></li>
                            <li class="uk-nav-header">Сервисы</li>
                            <li class="uk-text-bold"><a href="/info/monit">Пока нету</a></li>
                            <li class="uk-nav-divider"></li>
                            <li class="uk-nav-header">Документы</li>
                            <li class="uk-text-bold"><a href="/info/useterms">Условия использования</a></li>
                            <li class="uk-text-bold"><a href="/info/confid">Политика конфиденциальности</a></li>
                            <li class="uk-nav-divider"></li>
                            <li class="uk-text-bold"><a href="/info/reviews">Отзывы</a></li>
                            <li class="uk-text-bold"><a href="/info/contacts">Контакты</a></li>
                        </ul>
		    </div>
		</li>
            </ul>
            <ul class="uk-navbar-nav uk-navbar-flip">
		<?php if(!isset($_SESSION['user']['id'])):?><li><a href="/main/login"><span class="uk-text-bold"><i class="uk-icon-small uk-icon-lock uk-margin-right"></i>Войти</span></a></li><?php endif; ?>
		<?php if(isset($_SESSION['user']['id']) and $_SESSION['user']['id']!=NULL):?><li><a href="/main/logout"><span class="uk-text-bold"><i class="uk-icon-small uk-icon-lock uk-margin-right"></i>Выйти</span></a></li><?php endif; ?>
                <?php if(!isset($_SESSION['user']['id'])):?><li><a href="/main/register"><span class="uk-text-bold"><i class="uk-icon-small uk-icon-tasks uk-margin-right"></i>Регистрация</span></a></li><?php endif; ?>
                <?php if(isset($_SESSION['user']['id']) and $_SESSION['user']['id']!=NULL):?><li class="uk-hidden"><a href="/settings"><span class="uk-text-bold"><i class="uk-icon-small uk-icon-user uk-margin-right"></i>Личные настройки</span></a></li><?php endif; ?>
                <?php if(isset($_SESSION['user']['id']) and \core\libs\Auth::canAccess('admin')):?><li><a href="/admin"><span class="uk-text-bold"><i class="uk-icon-small uk-icon-shield uk-margin-right"></i>Админка</span></a></li><?php endif; ?>
                <li><a><span class="uk-text-bold" data-uk-offcanvas="{target:'#offcanvas-search'}"><i class="uk-icon-small uk-icon-search uk-margin-right"></i>Поиск</span></a></li>
                <div id="offcanvas-search" class="uk-offcanvas" aria-hidden="true">
                    <div class="uk-offcanvas-bar" mode="push">
                        <form method="GET" action="/<?php if(!empty($urlSegment[0])):?><?=$urlSegment[0]?>/<?php endif;?><?php if(!empty($urlSegment[1])):?><?=$urlSegment[1]?>/<?php endif;?>" class="uk-search">
                            <input class="uk-search-field" type="search" placeholder="поиск...">
                        </form>
                    </div>
                </div>
            </ul>