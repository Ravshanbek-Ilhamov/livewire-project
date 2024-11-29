<div>

    @if ($activeForm )        
        <!-- Form to create a new post -->
        <div class="row">
            <div class="col-4">
                <input type="text" wire:model="title" class="form-control mt-2" placeholder="Title:">

            </div>
            <div class="col-4">
                <input type="text" wire:model="description" class="form-control mt-2" placeholder="Description:">
            </div>

            <div class="col-4">
                <input type="text" wire:model="text" class="form-control mt-2" placeholder="Text:">
            </div>
        </div>
    @endif

    @if ($activeForm)
        <input type="submit" value="Create" class="btn btn-primary m-2" wire:click="store">
        <input type="submit" value="Close" class="btn btn-primary m-2" wire:click="close">
    @else
        <input type="submit" value="Create" class="btn btn-primary m-2" wire:click="create">
        <!-- Table to display posts -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Text</th>
                    <th scope="col">Active</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        <input type="text" wire:model="searchtitle"  class="form-control mt-2" placeholder="Title:"  wire:keydown="searchColumn">
                    </td>
                    <td>
                        <input type="text" wire:model="searchdescription"  class="form-control mt-2" placeholder="Description:" wire:keydown="searchColumn">
                    </td>
                    <td>
                        <input type="text" wire:model="searchtext"  class="form-control mt-2" placeholder="Text:" wire:keydown="searchColumn">
                    </td>
                    <td>
                        #
                    </td>
                    <td>
                        #
                    </td>
                </tr>
                @foreach ($posts as $post)

                    @if ($editingPost != $post->id)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>
                                <span 
                                    class="{{ $post->is_active ? '' : 'text-danger text-decoration-line-through' }}"
                                    wire:click="edit({{ $post->id }})"
                                    style="cursor: pointer;"> <!-- Add cursor styling for better UX -->
                                    {{ $post->title }}
                                </span>
                            </td>
                            <td>
                                <span 
                                    class="{{ $post->is_active ? '' : 'text-danger text-decoration-line-through' }}"
                                    wire:click="edit({{ $post->id }})"
                                    style="cursor: pointer;">
                                    {{ $post->description }}
                                </span>
                            </td>
                            <td>
                                <span 
                                    class="{{ $post->is_active ? '' : 'text-danger text-decoration-line-through' }}"
                                    wire:click="edit({{ $post->id }})"
                                    style="cursor: pointer;">
                                    {{ $post->text }}
                                </span>
                            </td>
                            
                            <td>
                                <div class="form-check form-switch mt-3">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" wire:click="switch({{$post->id}})"  {{$post->is_active ? 'checked' : ''}}>
                                </div>
                            </td>
                            <td>
                                <span class="btn btn-warning m-2" wire:click="edit({{ $post->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                                    </svg>
                                </span>

                                <span class="btn btn-danger m-2" wire:click="destroy({{ $post->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </span>
                            </td>
                        </tr>       
                    @elseif($editingPost == $post->id)   
                        <tr>
                            <td></td>
                            <td>
                                <input type="text" wire:model="edittitle" class="form-control mt-2" placeholder="Title:"> 
                            </td>

                            <td>
                                <input type="text" wire:model="editdescription" class="form-control mt-2" placeholder="Description:">
                            </td>

                            <td>
                                <input type="text" wire:model="edittext" class="form-control mt-2" placeholder="Text:">
                            </td>
                            <td>
                                <button class="btn btn-primary" wire:click="update">Update</button>
                                <button class="btn btn-danger"  wire:click="cencel">Cencel</button>
                            </td>
                        </tr>
                    @endif

                @endforeach
            </tbody>
        </table>
    @endif

</div>
