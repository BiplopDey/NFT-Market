<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($instants as $instant)
        <livewire:instant-card :instant="$instant" :wire:key="$instant->id">
    @endforeach
</div>