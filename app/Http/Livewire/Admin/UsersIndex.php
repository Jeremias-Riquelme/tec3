<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersIndex extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;

    public function updatinSearch()
    {
        $this->reseatPage();
    }

    public function render()
    {
       // $roles = Role::all();
        $users = User::where('name','LIKE','%'.$this->search.'%')
                       ->orWhere('email','LIKE','%'.$this->search.'%')
                       ->paginate();
        
        
       
        return view('livewire.admin.users-index',compact('users'));
    }
}
