<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\Judger;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersList extends Component
{
    use WithPagination;
    public $main_categories;
    public $sub_categories;
    public $selected_main_id;
    public $parent;
    public function mount(){
        $this->main_categories = Department::query()->whereNull('parent')->get();
    }
    public function updated(){
        $this->resetPage();

    }
    public function arrWith()
    {
        return ['accessVendors','department', 'entities', 'negotiations', 'country', 'city', 'user', 'offers', 'files', 'judgers', 'judger_requests'];

    }
    public function render()
    {
        if (auth()->check() and $judger = Judger::query()->find(auth()->id())){
            $query = $judger->orders()
                ->whereIn('order_status',['ongoing','done']);
        }else{
            $query = Order::select('*')->where(function ($q) {
                if (auth()->check() and auth()->user()->membership_type === 'user') {
                    $q->where('user_id',auth('api')->id() );
                } else {
                    $q->where('order_status', 'open');
                    $q->where('choose_service_provider', 'all')
                        ->orWhere(function ($q1) {
                            $q1->where('choose_service_provider', 'by_city')
                                ->where('city_id', auth('api')->id());
                        });
                }
            });
        }
        $orders = $query
            ->where(function ($q){
                if ($this->parent){
                    return $q->where('department_id',$this->parent);
                }
            })
            ->with($this->arrWith())->orderBy("id", "desc")->paginate(15);
        if ($this->parent)
        $this->sub_categories = Department::query()->whereParent($this->selected_main_id)->get();
        return view('livewire.orders-list',compact('orders'));
    }
}
