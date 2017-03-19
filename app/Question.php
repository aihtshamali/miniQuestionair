<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
  public function questionair(){
    return $this->hasMany('App\Questionair');
  }
  public function questionair(){
    return $this->hasMany('App\Answer');
  }

}
?>
