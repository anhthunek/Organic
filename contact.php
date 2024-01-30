<?php 
include('./functions/userfunctions.php');
include('./includes/header.php'); ?>

<div class="py-3" style="background-color: #76A713; ">
    <div class="container">
        <h6  ><a href="index.php" class="text-white" >Home / </a><a href="contact.php" class="text-white" >Contact</a></h6>
    </div>
</div>
<div class="py-4"></div>
<div class="container d-flex">
        <div class="column">
            <span style="color: #a5a5a5;">INFORMATION QUESTIONS</span>
            <div class="faq-title mb-5">FREQUENTLY ASKED QUESTIONS</div>
            <div class="faq-question mb-4 d-flex align-items-center justify-content-between" onclick="toggleAnswer(1)"><span>Will I receive the same product that I see in the picture?</span>
            <span class="mx-3"><i class="fa fa-angle-down text-dark"></i></span>
        </div>
            <div class="faq-answer" id="answer1" style="display: none;">
                <p>Consectetur cras scelerisque dis nec mi vestibulum ullamcorper turpis enim natoque tempus a malesuada suspendisse iaculis adipiscing himenaeos tincidunt.Tellus pharetra dis nostra urna a scelerisque id parturient ullamcorper ullamcorper class ad consectetur tristique et.</p>
                <p>Hendrerit mollis facilisi odio a montes scelerisque a scelerisque justo a praesent conubia aenean mi tempor.</p>
            </div>
            <div class="faq-question mb-4 d-flex align-items-center justify-content-between" onclick="toggleAnswer(2)"><span>Where can I view my sales receipt?</span><span class="mx-3"><i class="fa fa-angle-down text-dark"></i></span></div>
            <div class="faq-answer" id="answer2" style="display: none;">
                <p>A vel dui a conubia vestibulum class varius vel nunc a gravida ut maecenas quisque a proin condimentum sagittis class at faucibus primis parturient dolor scelerisque himenaeos.</p>
                <p>A et ullamcorper vestibulum netus a mauris ac consectetur libero volutpat congue congue turpis a consectetur adipiscing sit.Suspendisse leo fringilla a congue tempus nisi conubia vestibulum a in posuere accumsan.</p>
            </div>
            <div class="faq-question mb-4 d-flex align-items-center justify-content-between" onclick="toggleAnswer(3)"><span>How can I return an item?</span><span class="mx-3"><i class="fa fa-angle-down text-dark"></i></span></div>
            <div class="faq-answer" id="answer3" style="display: none;">
                <p>Sit rhoncus aptent dis scelerisque penatibus a dis tempor accumsan suspendisse mollis a et odio ullamcorper magnis ullamcorper cum ullamcorper duis nulla egestas massa.</p>
                <p>Vitae amet nostra est leo dignissim justo sodales et ac a conubia bibendum duis ad justo suspendisse a a tellus cubilia vestibulum a dictumst a duis risus.Sociosqu curae consequat nisl litora a eros est consectetur nulla rhoncus a a id felis praesent.Tempus dui integer a cursus id fames parturient.</p>
            </div>
            <div class="faq-question mb-4 d-flex align-items-center justify-content-between" onclick="toggleAnswer(4)"><span>Will you restock items indicated as "out of stock?"</span><span class="mx-3"><i class="fa fa-angle-down text-dark"></i></span></div>
            <div class="faq-answer" id="answer4" style="display: none;">
                <p>celerisque parturient sagittis nisi in aliquam dui scelerisque non consectetur aptent hac adipiscing ullamcorper pulvinar sit vestibulum purus facilisi hendrerit mus nisl massa ut parturient consectetur cum justo fames torquent.</p>
                <p>Ac curae aliquet vivamus aptent duis congue urna venenatis ridiculus faucibus tincidunt a lorem rutrum nullam potenti adipiscing.Adipiscing.</p>
            </div>
            

        </div>
        <div class="column">
            <span style="color: #a5a5a5;">INFORMATION ABOUT US</span>
            <div class="contact-title mb-5 ">CONTACT US FOR ANY QUESTIONS</div>
            <div class="contact-form">
                <form  method="post">
                    <label for="your-name">Your Name</label>
                    <input type="text" id="your-name" name="your-name" required>

                    <label for="your-email">Your Email</label>
                    <input type="email" id="your-email" name="your-email" required>

                    <label for="tel-767">Phone Number</label>
                    <input type="tel" id="tel-767" name="tel-767">

                    <label for="text-1">Company</label>
                    <input type="text" id="text-1" name="text-1">

                    <label for="your-message">Your Message</label>
                    <textarea id="your-message" name="your-message" rows="10" required></textarea>

                    <input type="submit" style="background-color: #76A713;" value="ASK A QUESTION">
                </form>
            </div>
        </div>
    </div>
    <?php include('./includes/footer.php') ?>