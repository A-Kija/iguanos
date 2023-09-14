<ul class="client-search-result">
    @forelse ($clients as $client)
    <li class="client-search-result-item">
    <span data-id="{{$client->id}}" data-name="{{$client->client_name}}">{{$client->client_name}}</span>
    </li>
    @empty
    <li class="client-search-result-item no">
    <span>No clients found</span>
    @endforelse
</ul>