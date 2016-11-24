{!! Former::open(Utils::pluralizeEntityType($entityType) . '/bulk')->addClass('listForm') !!}

<div style="display:none">
	{!! Former::text('action') !!}
    {!! Former::text('public_id') !!}
    {!! Former::text('datatable')->value('true') !!}
</div>

<div class="pull-left">
	@can('create', 'invoice')
		@if ($entityType == ENTITY_TASK)
			{!! Button::primary(trans('texts.invoice'))->withAttributes(['class'=>'invoice', 'onclick' =>'submitForm("invoice")'])->appendIcon(Icon::create('check')) !!}
		@endif
		@if ($entityType == ENTITY_EXPENSE)
			{!! Button::primary(trans('texts.invoice'))->withAttributes(['class'=>'invoice', 'onclick' =>'submitForm("invoice")'])->appendIcon(Icon::create('check')) !!}
		@endif
	@endcan

	@if (in_array($entityType, [ENTITY_EXPENSE_CATEGORY, ENTITY_PRODUCT]))
	    {!! Button::normal(trans('texts.archive'))->asLinkTo('javascript:submitForm("archive")')->appendIcon(Icon::create('trash')) !!}
	@else
		{!! DropdownButton::normal(trans('texts.archive'))->withContents([
			      ['label' => trans('texts.archive_'.$entityType), 'url' => 'javascript:submitForm("archive")'],
			      ['label' => trans('texts.delete_'.$entityType), 'url' => 'javascript:submitForm("delete")'],
			    ])->withAttributes(['class'=>'archive'])->split() !!}
	@endif

	&nbsp;
	<span id="statusWrapper_{{ $entityType }}" style="display:none">
		<select class="form-control" style="width: 220px" id="statuses_{{ $entityType }}" multiple="true">
			@if (count(\App\Models\EntityModel::getStatusesFor($entityType)))
				<optgroup label="{{ trans('texts.entity_state') }}">
					@foreach (\App\Models\EntityModel::getStatesFor($entityType) as $key => $value)
						<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</optgroup>
				<optgroup label="{{ trans('texts.status') }}">
					@foreach (\App\Models\EntityModel::getStatusesFor($entityType) as $key => $value)
						<option value="{{ $key }}">{{ $value }}</option>
					@endforeach
				</optgroup>
			@else
				@foreach (\App\Models\EntityModel::getStatesFor($entityType) as $key => $value)
					<option value="{{ $key }}">{{ $value }}</option>
				@endforeach
			@endif
		</select>
	</span>
</div>

<div id="top_right_buttons" class="pull-right">
	<input id="tableFilter" type="text" style="width:140px;margin-right:17px;background-color: white !important"
        class="form-control pull-left" placeholder="{{ trans('texts.filter') }}" value="{{ Input::get('filter') }}"/>

	@if (empty($clientId))
	    @if ($entityType == ENTITY_EXPENSE)
	        {!! Button::normal(trans('texts.categories'))->asLinkTo(URL::to('/expense_categories'))->appendIcon(Icon::create('list')) !!}
	    @endif

		@if (Auth::user()->can('create', $entityType))
	    	{!! Button::primary(trans("texts.new_{$entityType}"))->asLinkTo(url(Utils::pluralizeEntityType($entityType) . '/create'))->appendIcon(Icon::create('plus-sign')) !!}
		@endif
	@endif

</div>

{!! Datatable::table()
	->addColumn(Utils::trans($datatable->columnFields()))
	->setUrl(url('api/' . Utils::pluralizeEntityType($entityType) . '/' . (isset($clientId) ? $clientId : '')))
    ->setCustomValues('rightAlign', isset($rightAlign) ? $rightAlign : [])
	->setCustomValues('entityType', Utils::pluralizeEntityType($entityType))
	->setCustomValues('clientId', isset($clientId) && $clientId)
	->setOptions('sPaginationType', 'bootstrap')
    ->setOptions('aaSorting', [[$datatable->sortCol, 'desc']])
	->render('datatable') !!}

@if ($entityType == ENTITY_PAYMENT)
	<div class="modal fade" id="paymentRefundModal" tabindex="-1" role="dialog" aria-labelledby="paymentRefundModalLabel" aria-hidden="true">
	  <div class="modal-dialog" style="min-width:150px">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="paymentRefundModalLabel">{{ trans('texts.refund_payment') }}</h4>
		  </div>

			<div class="modal-body">
				<div class="form-horizontal">
				  <div class="form-group">
					<label for="refundAmount" class="col-sm-offset-2 col-sm-2 control-label">{{ trans('texts.amount') }}</label>
					<div class="col-sm-4">
						<div class="input-group">
								<span class="input-group-addon" id="refundCurrencySymbol"></span>
					  		<input type="number" class="form-control" id="refundAmount" name="amount" step="0.01" min="0.01" placeholder="{{ trans('texts.amount') }}">
						</div>
						<div class="help-block">{{ trans('texts.refund_max') }} <span id="refundMax"></span></div>
					</div>
				  </div>
				</div>
			</div>

		 <div class="modal-footer" style="margin-top: 0px">
			<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('texts.cancel') }}</button>
			<button type="button" class="btn btn-primary" id="completeRefundButton">{{ trans('texts.refund') }}</button>
		 </div>

		</div>
	  </div>
	</div>
