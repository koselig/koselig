<form role="search" method="get" class="search-form" action="">
    <div class="input-group row col-md-4">
        <input type="search" class="search-field form-control" placeholder="Search&hellip;" value="{{ Request::get('s') }}" name="s">
        <span class="input-group-btn">
            <button class="btn btn-default" type="button">Search</button>
        </span>
    </div>
</form>

<div class="clearfix" style="margin-bottom: 10px;"></div>
