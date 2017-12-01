<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?=$this->title?></title>
        <link rel="stylesheet" href="../../../assets/uikit-2.27.4/css/uikit.css">
        <link rel="stylesheet" href="../../../assets/uikit-2.27.4/css/components/form-password.css">
        <script src="../../../assets/jquery-3.2.1/jquery-3.2.1.js"></script>
        <script src="../../../assets/uikit-2.27.4/js/uikit.js"></script>
        <script src="../../../assets/uikit-2.27.4/js/components/pagination.min.js"></script>
        <?php if(!empty($this->js)):?><script src="<?php echo($this->js[0]); ?>"></script><?php endif;?>
        
    </head>
    <body>
        <header>
            <?php if(isset($tplName['header'])) include $this->basePath.$tplName['header'].'.php';?>
        </header>
        <nav class="uk-navbar" data-uk-sticky>
            <?php if(isset($tplName['nav'])) include $this->basePath.$tplName['nav'].'.php';?>
        </nav>
        <div class="uk-grid uk-margin-right" data-uk-grid-margin>
            <?php if(isset($tplName['sidenav'])) include $this->basePath.$tplName['sidenav'].'.php';?>
            
            <?php if(isset($tplName['section'])) include $this->basePath.$tplName['section'].'.php';?>
        </div>

        
        <footer>
            <?php if(isset($tplName['footer'])) include $this->basePath.$tplName['footer'].'.php';?>
        </footer>
    </body>
</html>