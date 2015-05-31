<?php namespace App\Models;

use Eloquent;
use Omnipay;

class Gateway extends Eloquent
{
    public $timestamps = true;

    public static $paymentTypes = [
        PAYMENT_TYPE_CREDIT_CARD,
        PAYMENT_TYPE_PAYPAL,
        PAYMENT_TYPE_BITCOIN,
        //PAYMENT_TYPE_DWOLLA
    ];

    public static $hiddenFields = [
        // PayPal
        'headerImageUrl',
        'solutionType',
        'landingPage',
        'brandName',
        'logoImageUrl',
        'borderColor',
        // Dwolla
        'gatewaySession',
        'purchaseOrder',
        'Callback',
        'Redirect',
        'shipping',
        'tax',
        'discount',
        'notes',
        'AllowFundingSources',
        'AllowGuestCheckout',
    ];

    public static $optionalFields = [
        // PayPal
        'testMode',
        'developerMode',
    ];

    public function getLogoUrl()
    {
        return '/images/gateways/logo_'.$this->provider.'.png';
    }

    public function getHelp()
    {
        $link = '';

        if ($this->id == GATEWAY_AUTHORIZE_NET || $this->id == GATEWAY_AUTHORIZE_NET_SIM) {
            $link = 'http://reseller.authorize.net/application/?id=5560364';
        } elseif ($this->id == GATEWAY_PAYPAL_EXPRESS) {
            $link = 'https://www.paypal.com/us/cgi-bin/webscr?cmd=_login-api-run';
        } elseif ($this->id == GATEWAY_TWO_CHECKOUT) {
            $link = 'https://www.2checkout.com/referral?r=2c37ac2298';
        } elseif ($this->id == GATEWAY_BITPAY) {
            $link = 'https://bitpay.com/dashboard/signup';
        } elseif ($this->id == GATEWAY_DWOLLA) {
            $link = 'https://www.dwolla.com/register';
        }

        $key = 'texts.gateway_help_'.$this->id;
        $str = trans($key, ['link' => "<a href='$link' target='_blank'>Click here</a>"]);

        return $key != $str ? $str : '';
    }

    public function getFields()
    {
        return Omnipay::create($this->provider)->getDefaultParameters();
    }

    public static function getPaymentType($gatewayId) {
        if ($gatewayId == GATEWAY_PAYPAL_EXPRESS) {
            return PAYMENT_TYPE_PAYPAL;
        } else if ($gatewayId == GATEWAY_BITPAY) {
            return PAYMENT_TYPE_BITCOIN;
        } else if ($gatewayId == GATEWAY_DWOLLA) {
            return PAYMENT_TYPE_DWOLLA;
        } else {
            return PAYMENT_TYPE_CREDIT_CARD;
        }
    }

    public static function getPrettyPaymentType($gatewayId) {
        return trans('texts.' . strtolower(Gateway::getPaymentType($gatewayId)));
    }
}
