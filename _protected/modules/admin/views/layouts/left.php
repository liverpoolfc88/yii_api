<?
use yii\helpers\Url;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu tree" data-widget="tree"><li class="header"><span><span>Menu Yii2</span></span></li>

            <li><a href="<?=Url::to(['/user/index'])?>"><i class="fa fa-file-code-o"></i>  <span>users</span></a></li>



            <li class="treeview"><a href="#"><i class="fa fa-share"></i>  <span>Some tools</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                <ul class="treeview-menu">
                    <li><a href="/gii"><i class="fa fa-file-code-o"></i>  <span>Gii</span></a></li>
                    <li><a href="/debug"><i class="fa fa-dashboard"></i>  <span>Debug</span></a></li>
                    <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i>  <span>Level One</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i>  <span>Level Two</span></a></li>
                            <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i>  <span>Level Two</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i>  <span>Level Three</span></a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i>  <span>Level Three</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li></ul>

    </section>

</aside>
