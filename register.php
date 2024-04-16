<!DOCTYPE html>
<html>
<head>
    <title>Sign UP</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="register.css" />
    </head>
<body>
    <div class="container">
        <h2 style="text-align: center;">Sign Up</h2>
        <form id="crud-form">
            <table cellspacing="0">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="Name" id="Name">
                    <span id="Name_error" class="error_field"></span>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="Email" id="Email">
                    <span id="Email_error" class="error_field"></span>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <select id="Gender">
                            <option value="">Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        <span id="Gender_error" class="error_field"></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="Password" id="Password">
                    <span id="Password_error" class="error_field"></span>
                     </td>
                </tr>
                
                <tr>
                    <td colspan="2"><input type="submit" value="Submit" id="submit"></td>
                </tr>

                <tr>
    <td colspan="2">
        <a href="index.php" class="btn-return">Return to Home Screen</a>
    </td>
</tr>


            </table>
        </form>
        <div id="result"></div>
    </div>
    <script>
        $(document).ready(function(){
            alert("Document is ready!");
            
            $('#crud-form').submit(function(e){
                e.preventDefault(); // Prevent form submission
                submit_data(); // Call your submit_data function
            });
        });
        
        function submit_data() {
            var Name = $('#Name').val();
            var Email = $('#Email').val();
            var Gender = $('#Gender').val();
            var Password = $('#Password').val();
            
            $('.error_field').html('');
            var is_error = '';

            if(Name === '') {
                $('#Name_error').html('Please enter Name').css('color', 'red'); // Change text color to red
                is_error = 'yes';
            }
            if(Email === '') {
                $('#Email_error').html('Please enter Email').css('color', 'red'); // Change text color to red
                is_error = 'yes';
            }
            if(Gender === '') {
                $('#Gender_error').html('Please select Gender').css('color', 'red'); // Change text color to red
                is_error = 'yes';
            }
            if(Password === '') {
                $('#Password_error').html('Please enter Password').css('color', 'red'); // Change text color to red
                is_error = 'yes';
            }
           
            if(is_error === '') {
                var datastring = 'Name=' + Name + '&Email=' + Email + '&Gender=' + Gender + '&Password=' + Password;
                $('#result').html('<img width="50" src="https://png.pngtree.com/png-vector/20200224/ourmid/pngtree-colorful-loading-icon-png-image_2152960.jpg">');
                $.ajax({
                    url: 'submit.php',
                    type: 'POST',
                    data: datastring,
                    success: function(data) {
                        $('#result').html(data);
                        // Redirect to mansur.html page after successful submission
                      
                    },
                    error: function(xhr, status, error) {
                        $('#result').html('An error occurred while processing your request.').css('color', 'red'); // Change text color to red for error message
                    }
                });
            }
        }

        function resetForm() {
            // Clear all input fields
            $('#Name').val('');
            $('#Email').val('');
            $('#Gender').val('');
            $('#Password').val('');
            // Clear all error messages
            $('.error_field').html('');
        }
    </script>
</body>
</html>