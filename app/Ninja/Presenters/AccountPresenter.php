<?php

namespace App\Ninja\Presenters;

use Carbon;
use Domain;
use Laracasts\Presenter\Presenter;
use stdClass;
use Utils;

/**
 * Class AccountPresenter.
 */
class AccountPresenter extends Presenter
{
    /**
     * @return mixed
     */
    public function name()
    {
        return $this->entity->name ?: trans('texts.untitled_account');
    }

    /**
     * @return string
     */
    public function website()
    {
        return Utils::addHttp($this->entity->website);
    }

    /**
     * @return mixed
     */
    public function currencyCode()
    {
        $currencyId = $this->entity->getCurrencyId();
        $currency = Utils::getFromCache($currencyId, 'currencies');

        return $currency->code;
    }

    public function clientPortalLink()
    {
        return Domain::getLinkFromId($this->entity->domain_id);
    }

    public function industry()
    {
        return $this->entity->industry ? $this->entity->industry->name : '';
    }

    public function size()
    {
        return $this->entity->size ? $this->entity->size->name : '';
    }

    public function paymentTerms()
    {
        $terms = $this->entity->payment_terms;

        if ($terms == 0) {
            return '';
        } elseif ($terms == -1) {
            $terms = 0;
        }

        return trans('texts.payment_terms_net') . ' ' . $terms;
    }

    public function dueDatePlaceholder()
    {
        if ($this->entity->payment_terms == 0) {
            return ' ';
        }

        $date = $this->entity->defaultDueDate();

        return $date ? Utils::fromSqlDate($date) : ' ';
    }

    private function createRBit($type, $source, $properties)
    {
        $data = new stdClass();
        $data->receive_time = time();
        $data->type = $type;
        $data->source = $source;
        $data->properties = new stdClass();

        foreach ($properties as $key => $val) {
            $data->properties->$key = $val;
        }

        return $data;
    }

    public function rBits()
    {
        $account = $this->entity;
        $user = $account->users()->first();
        $data = [];

        $data[] = $this->createRBit('business_name', 'user', ['business_name' => $account->name]);
        $data[] = $this->createRBit('industry_code', 'user', ['industry_detail' => $account->present()->industry]);
        $data[] = $this->createRBit('comment', 'partner_database', ['comment_text' => 'Logo image not present']);
        $data[] = $this->createRBit('business_description', 'user', ['business_description' => $account->present()->size]);

        $data[] = $this->createRBit('person', 'user', ['name' => $user->getFullName()]);
        $data[] = $this->createRBit('email', 'user', ['email' => $user->email]);
        $data[] = $this->createRBit('phone', 'user', ['phone' => $user->phone]);
        $data[] = $this->createRBit('website_uri', 'user', ['uri' => $account->website]);
        $data[] = $this->createRBit('external_account', 'partner_database', ['is_partner_account' => 'yes', 'account_type' => 'Invoice Ninja', 'create_time' => time()]);

        return $data;
    }

    public function dateRangeOptions()
    {
        $yearStart = Carbon::parse($this->entity->financialYearStart() ?: '2000-01-01');
        $month = $yearStart->month - 1;
        $year = $yearStart->year;
        $lastYear = $year - 1;

        $str = '{
            "' . trans('texts.last_7_days') . '": [moment().subtract(6, "days"), moment()],
            "' . trans('texts.last_30_days') . '": [moment().subtract(29, "days"), moment()],
            "' . trans('texts.this_month') . '": [moment().startOf("month"), moment().endOf("month")],
            "' . trans('texts.last_month') . '": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
            "' . trans('texts.this_year') . '": [moment().date(1).month(' . $month . ').year(' . $year . '), moment()],
            "' . trans('texts.last_year') . '": [moment().date(1).month(' . $month . ').year(' . $lastYear . '), moment().date(1).month(' . $month . ').year(' . $year . ').subtract(1, "day")],
        }';

        return $str;
    }
}
