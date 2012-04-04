<?php

/* 
	TWITTER BOOTSTRAP v2.0 - HELPER
	Author: James Rainaldi
	Created: 2012-02-03
	Modified: 2012-02-21
	Version: v1.0.3
	Contributors: .....

 */

	/*
	FORMS
	Description:
	This helper file assists in creating the twitter bootstrap v2.0 elements (control-groups) in 
	  combination with the codeigniter form helper.
	*/




	/**
	 * Generates an control-group structure.
	 *
	 * @param   String  label name
	 * @param   String/array   html elements (use Codginiter Form Helper)
	 * @param		Array   twitter bootstrap specific attributes and control-group html attrs validation: error, success, warning
	 * @return  String
	 */
	function control_group($label_name = NULL, $element, $attr = NULL)
	{
		//Declare and Initialize variables
		$cg_str='';
		
		//Basic HTML element attributes
		$attr['id']    = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
				
		//Twitter Bootstrap attributes
		$attr['validation']  = (isset($attr['validation']))?$attr['validation']:NULL;
		$attr['help-inline'] = (isset($attr['help-inline']))?$attr['help-inline']:NULL;
		$attr['help-block']  = (isset($attr['help-block']))?$attr['help-block']:NULL;
		$attr['uneditable']  = (isset($attr['uneditable']))?TRUE:FALSE;
		$attr['view']        = (isset($attr['view']))?TRUE:FALSE;
		
		//Append/Prepend Elements
		if((isset($attr['prepend']))):
			$attr['prepend'] = $attr['prepend'];
		else :
			$attr['prepend'] = NULL;
		endif;
		if((isset($attr['append']))):
			$attr['append'] = $attr['append'];
		else :
			$attr['append'] = NULL;
		endif;

		//Set the prepend/append checkbox status if it is checked by default		
		$attr['add-on-class'] = ((isset($attr['prepend']) and strpos($attr['prepend'],'checked')!==FALSE) or (isset($tb_attributes['append']) and strpos($tb_attributes['append'],'checked')!==FALSE))
									 ?'active'
									 :'';

		//Assign the label 'for' attribute to the first element's ID value for
		// label click functionality.
		if(is_array($element)):
			foreach($element as $e):
				$element_id[] = substr(substr($e,strpos($e,'id=')+4),0,strpos(substr($e,strpos($e,'id=')+4),'"'));
			endforeach;
		else :	
			$element_id[] = substr(substr($element,strpos($element,'id=')+4),0,strpos(substr($element,strpos($element,'id=')+4),'"'));
		endif;		
		
		//Begin generating the control-group structure
		$cg_str .= '<div id="'.$attr['id'].'" class="control-group '.$attr['class'].' '.$attr['validation'].' clearfix" style="'.$attr['style'].'" >';
		  $cg_str .= '<label class="control-label" for="'.$element_id[0].'">'.$label_name.'</label>';
		  $cg_str .= '<div class="controls">';
		    
				//Create prepend/append div
				if(isset($attr['prepend']))
					$cg_str .= '<div class="input-prepend ">';
				else if(isset($attr['append'])):
					$cg_str .= '<div class="input-append ">';
				endif;
				
					//Add prepend element
					if(isset($attr['prepend'])):
						$cg_str .= '<span class="add-on '.$attr['add-on-class'].'">'.$attr['prepend'].'</span>';
					endif;
					
					//Add elements 
					// Check if element variable passed is an array or string
					if(is_array($element)):
						foreach($element as $e):
							$cg_str .= ($attr['uneditable'] or $attr['view']) ? '<span class="'. ($attr['view'] ? "view-input" : ($attr['uneditable'] ? "uneditable-input" : "")) .'">'.$e.'</span>' : $e;
						endforeach;
					else :
						$cg_str .= ($attr['uneditable'] or $attr['view']) ? '<span class="'. ($attr['view'] ? "view-input" : ($attr['uneditable'] ? "uneditable-input" : "")) .'">'.$element.'</span>' : $element;
					endif;

					//Add append element
					if(isset($attr['append'])):
						$cg_str .= '<span class="add-on '.$attr['add-on-class'].'">'.$attr['append'].'</span>';
					endif;

				
					//Add Help-inline text
					if(isset($attr['help-inline'])): 
						$cg_str .= '<span class="help-inline">'.$attr['help-inline'].'</span>';
					endif;
				
				//Close append/prepend div
				if(isset($attr['prepend']) or isset($attr['append'])):
					$cg_str .= '</div>';
				endif;

				//Add Help-block text
				if(isset($attr['help-block'])): 
					$cg_str .= '<p class="help-block">'.$attr['help-block'].'</p>';
				endif;
				
		  $cg_str .= '</div> <!-- END OF .controls -->';
		$cg_str .= '</div> <!-- END OF .control-group -->';
		
		return $cg_str;
	} //END OF control_group function


	/**
	 * Generates a form-action box.
	 *
	 * @param   String  label name
	 * @param   String/Array   html button/submit elements (use Form Helper)
	 * @param		Array   twitter bootstrap specific attributes (error, append, prepend, etc.)
	 * @return  String
	 */
	function form_action($button, $attr = NULL)
	{
			
		//Declare and Initialize variables
		$fa_str='';
		$array_count=0;
		
		//Basic HTML element attributes
		//$button = (isset($button)) ? $button : '';

		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
			
		$fa_str = '<div id="'.$attr['id'].'" class="form-actions '.$attr['class'].' " style="'.$attr['style'].'" >';
		
			if(is_array($button)):
				foreach($button as $b):
					$fa_str .= ($array_count>0)?'&nbsp;'.$b:$b;
					$array_count++;
				endforeach;
			else :	
				$fa_str .= $button;
			endif;
		
		$fa_str .= '</div>';
		
		return $fa_str;
	} //END OF form_action function



