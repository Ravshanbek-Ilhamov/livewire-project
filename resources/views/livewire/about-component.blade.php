<div>
    <div class="row">
        <div class="col-10">
            <input type="number" class="form-control mt-2" wire:model="number1" placeholder="Number 1:">
            <select class="form-control mt-2" wire:model="operator">
                <option value="">Select Operator</option>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
                <option value="%">%</option>
            </select>
            <input type="number" class="form-control mt-2" wire:model="number2" placeholder="Number 2:">
            <input type="submit" class="btn btn-primary mt-2" wire:click="calculate">
            <span class="form-control mt-2"> Result:{{$result}}</span>
        </div>
    </div>
   
</div>
