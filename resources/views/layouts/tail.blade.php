 <!--  Scripts -->
 <script src="{{asset('js/jquery.min.js')}}"></script>
 <script src="{{asset('js/jquery-migrate.js')}}"></script>
 <script src="{{asset('js/popper.min.js')}}"></script>
 <script src="{{asset('js/bootstrap.min.js')}}"></script>
 <script src="{{asset('js/charts.js')}}"></script>
 <script src="{{asset('js/final-countdown.min.js')}}"></script>
 <script src="{{asset('js/fancy-box.min.js')}}"></script>
 <script src="{{asset('js/fullcalendar.min.js')}}"></script>
 <script src="{{asset('js/datatables.min.js')}}"></script>
 <script src="{{asset('js/circle-progress.min.js')}}"></script>
 <script src="{{asset('js/nice-select.min.js')}}"></script>
 <script src="{{asset('js/pikaday.min.js')}}"></script>
 <script src="{{asset('js/main.js')}}"></script>

 <script>
     $(document).ready(function () {
         $("#crancy-table__main").DataTable({
             searching: true, // Enable search functionality
             info: true,
             lengthChange: true, // Enable the ability to change the number of records per page
             pageLength: 6,
             lengthMenu: [
                 [6, 14, 25, 50, -1],
                 [6, 14, 25, 50, "All"],
             ],
             language: {
                 paginate: {
                     next: '<i class="fas fa-angle-right"></i>',
                     previous: '<i class="fas fa-angle-left"></i>',
                 },
                 lengthMenu: "Show result: _MENU_ ", // Customize the "Show entries" text
             },
             dom: 'rt<"crancy-table-bottom"flp><"clear">', // Set the desired layout for the table
         });
     });

 </script>
 <script>
     var picker = new Pikaday({
         field: document.getElementById("dateInput")
     });
     // Create a new instance of Pikaday for the date-input field
     const picker1 = new Pikaday({
         field: document.getElementById("date-input"),
         format: "DD MMM", // Set the desired format
         toString(date, format) {
             const day = date.getDate();
             const month = date.toLocaleString("default", {
                 month: "short"
             });
             const formattedDate = `${day} ${month}`;
             return formattedDate;
         },
     });

     // Create another instance of Pikaday for the dateInput field
     const picker2 = new Pikaday({
         field: document.getElementById("dateInput"),
         // ... other options for the dateInput picker
     });

 </script>

 <script>
     document.addEventListener("DOMContentLoaded", function () {
         var calendarEl = document.getElementById("crancy-calender");
         var calendar = new FullCalendar.Calendar(calendarEl, {
             defaultView: "timeGridWeek",
             contentHeight: "auto",
             height: "100%",
             fixedWeekCount: false,
             showNonCurrentDates: true,
             columnHeaderFormat: {
                 week: "ddd",
             },
         });
         calendar.render();
     });

 </script>

 <script>
     jQuery(document).ready(function ($) {
         $(".circle__one").circleProgress({
             size: 82,
             thickness: 8,
             lineCap: "round",
             fill: {
                 // the fill color and border radius of the progress bar
                 color: "#194BFB",
                 borderRadius: "5px",
             },
             border: {
                 // the border color, width, and border radius of the progress bar
                 color: "#000",
                 width: 5,
                 borderRadius: "315px",
             },
             emptyFill: "#CEE6FF", // the background color of the progress bar
         });

         $(".circle__two").circleProgress({
             lineCap: "round",
             fill: {
                 // the fill color and border radius of the progress bar
                 color: "#EF5DA8",
                 borderRadius: "50px",
             },
             border: {
                 // the border color, width, and border radius of the progress bar
                 color: "#000",
                 width: 50,
                 borderRadius: "50px",
             },
             emptyFill: "#FCDFEE", // the background color of the progress bar
         });

         $(".circle__three").circleProgress({
             lineCap: "round",
             fill: {
                 // the fill color and border radius of the progress bar
                 color: "#27AE60",
                 borderRadius: "50px",
             },
             border: {
                 // the border color, width, and border radius of the progress bar
                 color: "#000",
                 width: 50,
                 borderRadius: "50px",
             },
             emptyFill: "#D4EFDF", // the background color of the progress bar
         });

         $(".circle__four").circleProgress({
             lineCap: "round",
             fill: {
                 // the fill color and border radius of the progress bar
                 color: "#9B51E0",
                 borderRadius: "50px",
             },
             border: {
                 // the border color, width, and border radius of the progress bar
                 color: "#000",
                 width: 50,
                 borderRadius: "50px",
             },
             emptyFill: "#EBDCF9", // the background color of the progress bar
         });

         $(".circle_side_one").circleProgress({
             startAngle: -Math.PI / 1,
             lineCap: "round",
             size: 250,
             fill: {
                 // the fill color and border radius of the progress bar
                 color: "#9B51E0",
                 borderRadius: "10px",
             },
             border: {
                 // the border color, width, and border radius of the progress bar
                 color: "#000",
                 width: 190,
                 borderRadius: "10px",
             },
             emptyFill: "#D7B9F3", // the background color of the progress bar
         });

         $(".circle_side_two").circleProgress({
             startAngle: -Math.PI / 3,
             lineCap: "round",
             size: 250,
             fill: {
                 // the fill color and border radius of the progress bar
                 color: "#0A82FD",
                 borderRadius: "50px",
             },
             border: {
                 // the border color, width, and border radius of the progress bar
                 color: "#000",
                 width: 190,
                 borderRadius: "50px",
             },
             emptyFill: "#9DCDFE", // the background color of the progress bar
         });

         $(".circle_side_three").circleProgress({
             startAngle: -Math.PI / 2,
             lineCap: "round",
             size: 250,
             fill: {
                 // the fill color and border radius of the progress bar
                 color: "#F2C94C",
                 borderRadius: "50px",
             },
             border: {
                 // the border color, width, and border radius of the progress bar
                 color: "#000",
                 width: 190,
                 borderRadius: "50px",
             },
             emptyFill: "#FAE9B7", // the background color of the progress bar
         });
     });

 </script>

 @stack('scripts')
 </body>

 </html>
