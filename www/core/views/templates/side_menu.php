    <div class="uk-width-1-4 uk-margin-top">
	<div class="uk-panel uk-panel-box">
            <h3 class="uk-panel-title">
		<div class="uk-grid">
                    <div class="uk-width-1-3">
			<figure class="uk-overlay uk-overlay-hover">
                            <img class="uk-border-circle" src="../assets/images/Автор3.png" alt="">
			</figure>
                    </div>
                    <div class="uk-width-2-3">
			<h2 class="uk-h3"><a href="#" data-uk-tooltip="{pos:'bottom'}" title="На ленту">Пользователь</a></h2>
			<p>
                            <a href="#"><button class="uk-icon-user uk-text-primary uk-text-bold" data-uk-tooltip="{pos:'bottom'}" title="Друзей"> 24</button></a>
                            <a href="#"><button class="uk-icon-clone uk-text-warning uk-text-bold" data-uk-tooltip="{pos:'bottom'}" title="Статей"> 24</button></a>
                            <a href="#"><button class="uk-icon-comments uk-text-primary uk-text-bold" data-uk-tooltip="{pos:'bottom'}" title="Комментариев"> 63</button></a>
                            <a href="#"><button class="uk-icon-usd uk-text-success uk-text-bold" data-uk-tooltip="{pos:'bottom'}" title="Баланс"> 3645</button></a>
                            <a href="#"><button class="uk-icon-envelope uk-text-primary uk-text-bold" data-uk-tooltip="{pos:'bottom'}" title="Сообщения"> 0</button></a>
			</p>
                    </div>
		</div>
            </h3>
            <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
                <li class="uk-nav-header">Управление счетами</li>
		<li <?php if(!empty($urlSegment[1]) and $urlSegment[1]=='allposts'):?>class="uk-active"<?php endif;?>><a href="/user/accounts">Мои счета</a></li>
		<li><a href="/user/bookmarks">Мои закладки</a></li>
		<li><a href="/user/portfolio">Мои портфели</a></li>
		<li><a href="/user/addAcc">Добавить счет</a></li>
		<li><a href="/user/addPort">Добавить портфель</a></li>
		<li class="uk-nav-divider"></li>
		<li class="uk-nav-header">Сообщество</li>
		<li><a href="/user/investors">Инвесторы</a></li>
		<li><a href="/user/traders">Трейдеры</a></li>
		<li><a href="/user/friendAcc">Счета друзей</a></li>
		<li><a href="/user/friendPort">Портфели друзей</a></li>
		<li class="uk-nav-divider"></li>
		<li><a href="/user/invite">Пригласить друзей</a></li>
		<li><a href="/info/info">Помощь</a></li>
                <li class="uk-nav-divider"></li>
		<li class="uk-nav-header">Соцсети</li>
		<li><a href="#"><i class="uk-icon-facebook-square" style="color: #3B5998"></i> Facebook</a></li>
		<li><a href="#"><i type=="button" class="uk-icon-google-plus-square" style="color: #D34836"></i> Google+</a></li>
		<li><a href="#"><i type=="button" class="uk-icon-twitter-square" style="color: #00acee"></i> Twitter</a></li>
		<li><a href="#"><i type=="button" class="uk-icon-odnoklassniki-square" style="color: #F6881F"></i> Одноклассники</a></li>
		<li><a href="#"><i type=="button" class="uk-icon-vk" style="color: #597da3"></i> ВКонтакте</a></li>
		<li class="uk-nav-divider"></li>
		<li class="uk-nav-header">Реклама</li>
		<li><img class="uk-border-rounded uk-margin-left uk-margin-right" src="../assets/images/Реклама.jpg" alt=""></li>
		<li class="uk-nav-divider"></li>
		<li><a href="#scroll" data-uk-smooth-scroll data-uk-tooltip="{pos:'bottom'}" title="Наверх"><i class="uk-icon-angle-double-up uk-margin-large-right"></i>Наверх</a></li>
            </ul>
	</div>
    </div>