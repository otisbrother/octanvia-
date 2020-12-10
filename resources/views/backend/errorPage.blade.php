@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            404 Error Page
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">404 error</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i>
                    @if(!isset($err_msg))
                        Oops! Page not found.
                    @else
                        {{ $err_msg }}
                    @endif
                </h3>

                <p>
                    We could not find the page you were looking for.
                    Meanwhile, you may <a href="{{ route('admin.dashboard') }}">return to dashboard</a> or try another data in your last form.
                </p>

            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
@endsection
