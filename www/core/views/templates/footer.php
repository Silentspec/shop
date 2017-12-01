
    <div class="uk-block uk-block-secondary uk-contrast uk-margin-top" data-uk-sticky="{bottom:-200}">
	<div class="uk-grid uk-grid-match uk-grid-divider">
            <div class="uk-width-1-3">
                <div class="uk-panel uk-margin-left">
                    <style>
                        #facebook:hover {
                         color: #3B5998; /* Цвет ссылки */ 
                        }
                        #google:hover {
                         color: #D34836; /* Цвет ссылки */ 
                        }
                        #twitter:hover {
                         color: #00acee; /* Цвет ссылки */ 
                        }
                        #ok:hover {
                         color: #F6881F; /* Цвет ссылки */ 
                        }
                        #youtube:hover {
                         color: #cc181e; /* Цвет ссылки */ 
                        }
                        #vk:hover {
                         color: #597da3; /* Цвет ссылки */ 
                        }
                    </style>
                    <p>
                        <a href="http://facebook.com"><i type="button" class="uk-icon-facebook uk-icon-medium uk-margin-right" id="facebook" target="_blank"></i></a>
                        <a href="http://plus.google.com"><i type="button" class="uk-icon-google-plus uk-icon-medium uk-margin-right" id="google" target="_blank"></i></a>
                        <a href="http://twitter.com"><i type="button" class="uk-icon-twitter uk-icon-medium uk-margin-right" id="twitter" target="_blank"></i></a>
                        <a href="http://ok.ru"><i type="button" class="uk-icon-odnoklassniki uk-icon-medium uk-margin-right" id="ok" target="_blank"></i></a>
                        <a href="http://youtube.com"> <i type="button" class="uk-icon-youtube-play uk-icon-medium uk-margin-right" id="youtube" target="_blank"></i></a> 
                        <a href="http://vk.com"><i type="button" class="uk-icon-vk uk-icon-medium uk-margin-right" id="vk" target="_blank"></i></a>
                    </p><br>
                    <p>Silentspec Copyright &copy; <?=date('Y');?></p>
                    <p><a href="mailto:Silentspec84@gmail.com">Задавайте вопросы по электронной почте</a></p>
                </div>
            </div>
            <div class="uk-width-2-3">
                <div class="uk-panel">
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <p><span class="uk-text-bold">Информация о сайте:</span></p>
                            <p>Это учебный проект, созданный мной для практики программирования веб-сайтов.</p>
                        </div>
                        <div class="uk-width-1-3">
                            <p><span class="uk-text-bold">Управление</span></p>
                            <?php if(!isset($_SESSION['user']['id'])):?><p><a><span class="uk-text-bold" data-uk-modal="{target:'#modalEnter',center:true}">Войти</span></a></p><?php endif; ?>
                            <?php if(!isset($_SESSION['user']['id'])):?><p><a><span class="uk-text-bold" data-uk-modal="{target:'#modalReg',center:true}">Регистрация</span></a></p><?php endif; ?>
                            <?php if(isset($_SESSION['user']['id']) and $_SESSION['user']['id']!=NULL):?><p><a href="/settings"><span class="uk-text-bold">Настройки сайта</span></a></p><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>