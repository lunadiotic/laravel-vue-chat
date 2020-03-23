@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body bg-secondary" style="height: 30rem; overflow: auto;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="media m-2 bg-light rounded">
                        <div class="media-body m-2">
                          <h5 class="mt-0 ">Media heading</h5>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                    <div class="media m-2 bg-light rounded">
                        <div class="media-body m-2">
                          <h5 class="mt-0 ">Media heading</h5>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                    <div class="media m-2 bg-light rounded">
                        <div class="media-body m-2">
                          <h5 class="mt-0 ">Media heading</h5>
                          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <form action="#">
                        <div class="form-group">
                            <textarea name="" id="" cols="10" rows="3" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
