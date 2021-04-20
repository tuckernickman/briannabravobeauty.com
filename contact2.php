<!DOCTYPE html> 
<head>
    <!-- <link rel="stylesheet" type="text/css" href="mystyles2.css" style="text-decoration: none"> -->
</head>

    <body>

        <div>

            <h1>Contact Form</h1>
            <h2>Fill out this form to contact me</h2>

        </div>

        <div class="contact-form">

            <form id="contact-form" method="post" action="">

            <input name="name" type="text" class="form-control" placeholder="Your Name" required><br>
            
            <input name="phone" type="phone" class="form-control" placeholder="Your Phone" required><br>

            <input name="email" type="email" class="form-control" placeholder="Your Email" required><br>
            
            <textarea name="message" class="form-control" placeholder="Message" rows="4" require></textarea><br>

            <input type="submit" class="form-control submit" value="SEND MESSAGE">

            </form>
        </div> 

    </body>
</html>