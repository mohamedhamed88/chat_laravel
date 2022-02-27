<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    //protected $table = "message"; si la table n'est pas en meme nom du model en pluriel
    // protected $fillable = ['message','user_id','receiver_id'];
    protected $guarded = [];
    public function sender()
    {
        return $this->belongsTo('App\User');
        // si le champs de la clé etrangére  est le méme nom du table en singulier suivi par _id (user_id)
        // pas besoin d'indiquer la clé etrangére , il va pointer automatiquement
    }

    public function receiver()
    {
        return $this->belongsTo('App\User', 'receiver_id', 'id');
        // si le nom different du nom du table _id on peut indiquer l indexation
    }
}
