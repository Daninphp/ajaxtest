
            // read data to table
function getUsers()
{
    $.ajax(
{
        url: 'data/users.php?users',
        method: 'post'
    }).done(function (users)
    {
        users = JSON.parse(users);
        $('#user-table').find("tBody").empty();
        users.forEach(function (user)
        {
            $('#user-table').find("tBody").append($("<tr><td id=tName>" + user.name + "</td>" + "<td id=tEmail>" + user.email + "</td>" + "<td><button' onclick=editUser(" + user.id +") class=\"btn-table\" id=" + user.id +"> Edit </button></td>" + "<td><button onclick=deleteUser(" + user.id +") class=\"btn-table\"> Delete </button></td></tr>"));
        })
    });

    // setInterval("getUsers()", 5000); if needed for auto data refresh.
};


           //create user
function createUser()
{
    if ($.trim($("#email").val()) === "" || $.trim($("#name").val()) === "")
    {
        alert('you did not fill out one of the fields');
        return false;
    }
    $.post
    (
        'data/users.php?create',
        {
            name: $('#name').val(),
            email: $('#email').val(),
        }
    );
    getUsers();
    $("#forma").css("display", "none");

}

            //delete user
function deleteUser(id)
{
    if (confirm("Are you sure?"))
    {
        $.ajax({
            url: 'data/users.php?delete',
            method: 'post',
            data: 'id=' + id,
        });
        getUsers();
    }
    return false;
}


            //update user data
function updateUser()
{
    if ($.trim($("#edit-email").val()) === "" || $.trim($("#edit-name").val()) === "")
    {
        alert('you did not fill out one of the fields');
        return false;
    }
    $.post
    (
        'data/users.php?update',
        {
            id: $('#hidden').val(),
            name: $('#edit-name').val(),
            email: $('#edit-email').val()
        }
    );
    $("#forma").css("display", "none");
    getUsers();
}


            // show modal and fill edit user data
function editUser(id)
{
    $("#forma2").toggle();
    $.ajax({
        url: 'data/users.php?edit',
        method: 'post',
        data: 'id=' + id,
    }).done(function (user)
    {
        user = JSON.parse(user);
        user.forEach(function (user1) {
            $('input[type=text]#edit-name').val(user1.name);
            $('input[type=text]#edit-email').val(user1.email);
            $('input[type=hidden]#hidden').val(user1.id);
        })
    })
}

            //toggle the create user form
function showForm()
{
    $("#forma").toggle();
};


            //pagination
$('#pagination').change(function ()
{
    var pag = $('#pagination').val();
    $.ajax({
        url: 'data/users.php?pagination',
        method: 'post',
        data: 'pag=' + pag
    }).done(function (users)
    {
        users = JSON.parse(users);

        $('#user-table').find("tBody").empty();

        users.forEach(function (user)
        {
        $('#user-table').find("tBody").append($("<tr><td id=tName>" + user.name + "</td>" + "<td id=tEmail>" + user.email + "</td>" + "<td><button' onclick=editUser(" + user.id +") class=\"btn-table\" id=" + user.id +"> Edit </button></td>" + "<td><button onclick=deleteUser(" + user.id +") class=\"btn-table\"> Delete </button></td></tr>"));
        })
    })
});

            //sorting
function sortTable()
{
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("user-table");
  switching = true;

  while (switching)
  {
      switching = false;
      rows = table.rows;

      for (i = 1; i < (rows.length - 1); i++)
      {
          shouldSwitch = false;

          x = rows[i].getElementsByTagName("TD")[0];
          y = rows[i + 1].getElementsByTagName("TD")[0];

          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase())
          {
              shouldSwitch = true;
              break;
          }
      }
      if (shouldSwitch)
      {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
      }
  }
}
            //search
$('#search').on('keyup', function ()
{
    var value = $(this).val();

    $('table tr').each(function (result)
    {
        if(result !== 0)
        {
            var name = $(this).find('#tName:first').text();
            if(name.indexOf(value) !== 0 && name.toLowerCase().indexOf(value.toLowerCase())<0)
            {
                $(this).hide();
            }
            else
            {
                $(this).show();
            }

            var email = $(this).find('#tEmail:first').text();
            if(email.indexOf(value) !== 0 && email.toLowerCase().indexOf(value.toLowerCase())<0)
            {
                $(this).hide();
            }
            else
            {
                $(this).show();
            }
        }
    })
});