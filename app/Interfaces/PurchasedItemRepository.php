<?php 
namespace App\Interfaces;

interface PurchasedItemRepository{
    public function isExists();
    public function save();
}