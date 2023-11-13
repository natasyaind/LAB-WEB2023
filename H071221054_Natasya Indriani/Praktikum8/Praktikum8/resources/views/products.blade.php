@extends('layout.template')

@section('content')
    <style>
        .card {
            height: 100%;
        }

        .card-title {
            letter-spacing: 0.5px;
            line-height: 1.5;
        }

        .card-body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-text {
            flex-grow: 1;
            overflow: hidden;
        }
    </style>

    <div class="row">
        @isset($description)
            <div class="col-md-12 mb-4" style="text-align: justify;">
                <p>{{ $description }}</p>
            </div>
        @endisset

        @foreach ($products as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg" class="card-img-top"
                        alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->productName }}
                            <span class="badge text-bg-primary">{{ $item->productLine }}</span>
                        </h5>
                        <p class="card-text">{{ substr($item->productDescription, 0, 100) }}...</p>
                        <h6 class="text-end mb-3">Stock: {{ $item->quantityInStock }}</h6>
                        <a href="/products/{{ $item->productCode }}" class="btn btn-primary mt-auto">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
