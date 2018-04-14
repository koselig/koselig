<form role="search" method="get" class="search-form d-flex" action="">
    <div class="input-group row col-md-4 mt-2 ml-0 mr-0 ml-md-auto">
        <input type="search" class="search-field form-control" placeholder="Search&hellip;" value="{{ Request::get('s') }}" name="s">
        <span class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Search</button>
        </span>
    </div>
</form>

<div class="clearfix" style="margin-bottom: 10px;"></div>
