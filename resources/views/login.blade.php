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
            <a href="{{ route('home') }}">戻る</a>
        </header>

        <div class="container my-5">
            <div class="row">
                <div class="col-5 m-auto">
                    <div class="card">
                        <h1 class="text-center my-5">ログイン</h1>
                        <form action="register.php" method="post">

                            <div class="container">
                                <label>名前：</label>
                                <input type="text" class="form-control" name="name" required>

                                <label>メールアドレス：</label>
                                <input type="text" class="form-control" name="mail" required>

                                <label> パスワード：</label>
                                <input type="password" class="form-control" name="pass" required>

                                <div class="text-center my-3">
                                    <input type="submit" class="btn btn-primary w-50" value="新規登録">
                                </div>

                            </div>


                        </form>
                        <p class="text-center">新規登録は<a href="{{ route('register.index') }}">こちら</a></p>
                    </div>
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
