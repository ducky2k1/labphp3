<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dropdown-menu {
            margin-top: 0;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            display: none;
            position: absolute;
            top: 0;
            left: 100%;
            margin-top: 0;
        }

        .dropdown-submenu.show .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body>
    @include('layouts.nav')

    <div class="py-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.dropdown-submenu').forEach(function(submenu) {
            submenu.addEventListener('mouseenter', function() {
                document.querySelectorAll('.dropdown-submenu').forEach(function(otherSubmenu) {
                    if (otherSubmenu !== submenu) {
                        otherSubmenu.classList.remove('show');
                    }
                });
                submenu.classList.add('show');
            });
            submenu.addEventListener('mouseleave', function() {
                submenu.classList.remove('show');
            });
        });
    </script>
</body>

</html>
