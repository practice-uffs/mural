<?php

namespace App\Http\Livewire\Admin;

use App\Model\Category;
use App\Model\Location;
use App\Model\Order;
use App\Model\Service;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Orders extends Component
{
    public array $orders = [];
    public array $categories;
    public array $services;
    public array $locations;
    public array $statuses;
    public array $filter = [];

    public function mount()
    {
        $this->categories = Category::all()->toArray();
        $this->services = Service::with('category')->get()->toArray();
        $this->locations = Location::all()->toArray();
        $this->statuses = [
            'pending' => 'Aguardando análise',
            'doing' => 'Em andamento',
            'closed' => 'Cancelado/fechado',
            'complete' => 'Finalizado',
            '*' => 'Qualquer',
        ];
        $this->findOrders();
    }

    protected function applyCategoryFilter(Builder &$query) {
        $categoryId = @$this->filter['category_id'];

        if (!empty($categoryId)) {
            $serciceIds = Service::all()->map(function($service) use ($categoryId) {
                if ($service->category_id == $categoryId) {
                    return $service->id;
                }
            });

            $query->whereIn('service_id', $serciceIds);
        }
    }

    protected function applyServiceFilter(Builder &$query) {
        if (!empty($this->filter['service_id'])) {
            $query->where('service_id', $this->filter['service_id']);
        }
    }

    protected function applyLocationFilter(Builder &$query) {
        if (!empty($this->filter['location_id'])) {
            $query->where('location_id', $this->filter['location_id']);
        }
    }

    protected function applyStatusFilter(Builder &$query) {
        $status = @$this->filter['status'];

        switch($status) {
        case 'pending': // 'Aguardando análise',
            $query->whereNull('github_issue_link');
            break;
        case 'doing': // 'Em andamento',
            $query->whereNotNull('github_issue_link');
            break;
        case 'closed': // 'Cancelado/fechado',
            $query->where('is_closed', true);
            break;
        case 'complete': // 'Finalizado',
            // TODO: implement this
            break;
        default: // 'Qualquer',
        }
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

        $query->orderBy('updated_at', 'desc');

        $this->orders = $query->get()->toArray();
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
            $this->services = Service::with('category')->get()->toArray();
        } else {
            $this->services = Service::with('category')
                                    ->where('category_id', $value)
                                    ->get()
                                    ->toArray();
        }
    }    

    public function render()
    {
        return view('livewire.admin.orders');
    }
}
