@extends('header')

@section('head')
    @parent

    <link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('js/quill.min.js') }}" type="text/javascript"></script>
@stop

@section('content')
	@parent

	<style type="text/css">

	#logo {
		padding-top: 6px;
	}

	</style>

	{!! Former::open_for_files()
            ->addClass('warn-on-exit')
            ->autocomplete('on')
            ->rules([
                'name' => 'required',
            ]) !!}

	{{ Former::populate($account) }}

    @include('accounts.nav', ['selected' => ACCOUNT_COMPANY_DETAILS])

	<div class="row">
		<div class="col-md-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">{!! trans('texts.details') !!}</h3>
          </div>
            <div class="panel-body form-padding-right">

                {!! Former::text('name') !!}
                {!! Former::text('id_number') !!}
                {!! Former::text('vat_number') !!}
                {!! Former::text('website') !!}
                {!! Former::text('work_email') !!}
                {!! Former::text('work_phone') !!}
                {!! Former::file('logo')->max(2, 'MB')->accept('image')->inlineHelp(trans('texts.logo_help')) !!}


                @if ($account->hasLogo())
                <div class="form-group">
                    <div class="col-lg-4 col-sm-4"></div>
                    <div class="col-lg-8 col-sm-8">
                        <a href="{{ $account->getLogoUrl(true) }}" target="_blank">
                            {!! HTML::image($account->getLogoUrl(true), 'Logo', ['style' => 'max-width:300px']) !!}
                        </a> &nbsp;
                        <a href="#" onclick="deleteLogo()">{{ trans('texts.remove_logo') }}</a>
                    </div>
                </div>
                @endif

            </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">{!! trans('texts.address') !!}</h3>
          </div>
            <div class="panel-body form-padding-right">

            {!! Former::text('address1')->autocomplete('address-line1') !!}
            {!! Former::text('address2')->autocomplete('address-line2') !!}
            {!! Former::text('city')->autocomplete('address-level2') !!}
            {!! Former::text('state')->autocomplete('address-level1') !!}
            {!! Former::text('postal_code')->autocomplete('postal-code') !!}
            {!! Former::select('country_id')
                    ->addOption('','')
                    ->fromQuery($countries, 'name', 'id') !!}

            </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">{!! trans('texts.settings') !!}</h3>
          </div>
            <div class="panel-body form-padding-right">

                <div role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist" style="border: none">
                        <li role="presentation" class="active">
                            <a href="#defaults" aria-controls="client_fields" role="tab" data-toggle="tab">{{ trans('texts.defaults') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="#profile" aria-controls="invoice_fields" role="tab" data-toggle="tab">{{ trans('texts.profile') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="#signature" aria-controls="company_fields" role="tab" data-toggle="tab">{{ trans('texts.signature') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="defaults">

                        <br/>&nbsp;<br/>
                        {!! Former::select('payment_type_id')
                                ->addOption('','')
            				    ->fromQuery(Cache::get('paymentTypes'), 'name', 'num_days')
                                ->help(trans('texts.payment_type_help')) !!}

                        {!! Former::select('payment_terms')
                                ->addOption('','')
            				    ->fromQuery(Cache::get('paymentTerms'), 'name', 'num_days')
                                ->help(trans('texts.payment_terms_help')) !!}

                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">

                        <br/>&nbsp;<br/>
                        {!! Former::select('size_id')
                                ->addOption('','')
                                ->fromQuery($sizes, 'name', 'id') !!}

                        {!! Former::select('industry_id')
                                ->addOption('','')
                                ->fromQuery($industries, 'name', 'id')
                                ->help('texts.industry_help') !!}

                    </div>
                    <div role="tabpanel" class="tab-pane" id="signature">

                        <br/>
                        {!! Former::textarea('email_footer')->style('display:none')->raw() !!}
                        <div id="signatureEditor" class="form-control" style="min-height:160px" onclick="focusEditor()"></div>
                        @include('partials/quill_toolbar', ['name' => 'signature'])

                    </div>
                </div>

                <div class="col-md-10 col-md-offset-1">
                </div>

            </div>
        </div>
        </div>


	</div>

	<center>
        {!! Button::success(trans('texts.save'))->submit()->large()->appendIcon(Icon::create('floppy-disk')) !!}
	</center>

    {!! Former::close() !!}

	{!! Form::open(['url' => 'remove_logo', 'class' => 'removeLogoForm']) !!}
	{!! Form::close() !!}


	<script type="text/javascript">

        var editor = false;
        $(function() {
            $('#country_id').combobox();

            editor = new Quill('#signatureEditor', {
                modules: {
                    'toolbar': { container: '#signatureToolbar' },
                    'link-tooltip': true
                },
                theme: 'snow'
            });
            editor.setHTML($('#email_footer').val());
            editor.on('text-change', function(delta, source) {
                if (source == 'api') {
                    return;
                }
                var html = editor.getHTML();
                $('#email_footer').val(html);
                NINJA.formIsChanged = true;
            });
        });

        function focusEditor() {
            editor.focus();
        }

        function deleteLogo() {
            sweetConfirm(function() {
                $('.removeLogoForm').submit();
            });
        }

	</script>

@stop

@section('onReady')
    $('#name').focus();
@stop
