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

    <div class="container">
        @foreach ($productdetails as $item)
            <div class="row">
                <div class="col-md-5">
                    <img src="https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg" alt="Product Image"
                        class="img-fluid">
                </div>
                <div class="col-md-7">
                    <h2>{{ $item->productName }}</h2>
                    <span class="badge text-bg-primary">{{ $item->productLine }}</span>
                    <span class="badge text-bg-secondary">{{ $item->productVendor }}</span>
                    <p class="mt-3" style="text-align: justify;">{{ $item->productDescription }}</p>

                    <p class="d-inline-flex gap-1">
                        <button class="btn btn-info" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                            style="font-weight: bold">
                            About {{ $item->productLine }}
                        </button>
                    </p>
                    <div class="collapse mb-4" id="collapseExample">
                        <div class="card card-body" style="text-align: justify;">
                            {{ $description }}
                        </div>
                    </div>

                    <div class="col-md-6 border border-primary py-3 ps-4" style="border-radius: 5px;">
                        <h5 class="text-decoration-underline">Order {{ $item->productName }}</h5>

                        <div class="row align-items-center g-2">
                            <div class="btn-group btn-group-sm col-md-5" role="group" aria-label="Small button group">
                                <button type="button" class="btn btn-outline-primary">-</button>
                                <button type="button" class="btn btn-outline-primary">0</button>
                                <button type="button" class="btn btn-outline-primary">+</button>
                            </div>
                            <p class="col-md-5 mt-3">Stock:
                                <span style="font-weight: bold;">{{ $item->quantityInStock }}</span>
                            </p>
                        </div>

                        <div class="row justify-content-between align-items-center mt-3">
                            <h6 class="col-md-5">Product Scale</h6>
                            <h4 class="col-md-5">{{ $item->productScale }}</h4>
                        </div>

                        <div class="row justify-content-between align-items-center mt-1">
                            <h6 class="col-md-5">Price</h6>
                            <h4 class="col-md-5">${{ $item->buyPrice }}</h4>
                        </div>

                        <div class="d-flex mt-3">
                            <button class="btn btn-primary col-md-5 me-3">Buy Now</button>
                            <button class="btn btn-primary col-md-5">+ Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <hr class="my-5">

        <h1 class="mb-4">You Might Like This</h1>
        <div class="row">
            @foreach ($recommendations as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://blog.tripcetera.com/id/wp-content/uploads/2020/10/pulau-padar.jpg"
                            class="card-img-top" alt="Product Image">
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
    </div>
@endsection
