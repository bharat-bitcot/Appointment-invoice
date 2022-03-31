
    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Footer</p>
    </div>

    <!-- Script --->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script>

        $(document).ready(function() {

            //login
            $("#loginForm").validate();

            //register
            $("#registerForm").validate({
                rules : {
                    password : {
                        minlength : 5
                    },
                    re_password : {
                        minlength : 5,
                        equalTo : '[name="password"]'
                    }
                }
            });

            //Register Complaints
            $("#registerComplaint").validate();
        });
    </script>

    </body>
</html>
