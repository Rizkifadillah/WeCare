<table {{ $attributes->merge([
    'class' => 'table table-striped table-xs mt-3',
    'id' => 'table-form'
    ])}}>
    @isset($thead)
    <thead class="bg-info ">
       {{$thead}}
    </thead>
    @endisset

    <tbody>
        {{ $slot}}
    </tbody>
    
    @isset($tfoot)
    <tfoot>
       {{$tfoot}}
    </tfoot>        
    @endisset
</table>