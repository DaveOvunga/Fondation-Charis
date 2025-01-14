<?php 
    use App\Core\Helper;
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
<script>
    function filterCourses() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const courseList = document.getElementById('courseList');
        const courses = courseList.getElementsByClassName('course-card');

        for (let i = 0; i < courses.length; i++) {
            const title = courses[i].getElementsByClassName('card-title')[0].innerText.toLowerCase();
            const description = courses[i].getElementsByClassName('card-text')[0].innerText.toLowerCase();
            if (title.includes(filter) || description.includes(filter)) {
                courses[i].style.display = "";
            } else {
                courses[i].style.display = "none";
            }
        }
    }
</script>
<script>
    // Handle form submission via AJAX
        $(document).ready(function() {
            $('#logout-form').on('submit', function(e) {
                e.preventDefault(); // Prevent normal form submission

                // Show loading indicator
                $('#logout_spinner').show();
                $('#logout_btn').hide();

                // Get form data
                var csrf_token = "<?= Helper::createToken();?>"; // Serialize the form to get the CSRF token, email, password, etc.

                // AJAX request to send data to server
                $.ajax({
                    url: '<?=APP_URL?>/logout',  // The URL to send the data to
                    type: 'POST',
                    data: { csrf_token: csrf_token },
                    success: function(response) {
                        if (response.success) {
                            // $('#responseMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                            // Redirect to the login page after a short delay or immediately
                            setTimeout(function() {
                                location.reload(); // Redirect to the login page
                            }, 500); // Optional delay of 2 seconds
                        }
                        else 
                        {
                            var errorsHtml = '';
                            $.each(response.message, function(index, error) 
                            {
                                errorsHtml += '<div class="alert alert-danger">' + error + '</div>';
                            });
                            // Update the HTML content of the responseMessage element with errors
                            $('#responseMessage').html(errorsHtml);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#responseMessage').html('<div class="alert alert-danger">An error occurred</div>');
                        console.error("Error fetching data: " + error);
                        console.error('Response Text:', xhr.responseText); // Log the response text for debugging
                    }
                });
            });
        });
</script>