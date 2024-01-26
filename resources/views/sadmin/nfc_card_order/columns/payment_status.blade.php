@if($row->nfcTransaction->status == App\Models\NfcOrders::PENDING)
<div class="form-check form-switch">
    <input class="form-check-input paymentStatus" type="checkbox" id="paymentStatus" name="is_active" data-id="{{$row->nfcTransaction->id}}" >
</div>
@elseif($row->nfcTransaction->status == App\Models\NfcOrders::SUCCESS)
<span class="badge bg-success">{{ __('messages.nfc.paid') }}</span>
@elseif ($row->nfcTransaction->status == App\Models\NfcOrders::FAIL)
<span class="badge bg-danger">{{ __('messages.nfc.failed') }}</span>
@endif
