<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Location;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Orders extends Component
{
    protected $orders;
    public Collection $categories;
    public Collection $services;
    public Collection $locations;
    public int $paginationAmount = 50;
    public array $statuses;
    public array $filter = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->services = Service::with('category')->get();
        $this->locations = Location::all();
        $this->statuses = [
            '*' => 'Qualquer',
            'pending' => 'Aguardando análise',
            'todo' => 'Na fila (aceitamos, mas não começamos)',
            'doing' => 'Em andamento',
            'review' => 'Em revisão',
            'closed' => 'Cancelado (não entregamos algo)',
            'completed' => 'Finalizado (entregamos algo)',
        ];
        $this->sort_by_date = [
                'Data de criação',
                'Último comentário',
                'Última atualização'
        ];
        $this->findOrders();
    }

    protected function applyCategoryFilter(Builder &$query) {
        $categoryId = @$this->filter['category_id'];

        if (empty($categoryId)) {
            return;
        }


        $serciceIds = Service::all()->map(function($service) use ($categoryId) {
            if ($service->category_id == $categoryId) {
                return $service->id;
            }
        });

        $query->whereIn('service_id', $serciceIds);
    }

    protected function applyServiceFilter(Builder &$query) {
        if (empty($this->filter['service_id'])) {
            return;
        }

        $query->where('service_id', $this->filter['service_id']);
    }

    protected function applyLocationFilter(Builder &$query) {
        if (empty($this->filter['location_id'])) {
            return;
        }

        $query->where('location_id', $this->filter['location_id']);
    }

    protected function applyStatusFilter(Builder &$query) {
        $status = @$this->filter['status'];

        switch($status) {
        case 'pending': // 'Aguardando análise',
            $query->whereNull('status');
            break;
        case 'todo': // 'Na fila de trabalho (aceitamos, mas não tem issue)',
            $query->where('status', 'todo');
            break;
        case 'doing': // 'Em andamento',
            $query->where('status', 'doing');
            break;
        case 'closed': // 'Cancelado/fechado',
            $query->where('status', 'closed');
            break;
        case 'completed': // 'Finalizado',
            $query->where('status', 'completed');
            break;
        case 'review': // 'Em revisão',
            $query->where('status', 'review');
            break;
        default: // 'Qualquer',
        }
    }
    
    protected function applyDateFilter(Builder &$query){
            $selected = @$this->filter['sortDate'];
        
            $query->leftJoin('comments','comments.commentable_id','=','orders.id')
                  ->select('comments.created_at as commentable_created',
                            'comments.commentable_id',
                            'orders.*'
            );// left join com o id dos pedidos e comentarios(cada comentário vira um card de pedido)
        
            if ($selected=='1')
                $query->orderBy('commentable_created','desc');
            elseif ($selected=='2')
                $query->orderBy('updated_at','desc');
            else  
                $query->orderBy('created_at','desc');
                
        }
    
    public function findOrders()
    {
        $query = Order::with([
            'service',
            'service.category',
            'user',
            'comments',
            'comments.user'
        ]);

        $this->applyCategoryFilter($query);
        $this->applyServiceFilter($query);
        $this->applyLocationFilter($query);
        $this->applyStatusFilter($query);
        $this->applyDateFilter($query);
        
        $this->orders = $query->paginate($this->paginationAmount);
    }

    public function updatedFilter($value)
    {
        $this->findOrders();
    }

    public function updated($field, $value)
    {
        if ($field != 'filter.category_id') {
            return;
        }

        $this->filter['service_id'] = '';

        if (empty($value)) {
            $this->services = Service::with('category')->get();
        } else {
            $this->services = Service::with('category')
                                    ->where('category_id', $value)
                                    ->get();
        }
    }

    public function render()
    {
        return view('livewire.admin.orders', [
            'orders' => $this->orders,
        ]);
    }
}
