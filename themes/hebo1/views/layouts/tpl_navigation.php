<section id="navigation-main">  
<div class="navbar">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                    		array('label'=>'หน้าหลัก <span class="caret"></span>', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"),
                    				'items'=>array(
                    						array('label'=>'หน้าหลัก  1- Nivoslider', 'url'=>array('/site/index')), 
                    						array('label'=>'หน้าหลัก 2 - Bootstrap carousal', 'url'=>array('/site/page', 'view'=>'home2')),
                    						array('label'=>'หน้าหลัก 3 - Piecemaker2', 'url'=>array('/site/page', 'view'=>'home3')),
                    						//array('label'=>'หน้าหลัก 4 - Static image', 'url'=>array('/site/page', 'view'=>'home4')),
                    						//array('label'=>'หน้าหลัก 5 - Without slider', 'url'=>array('/site/page', 'view'=>'home6')),
                    				)),
                    		
                    	array('label'=>'หมวดหมู่หนังสือ <span class="caret"></span>', 'url'=>array('/site/'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'วรรณกรรม/นวนิยาย', 'url'=>array('/site/literature')),
							array('label'=>'สุขภาพและความงาม', 'url'=>array('/healthAndBeauty/healthAndBeauty')),
							array('label'=>'ชีวประวัติ', 'url'=>array('/biography/biography')),
                        	array('label'=>'ท่องเที่ยว', 'url'=>array('/travel/travel')),
                        	array('label'=>'ดนตรี', 'url'=>array('/music/music')),
                        	array('label'=>'ทั่วไป', 'url'=>array('/general/general')),

                        			/* 'items'=>array(
                        					array('label'=>'การ์ตูน', 'url'=>array('/site/general')),//cartoon
                        					array('label'=>'ไดอารี่', 'url'=>array('/site/diary')),
                        			) 
                        			),*/
                        )),
                    	
                    	array('label'=>'แนะนำหนังสือใหม่', 'url'=>array('/site/indexnews')),
                    		//array('label'=>'ข่าวใหม่', 'url'=>array('/information/index'), 'visible'=>Yii::app()->user->isMember()),
                    		//array('label'=>'ข่าวใหม่', 'url'=>array('/information/index'), 'visible'=>Yii::app()->user->isAdmin()),
                    	array('label'=>'วิธีการสร้างหนังสือ', 'url'=>array('/site/howTo'), 'visible'=>!Yii::app()->user->isAdmin()),
                    	array('label'=>'สมัครสมาชิก', 'url'=>array('/site/create'), 'visible'=>Yii::app()->user->isGuest),
                    	array('label'=>'แจ้งหนังสือไม่เหมาะสม', 'url'=>array('/ReportBook/index'), 'visible'=>Yii::app()->user->isAdmin()),
                    	array('label'=>'จัดการรายการหนังสือ', 'url'=>array('/manage_book/index'), 'visible'=>Yii::app()->user->isAdmin()),
                    	array('label'=>'จัดการสมาชิก', 'url'=>array('/manage_member/index'), 'visible'=>Yii::app()->user->isAdmin()),
                    	//array('label'=>'จัดการข่าวสารระบบ', 'url'=>array('/information/index'), 'visible'=>Yii::app()->user->isAdmin()),
                    	array('label'=>'จัดการหมวดหมู่หนังสือ', 'url'=>array('/category/index'), 'visible'=>Yii::app()->user->isAdmin()),				
                    	array('label'=>'จัดการประเภทหนังสือ', 'url'=>array('/type/index'), 'visible'=>Yii::app()->user->isAdmin()),	
                    	array('label'=>'ชั้นหนังสือ', 'url'=>array('/bookshelf/index'), 'visible'=>Yii::app()->user->isMember()),
                    	array('label'=>'สร้างหนังสือ', 'url'=>array('/book/create'), 'visible'=>Yii::app()->user->isMember()),
                    	array('label'=>'จัดการข้อมูลสมาชิก', 'url'=>array('/user/view', 'id'=>Yii::app()->user->id), 'visible'=>Yii::app()->user->isMember()),
                    	//array('label'=>'จัดการข้อมูลหนังสือ', 'url'=>array('/book/view', 'id'=>Yii::app()->user->id), 'visible'=>Yii::app()->user->isMember()),
                    	array('label'=>'เข้าสู่ระบบ', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    	array('label'=>'ออกจากระบบ ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    		
						array('label'=>'มุมมอง', 'url'=>'#', 'visible'=>!Yii::app()->user->isAdmin(),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"6 รูปแบบ"), 
                        'items'=>array(
                            array('label'=>'<span class="style" style="background-color:#0088CC;"></span> แบบที่ 1', 'url'=>"javascript:chooseStyle('none', 60)"),
							array('label'=>'<span class="style" style="background-color:#e42e5d;"></span> แบบที่ 2', 'url'=>"javascript:chooseStyle('style2', 60)"),
							array('label'=>'<span class="style" style="background-color:#c80681;"></span> แบบที่ 3', 'url'=>"javascript:chooseStyle('style3', 60)"),
							array('label'=>'<span class="style" style="background-color:#51a351;"></span> แบบที่ 4', 'url'=>"javascript:chooseStyle('style4', 60)"),
							array('label'=>'<span class="style" style="background-color:#b88006;"></span> แบบที่ 5', 'url'=>"javascript:chooseStyle('style5', 60)"),
							array('label'=>'<span class="style" style="background-color:#f9630f;"></span> แบบที่ 6', 'url'=>"javascript:chooseStyle('style6', 60)"),
                        )),

                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>
</section><!-- /#navigation-main -->