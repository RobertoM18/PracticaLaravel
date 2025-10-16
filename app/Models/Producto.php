<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
        'categoria_Id',
        'nombre',
        'sku',
        'precio',
        'stock',
        'activo',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'categoria_Id');
    }
}
