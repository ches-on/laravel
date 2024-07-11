<!-- resources/views/livewire/edit-post.blade.php -->

<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="postTitle">Title</label>
                        <input type="text" class="form-control" id="postTitle" wire:model="title">
                    </div>
                    <div class="form-group">
                        <label for="postTitle">Content</label>
                        <input type="text" class="form-control" id="postContent" wire:model="content">
                    </div>
                      <div class="form-group">
                        <label for="postAuthor">Author</label>
                        <input type="text" class="form-control" id="postAuthor" wire:model="author">
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
