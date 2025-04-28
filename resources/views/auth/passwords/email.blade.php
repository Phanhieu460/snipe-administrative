@extends('layouts/basic')


{{-- Page content --}}
@section('content')


@if ($snipeSettings->custom_forgot_pass_url)
<!--  The admin settings specify an LDAP password reset URL to let's send them there -->
<div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
    <div class="box box-header text-center">
        <h3 class="box-title">
            <a href="{{ $snipeSettings->custom_forgot_pass_url  }}" rel="noopener">
                {{ trans('auth/general.ldap_reset_password')  }}
            </a>
        </h3>
    </div>
</div>

@else


<form class="form" role="form" method="POST" action="{{ url('/password/email') }}">
    {!! csrf_field() !!}
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-md-offset-4">

                <div class="box login-box" style="width: 100%">
                    <div class="login-box-body">
                        <p class="help-block" id="help-text">
                            {{ trans('auth/message.resetpassword') }}
                        </p>
                    </div>
                    <div class="box-footer">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-block">
                            {{ trans('general.back') }}
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>

</form>

@endif
@stop

@push('js')
<script nonce="{{ csrf_token() }}">
    $(document).ready(function() {
        $("#show").click(function() {
            $("#help-text").fadeIn(500);
            $("#show").hide();
            $("#hide").show();
        });

        $("#hide").click(function() {
            $("#help-text").fadeOut(300);
            $("#show").show();
            $("#hide").hide();
        });
    });
</script>
@endpush