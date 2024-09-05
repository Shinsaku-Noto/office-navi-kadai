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
        <header class="bg-light p-4 text-end">
            <a href="{{ route('login.index') }}">ログイン</a>
        </header>

        <div class="container my-5">
            <div class="row">
                <div class="col-6">
                    <p class="display-6 text-center">HTMLを使ってForm送信</p>
                    <form action="{{ route('office.store.html') }}" method="post">
                        @csrf
                        <label for="">施設名</label>
                        <input type="text" name="name" class="form-control">
                        @if ($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <label for="">ビル名</label>
                        <input type="text" name="address" class="form-control">
                        @if ($errors->has('address'))
                            <div class="text-danger">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                        <label for="">郵便番号</label>
                        <input type="number" name="post_code" class="form-control">
                        @if ($errors->has('post_code'))
                            <div class="text-danger">
                                {{ $errors->first('post_code') }}
                            </div>
                        @endif
                        <label for="">募集階</label>
                        <input type="number" name="stair" class="form-control">
                        @if ($errors->has('stair'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <label for="">コメント</label>
                        <textarea name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                        <input type="submit" value="Submit" class="btn btn-primary mt-4 w-100">
                    </form>
                </div>

                <div class="col-6 m-auto">
                    <p class="display-6 text-center">ajaxを使ってForm送信</p>
                    <form>
                        @csrf

                        <label>施設名</label>
                        <input type="text" id="name" class="form-control">
                        <div id="error-name" class="text-danger"></div>

                        <label>ビル名</label>
                        <input type="text" id="address" class="form-control">
                        <div id="error-address" class="text-danger"></div>

                        <label>郵便番号</label>
                        <input type="number" id="post_code" class="form-control">
                        <div id="error-post_code" class="text-danger"></div>

                        <label>募集階</label>
                        <input type="number" id="stair" class="form-control">
                        <div id="error-stair" class="text-danger"></div>

                        <label>コメント</label>
                        <textarea id="comment" class="form-control" id="" cols="30" rows="5"></textarea>

                        <button type="button" id="create" class="btn btn-primary mt-4 w-100">Submit</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12 m-auto">
                    <table class="table mt-4">
                        <thead>
                            <th>施設名</th>
                            <th>ビル名</th>
                            <th>郵便番号</th>
                            <th>募集階</th>
                            <th>コメント</th>
                            <th>更新/削除</th>
                            <th>メモ</th>
                        </thead>
                        <tbody id="row">
                            @forelse ($offices as $office)
                            <tr>
                                <td>{{ $office->name }} </td>
                                <td>{{ $office->address }}</td>
                                <td>{{ $office->post_code }}</td>
                                <td>{{ $office->stair }}</td>
                                <td>{{ $office->comment }}</td>
                                <td>
                                    <form action="{{ route('office.edit', $office->id) }}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-warning btn-sm w-50">更新</button>
                                    </form>
                                    <form action="{{ route('office.destroy', $office->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-50 mt-2">削除</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('memo.store', $office->id) }}" method="post">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="memo">
                                            <button type="submit" class="btn btn-primary btn-sm">メモ</button>
                                        </div>
                                    </form>
                                    @forelse ($office->memo as $memo)
                                        <p class="mb-1">{{ $memo->text }}</p>
                                    @empty

                                    @endforelse
                                </td>
                            </tr>
                        @empty

                        @endforelse

                        <tr>
                            <th colspan="7" class="text-center">削除されたオフィス</th>
                        </tr>

                        @forelse ($deleted_offices as $office)
                            <tr>
                                <td>{{ $office->name }}</td>
                                <td>{{ $office->address }}</td>
                                <td>{{ $office->post_code }}</td>
                                <td>{{ $office->stair }}</td>
                                <td>{{ $office->comment }}</td>
                                <td>
                                    <form action="{{ route('office.edit', $office->id) }}" method="post">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-warning btn-sm w-50">更新</button>
                                    </form>
                                    <form action="{{ route('office.restore', $office->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-success btn-sm w-50 mt-2">復元</button>
                                    </form>
                                </td>
                                <td>

                                </td>
                            </tr>
                        @empty

                        @endforelse
                        </tbody>
                    </table>
            </div>

        </div>


        <!-- ajaxでForm送信 -->
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {
                $('#create').on('click', function() {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('office.store.ajax') }}',
                        dataType: 'json',
                        data: {
                            name: $('#name').val(),
                            address: $('#address').val(),
                            post_code: $('#post_code').val(),
                            stair: $('#stair').val(),
                            comment: $('#comment').val()
                        }
                    })
                    .done(function(res) {
                        var row = `<tr>
                                <td>${res.name}</td>
                                <td>${res.address}</td>
                                <td>${res.post_code}</td>
                                <td>${res.stair}</td>
                                <td>${res.comment}</td>
                            </tr>`
                        $('#row').append(row);
                    }).fail(function(xhr) {
                        // 422エラーの場合
                        if (xhr.status === 422) {
                            // 以前のエラーメッセージをクリア
                            $('#error-messages').empty();

                            // エラーメッセージを取得して表示
                            $.each(xhr.responseJSON.errors, function(key, val) {
                                if(key == 'name') {
                                    $('#error-name').append(`<span>${val.join(', ')}</span><br>`);
                                }else if(key == 'address') {
                                    $('#error-address').append(`<span>${val.join(', ')}</span><br>`);
                                }else if(key == 'post_code') {
                                    $('#error-post_code').append(`<span>${val.join(', ')}</span><br>`);
                                }else {
                                    $('#error-stair').append(`<span>${val.join(', ')}</span><br>`);
                                }
                            });
                        } else {
                            alert('通信の失敗をしました');
                        }
                    });
                })
            });
        </script>

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
