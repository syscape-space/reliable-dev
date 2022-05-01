<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FavoriteButton extends Component
{
    public $item;
    public function mount($item){
        $this->item = $item;
    }
    public function trigger(){
        $user = User::query()->find(auth()->id());
        $user->triggerOfferFavorite($this->item->id,get_class($this->item));
    }
    public function render()
    {
        return view('livewire.favorite-button');
    }
}
