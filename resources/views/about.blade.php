<x-layout>
    <div class="bg-white border-y">
        {{ Breadcrumbs::render('about') }}
    </div>

    <x-slot:heading>About Us</x-slot:heading>
    
    <div>
        <img src="https://unsplash.it/640/425" alt="placeholder">
    </div>

    <div>
        <p>At STRONGHOLD we are a dedicated group of first responders who realized that we needed to provide a source of video-based content for those struggling mentally and considering suicide. While our content is aimed at first responders, we are thankful to be able to make our resources available to the general community as well.</p>
        <p>Our intent has been to build a library of exceptional video resources, while our testimonials are aimed at decreasing stigma and fostering community. We intend our resources page will provide a comprehensive guide to your local resources, while our memorials page honors our fallen.</p>
        <p>We hope you are blessed by what we are able to provide!</p>
        <p>We were thrilled in 2025 to partner with the students at Northern Alberta Institute of Technology’s Web Design and Development program to assist us in developing this resource; their contribution has been invaluable and we are grateful for their assistance.</p>
    </div>

    <section id="contact">
        <h2>Contact Us</h2>
        <p>Looking to submit your own video resource or add someone you know to our memorial? </p>
        <p><strong>Email:</strong> jennifer@stronghold.help</p>
    </section>
</x-layout>