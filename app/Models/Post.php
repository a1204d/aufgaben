<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;


class Post extends Model

{

    function topic() {

        return $this->belongsTo(Topic::class);

    }

}
