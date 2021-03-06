<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>[ UNIPOSRIO ]</title>
  </head>
  <body>
    @include('layout.header')
    <div id="corpo">
        <div>
            <table border="0" cellpadding="12" cellspacing="30" id="intraBody" width="1300px" style="min-height: 319px; margin-right: auto; margin-left: auto;">
            <tr>
                <td valign="top" style="padding-left: 10px;">
                @yield('content')
                </td>
            </tr>
            </table>
        </div>
    </div>
    @include('layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>