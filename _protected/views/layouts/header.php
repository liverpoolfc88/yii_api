<?
use app\modules\admin\models\Province;
use app\modules\admin\models\District;
$menu = Province::find()->all();
//var_dump($childmenu); die();
?>
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@example.com</a>
            <i class="icofont-phone"></i> +1 5589 55488 55
        </div>
        <div class="social-links float-right">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="#" class="skype"><i class="icofont-skype"></i></a>
            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        </div>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header">
    <div class="container">

        <div class="logo float-left">
            <h1 class="text-light"><a href="index.html"><span>Mamba</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav class="nav-menu float-right d-none d-lg-block">
            <ul>
                <? foreach ($menu  as $key=>$m):?>
                    <li class="drop-down"><a href=""><?=$m->name?></a>
                        <ul>
                            <?$child = District::find()->where(['tbl_province_id'=>$m->id])->all()?>
                            <?
                            foreach ($child as $ch){?>
                            <li><a href="#"><?=$ch->name?></a></li>
                            <?}?>
<!--                            --><?// var_dump($child); die(); ?>
<!--                            --><?// $child = District::find()->where(['tbl_province_id'=>$m->id])->all(); ?>
<!--                            <li><a href="#">--><?//=$child->name?><!--</a></li>-->
                        </ul>
                    </li>
                <? endforeach;?>

            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->