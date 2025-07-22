<li>
    <div class="tree-node">
        @if($user->children && $user->children->count() > 0)
            <span class="toggle-icon">+</span>
        @else
            <span class="toggle-icon" style="visibility: hidden;">•</span>
        @endif
        <span class="node-label" data-ulid="{{ $user->ulid }}">
            {{ $user->name }} ({{ $user->ulid }})
        </span>
    </div>
    
    @if($user->children && $user->children->count() > 0)
        <ul class="nested">
            @foreach($user->children as $child)
                @include('user.partials.tree-node', ['user' => $child, 'isRoot' => false])
            @endforeach
        </ul>
    @endif
</li>