<ul class="list-group">
    @forelse($tags as $tag)
    <li class="list-group-item">
        <div class="tag-list-line --tag --tag-row-{{ $tag->id }}">
            <h4 contenteditable="true">{{ $tag->tag }}</h4>
            <div class="tag-buttons">
                <button type="button" class="--update-tag btn btn-outline-primary btn-sm" data-url="{{ route('tags-update', $tag) }}">Edit</button>
                <button type="button" class="--remove-tag btn btn-outline-danger btn-sm" data-url="{{ route('tags-destroy', $tag) }}">Delete</button>
        </div>
    </li>
    @empty
    <li class="list-group-item">No tags yet.</li>
    @endforelse
</ul>