<?php
/**
 * 添加QQ
**/
$mod='blank';
include("../include/common.php");
$title='添加QQ';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">导航按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">FTC工作室-MC云黑名单查询后台</a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="./"><span class="glyphicon glyphicon-user"></span> 平台首页</a>
          </li>
          <li class="active">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pushpin"></span> QQ管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="active"><a href="./add.php">添加QQ</a><li>
			  <li><a href="./list.php">QQ列表</a></li>
			  <li><a href="./search.php">搜索QQ</a><li>
            </ul>
          </li>
		  <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> 系统管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="./siteset.php">站点设置</a><li>
			  <li><a href="./passwd.php">修改密码</a></li>
            </ul>
          </li>
          <li><a href="./login.php?logout"><span class="glyphicon glyphicon-off"></span> 退出登陆</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php
if(isset($_POST['qq']) && isset($_POST['note'])){
$qq=daddslashes($_POST['qq']);
$level=daddslashes($_POST['level']);
$note=daddslashes($_POST['note']);
$row=$DB->get_row("SELECT * FROM black_list WHERE qq='{$qq}' limit 1");
if($row!='')exit("<script language='javascript'>alert('后台已存在该QQ用户！');history.go(-1);</script>");
	$sql="insert into `black_list` (`qq`,`date`,`level`,`note`) values ('".$qq."','".$date."','".$level."','".$note."')";
	$DB->query($sql);
exit("<script language='javascript'>alert('添加成功');window.location.href='list.php';</script>");
} ?>
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">添加QQ</h3></div>
        <div class="panel-body">
          <form action="./add.php" method="post" class="form-horizontal" role="form">
            <div class="input-group">
              <span class="input-group-addon">ＱＱ</span>
              <input type="text" name="qq" value="<?=@$_POST['qq']?>" class="form-control" placeholder="您的QQ" autocomplete="off" required/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">原因</span>
              <input type="text" name="note" value="<?=@$_POST['note']?>" class="form-control" placeholder="添加原因" autocomplete="no" required/>
            </div><br/>
            <div class="form-group">
              <div class="col-sm-12"><input type="submit" value="添加" class="btn btn-primary form-control"/></div>
            </div>
          </form>
        </div>
        <div class="panel-footer">
          <span class="glyphicon glyphicon-info-sign"></span> 欢迎加入FTC工作室-MC云黑团队
        </div>
      </div>
    </div>
  </div>