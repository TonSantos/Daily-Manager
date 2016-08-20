<div class="col-md-12">
    @if (count($errors) > 0)
        <div class="alert alert-danger col-md-12">
            <ul>
                @foreach ( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="col-md-12">
    @if ( Session::has( 'status' ) )
        <div class="alert alert-{{ Session::get( 'status' ) }} col-md-12">
            <i class="fa {{Session::get( 'icon' )}} fa-1x" aria-hidden="true"></i>
            {{ Session::get( 'message' ) }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>


<div class="col-md-12" id="resultDelete">
</div>