@endif

{!! Former::close() !!}

<script type="text/javascript">

function submitForm(action) {
	if (action == 'delete') {
        sweetConfirm(function() {
            $('#action').val(action);
    		$('form.listForm').submit();
        });
	} else {
		$('#action').val(action);
		$('form.listForm').submit();
    }
}

function deleteEntity(id) {
	$('#public_id').val(id);
	submitForm('delete');
}

function archiveEntity(id) {
	$('#public_id').val(id);
	submitForm('archive');
}

function restoreEntity(id) {
    $('#public_id').val(id);
    submitForm('restore');
}
function convertEntity(id) {
    $('#public_id').val(id);
    submitForm('convert');
}

function markEntity(id) {
	$('#public_id').val(id);
	submitForm('markSent');
}

function stopTask(id) {
    $('#public_id').val(id);
    submitForm('stop');
}

function invoiceEntity(id) {
    $('#public_id').val(id);
    submitForm('invoice');
}

@if ($entityType == ENTITY_PAYMENT)
	var paymentId = null;
	function showRefundModal(id, amount, formatted, symbol){
		paymentId = id;
		$('#refundCurrencySymbol').text(symbol);
		$('#refundMax').text(formatted);
		$('#refundAmount').val(amount).attr('max', amount);
		$('#paymentRefundModal').modal('show');
	}

	function handleRefundClicked(){
		$('#public_id').val(paymentId);
		submitForm('refund');
	}
@endif

/*
function setTrashVisible() {
	var checked = $('#trashed').is(':checked');
	var url = '{{ URL::to('set_entity_filter/' . $entityType) }}' + (checked ? '/true' : '/false');

    $.get(url, function(data) {
        refreshDatatable();
    })
}
*/

$(function() {
    var tableFilter = '';
    var searchTimeout = false;

    var oTable0 = $('#DataTables_Table_0').dataTable();
    var oTable1 = $('#DataTables_Table_1').dataTable();
    function filterTable(val) {
        if (val == tableFilter) {
            return;
        }
        tableFilter = val;
        oTable0.fnFilter(val);
    }

    $('#tableFilter').on('keyup', function(){
        if (searchTimeout) {
            window.clearTimeout(searchTimeout);
        }

        searchTimeout = setTimeout(function() {
            filterTable($('#tableFilter').val());
        }, 500);
    })

    if ($('#tableFilter').val()) {
        filterTable($('#tableFilter').val());
    }

    window.onDatatableReady = function() {
        $(':checkbox').click(function() {
            setBulkActionsEnabled();
        });

        $('tbody tr').unbind('click').click(function(event) {
            if (event.target.type !== 'checkbox' && event.target.type !== 'button' && event.target.tagName.toLowerCase() !== 'a') {
                $checkbox = $(this).closest('tr').find(':checkbox:not(:disabled)');
                var checked = $checkbox.prop('checked');
                $checkbox.prop('checked', !checked);
                setBulkActionsEnabled();
            }
        });

        actionListHandler();
    }

	@if ($entityType == ENTITY_PAYMENT)
	$('#completeRefundButton').click(handleRefundClicked)
	@endif

    $('.archive, .invoice').prop('disabled', true);
    $('.archive:not(.dropdown-toggle)').click(function() {
        submitForm('archive');
    });

    $('.selectAll').click(function() {
        $(this).closest('table').find(':checkbox:not(:disabled)').prop('checked', this.checked);
    });

    function setBulkActionsEnabled() {
        var buttonLabel = "{{ trans('texts.archive') }}";
        var count = $('tbody :checkbox:checked').length;
        $('button.archive, button.invoice').prop('disabled', !count);
        if (count) {
            buttonLabel += ' (' + count + ')';
        }
        $('button.archive').not('.dropdown-toggle').text(buttonLabel);
    }

	$('#statuses_{{ $entityType }}').select2({
		placeholder: "{{ trans('texts.status') }}",
	}).val('{{ session('entity_state_filter:' . $entityType, STATUS_ACTIVE) . ',' . session('entity_status_filter:' . $entityType) }}'.split(','))
		  .trigger('change')
	  .on('change', function() {
		var filter = $('#statuses_{{ $entityType }}').val();
		if (filter) {
			filter = filter.join(',');
		} else {
			filter = '';
		}
		var url = '{{ URL::to('set_entity_filter/' . $entityType) }}' + '/' + filter;
        $.get(url, function(data) {
            refreshDatatable();
        })
	}).maximizeSelect2Height();

	$('#statusWrapper_{{ $entityType }}').show();

});

</script>
