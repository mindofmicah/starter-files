<div class="form-group {{($errors->first($field) ? ' has-error' : '')}}">
    {{Form::label($field, isset($label)?$label:ucwords($field), array('class'=>'control-label'))}}
    <div class="pull-right help-block">{{$errors->first($field)}}</div>
    @if(empty($type))
        {{Form::text($field, null, array('class'=>'form-control'))}}
    @elseif($type == 'password')
        {{Form::password($field, array('class'=>'form-control'))}}
    @else
        {{Form::$type($field, null, array('class'=>'form-control'))}}
    @endif
</div>
