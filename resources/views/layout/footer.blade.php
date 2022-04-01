
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

            //save invoice
            $("#saveInvoice").validate({
                rules: {
                    'qty[]' : {
                        required: true,
                        number: true
                    }
                }
            });


            //Add more
            var maxField = 100; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div class="form-group"><label for="item" class="control-label col-sm-2">Item</label><div class="col-sm-8"><input class="form-control" id="item" placeholder="Enter item name" required="required" name="item[]" type="text" value=""><input class="form-control" id="price" placeholder="Enter price" required="required" name="price[]" type="number" value=""><input class="form-control" id="qty" placeholder="Enter quantity" required="required" name="qty[]" type="number" value=""></div><div class="col-sm-2"><a href="javascript:void(0);" class="remove_button btn btn-danger btn-lg" title="Remove Item"><i class="glyphicon glyphicon-minus-sign"> </i> Remove Items </a></div></div>'; //New input field html
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).closest(".form-group").remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>

    </body>
</html>
