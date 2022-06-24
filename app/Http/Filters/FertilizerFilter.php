<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class FertilizerFilter extends AbstractFilter {

    // Константы с названиями переменных в GET-запросе фильтра
    public const NAME = 'name';
    public const NITROGEN_RATE_MORE = 'nitrogen_more';
    public const NITROGEN_RATE_LESS = 'nitrogen_less';
    public const PHOSPHORUS_RATE_MORE = 'phosphorus_more';
    public const PHOSPHORUS_RATE_LESS = 'phosphorus_less';
    public const POTASSIUM_RATE_MORE = 'potassium_more';
    public const POTASSIUM_RATE_LESS = 'potassium_less';
    public const CULTURE_ID = 'culture_id';
    public const REGION = 'region';
    public const PRICE_MORE = 'price_more';
    public const PRICE_LESS = 'price_less';
    public const DESCRIPTION = 'description';
    public const PURPOSE = 'purpose';

    public const NAME_SORT = 'name_sort';
    public const PRICE_SORT = 'price_sort';


    // Вызов метода фильтра в соответствии с константой
    protected function getCallbacks(): array {
        return [
            self::NAME => [$this, 'name'],
            self::NITROGEN_RATE_MORE => [$this, 'nitrogenRateMore'],
            self::NITROGEN_RATE_LESS => [$this, 'nitrogenRateLess'],
            self::PHOSPHORUS_RATE_MORE => [$this, 'phosphorusRateMore'],
            self::PHOSPHORUS_RATE_LESS => [$this, 'phosphorusRateLess'],
            self::POTASSIUM_RATE_MORE => [$this, 'potassiumRateMore'],
            self::POTASSIUM_RATE_LESS => [$this, 'potassiumRateLess'],
            self::CULTURE_ID => [$this, 'cultureId'],
            self::REGION => [$this, 'region'],
            self::PRICE_MORE => [$this, 'priceMore'],
            self::PRICE_LESS => [$this, 'priceLess'],
            self::DESCRIPTION => [$this, 'description'],
            self::PURPOSE => [$this, 'purpose'],

            self::NAME_SORT => [$this, 'nameSort'],
            self::PRICE_SORT => [$this, 'priceSort'],
        ];
    }

    // НАЗВАНИЕ УДОБРЕНИЯ
    public function name(Builder $builder, $value) {
        if ($value !== null) $builder->where('name', 'like', "%{$value}%");
    }

    // ФИЛЬТРЫ ПО ДОЛЕ АЗОТА
    public function nitrogenRateMore(Builder $builder, $value) {
        if ($value !== null) $builder->where('nitrogen_rate',  '>', $value);
    }
    public function nitrogenRateLess(Builder $builder, $value) {
        if ($value !== null) $builder->where('nitrogen_rate', '<', $value);
    }


    // ФИЛЬТРЫ ПО ДОЛЕ ФОСФОРА
    public function phosphorusRateMore(Builder $builder, $value) {
        if ($value !== null) $builder->where('phosphorus_rate',  '>', $value);
    }
    public function phosphorusRateLess(Builder $builder, $value) {
        if ($value !== null) $builder->where('phosphorus_rate', '<', $value);
    }


    // ФИЛЬРЫ ПО ДОЛЕ КАЛИЯ
    public function potassiumRateMore(Builder $builder, $value) {
        if ($value !== null) $builder->where('potassium_rate',  '>', $value);
    }
    public function potassiumRateLess(Builder $builder, $value) {
        if ($value !== null) $builder->where('potassium_rate', '<', $value);
    }


    // ГРУППА КУЛЬТУР
    public function cultureId(Builder $builder, $arrOfValues) {
        if ($arrOfValues[0] !== null) $builder->whereIn('culture_id', $arrOfValues);
    }


    // РЕГИОН
    public function region(Builder $builder, $arrOfValues) {
        if ($arrOfValues[0] !== null) $builder->whereIn('region', $arrOfValues);
    }

    // ФИЛЬТРЫ ПО СТОИМОСТИ
    public function priceMore(Builder $builder, $value) {
        if ($value !== null) $builder->where('price',  '>', $value);
    }
    public function priceLess(Builder $builder, $value) {
        if ($value !== null) $builder->where('price', '<', $value);
    }


    // ОПИСАНИЕ УДОБРЕНИЯ
    public function description(Builder $builder, $value) {
        $builder->where('description', 'like', "%{$value}%");
    }


    // ПРИМЕНЕНИЕ
    public function purpose(Builder $builder, $value) {
        $builder->where('purpose', 'like', "%{$value}%");
    }


    // СОРТИРОВКА ПО НАЗВАНИЮ
    public function nameSort(Builder $builder, $value) {
        $builder->orderBy('name', "$value");
    }

    // СОРТИРОВКА ПО СТОИМОСТИ
    public function priceSort(Builder $builder, $value) {
        $builder->orderBy('price', "$value");
    }
}
