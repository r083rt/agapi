<?php 
namespace App\Interfaces;

interface AssigmentRepository{
    public function findOrFail($id);
}