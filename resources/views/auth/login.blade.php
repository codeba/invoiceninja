@extends('master')

@section('head')

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('css/style.min.css') }}" rel="stylesheet" type="text/css"/>

<style type="text/css">
    body {
        padding-top: 40px;
        padding-bottom: 40px;
    }
    .modal-header {
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    .modal-header h4 {
        margin:0;
    }
    .modal-header img {
        float: left;
        margin-right: 20px;
    }
    .form-signin {
        max-width: 400px;
        margin: 0 auto;
        background: #fff;
    }
    p.link a {
        font-size: 11px;
    }
    .form-signin .inner {
        padding: 20px;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }
    .form-signin .checkbox {
        font-weight: normal;
    }
    .form-signin .form-control {
        margin-bottom: 17px !important;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }

    .modal-header a:link,
    .modal-header a:visited,
    .modal-header a:hover,
    .modal-header a:active {
        text-decoration: none;
        color: white;
    }

</style>

@endsection

@section('body')
<div class="container">

    @include('partials.warn_session', ['redirectTo' => '/login'])

    {!! Former::open('login')
            ->rules(['email' => 'required|email', 'password' => 'required'])
            ->addClass('form-signin') !!}
    {{ Former::populateField('remember', 'true') }}

    <div class="modal-header">
        <a href="{{ NINJA_WEB_URL }}" target="_blank">
            <img src="{{ asset('images/icon-login.png') }}" />
            <h4>Invoice Ninja | {{ trans('texts.account_login') }}</h4>
        </a>
    </div>
        <div class="inner">
            <p>
                {!! Former::text('email')->placeholder(trans('texts.email_address'))->raw() !!}
                {!! Former::password('password')->placeholder(trans('texts.password'))->raw() !!}
                {!! Former::hidden('remember')->raw() !!}
            </p>

            <p>{!! Button::success(trans('texts.login'))
                    ->withAttributes(['id' => 'loginButton'])
                    ->large()->submit()->block() !!}</p>

            @if (Input::get('new_company') && Utils::allowNewAccounts())
                {!! Former::hidden('link_accounts')->value('true') !!}
                <center><p>- {{ trans('texts.or') }} -</p></center>
                <p>{!! Button::primary(trans('texts.new_company'))->asLinkTo(URL::to('/invoice_now?new_company=true&sign_up=true'))->large()->submit()->block() !!}</p><br/>
            @elseif (Utils::isOAuthEnabled())
                <center><p>- {{ trans('texts.or') }} -</p></center>
                <div class="row">
                @foreach (App\Services\AuthService::$providers as $provider)
                    <div class="col-md-6">
                        <a href="{{ URL::to('auth/' . $provider) }}" class="btn btn-primary btn-block social-login-button" id="{{ strtolower($provider) }}LoginButton">
                            <i class="fa fa-{{ strtolower($provider) }}"></i> &nbsp;
                            {{ $provider }}
                        </a><br/>
                    </div>
                @endforeach
                </div>
            @endif

            <p class="link">
                {!! link_to('/recover_password', trans('texts.recover_password'), ['class' => 'pull-left']) !!}
                {!! link_to(NINJA_WEB_URL.'/knowledgebase/', trans('texts.knowledge_base'), ['target' => '_blank', 'class' => 'pull-right']) !!}
            </p>
            <br/>

            @if (count($errors->all()))
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            @if (Session::has('warning'))
            <div class="alert alert-warning">{!! Session::get('warning') !!}</div>
            @endif

            @if (Session::has('message'))
            <div class="alert alert-info">{!! Session::get('message') !!}</div>
            @endif

            @if (Session::has('error'))
            <div class="alert alert-danger"><li>{!! Session::get('error') !!}</li></div>
            @endif

        </div>

        {!! Former::close() !!}

        <p/>

    </div>


    <script type="text/javascript">
        $(function() {
            if ($('#email').val()) {
                $('#password').focus();
            } else {
                $('#email').focus();
            }

            /*
            var authProvider = localStorage.getItem('auth_provider');
            if (authProvider) {
                $('#' + authProvider + 'LoginButton').removeClass('btn-primary').addClass('btn-success');
            }
            */
        })

    </script>

@endsection
