<?php
    
class Quest extends Eloquent{
    
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'quests';
        
    /**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
    protected $hidden = array('owner');
    
    // ................................................................ mutators
    // range, value and nvalue may be arrays..
    public function getRangeAttribute($value)
    {
        return unserialize( $value );
    }
    
    public function setRangeAttribute($value)
    {
        $this->attributes['range'] = serialize( $value );
    }

    public function getValueAttribute($value)
    {
        return unserialize( $value );
    }
    
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = serialize( $value );
    }
    
    public function getNvalueAttribute($value)
    {
        return unserialize( $value );
    }
    
    public function setNvalueAttribute($value)
    {
        $this->attributes['nvalue'] = serialize( $value );
    }
}
