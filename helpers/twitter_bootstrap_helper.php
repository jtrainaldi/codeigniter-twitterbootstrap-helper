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
	 * Creates a twitter checkbox form input (extended).
	 *
	 *     echo Form::checkbox('remember_me', 1, (bool) $remember);
	 *
	 * @param   String   input name
	 * @param   String   input value
	 * @param   Boolean  checked status
	 * @param   Array    html attributes
	 * @return  String
	 * @uses    Form::input
	 */
	function tw_form_checkbox($name, $value = NULL, $checked = FALSE, array $attr = NULL, $label = NULL)
	{
		
		$inline = '';
		$attr['name'] = $name;
		$attr['value'] = (isset($value))?$value:'';
		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
		$attr['inline'] = (isset($attr['inline']) and $attr['inline']==TRUE)?TRUE:FALSE;
		
		if($attr['inline']):
			$inline = 'inline';
		endif;

		if ($checked === TRUE)
		{
			// Make the checkbox active
			$attr['checked'] = TRUE;
		}

		return '<label class="checkbox '.$inline.' " >'.form_checkbox($attr).$label.'</label>';
	}

	/**
	 * Creates a radio form input (extended).
	 *
	 *     echo Form::checkbox('remember_me', 1, (bool) $remember);
	 *
	 * @param   String   input name
	 * @param   String   input value
	 * @param   Boolean  checked status
	 * @param   Array    html attributes
	 * @return  String
	 * @uses    Form::input
	 */
	function tw_form_radio($name, $value = NULL, $checked = FALSE, array $attr = NULL, $label = NULL)
	{
		
		$inline = '';
		$attr['name'] = $name;
		$attr['value'] = (isset($value))?$value:'';
		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
		$attr['inline'] = (isset($attr['inline']) and $attr['inline']==TRUE)?TRUE:FALSE;
		if($attr['inline']):
			$inline = 'inline';
		endif;

		if ($checked === TRUE)
		{
			// Make the checkbox active
			$attr['checked'] = TRUE;
		}

		return '<label class="radio '.$inline.' " >'.form_radio($attr).$label.'</label>';
	}



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


?>