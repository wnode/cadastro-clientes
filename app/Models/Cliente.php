<?php

// Desafio Essentia Desenvolvedor - Back End

// Model: app/Models/Cliente.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Specifies which attributes are mass assignable
    protected $fillable = ['nome', 'email', 'telefone', 'foto'];
}