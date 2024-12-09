<?php
// permitiendo realizar operaciones como insertar, actualizar, consultar o eliminar registros.
namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
class usuario extends Model
{
    protected $fillable = ['nombre', 'apellido', 'email', 'password'];
   
    //use Illuminate\Database\Eloquent\Factories\HasFactory;
    
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios'; //
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    
   
}
 
