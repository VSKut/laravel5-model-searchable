<?php
namespace vskut\laravel5ModelSearchable;

trait Searchable {
    /**
     * @param $query
     * @param string $searchWord
     * @param array $searchFields
     * @return mixed
     */
    public function scopeSearchable($query, $searchWord, $searchFields = ['id'])
    {
        if ($searchWord) {
            $loop = true;
            foreach ($searchFields as $field){
                $query->where(
                    \DB::raw('LOWER('.$field.')'),
                    'LIKE BINARY',
                    '%'.mb_strtolower($searchWord).'%',
                    $loop ? 'and' : 'or'
                );
                $loop = false;
            }
        }

        return $query;
    }
}