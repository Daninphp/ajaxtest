<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body onload="getUsers()">
<div id="wrapper">
    <div class="createbutton">
        <div class="group">
            <a href="javascript:void(0)" onclick="showForm()" id="create" class="btn-user">Create User</a>
        </div>
    </div>
    <div class="float">
        <div class="left">
            <input type="text" name="search" id="search" class="btn-table" style="width: 400px;" placeholder="Search for users...">
            <table id="user-table">
                <thead>
                <tr>
                    <th>Name   <button onclick="sortTable()"><i class="fa fa-sort"></i></button></th>
                    <th>Email</th>
                    <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
            <select name="pagination" id="pagination">
                <option>#</option>
                <option value="2">2</option>
                <option value="4">4</option>
                <option value="6">6</option>
            </select>
        </div>
        <div class="left">
            <form action="?" id ="forma" method="post">
                <input type="text" id="name" name="name" placeholder="Username">
                <input type="text" id="email" name="email" placeholder="User email">
                <input type="button" id="create-user" value="Create  User" onclick="createUser()">
            </form>

            <form action="?" id ="forma2" method="post">
                <input type="text" id="edit-name" name="edit-name" placeholder="Username">
                <input type="text" id="edit-email" name="edit-email" placeholder="User email">
                <input type="hidden" id="hidden" name="hidden">
                <input type="button"  id="upd-user" value="Update User" onclick="updateUser()">
            </form>
        </div>
    </div>
</div>

<script src="js/jQery.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>