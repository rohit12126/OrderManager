<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
			@if(\Session::has('status') && \Session::has('message'))

				@if(!empty(\Session::get('status')))
			        
			        @component('components.alert')

			            @slot('class',Session::get('status'))

			            {{Session::get('message')}}
			        
			        @endcomponent

			    @else

			    	@component('components.alert')

			            @slot('class','warning')

			            {{\Session::get('message')}}
			        
			        @endcomponent

			    @endif

			@elseif(!\Session::has('status') && \Session::has('message'))

			    @component('components.alert')

			        @slot('class','info')

			        {{\Session::get('message')}}
			    
			    @endcomponent

			@endif
		</div>
	</div>
</div>