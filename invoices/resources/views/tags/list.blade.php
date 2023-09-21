<ul class="list-group">
    @forelse($tags as $tag)
    <li class="list-group-item">
        <a href="#">{{ $tag->tag }}</a>
    </li>
    @empty
    <li class="list-group-item">No tags yet.</li>
    @endforelse
</ul>