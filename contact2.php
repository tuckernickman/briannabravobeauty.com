<!DOCTYPE html> 
<head>
    <link rel="stylesheet" type="text/css" href="mystyles2.css" style="text-decoration: none">
</head>

    <body>

        <div class="col-sm">

            <h1 class="col-sm">Contact Form</h1>
            <h2 class="col-sm">Fill out this form to contact me</h2>

        </div>

        <div class="col-sm contact-form">

            <form id="contact-form" class="col-sm" method="post" action="">

            <input name="name" type="text" class="col-sm form-control" placeholder="Your Name" required><br>
            
            <input name="phone" type="phone" class="col-sm form-control" placeholder="Your Phone" required><br>

            <input name="email" type="email" class="col-sm form-control" placeholder="Your Email" required><br>
            
            <textarea name="message" class="col-sm form-control" placeholder="Message" rows="4" require></textarea><br>

            <input type="submit" class="col-sm form-control submit" value="SEND MESSAGE">

            </form>
        </div> 

    </body>
</html>