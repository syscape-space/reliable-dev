<button type="button" wire:click="trigger">
    @if(auth()->user()->favourite($item->id,get_class($item)))
        <i class="fa-solid fa-star star-box"></i>
    @else
        <i class="fa-light fa-star star-box"></i>
    @endif
</button>
