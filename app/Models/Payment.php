<?php namespace App\Models;

use Event;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\PaymentWasCreated;
use App\Events\PaymentWasRefunded;
use Laracasts\Presenter\PresentableTrait;

class Payment extends EntityModel
{
    use PresentableTrait;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $presenter = 'App\Ninja\Presenters\PaymentPresenter';

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice')->withTrashed();
    }

    public function invitation()
    {
        return $this->belongsTo('App\Models\Invitation');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withTrashed();
    }

    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact');
    }

    public function account_gateway()
    {
        return $this->belongsTo('App\Models\AccountGateway');
    }

    public function payment_type()
    {
        return $this->belongsTo('App\Models\PaymentType');
    }    

    public function payment_status()
    {
        return $this->belongsTo('App\Models\PaymentStatus');
    }

    public function getRoute()
    {
        return "/payments/{$this->public_id}/edit";
    }

    /*
    public function getAmount()
    {
        return Utils::formatMoney($this->amount, $this->client->getCurrencyId());
    }
    */

    public function getName()
    {
        return trim("payment {$this->transaction_reference}");
    }

    public function isPending()
    {
        return $this->payment_status_id = PAYMENT_STATUS_PENDING;
    }
    
    public function isFailed()
    {
        return $this->payment_status_id = PAYMENT_STATUS_FAILED;
    }
    
    public function isCompleted()
    {
        return $this->payment_status_id >= PAYMENT_STATUS_COMPLETED;
    }
    
    public function isPartiallyRefunded()
    {
        return $this->payment_status_id == PAYMENT_STATUS_PARTIALLY_REFUNDED;
    }
    
    public function isRefunded()
    {
        return $this->payment_status_id == PAYMENT_STATUS_REFUNDED;
    }

    public function recordRefund($amount = null)
    {
        if (!$this->isRefunded()) {
            if (!$amount) {
                $amount = $this->amount;
            }
            
            $new_refund = min($this->amount, $this->refunded + $amount);
            $refund_change = $new_refund - $this->refunded;
            
            if ($refund_change) {
                $this->refunded = $new_refund;
                $this->payment_status_id = $this->refunded == $this->amount ? PAYMENT_STATUS_REFUNDED : PAYMENT_STATUS_PARTIALLY_REFUNDED;
                $this->save();
                
                Event::fire(new PaymentWasRefunded($this, $refund_change));
            }
        }
    }

    public function getEntityType()
    {
        return ENTITY_PAYMENT;
    }
}

Payment::creating(function ($payment) {
    
});

Payment::created(function ($payment) {
    event(new PaymentWasCreated($payment));
});