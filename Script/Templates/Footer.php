<script src="../External_Source/Js/bootstrap.bundle.js"></script>
<script src="../External_Source/Js/jquery.slim.min.js"></script>
<script src="../External_Source/Js/jquery.min.js"></script>
<script src="../External_Source/Js/jquery.dataTables.min.js"></script>
<script src="../External_Source/Js/sweetalert2@11.js"></script>
<script src="../External_Source/fontawesome-free-6.5.1-web/js/all.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.data').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        var maxFields = 6;
        var addButton = $('#addInput');
        var wrapper = $('#dynamicInput');
        var x = 1;
        $('#inputCount').val(x);

        $(addButton).click(function() {
            if (x < maxFields) {
                x++;

                $.get("../System/BukuModerationFormLink.php", function(data) {
                    var fieldHTML = '<div class="inputField row"><select class="my-1 w-100 col" name="KodeKategori' + x + '">' + data + '</select><button type="button" class="col-2 remove btn btn-sm my-1 btn-danger">x</button></div>';
                    $(wrapper).append(fieldHTML);
                });
                $('#inputCount').val(x);
            }
        });

        $(wrapper).on('click', '.remove', function(e) {
            e.preventDefault();
            if ($(wrapper).children('div').length > 1) {
                $(this).parent('div').remove();
                x--;

                // Re-index the remaining input fields
                $(wrapper).children('div').each(function(index) {
                    $(this).find('select').attr('name', 'KodeKategori' + (index + 1));
                });

                $('#inputCount').val(x);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'One genre must be present!',
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 1500

                })
            }
        });
    });
</script>
<script>
    // Set the initial value of k
    var k = 9;

    document.getElementById('loadMore').addEventListener('click', function() {
        // Increase the value of k by 6
        k += 6;

        // Send the new value of k to the server
        $.post("../View/Library.php", {
            k: k
        }, function(data) {
            // Update the page with the response from the server
            document.getElementById("demo").innerHTML = data;
        });
    });
</script>

</body>

</html>