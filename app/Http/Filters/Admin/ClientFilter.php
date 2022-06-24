<?php


namespace App\Http\Filters\Admin;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends AbstractFilter {

    // Константы с названиями переменных в GET-запросе фильтра
    public const NAME = 'name';
    public const DATE_OF_SIGNED_MORE = 'date_of_signed_more';
    public const DATE_OF_SIGNED_LESS = 'date_of_signed_less';
    public const PURCHASE_MORE = 'purchase_more';
    public const PURCHASE_LESS = 'purchase_less';
    public const REGION = 'region';

    public const NAME_SORT = 'name_sort';
    public const PURCHASE_SORT = 'purchase_sort';


    // Вызов метода фильтра в соответствии с константой
    protected function getCallbacks(): array {
        return [
            self::NAME => [$this, 'name'],
            self::DATE_OF_SIGNED_MORE => [$this, 'dateOfSignedMore'],
            self::DATE_OF_SIGNED_LESS => [$this, 'dateOfSignedLess'],
            self::PURCHASE_MORE => [$this, 'purchaseMore'],
            self::PURCHASE_LESS => [$this, 'purchaseLess'],
            self::REGION => [$this, 'region'],

            self::NAME_SORT => [$this, 'nameSort'],
            self::PURCHASE_SORT => [$this, 'purchaseSort'],
        ];
    }

    // НАЗВАНИЕ КЛИЕНТА
    public function name(Builder $builder, $value) {
        if ($value !== null) $builder->where('name', 'like', "%{$value}%");
    }

    // ФИЛЬТРЫ ПО ДАТЕ ДОГОВОРА
    public function dateOfSignedMore(Builder $builder, $value) {
        if ($value !== null) $builder->where('date_of_signed',  '>', $value);
    }
    public function dateOfSignedLess(Builder $builder, $value) {
        if ($value !== null) $builder->where('date_of_signed', '<', $value);
    }


    // ФИЛЬТРЫ СУММЕ КОНТРАКТА
    public function purchaseMore(Builder $builder, $value) {
        if ($value !== null) $builder->where('purchase',  '>', $value);
    }
    public function purchaseLess(Builder $builder, $value) {
        if ($value !== null) $builder->where('purchase', '<', $value);
    }

    // РЕГИОН
    public function region(Builder $builder, $arrOfValues) {
        if ($arrOfValues[0] !== null) $builder->whereIn('region', $arrOfValues);
    }


    // СОРТИРОВКА ПО НАЗВАНИЮ
    public function nameSort(Builder $builder, $value) {
        $builder->orderBy('name', "$value");
    }

    // СОРТИРОВКА ПО СТОИМОСТИ
    public function purchaseSort(Builder $builder, $value) {
        $builder->orderBy('purchase', "$value");
    }
}
