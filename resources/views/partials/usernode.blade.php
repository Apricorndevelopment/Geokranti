{{--
<li>
    <div class="tree-node" onclick="toggleNode(this)">
        <span class="toggle-icon">📁</span>
        <span class="node-label">{{ $user->name }} ({{ $user->ulid }})</span>
    </div>

    @if (!empty($user->children))
        <ul class="nested">
            @foreach ($user->children as $child)
                @include('partials.usernode', ['user' => $child])
            @endforeach
        </ul>
    @endif
</li> --}}

<li>
    <div class="tree-node" onclick="toggleNode(this)">
        <span class="toggle-icon">📁</span>
        <span class="node-label">{{ $user->name }} ({{ $user->ulid }})</span>
    </div>

    @if (!empty($user->children))
        <ul class="nested">
            @foreach ($user->children as $child)
                @include('partials.usernode', ['user' => $child])
            @endforeach
        </ul>
    @endif
</li>
