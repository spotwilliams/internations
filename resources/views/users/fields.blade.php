<!-- Name * Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name *:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email * Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email *:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>


<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('group', 'group') !!}
    <select name="group" class="form-control">
        <option value="-1">No group</option>
        @php
            if(isset($user)) {
                $id = optional(optional($user)->group)->id;
            } else {
                $id = -1;
            }
        @endphp
        @foreach(\App\Models\Group::all(['id', 'name']) as $group)
            @php
                $selected = $id == $group->id ? 'selected' : '';
            @endphp
            <option value="{{$group->id}}" {{$selected}}>{{$group->name}}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
