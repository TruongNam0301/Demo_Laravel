<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    public $timestamps = false;

    public function types()
    {
        return $this->belongsTo('App\Models\types','type_id','id');
    }

    public function create($file,$name,$price,$type){
        $this->name = $name;
        $this->image = $file;
        $this->price = $price;
        $this->type_id = $type;
        return $this->save();
    }

    public function updateProduct($file,$name,$price,$type){
        if($this->name != $name) $this->name = $name;
        if($this->price != $price) $this->price = $price;
        if($this->type_id != $type)$this->type_id = $type;
        if($file != NULL){
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $arr= ['jpg','png','jpeg'];
            if (in_array($extension,$arr)){
                $fileNameToStore = time().'_'.$filename;
                $file->move('../resources/image', $fileNameToStore);
            }
            $this->image =  $fileNameToStore;
        }
        return $this->save();
    }
}
