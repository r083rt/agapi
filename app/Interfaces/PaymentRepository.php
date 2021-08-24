<?php 
namespace App\Interfaces;

interface PaymentRepository{
    public function findOrFail($id);
    public function save();
}