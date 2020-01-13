<div class="modal" tabindex="-1" role="dialog" id="@stack('modal-id')">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@stack('modal-title')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	@yield('modal-content')
      </div>
    </div>
  </div>
</div>