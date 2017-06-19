@include('layouts.error')

@include('layouts.message')

<div class="Grid-cell">
    <div class="js-profileClusterFollow"></div>
</div>

{{ Form::open([
    'action' => ['UserController@update', auth()->id()],
    'method' => 'PUT',
    'id' => 'form_update_user',
    'enctype' => 'multipart/form-data',
    ])
}}
    {{ Form::label(trans('user.edit-profile.image-avatar'), trans('user.edit-profile.image-avatar')) }}
    <div class="form-group">
        <div class="text-center">
            <div id="file-upload-form" class="uploader">
                {{ Form::file('avatar', [
                    'id' => 'file-upload',
                    'class' => 'hidden',
                    'maxlength' => config('settings.length_user.avatar'),
                    ])
                }}
                <label for="file-upload" id="file-drag">
                    <img id="file-image" src="{{ auth()->user()->avatar }}">
                    <div id="start">
                        <div id="notimage" class="hidden"></div>
                        <span id="file-upload-btn" class="btn btn-primary">{{ trans('user.edit-profile.image-avatar') }}</span>
                    </div>
                    <div id="response" class="hidden">
                        <div id="messages"></div>
                    </div>
                </label>
            </div>
        </div>
    </div>
    {{ Form::label(trans('user.edit-profile.image-cover'), trans('user.edit-profile.image-cover')) }}
    <div class="form-group">
        <div class="text-center">
            <div id="file-upload-form-cover" class="uploader-cover">
                {{ Form::file('cover', [
                    'id' => 'file-upload-cover',
                    'class' => 'hidden',
                    'maxlength' => config('settings.length_user.avatar'),
                    ])
                }}
                <label for="file-upload-cover" id="file-drag-cover">
                    <img id="file-image-cover" src="{{ auth()->user()->cover }}">
                    <div id="start-cover">
                        <div id="notimage-cover" class="hidden"></div>
                        <span id="file-upload-btn-cover" class="btn btn-primary">{{ trans('user.edit-profile.image-cover') }}</span>
                    </div>
                    <div id="response-cover" class="hidden">
                        <div id="messages-cover"></div>
                    </div>
                </label>
            </div>
        </div>
    </div>
    {{ Form::label(trans('user.edit-profile.fullname'), trans('user.edit-profile.fullname') . trans('user.label.required')) }}
    <div class="form-group">
        <div class="form-line">
            {{ Form::text('fullname', auth()->user()->fullname, [
                'class' => 'form-control',
                'id' => trans('user.edit-profile.fullname'),
                'required' => true,
                'maxlength' => config('settings.length_user.name'),
                ])
            }}
        </div>
    </div>
    {{ Form::label(trans('user.edit-profile.birthday'), trans('user.edit-profile.birthday')) }}
    <div class="form-group">
        <div class="form-line">
            {{ Form::date('birthday', auth()->user()->birthday, [
                'class' => 'form-control',
                'id' => trans('user.edit-profile.birthday'),
                ])
            }}
        </div>
    </div>
    {{ Form::label(trans('user.edit-profile.address'), trans('user.edit-profile.address')) }}
    <div class="form-group">
        <div class="form-line">
            {{ Form::date('address', auth()->user()->address, [
                'class' => 'form-control',
                'id' => trans('user.edit-profile.address'),
                ])
            }}
        </div>
    </div>
    {{ Form::label(trans('user.edit-profile.username'), trans('user.edit-profile.username') . trans('user.label.required')) }}
    <div class="form-group">
        <div class="form-line">
            {{ Form::text('name', auth()->user()->name, [
                'class' => 'form-control',
                'id' => trans('user.edit-profile.username'),
                'placeholder' => trans('user.placeholder.name'),
                'required' => true,
                'maxlength' => config('settings.length_user.name'),
                ])
            }}
        </div>
    </div>
    {{ Form::label(trans('user.label_for.email'), trans('user.label.email') . trans('user.label.required')) }}
    <div class="form-group">
        <div class="form-line">
            {{ Form::email('email', auth()->user()->email, [
                'class' => 'form-control',
                'id' => trans('user.label_for.email'),
                'placeholder' => trans('user.placeholder.email'),
                'required' => true,
                'maxlength' => config('settings.length_user.email'),
                ])
            }}
        </div>
    </div>
    {{ Form::label(trans('user.label_for.phone_number'), trans('user.label.phone_number')) }}
    <div class="form-group">
        <div class="form-line">
            {{ Form::text('phone_number', auth()->user()->phone_number, [
                'class' => 'form-control',
                'id' => trans('user.label_for.phone_number'),
                'placeholder' => trans('user.placeholder.phone_number'),
                'maxlength' => config('settings.length_user.phone_number'),
                ])
            }}
        </div>
    </div>
    {{ Form::label(trans('user.label_for.password'), trans('user.label.password') . trans('user.label.required')) }}
    <div class="form-group">
        <div class="form-line">
            {{ Form::password('password', [
                'class' => 'form-control',
                'name' => 'password',
                'id' => trans('user.label_for.password'),
                'placeholder' => trans('user.placeholder.password'),
                'maxlength' => config('settings.length_user.password'),
                ])
            }}
        </div>
    </div>
    {{ Form::label(trans('user.label_for.password_confirm'), trans('user.label.password') . trans('user.label.required')) }}
    <div class="form-group">
        <div class="form-line">
            {{ Form::password('password', [
                'class' => 'form-control',
                'name' => 'password_confirmation',
                'placeholder' => trans('user.placeholder.password_confirm'),
                ])
            }}
        </div>
    </div>
    <div class="row clearfix">
        {{ Form::submit(trans('user.button.edit'), [
            'class' => 'col-lg-3 col-lg-offset-2 btn btn-success waves-effect'
            ])
        }}
        <button type="button" class="close col-lg-3 col-lg-offset-2 btn btn-primary waves-effect" data-dismiss="modal" aria-hidden="true">{{ trans('user.button.back') }}</button>
    </div>
{{ Form::close() }}

@section('js')
    @parent
    {{ Html::script('js/upload_img.js') }}
@stop
