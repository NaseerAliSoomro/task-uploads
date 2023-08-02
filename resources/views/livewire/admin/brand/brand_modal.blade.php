<!-- Delete Modal -->
<div wire:ignore class="modal fade" id="insertBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Insert Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="store">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12 mb-3">
                        <label for="name"> Name </label>
                        <input type="text" wire:model.defer="name" class="form-control rounded bordered" />
                        <span class="text-danger"> @error('name')
                                {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="slug"> Slug </label>
                        <input type="text" wire:model.defer="slug" class="form-control rounded bordered" />
                        <span class="text-danger"> @error('slug')
                                {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="col-md-12 mb-3 text-center">
                        <label for="statuss"> Status </label>
                        <input type="checkbox" wire:model.defer="status" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary text-white">Insert</button>
                    </div>
            </form>
        </div>
    </div>
</div>
