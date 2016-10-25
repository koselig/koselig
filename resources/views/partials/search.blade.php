<form role="search" method="get" class="search-form" action="{{ url('/') }}">
    <div class="input-group col-md-4 pull-right">
        <input type="search" class="search-field form-control" placeholder="Search &hellip;" value="{{ Request::get('s') }}" name="s">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">Search</button>
        </span>
    </div>
</form>

<div class="clearfix" style="margin-bottom: 10px;"></div>
