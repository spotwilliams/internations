@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Email verification required
        </h1>
    </section>
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="callout callout-info">
                    <h4>{{ __('Verify Your Email Address') }}</h4>

                    <p>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a
                            href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
