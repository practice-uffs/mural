<div>
    <div class="form-group">
        <label for="exampleInputPassword1">Enter Name</label>
        <input type="text" wire:model="title" class="form-control input-sm"  placeholder="Name">
    </div>
    <div class="form-group">
        <label>Enter Email</label>
        <input type="text" class="form-control input-sm" placeholder="Enter email" wire:model="description">
    </div>
    <button wire:click="store()" class="btn btn-primary">Submit</button>
</div>