<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script>
$(document).ready(function() {

    $('.toggle-password').click(function() {
        $input = $(this).closest('td').find('input')
        if ($input.attr('type') === 'password') {
            $input.attr('type', 'text')
            $(this).html('<i class="far fa-eye-slash" style="font-size:15px;color:black;"></i>')
        } else {
            $input.attr('type', 'password')
            $(this).html('<i class="far fa-eye" style="font-size:15px;color:black;"></i>')
        }
    })

    $('#exampleCheck1').on('click', function() {
        $('#disable').remove();
    })
    $('.exampleCheck1').click(function() {
        $('.exampleCheck1').not(this).prop('checked', false);
    });
    $('.exampleCheck2').click(function() {
        $('.exampleCheck2').not(this).prop('checked', false);
    });
    $('.exampleCheck3').click(function() {
        $('.exampleCheck3').not(this).prop('checked', false);
    });
    $('.exampleCheck4').click(function() {
        $('.exampleCheck4').not(this).prop('checked', false);
    });
    $('.exampleCheck5').click(function() {
        $('.exampleCheck5').not(this).prop('checked', false);
    });
    $('.exampleCheck6').click(function() {
        $('.exampleCheck6').not(this).prop('checked', false);
    });
    $('.exampleCheck7').click(function() {
        $('.exampleCheck7').not(this).prop('checked', false);
    });
    $('.exampleCheck8').click(function() {
        $('.exampleCheck8').not(this).prop('checked', false);
    });
    $('.exampleCheck9').click(function() {
        $('.exampleCheck9').not(this).prop('checked', false);
    });
    $('.exampleCheck10').click(function() {
        $('.exampleCheck10').not(this).prop('checked', false);
    });

    setTimeout(function() {
        $('#message').attr('hidden', true);

    }, 3000);
})
</script>
</body>

</html>'