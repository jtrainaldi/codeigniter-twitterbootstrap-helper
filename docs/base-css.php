<header class="jumbotron subhead" id="overview">
  <h1 class="padding-bottom-10" >Base CSS</h1>
  <p class="lead">The functions and examples below will explain on how you can use Codeigniter's built in Form Helper class you can easily create dynamic styled markup extremely fast.</p>
  <div class="subnav margin-bottom-20">
    <ul class="nav nav-pills">
      <li><a href="#forms">Forms</a></li>
      <li><a href="#buttons">Buttons</a></li>
    </ul>
  </div>
</header>





<section id="forms" class="margin-bottom-25" >

	<div class="page-header">
    <h1>Forms <small>easliy create form elements</small></h1>
  </div>



	<?php
		//Create form open tag 
		$attr = array(
			'id'=>'form1',
			'class'=>'form-horizontal',
			'method'=>'post'
		);
		echo form_open('',$attr);
	?>	

			<h2>Control Group Function</h2>
			<p>This function generates the HTML .control-group markup used to create the <a href="http://twitter.github.com/bootstrap/base-css.html#forms">Twitter Bootstrap form elements</a>.</p>
			<p>Basic form can simply be made using the <a href="http://codeigniter.com/user_guide/helpers/form_helper.html">CI Form Helper</a> but if you need to create rich forms using the Controls Bootstrap styling this class will help in steamlining your code.</p>
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
$attr['validation'] String *errors, warnings, or success*
$attr['help-inline'] String 
$attr['help-block'] String 
$attr['uneditable'] Bool *makes form uneditable*
$attr['view'] Bool *removes border, input styling*

</pre>

	<h3 class="container margin-bottom-20" >Control Group Examples</h3>

	<div class="row margin-bottom-25">
		<div class="span6">
			<?php
				//
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Error input', $element, array('class'=>'error'));
			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('validation'=>'error');
</pre>
			
			<?php	
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Success input', $element, array('class'=>'success'));
			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('validation'=>'success');
</pre>
			
			<?php	
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Warning input', $element, array('validation'=>'warning'));
			?>

<pre class="prettyprint linenums pre-scrollable">
$attr = array('validation'=>'warning');
</pre>

			<?php

				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Text input', array('Sample text'), array('class'=>'','view'=>TRUE, 'help-inline'=>''));

			?>
<pre class="prettyprint linenums pre-scrollable " >
$attr = array('view'=>TRUE);
//CSS
.view-input {
  display: inline-block;
  padding: 5px 4px 4px 4px;
  line-height: 18px;
  border: none;
  -webkit-border-radius: 0px;
  -moz-border-radius: 0px;
  border-radius: 0px;
}
</pre>

		</div>
		<div class="span6">


			<?php
					
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Text input', array('Sample text'), array('class'=>'','uneditable'=>TRUE));

			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('uneditable'=>TRUE);
</pre>

			<?php

				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Inline Help input', $element, array('class'=>'', 'help-inline'=>'inline help text goes here'));

			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('help-inline'=>'help inline text goes here');
</pre>


			<?php

				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Inline Help input', $element, array('class'=>'', 'help-block'=>'help block text goes here'));

			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('help-block'=>'help block text goes here');
</pre>		</div>
	</div>

			<h2>Form Action Function</h2>
<pre class="prettyprint linenums pre-scrollable">
function form_action($button, $attr = NULL)
* @param   Array  buttons
* @return  String  action_box with buttons.
</pre>

			<?php
				$data[] = array(
				    'name' => 'button',
				    'id' => 'button',
				    'class' => 'btn-success',
				    'value' => 'true',
				    'type' => 'button',
				    'content' => 'Button1'
				);
				$data[] = array(
				    'name' => 'button',
				    'id' => 'button',
				    'class' => 'btn-warning',
				    'value' => 'true',
				    'type' => 'button',
				    'content' => 'Button2'
				);
				$data[] = array(
				    'name' => 'button',
				    'id' => 'button',
				    'class' => 'btn-primary pull-right',
				    'value' => 'true',
				    'type' => 'button',
				    'content' => 'Button3 .pull-right'
				);
				$button = array(
					form_button($data[0]),
					form_button($data[1]),
					form_button($data[2])
				);
				echo form_action($button);
			?>




	<?php
		//Create form close tag 
		echo form_close();
	?>	



</section>