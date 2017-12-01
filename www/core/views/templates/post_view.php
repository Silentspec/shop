<div class="uk-width-3-4 uk-margin-top">
	<ul class="uk-breadcrumb">
            <li><a href="/main">Главная</a></li>
            <li><a href="/post">Блог</a></li>
            <li><a href="/post/view/<?php echo($data['model']['id']);?>"><?php echo($data['model']['title']);?></a></li>
	</ul>
            <article class="uk-article uk-grid uk-center">
                <div class="uk-width-3-4">
                    <h1 class="uk-article-title">
			<?=$data['model']['title']?>
                    </h1>
                    <p class="uk-article-meta uk-margin-bottom" tid="cp_3">
                        Автор: <a href="/<?=$data['model']['author_name']?>"><?php echo($data['model']['author_name']);?></a> 
                        Дата: <?=$data['model']['pubdate']?></p>
                        <p><img class="uk-border-rounded uk-overlay-spin" width="900" height="300" src="<?= $data['model']['preview']?>" alt="">
                        </p>
                        <p><?=$data['model']['content']?> 
                        </p>
                </div>			
            </article>
        <ul class="uk-pagination" data-uk-pagination="{items:100, itemsOnPage:10}"></ul>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59aff7728fa9a92b"></script>
    </div>