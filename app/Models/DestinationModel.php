<?php
//XII RPL B_09_Faiq Varian

namespace App\Models;

use CodeIgniter\Model;

class DestinationModel extends Model
{
    protected $table = 'destination';
    protected $useTimestamps = true;
    protected $allowedFields = ['city', 'price', 'details', 'img', 'slug'];

    public function getDestination($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
