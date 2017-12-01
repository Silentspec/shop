    <div class="uk-width-medium-3-4 uk-margin-top">
        <hr>
	<ul class="uk-breadcrumb">
            <li><a href="/main">Главная</a></li>
            <li><a href="/post">Блог</a></li>
	</ul>
        <?php if(!empty($data['model'])):
            foreach($data['model'] as $post):?>
            <article class="uk-article uk-grid">
		<div class="uk-width-medium-1-3">
                    <figure class="uk-overlay uk-overlay-hover">
			<img class="uk-border-rounded uk-overlay-spin" width="900" height="300" src="<?=$post['preview']?>" alt="">
			<figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom uk-overlay-slide-bottom"><a href="/post/view/<?=$post['id']?>">Читать далее</a></figcaption>
                    </figure>
		</div>
                    <div class="uk-width-medium-2-3">
                        <div class="uk-width-medium-1-1">
                            <h1 class="uk-article-title">
                                <a href="/post/view/<?=$post['id']?>"><?=$post['title']?></a>
                            </h1>
                            <p class="uk-article-meta uk-margin-bottom" tid="cp_3">
                                Автор: <a href="/user/<?=$post['author_name']?>"><?=$post['author_name']?></a> 
                                Дата: <?=$post['pubdate']?></p>
                        </div>
			<p><?=$post['short_content']?></p>
                            <p>
				<a class="uk-button uk-button-primary" href="/post/view/<?=$post['id']?>">Читать далее</a>
                            </p>
                    </div>
                </article>
            <?php endforeach;?>
        <?php else:?>
             Нет постов
        <?php endif;?>
    </div>
    <ul class="uk-pagination uk-container-center">
        <li class="uk-active"><span>1</span></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
        <li><a href="">4</a></li>
    </ul>
<hr>