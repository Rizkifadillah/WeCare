<div {{$attributes->merge([
    'class' => 'modal fade',
    'id' => 'modal-form',
    'aria-labelledby' => 'exampleModalLabel',
    'aria-hidden' => 'true',
])}}>
    <div class="modal-dialog {{ isset($size) ? $size : 'modal-lg'}}">
        <div class="modal-content">
            <form method="{{ isset($method) ? $method : 'post' }}">
                @isset($title)
                    <div class="modal-header">
                        <h4 class="modal-title" >{{ $title }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endisset
                <div class="modal-body">
                    {{ $slot}}
                </div>
                @isset($footer)
                    <div class="modal-footer justify-content-between">
                        {{ $footer }}
                    </div>
                @endisset
            </form>

        </div>
    </div>
</div>
{{-- 
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
    Launch Default Modal
</button> --}}