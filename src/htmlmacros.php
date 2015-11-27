<?php

Form::macro('boxOpen', function(array $formOptions = [], $title = "", $color="info")
{
	if (!isset($formOptions['class'])) {
		$formOptions['class'] = "form-horizontal";
    }

    return "<div class='box box-$color'>
               <div class='box-header with-border'>
                 <h3 class='box-title'>$title</h3>
               </div><!-- /.box-header -->
               <!-- form start -->".
               Form::open($formOptions).
                 "<div class='box-body'>";

});

Form::macro('boxOpenModel', function($model, array $formOptions = [], $title = "", $color="info")
{
	if (!isset($formOptions['class'])) {
		$formOptions['class'] = "form-horizontal";
    }

    return "<div class='box box-$color'>
               <div class='box-header with-border'>
                 <h3 class='box-title'>$title</h3>
               </div><!-- /.box-header -->
               <!-- form start -->".
               Form::model($model, $formOptions).
                 "<div class='box-body'>";

});

Form::macro('boxClose', function($buttonText, $color="info")
{
    return "	</div><!-- /.box-body -->
                 <div class='box-footer'>
                   <button type='submit' class='btn btn-$color pull-right'>$buttonText</button>
                 </div><!-- /.box-footer -->
               </form>
             </div><!-- /.box -->";

});

Form::macro('boxRow', function($label, $type = "text", $inputId = null, $placeholder = null)
{
    return "<div class='form-group'>
                <label for='$inputId' class='col-sm-2 control-label'>$label</label>
                <div class='col-sm-10'>
                  <input type='$type' class='form-control' name='$inputId' id='$inputId' placeholder='$placeholder'>
                </div>
            </div>";
});

Form::macro('boxText', function($label, $name, $value = null, $inputId = null, $placeholder = null)
{
    return "<div class='form-group'>
                <label for='$inputId' class='col-sm-2 control-label'>$label</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control' name='$name' id='$inputId' placeholder='$placeholder' value='$value'>
                </div>
            </div>";
});

Form::macro('boxTextarea', function($label, $name, $value = null, $inputId = null, $placeholder = null)
{
    return "<div class='form-group'>
                <label for='$inputId' class='col-sm-2 control-label'>$label</label>
                <div class='col-sm-10'>
                	<textarea class='form-control' name='$name' placeholder='$placeholder' rows='3' id='inputId'>$value</textarea>
                </div>
            </div>";
});

Form::macro('boxDate', function($label, $name, $value = null, $inputId = null, $placeholder = null)
{
    return "<div class='form-group'>
                <label for='$inputId' class='col-sm-2 control-label'>$label</label>
                <div class='col-sm-10'>
                  <input type='text' class='form-control date-picker' name='$name' id='$inputId' value='$value' placeholder='$placeholder'>
                </div>
            </div>";

});
                 