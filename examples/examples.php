<div class="page-header">
	<h1>Codeigniter / Twitter Bootstrap Helper<small></small></h1>
</div>

<?php echo alert('You can find the download link and more information at - <a href="https://github.com/jtrainaldi/codeigniter-twitterbootstrap-helper"><strong>GITHUB</strong> <i class="icon-download-alt"></i></a>.', array('class'=>'alert-info')); ?>

<div class="row"  >
	

	<div class="span2">
		<div class="margin-top-0">

			<ul class="nav nav-list  " style="" >
				<li><a href="#forms"><i class="icon-th-list"></i> Forms</a></li>
				<li><a href="#alerts"><i class="icon-comment"></i> Alerts</a></li>
				<li><a href="#buttons"><i class="icon-th"></i> Buttons</a></li>
			</ul>
		
		</div>
	</div>
	<div class="span10 " >
		<a name="forms"></a>
		<section class="white-well rounded " >
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
	<p>This function generates the HTML .control-group markup used to create the <a href="http://twitter.github.com/bootstrap/base-css.html#forms">Twitter Bootstrap form elements</a>.</p>
	<p>Basic form can simply be made using the <a href="http://codeigniter.com/user_guide/helpers/form_helper.html">CI Form Helper</a> but if you need to create rich form using the Controls Bootstrap supports styling this class will help in steamlining your code.</p>
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

	<hr />
	<h3>Control Group Examples</h3>

<pre class="prettyprint linenums pre-scrollable">
$attr = array('class'=>'error');
</pre>
			<?php
				//
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Error input', $element, array('class'=>'error'));
			?>

<pre class="prettyprint linenums pre-scrollable">
$attr = array('class'=>'success');
</pre>
			
			<?php	
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Success input', $element, array('class'=>'success'));
			?>

<pre class="prettyprint linenums pre-scrollable">
$attr = array('class'=>'warning');
</pre>
			
			<?php	
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Warning input', $element, array('class'=>'warning'));
			?>


<pre class="prettyprint linenums pre-scrollable">
$attr = array('uneditable'=>TRUE);
</pre>

			<?php
					
				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Text input', array('Sample text'), array('class'=>'','uneditable'=>TRUE));

			?>

<pre class="prettyprint linenums pre-scrollable">
$attr = array('view'=>TRUE);
</pre>

			<?php

				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Text input', array('Sample text'), array('class'=>'','view'=>TRUE));

			?>

<pre class="prettyprint linenums pre-scrollable">
$attr = array('help-inline'=>'help inline text goes here');
</pre>

			<?php

				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Inline Help input', $element, array('class'=>'', 'help-inline'=>'inline help text goes here'));

			?>
<pre class="prettyprint linenums pre-scrollable">
$attr = array('help-block'=>'help block text goes here');
</pre>

			<?php

				$element=array();
				$element[] = form_input('input1','', 'id="input1" class="" ');
				echo control_group('Inline Help input', $element, array('class'=>'', 'help-block'=>'inline help text goes here'));

			?>


<div class="accordion" id="accordion2">
	<div class="accordion-group">
	  <div class="accordion-heading">
	    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
	      Custom CSS needed for this example to look and line up correctly.
	    </a>
	  </div>
	  <div id="collapseOne" class="accordion-body collapse" style="height: 0px; ">
	    <div class="accordion-inner">

<pre class="prettyprint linenums pre-scrollable" >
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
	  </div>
	</div>
</div>


<hr />
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

			<?php echo form_close(); ?>

		</section>

		<a name="alerts"></a>
		<section class="white-well rounded " style="margin-top:60px;"  >
			
			<div class="page-header">
				<h1>Alerts <small>Inline and block code snippets</small></h1>
			</div>

<pre class="prettyprint linenums pre-scrollable">
function alert($body, $attr=NULL){
* @param   String  alert body text
* @param   Array  twitter bootstrap specific attributes
* @return  String  twitter alert with buttons.

/* $attr OPTIONS	*/
$attr['id'] = String;
$attr['class'] = String;
$attr['style'] = String;
$attr['dismissal'] = Bool ;
$attr['header'] = String; *Alert Header (H4 tag added)*

</pre>
			<?php

				echo alert('<strong>SUCCESS!!!</strong> sample success alert', array('class'=>'alert-success'));
				echo alert('<strong>WARNING!!!</strong> sample warning alert', array('class'=>'alert-warning'));
				echo alert('<strong>ERROR!!!</strong> sample error alert', array('class'=>'alert-error'));
				echo alert('<strong>ALERT!!!</strong> sample informational alert', array('class'=>'alert-info'));
				echo alert('This is a sample alert-heading alert.', array('class'=>'alert-info','header'=>'<strong>What You Doing Willis!!!</strong> ','dismissal'=>TRUE));

			?>

		</section>

		<a name="buttons"></a>
		<section class="white-well rounded" style="margin-top:60px;"  >
			
			<div class="page-header">
				<h1>Buttons  <small></small></h1>
			</div>

			<h2>Button Group Function</h2>

<pre class="prettyprint linenums pre-scrollable ">
function button_group($button, $attr=NULL){
* @param   String/Array   string or an array of buttons (use Codginiter Form Helper)
* @param   Array  button_group attributes (style, class, id, etc)
* @return  String  twitter button group.

/* $attr OPTIONS	*/
$attr['id'] = String;
$attr['class'] = String;
$attr['style'] = String;
$attr['toggle'] = String;
$attr['loading-text'] = String;
$attr['complete-text'] = String;

</pre>
			<h3>Default Example</h3>

			<?php
				$button = NULL;
				$button = array(
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => 'Left',
					    'toggle' => 'button'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => 'Middle'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => 'Right'
						)
					)

				);

				echo button_group($button);
		?>
		<hr />
			<h3>Toolbar Example</h3>
<pre class="prettyprint linenums pre-scrollable ">
/* If button array is multidimensional it will break the primary array into 
individual button-groups and wrap them in the button-toolbar class */
</pre>
		<?php
				$button = NULL;
				$button[] = array(
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '1'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '2'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '3'
						)
					)

				);
				$button[] = array(
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>' btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '1'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>' btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '2'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>' btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '3'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>' btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '4'
						)
					),
					form_button(
						array(
					    'name' => 'button',
					    'id' => 'button',
					    'class'=>'btn-info',
					    'value' => 'true',
					    'type' => 'button',
					    'content' => '5'
						)
					)

				);
				//print_array($button);

				echo button_group($button, array('toggle'=>'radio'));

			?>

<span class="label label-warning pull-right" >Incomplete</span>
			<h3>Button Dropdown Example </h3>
<pre class="prettyprint linenums pre-scrollable ">
/* If button array is multidimensional it will break the primary array into 
individual button-groups and wrap them in the button-toolbar class */
</pre>
		<?php
				$button = NULL;
				$button[] = array(
					form_button(
						array(
						    'name' => 'button',
						    'id' => 'button',
						    'class'=>'btn-info',
						    'value' => 'true',
						    'type' => 'button',
						    'content' => 'Action',
						    'dropdown' => array(
						    	'options' => array(
						    		''
						    	),
						    	'split' => TRUE
					    	)
						)
					)
				);
				echo button_group($button);
		?>
		</section>


	</div>


</div>
<script>
$(document).ready(function(){
	$('html,body').animate({
		scrollTop: ($(".page-header").offset().top)-115},'slow');
	});
</script>