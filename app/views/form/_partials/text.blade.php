<div class="form-group {{($errors->first($field) ? ' has-error' : '')}}">
    {{Form::label($field, isset($label)?$label:ucwords($field), array('class'=>'control-label'))}}
    <div class="pull-right help-block">{{$errors->first($field)}}</div>
    {{Form::text($field, null, array('class'=>'form-control'))}}
</div>
