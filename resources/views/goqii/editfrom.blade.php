<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gogii</title>
</head>
<style>
  
.form-container {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


.form-group {
    margin-bottom: 20px;
}


.label {
    display: block;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

.input-field {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border-radius: 4px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    outline: none;
}


.input-field:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}


.input-field:required {
    border-left: 5px solid #ff6666;
}

.submit-btn {
    background-color: #007bff;
    color: white;
    padding: 12px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

.submit-btn:hover {
    background-color: #0056b3;
}

.submit-btn:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}
.form-heading {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}

</style>
<body>
<form action="" class="form-container">
    <h2 class="form-heading">Edit Registration Form</h2>  
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}"> 
    
    <div class="form-group">
        <label for="name" class="label">Name</label>
        <input 
            type="text" id="name" name="name" class="input-field" value="{{ $user->name }}" required>
    </div>
    
    <div class="form-group">
        <label for="email" class="label">Email</label>
        <input type="email" id="email" name="email" class="input-field" value="{{ $user->email }}" required>
    </div>
    
    <div class="form-group">
        <label for="password" class="label">Password</label>
        <input type="password" id="password" name="password" class="input-field" value="{{ $user->password }}" required>
    </div>
    
    <div class="form-group">
        <label for="dob" class="label">Date of Birth</label>
        <input type="date" id="dob" name="dob" class="input-field" value="{{ $user->dob }}" required>
    </div>
    
    <button type="submit" class="submit-btn">Submit</button>
</form>


</body>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.form-container').on('submit', function(e) {
            e.preventDefault(); 
            var formData = $(this).serialize(); 

            $.ajax({
                url: '{{ route("save.edit") }}', 
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status === "true") {
                        alert(response.message); 
                        window.location.href = '/viewindex'; 
                    } else {
                        alert(response.message); 
                    }
                },
                error: function() {
                    alert('An error occurred while saving data.');
                }
            });
        });
    });
</script>

</html>
