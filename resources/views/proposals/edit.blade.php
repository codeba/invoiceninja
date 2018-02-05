@extends('header')

@section('head')
    @parent

    <script src="{{ asset('js/grapesjs.min.js') }}?no_cache={{ NINJA_VERSION }}" type="text/javascript"></script>
    <link href="{{ asset('css/grapesjs.css') }}?no_cache={{ NINJA_VERSION }}" rel="stylesheet" type="text/css"/>

    <style>
    .gjs-four-color {
        color: white !important;
    }
    .gjs-block.fa {
        font-size: 4em !important;
    }
    </style>

@stop

@section('content')

    {!! Former::open($url)
            ->method($method)
            ->id('mainForm')
            ->rules([
                'quote_id' => 'required',
                'proposal_template_id' => 'required',
            ]) !!}

    @if ($proposal)
        {!! Former::populate($proposal) !!}
    @endif

    <span style="display:none">
        {!! Former::text('public_id') !!}
        {!! Former::text('html') !!}
        {!! Former::text('css') !!}
    </span>

    <div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        {!! Former::select('quote_id')->addOption('', '')
                                ->label(trans('texts.quote'))
                                ->addGroupClass('quote-select') !!}
                        {!! Former::select('proposal_template_id')->addOption('', '')
                                ->label(trans('texts.template'))
                                ->addGroupClass('template-select') !!}

                    </div>
                    <div class="col-md-6">
                        {!! Former::textarea('private_notes')
                                ->style('height: 100px') !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <center class="buttons">
        {!! Button::normal(trans('texts.cancel'))
                ->appendIcon(Icon::create('remove-circle'))
                ->asLinkTo(HTMLUtils::previousUrl('/proposals')) !!}

        {!! Button::success(trans("texts.save"))
                ->withAttributes(array('id' => 'saveButton', 'onclick' => 'onSaveClick()'))
                ->appendIcon(Icon::create('floppy-disk')) !!}
    </center>

    {!! Former::close() !!}

    <div id="gjs"></div>

    <script type="text/javascript">
    var quotes = {!! $quotes !!};
    var quoteMap = {};

    var templates = {!! $templates !!};
    var templateMap = {};

    function onSaveClick() {
        $('#html').val(grapesjsEditor.getHtml());
        $('#css').val(grapesjsEditor.getCss());
        $('#mainForm').submit();
    }

    function loadTemplate() {
        var templateId = $('select#proposal_template_id').val();
        var template = templateMap[templateId];

        if (! template) {
            return;
        }

        var html = mergeTemplate(template.html);

        window.grapesjsEditor.setComponents(html);
        window.grapesjsEditor.setStyle(template.css);
    }

    function mergeTemplate(html) {
        var quoteId = $('select#quote_id').val();
        var quote = quoteMap[quoteId];

        if (!quote) {
            return html;
        }

        var regExp = new RegExp(/\$[a-z][\w\.]*/, 'g');
        var matches = html.match(regExp);

        if (matches) {
            for (var i=0; i<matches.length; i++) {
                var match = matches[i];

                field = match.substring(1, match.length);
                field = toSnakeCase(field);

                if (field == 'quote_number') {
                    field = 'invoice_number';
                }

                var value = getDescendantProp(quote, field) || ' ';
                value = doubleDollarSign(value) + '';
                value = value.replace(/\n/g, "\\n").replace(/\r/g, "\\r");
                html = html.replace(match, value);
            }
        }

        return html;
    }

    $(function() {
        var quoteId = {{ ! empty($quotePublicId) ? $quotePublicId : 0 }};
        var $quoteSelect = $('select#quote_id');
        for (var i = 0; i < quotes.length; i++) {
            var quote = quotes[i];
            quoteMap[quote.public_id] = quote;
            $quoteSelect.append(new Option(quote.invoice_number + ' - ' + getClientDisplayName(quote.client), quote.public_id));
        }
        @include('partials/entity_combobox', ['entityType' => ENTITY_QUOTE])
        if (quoteId) {
            var quote = quoteMap[quoteId];
            $quoteSelect.val(quote.public_id);
            setComboboxValue($('.quote-select'), quote.public_id, quote.invoice_number + ' - ' + getClientDisplayName(quote.client));
        }
        $quoteSelect.change(loadTemplate);

        var templateId = {{ ! empty($templatePublicId) ? $templatePublicId : 0 }};
        var $proposal_templateSelect = $('select#proposal_template_id');
        for (var i = 0; i < templates.length; i++) {
            var template = templates[i];
            templateMap[template.public_id] = template;
            $proposal_templateSelect.append(new Option(template.name, template.public_id));
        }
        @include('partials/entity_combobox', ['entityType' => ENTITY_PROPOSAL_TEMPLATE])
        if (templateId) {
            var template = templateMap[templateId];
            setComboboxValue($('.template-select'), template.public_id, template.name);
        }
        $proposal_templateSelect.change(loadTemplate);
	})

    </script>

    @include('proposals.grapesjs', ['entity' => $proposal])

    <script type="text/javascript">

    $(function() {
        grapesjsEditor.on('canvas:drop', function() {
            var html = mergeTemplate(grapesjsEditor.getHtml());
            grapesjsEditor.setComponents(html);
        });
    });

    </script>

@stop
