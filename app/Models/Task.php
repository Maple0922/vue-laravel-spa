<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Task extends Model
{
    protected $fillable = [
        'title',
        'content',
        'is_done'
    ];

    use HasFactory;

    public function get_tasks() // TaskController@index
    {
        return $this->all();
    }

    public function save_task($data) // TaskController@store
    {
        return $this->create($data->all());
    }

    public function get_task($id) // TaskController@show
    {
        return $this->find($id);
    }

    public function update_task($id, $data) // TaskController@update
    {
        return $this->find($id)->update($data->all());
    }

    public function delete_task($id) // TaskController@destroy
    {
        return $this->find($id)->delete();
    }
}
