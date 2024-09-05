<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-6 m-auto">
                    <form action="{{ route('office.update', $office->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <label for="">施設名</label>
                        <input type="text" name="name" class="form-control" value="{{ $office->name }}">
                        @if ($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif

                        <label for="">ビル名</label>
                        <input type="text" name="address" class="form-control" value="{{ $office->address }}">
                        @if ($errors->has('address'))
                            <div class="text-danger">
                                {{ $errors->first('address') }}
                            </div>
                        @endif

                        <label for="">郵便番号</label>
                        <input type="number" name="post_code" class="form-control" value="{{ $office->post_code }}">
                        @if ($errors->has('post_code'))
                            <div class="text-danger">
                                {{ $errors->first('post_code') }}
                            </div>
                        @endif

                        <label for="">募集階</label>
                        <input type="number" name="stair" class="form-control" value="{{ $office->stair }}">
                        @if ($errors->has('stair'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif

                        <label for="">コメント</label>
                        <textarea name="comment" class="form-control" id="" cols="30" rows="5">{{ $office->comment }}</textarea>

                        <input type="submit" value="Submit" class="btn btn-primary mt-4">
                    </form>
                </div>
            </div>
        </div>


        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
