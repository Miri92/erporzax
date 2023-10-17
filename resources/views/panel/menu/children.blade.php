<ol class="dd-list">
    @foreach($children as $child)
        <li class="dd-item"
            data-id="{{$child->id}}"
            data-name="{{$child->name}}"
            data-slug="{{$child->slug}}"
            data-new="0"
            data-deleted="0">
            <div class="dd-handle">{{$child->name}}</div>
            <span class="button-delete btn btn-default btn-xs pull-right"
                  data-owner-id="{{$child->id}}"
            >
                <i class="fas fa-times"></i>
            </span>
            <span class="button-edit btn btn-default btn-xs pull-right"
                  data-owner-id="{{$child->id}}">
                  <i class="fas fa-edit"></i>
            </span>

            @if($child->children)
{{--                {{$child->children}}--}}
                @include('panel.menu.children', ["children"=>$child->children])
            @endif
        </li>
    @endforeach
</ol>
