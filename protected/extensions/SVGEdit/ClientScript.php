<?php

/**
 * ClientScript manages Javascript and CSS.
 */
class ClientScript extends CClientScript {

    /**
     * Registers a piece of javascript code.
     * @param string $id ID that uniquely identifies this piece of JavaScript code
     * @param string $script the javascript code
     * @param integer $position the position of the JavaScript code.
     * @param integer $level the rendering priority of the JavaScript code in a position.
     * @return CClientScript the CClientScript object itself (to support method chaining, available since version 1.1.5).
     */

    /**
     * Renders the registered scripts.
     * Overriding from CClientScript.
     * @param string $output the existing output that needs to be inserted with script tags
     */
    	public function renderHead(&$output)
			{
				$html='';
				foreach($this->metaTags as $meta)
					$html.=CHtml::metaTag($meta['content'],null,null,$meta)."\n";
				foreach($this->linkTags as $link)
					$html.=CHtml::linkTag(null,null,null,null,$link)."\n";
				foreach($this->cssFiles as $url=>$media)
					$html.=CHtml::cssFile($url,$media)."\n";
				foreach($this->css as $css)
					$html.=CHtml::css($css[0],$css[1])."\n";
				if($this->enableJavaScript)
				{
					
					if(isset($this->scripts[self::POS_HEAD]))
						$html.=$this->renderScriptBatch($this->scripts[self::POS_HEAD]);
						
					if(isset($this->scriptFiles[self::POS_HEAD]))
					{
						foreach($this->scriptFiles[self::POS_HEAD] as $scriptFileValueUrl=>$scriptFileValue)
						{
							if(is_array($scriptFileValue))
								$html.=CHtml::scriptFile($scriptFileValueUrl,$scriptFileValue)."\n";
							else
							$html.=CHtml::scriptFile($scriptFileValueUrl)."\n";
						}
					}

				}

				if($html!=='')
				{
					$count=0;
					$output=preg_replace('/(<title\b[^>]*>|<\\/head\s*>)/is','<###head###>$1',$output,1,$count);
					if($count)
						$output=str_replace('<###head###>',$html,$output);
					else
						$output=$html.$output;
				}
			}
			
			protected function renderScriptBatch($scripts = array())
			{
				$html = '';
				$scriptBatches = array();
				foreach($scripts as $scriptValue)
				{
					if(is_array($scriptValue))
					{
						$scriptContent = $scriptValue['content'];
						unset($scriptValue['content']);
						$scriptHtmlOptions = $scriptValue;
					}
					else
					{
						$scriptContent = $scriptValue;
						$scriptHtmlOptions = array();
					}
					$key=serialize(ksort($scriptHtmlOptions));
					$scriptBatches[$key]['htmlOptions']=$scriptHtmlOptions;
					$scriptBatches[$key]['scripts'][]=$scriptContent;
				}
			
				foreach($scriptBatches as $scriptBatch)
					if(!empty($scriptBatch['scripts']))
						$html.=CHtml::script(implode("\n",$scriptBatch['scripts']),$scriptBatch['htmlOptions'])."\n";
					return $html;
			}
}
