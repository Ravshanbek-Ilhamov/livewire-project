<div>
    <!-- Form to create a new post -->
    <input type="text" wire:model="title" class="form-control mt-2" placeholder="Title:">
    <input type="text" wire:model="description" class="form-control mt-2" placeholder="Description:">
    <input type="text" wire:model="text" class="form-control mt-2" placeholder="Text:">
    @if ($isEditing)
        <input type="submit" value="Update" class="btn btn-primary m-2" wire:click="update">
        <input type="submit" value="Cencel" class="btn btn-primary m-2" wire:click="cencel">    
    @else
        <input type="submit" value="Create" class="btn btn-primary m-2" wire:click="store">
    @endif

    <!-- Table to display posts -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Text</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->text }}</td>
                    <td>
                        <!-- Delete button -->
                        <input type="submit" class="btn btn-danger m-2" value="Delete" wire:click="destroy({{ $post->id }})">
                        <input type="submit" class="btn btn-warning m-2" value="Edit" wire:click="edit({{ $post->id }})">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        window.addEventListener('close-modal', (event) => {
            const modal = bootstrap.Modal.getInstance(document.getElementById(event.detail.id));
            if (modal) {
                modal.hide();
            }
        });
    </script>
    
</div>
