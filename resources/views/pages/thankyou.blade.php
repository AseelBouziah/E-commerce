@extends('layouts.nav')
@section('content')
<div class="container pb-60 m-5 p-5">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2>Thank you for your order</h2>
                    <a href="{{ route('all.products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
				</div>
			</div>
		</div>
@endsection