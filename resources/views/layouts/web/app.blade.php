<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: auto;
        }

        .comment-history {
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: #999;
        }

        .comment-history-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .comment-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .comment-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 100%;
        }

        .comment-avatar img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .comment-content {
            flex-grow: 1;
            padding: 10px;
        }

        .comment-header {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .comment-author {
            font-size: 14px;
            font-weight: bold;
            margin-right: 10px;
        }

        .comment-time {
            font-size: 12px;
            color: #999;
        }

        .comment-body {
            font-size: 14px;
            line-height: 1.4;
            margin-bottom: 5px;
        }

        .delete-comment {
            margin-left: auto;
        }

        .delete-comment-btn {
            font-size: 12px;
            color: #999;
            text-decoration: none;
            padding: 2px;
            transition: color 0.3s ease;
        }

        .delete-comment-btn:hover {
            color: #dc3545;
        }

        .no-comments-text {
            color: #999;
            font-style: italic;
        }
    </style>

</head>

<body>
    <!-- Start Header Area -->
    @include('include.web.header')
    <!-- End Header Area -->

    @yield('content')

    <!-- Start Footer Area -->
    @include('include.web.footer')
    <!-- End Footer Area -->


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
