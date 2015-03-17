   
    	<div class="page-header">
    		<h1><small>แนะนำหนังสือใหม่</small></h1>
        </div>
        
        <div class="price-table clear col3">
         <?php foreach ($news as $value){
         	//'dataProvider'=>$model->searchNewBooks(),
		?>
    	<dl class="blue plan">
            <dt><small><?php echo $value['name']; ?></small></dt>
            <dd class="price">
            <img src="/bls_project1/images/book_img/<?php echo $value['picture']; ?>" width="270px;" height="360px;" >
            </dd>
            <dd><strong>test</strong></dd>
            <dd>วันที่พิมพ์ <strong><?php echo $value['create_date']; ?></strong></dd>
            <dd>ชื่อผู้แต่ง <strong><?php echo $value['alias']; ?></strong></dd>
            <dd><a class="btn btn-success" href="/bls_project1/index.php?r=site/detailbooks&id=<?php echo $value['id'];?>"><i class="icon-ok icon-white"></i>  อ่านต่อ</a></dd>
        </dl>   
        <?php } ?> 
        </div>
        
        
          <h3 class="header">แนะนำหนังสือใหม่
        	<span class="header-line"></span> 
        </h3>
        <center>
        <div class="row-fluid">
         <?php foreach ($news as $value){ ?>        
        <div class="span3">
              
            <div class="colored_banner thumb-content-dark">
            <img src="/bls_project1/images/book_img/<?php echo $value['picture']; ?>" width="260" height="180" alt="Me" />
            <h3>
            	<?php echo $value['name']; ?>
            </h3>
            <p>ชื่อผู้แต่ง <strong><?php echo $value['alias']; ?></p>
            <dd><a class="btn btn-success" href="/bls_project1/index.php?r=site/detailbooks&id=<?php echo $value['id'];?>"><i class="icon-ok icon-white"></i>  อ่านต่อ</a></dd>
            </div>
           
        </div>
        <?php } ?>
          </div>
          </center>