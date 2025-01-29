<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From List</title>
</head>
<style>
  
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #f9f9f9;
}

.table th, .table td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

.table th {
    background-color: #f2f2f2;
}


.edit-btn, .delete-btn {
    padding: 8px 12px;
    font-size: 14px;
    margin-right: 8px;
    cursor: pointer;
    border-radius: 4px;
    border: none;
}


.edit-btn {
    background-color: #007bff;
    color: white;
}

.edit-btn:hover {
    background-color: #0056b3;
}


.delete-btn {
    background-color: #dc3545;
    color: white;
}

.delete-btn:hover {
    background-color: #c82333;
}
.table-heading {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}
.add-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .add-button:hover {
            background-color: #45a049;
        }
</style>
<body>
<h2 class="table-heading">
    User Information
    <button class="add-button" onclick="redirectToIndex()">Add</button>
</h2> 


<table class="table" id="listing-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Date of Birth</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    </table>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      
        $.ajax({
            url: '/fromlisting', 
            type: 'GET',
            success: function(response) {
                var listingdata = response.listingdata;
               
                var tbody = $('#listing-table tbody');
                tbody.empty();  

                
                $.each(listingdata, function(index, item) {
                    var row = '<tr>' +
                                '<td>' + item.name + '</td>' +
                                '<td>' + item.email + '</td>' +
                                '<td>' + item.password + '</td>' +
                                '<td>' + item.dob + '</td>' +
                                '<td>' +
                                    '<button class="edit-btn" data-id="'+item.id+'">Edit</button>' +
                                    '<button class="delete-btn" data-id="' + item.id + '">Delete</button>'
                                    +
                                '</td>' +
                              '</tr>';
                    tbody.append(row);
                });

                $('.edit-btn').on('click', function() {
                    var id = $(this).data('id'); 
                    window.location.href = 'editfrom/' + id;
                });
            },
            error: function() {
                alert('Error fetching data.');
            }
        });
    });
</script>

<script>
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id'); 

        if (confirm('Are you sure you want to delete this user?')) {
            $.ajax({
                url: '/delete/' + id,
                type: 'DELETE',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }, 
                success: function(response) {
                    if (response.status == "true") {
                        alert(response.message);
                        location.reload(); 
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while deleting the user.');
                }
            });
        }
    });
</script>


<script>
    function redirectToIndex() {
        window.location.href = 'index';
    }
</script>

</html>