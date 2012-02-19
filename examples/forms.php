<div class="page-header">
	<h1>Twitter Bootstrap Helper</small></h1>
</div>

<div class="row" >

	<div class="span3">
		<div class="margin-top-25">
			<?php echo $this->load->view('helper/directory'); ?>
		</div>
	</div>
	<div class="span9">
		<section >
			<div class="page-header">
				<h1>Forms <small>lets make them easier to write</small></h1>
			</div>
			
			<?php 
				$attr = array(
					'id'=>'form1',
					'class'=>'form-horizontal',
					'method'=>'post'
				);
				echo form_open('',$attr)
			?>	

			<h2>Control Group Function</h2>

<pre class="prettyprint linenums pre-scrollable">
function control_group($label_name = NULL, $element, $attr = NULL)
* @param   String  control group label 
* @param   Array  form elements (input, select, textarea, etc.) - using CI form_helper
* @param   Array  twitter bootstrap specific attributes that 
		  control state, appends, prepends, inline-block, help-block 
* @return  String  control group containing label, elements, etc.

/* $attr OPTIONS	*/
//HTML Element attributes
$attr['id'] String
$attr['class'] String
$attr['style'] String
//Twitter Bootstrap specific attributes
$attr['validation'] String
$attr['help-inline'] String 
$attr['help-block'] String 
$attr['uneditable'] Bool
$attr['view'] Bool

</pre>

	<hr />
	<h3>Control Group Examples</h3>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('class'=>'error');
</pre>
			<?php
				//
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="error" ');
				echo control_group('Error input', $element, array('class'=>'error'));
			?>

<pre class="prettyprint linenums pre-scrollable">
$attr = array('class'=>'success');
</pre>
			
			<?php	
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="error" ');
				echo control_group('Success input', $element, array('class'=>'success'));
			?>

<pre class="prettyprint linenums pre-scrollable">
$attr = array('class'=>'warning');
</pre>
			
			<?php	
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="error" ');
				echo control_group('Warning input', $element, array('class'=>'warning'));
			?>


<pre class="prettyprint linenums pre-scrollable">
$attr = array('undeditable'=>TRUE);
</pre>

			<?php
					
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="error" ');
				echo control_group_undeditable('Text input', 'Sample text', array('class'=>''));

			?>

<pre class="prettyprint linenums pre-scrollable">
$attr = array('view'=>TRUE);
</pre>

			<?php

				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="error" ');
				echo control_group_view('Text input', 'Sample text', array('class'=>''));

			?>



<hr />

			<h2>Form Action Function</h2>
<pre class="prettyprint linenums pre-scrollable">
function form_action($button, $attr = NULL)
* @param   Array  buttons
* @return  String  action_box with buttons.
</pre>

			<?php
				$data1 = array(
				    'name' => 'button',
				    'id' => 'button',
				    'class' => 'btn btn-success',
				    'value' => 'true',
				    'type' => 'button',
				    'content' => 'Button1'
				);
				$data2 = array(
				    'name' => 'button',
				    'id' => 'button',
				    'class' => 'btn btn-success',
				    'value' => 'true',
				    'type' => 'button',
				    'content' => 'Button2'
				);
				$button = array(
					form_button($data1),
					form_button($data2)
				);
				echo form_action($button);
			?>

			<?php echo form_close(); ?>

		</section>

		<section class="margin-top-25" >
			
			<div class="page-header">
				<h1>Alerts <small>Inline and block code snippets</small></h1>
			</div>

<pre class="prettyprint linenums pre-scrollable">
function alert($body, $attr=NULL){
* @param   String  alert body text
* @param   Array  twitter bootstrap specific attributes
* @return  String  twitter alert with buttons.
</pre>
			<?php

				echo alert('Text input', array('class'=>'alert-success'));

			?>

		</section>

	</div>


</div>
