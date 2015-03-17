<?php

/**
 * SVG-Edit Class File
 * @author Martin Brooksbank <martin@flamedevelopment.co.uk>
 * @based on SVG-Edit - http://code.google.com/p/svg-edit/
 * @copyright Copyright &copy; Flame Development 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version 1
 * @svg-editor version 2.6
 */
class SVGEdit extends CWidget
{
	/*
		Defined in the widget under 'name'=>@string
	*/
	public $name = 'SVG-Edit';

	/*
		Defined in the widget under 'options'=>array()
	*/
	public $options = array();


	/*
	* All available SVG-edit options

	public $allOptions = array(
		'lang',
		'bkgd_url',
		'img_save',
		'dimensions',
		'initFill',
		'initStroke',
		'initTool',
		'imgPath',
		'langPath',
		'extPath',
		'extensions',
		'showlayers',
		'wireframe',
		'gridSnapping',
		'snappingStep',
		'no_save_warning',
		'canvas_expansion',
		'show_outside_canvas',
		'iconsize',
		'bkgd_color',
		'showRulers',
		'selectNew'
	);*/

	/*
	* Best not to allow any options that will change the default paths, etc - it will break otherwise
	*/
	public $allowedOptions = array(
		'lang',
		'bkgd_url',
		'dimensions',
		'initFill',
		'initStroke',
		'initTool',
		'wireframe',
		'gridSnapping',
		'canvas_expansion',
		'show_outside_canvas',
		'iconsize',
		'bkgd_color',
		'showRulers',
	);

	public $loadFromString = null;

	public $loadFromDataURI = null;

	public $loadFromUrl = null;


		public function init() 
		{
		  parent::init();
		  $this->publishAssets();
		}
		  
		public function run() 
		{
			$options = array();
			if(isset($this->options))
			{
				$allowedOptions = array_flip($this->allowedOptions);
				foreach($this->options as $option)
				{
					if(!is_array($option))
					{
						if(isset($allowedOptions[$option]))
						{
							$options[] = $option;
						}
					}
					else
					{
						if(isset($allowedOptions[key($option)]))
						{
							$options[] = $option;
						}				
					}
				}
			}		
			$options = json_encode($options);
		  $this->render("svg-editor", array('name'=>$this->name, 'options'=>$options, 'loadFromString'=>$this->loadFromString, 'loadFromDataURI'=>$this->loadFromDataURI, 'loadFromUrl'=>$this->loadFromUrl));
		}
		  
		public function publishAssets() 
		{
		    $assets = dirname(__FILE__) . '/assets';
		    $baseUrl = Yii::app() -> assetManager -> publish($assets);
		    if (is_dir($assets)) 
		    {
		        Yii::app() -> clientScript -> registerCssFile($baseUrl . '/css/jPicker.css');
		        Yii::app() -> clientScript -> registerCssFile($baseUrl . '/css/jgraduate.css');
		        Yii::app() -> clientScript -> registerCssFile($baseUrl . '/css/svg-editor.css');
		        Yii::app() -> clientScript -> registerCssFile($baseUrl . '/css/JQuerySpinBtn.css');
		        
						$script = 'assetUrl = "' . $baseUrl . '";';
						Yii::app()->getClientScript()->registerScript('_', $script, CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.hotkeys.min.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.bbq.min.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.svgicons.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.jgraduate.min.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/JQuerySpinBtn.min.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/touch.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jpicker.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery.contextMenu.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/browser.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/svgtransformlist.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/math.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/units.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/svgutils.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/sanitize.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/history.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/select.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/draw.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/path.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/svgcanvas.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/svg-editor.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/locale.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/contextmenu.js', CClientScript::POS_HEAD);
		        Yii::app() -> clientScript -> registerScriptFile($baseUrl . '/js/jquery-ui-1.8.17.custom.min.js', CClientScript::POS_HEAD);
		    } 
		    else 
		    {
		    	throw new CHttpException(500, __CLASS__ . ' - Error: Couldn\'t find assets to publish.');
		    }
		}

}