/* ************************************************************************* */

/*
ALERTS
Description:
This helper file assists in creating the twitter bootstrap v2.0 alert elements (alert).
*/

	function alert($body, $attr=NULL){

		//Declare and Initialize variables
		$alert_str='';
		$array_count=0;
		
		//Basic HTML element attributes
		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
		$attr['dismissal'] = (isset($attr['dismissal']) and $attr['dismissal']===TRUE)?TRUE:FALSE;
		$attr['header'] = (isset($attr['header']))?$attr['header']:NULL;

		$alert_str = '<div id="'.$attr['id'].'" class="alert '.$attr['class'].' fade in " style="'.$attr['style'].'" >';
			
			if($attr['dismissal']):
				$alert_str .= '<a class="close" data-dismiss="alert" href="#">×</a>';
			endif;
			
			//Add header
			if(isset($attr['header'])):
				$alert_str .= '<h4 class="alert-heading">'.$attr['header'].'</h4>';
			endif;
			
			//Add body
			$alert_str .= $body;
			
		
		$alert_str .= '</div>';

		return $alert_str;

	}  //END OF alert function


/*
Buttons
Description:
This helper file assists in creating the twitter bootstrap v2.0 button componenets.
*/

	/*
	BUTTON GROUP (non-dropdown)
	Description:
	This helper file assists in creating the twitter bootstrap v2.0 alert elements (alert).
	*/

		function button_group($button = '', $attr=NULL){

			//Declare and Initialize variables
			$bg_str='';
			$array_count=0;
			
			//Basic HTML element attributes
			$attr['id'] = (isset($attr['id']))?$attr['id']:'';
			$attr['class'] = (isset($attr['class']))?$attr['class']:'';
			$attr['style'] = (isset($attr['style']))?$attr['style']:'';
			$attr['toggle'] = (isset($attr['toggle'])) ? 'buttons-'.$attr['toggle'] : '' ;
				
				if(is_array($button)):

					if(is_array($button[0])):

						$bg_str .= '<div class="btn-toolbar" id="'. $attr['id'] .'" class="'. $attr['class'] .'" style="'. $attr['style'] .'" >';

						foreach($button as $b):

							$bg_str .= '<div class="btn-group" data-toggle="'. $attr['toggle'] .'" >';
							
							foreach($b as $b2):
								$bg_str .= $b2;
							endforeach;

							$bg_str .= '</div >';

						endforeach;	

						$bg_str .= '</div>';

					else:
						$bg_str .= '<div class="btn-group" data-toggle="'. $attr['toggle'] .'" >';

						foreach($button as $b):
							$bg_str .= $b;							
						endforeach;

						$bg_str .= '</div>';

					endif;	

				else :
						$bg_str .= $button;
				endif;						

			return $bg_str;

		}  //END OF button_group function

	/*
	BUTTON GROUP (non-dropdown)
	Description:
	This helper file assists in creating the twitter bootstrap v2.0 alert elements (alert).
	*/
	function button_dropdown($data = '', $content = '', $extra = ''){
		$btn_str = '';
		$is_dropdown = $is_split = FALSE;
		$defaults = array('name' => (( ! is_array($data)) ? $data : ''), 'type' => 'button');

		if ( is_array($data) AND isset($data['content']))
		{
			$content = $data['content'];
			unset($data['content']); // content is not an attribute
		}
		if ( is_array($data) AND isset($data['class']))
		{
			$data['class'] = 'btn ' . $data['class'];
		}

		if ( is_array($data) AND isset($data['toggle']))
		{
			$toggle = ($data['toggle']==='button') ? "data-toggle='" . $data['toggle'] ."'" : '';
		}else {
			$toggle = "";
		}
		if ( is_array($data) AND isset($data['loading-text']))
		{
			$loading_text = "data-loading-text='" . $data['loading-text'] ."'";
		}else {
			$loading_text = "";
		}
		if ( is_array($data) AND isset($data['complete-text']))
		{
			$complete_text = "data-complete-text='" . $data['complete-text'] ."'";
		}else {
			$complete_text = "";
		}
		if ( is_array($data) AND isset($data['split']) )
		{	
			$is_split = TRUE;
		}
		if ( is_array($data) AND isset($data['dropup']) AND $data['dropup']===TRUE)
		{
			$dropup = "dropup";
		}else {
			$dropup = "";
		}

		$btn_str .= '<div class="btn-group ' . $dropup . '"  >';

		if($is_split){
			$btn_str .= "<button "._parse_form_attributes($data, $defaults).$extra." " . $toggle . " " . $loading_text ." " . $complete_text ." >".$content."</button>";
			$btn_str .= '<button class="btn dropdown-toggle '. $data['class'] .'" data-toggle="dropdown"><span class="caret"></span></button>';
		}else {
			$data['class'] .= ' dropdown-toggle';
			$btn_str .= "<button "._parse_form_attributes($data, $defaults).$extra." " . $toggle . " " . $loading_text ." " . $complete_text ." data-toggle='dropdown' >".$content." <span class='caret'></span></button>";
		}


		if ( is_array($data['options']) AND isset($data['options'] ) or is_array($extra['options']) AND isset($extra['options'] ))
		{	
			$btn_str .= '<ul class="dropdown-menu">';
			foreach($data['options'] as $r):
				$btn_str .= ($r === 'divider') ? '<li class="divider" ></li>' : '<li>' . $r . '</li>';
			endforeach;
			$btn_str .= '</ul>';
		}

		$btn_str .= '</div> <!-- End of .btn-group -->';


		return $btn_str;

	}  //END OF button_group function


?>