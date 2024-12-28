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