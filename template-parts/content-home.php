<?php
/**
 * The template used for displaying home page content in page.php
 *
 Template Name: Home
 * @package nicko
 */
 ?>
<?php get_header(); ?>

    <section class="home-hero" data-responsive-trigger="">
        <h2 class="home-hero-lede">The Job Isn't Done Until You Are Paid!</h2>
    </section>

    <section class="home-branding-what">
        <div class="home-branding-what-hassle">Making sure your landscaping job <span class="home-bold">moves from finished to done</span> should not be an exercise in pain and frustration.</div>
        <div class="home-branding-what-who">As the fellow owners of a landscaping company, <span class="home-bold">we fight the same battles you do</span> trying to finish the day to day office work and logistics.</div>
        <div class="home-branding-what-solve">So we created NickoLogistics: <span class="home-bold">getting a job to done</span> should not be more difficult than using one website!</div>
    </section>

    <section class="home-convert">
        <a class="home-convert-item" href="<?php echo esc_url( site_url( '/signup/' ) ); ?>">Sign Up: Create Account</a>
        <a class="home-convert-item" href="<?php echo esc_url( site_url( '/login/' ) ); ?>">Log In: Your Account</a>
    </section>

    <section class="home-branding-why">
        <h2>NICKOLOGISTICS: WHY</h2>
    <p>We believe things should be simple! Including managing your lawn care company's back office. </p>

    <p>We know how hard you work for the people depending on you -- your family, your employees and their families, and your customers.</p>

    <p>Nicko started off as a small lawn care business in Northborough, Massachusetts, giving us <span class="home-bold">first hand experience with your struggles</span> as a lawn care business owner.  While fighting the same business hassles as you do to get the job truly done, we thought "there has to be a better way!"</p>

    <p>Over the past few years we have been researching ways for lawn care business owners to more effectively manage their business.</p>

    <p>Simplicity and efficiency go hand in hand for a successful lawn care business. We believe when your technician in the field completes the service:</p>

    <ol>
      <li>the job should be done,</li>
      <li>your records should be updated, and</li>
      <li>your customer should be invoiced.</li>
    </ol>

    <p>We believe this should all be done by your technician in the field with two taps on his or her smartphone.</p>

    <p>This is possible through web and mobile software, and we know this can be made simple to use and easy to understand.</p>
    </section>

    <section class="home-branding-how">
      <h2>NICKOLOGISTICS: HOW</h2>
      <p>It’s simple: two taps!  With Nicko that's all it takes to move your service from provided to complete.</p>

      <p>Our team of creative thinkers design, engineer, and offer our internet-based service for lawn care and landscape service providers. Nicko is designed from the ground up to reduce the time spent managing the back office, allowing lawn care providers to do what they do best - provide their service!</p>

      <p>The internet is now everywhere, from your crew leader’s smartphone, to the office computer, to your own smartphone.  The Nicko Team has applied this magic to reducing your office hassles:</p>

      <p>Job execution notifications and record keeping right from the crew leader’s phone is very possible!</p>

      <ul>
        <li>Real-time tracking in the office of job execution</li>
        <li>Automated invoice creation and delivery to the customer</li>
        <li>Real-time invoice status tracking </li>
      </ul>

      <p>We’ve created a simple to use internet-software designed for your technician in the field.  Nicko enables your technician in the field to mark the service completed, invoice the customer, and update your records -- all while simply sitting on their tractor!</p>
    </section>


<?php get_footer(); ?>