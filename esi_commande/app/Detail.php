<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public $incrementing = false;
    protected $table = "details";
    protected $primaryKey = array('id_order', 'id_product');
    public $timestamps = false;
    
    protected function getKeyForSaveQuery()
    {
    
        $primaryKeyForSaveQuery = array(count($this->primaryKey));
    
        foreach ($this->primaryKey as $i => $pKey) {
            $primaryKeyForSaveQuery[$i] = isset($this->original[$this->getKeyName()[$i]])
                ? $this->original[$this->getKeyName()[$i]]
                : $this->getAttribute($this->getKeyName()[$i]);
        }
    
        return $primaryKeyForSaveQuery;
    
    }
    
    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
    
        foreach ($this->primaryKey as $i => $pKey) {
            $query->where($this->getKeyName()[$i], '=', $this->getKeyForSaveQuery()[$i]);
        }
    
        return $query;
    }

    
    public static function keyName() {
        return (new static)->getPrimaryKey();
    }

    public function getKeys(){
        return $this->getKeyForSaveQuery();
    }
    
}
