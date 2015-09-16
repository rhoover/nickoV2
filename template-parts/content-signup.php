<?php
/**
 * The template used for displaying page content in the signup page
 *
 Template Name: SignUp
 * @package nicko
 */
?>
<?php get_header(); ?>

<h3 class="signup-header">Create New Account</h3>
<form name="newClient" novalidate data-ng-model-options="{updateOn: 'blur'}" data-ng-submit="signup.createNewClient(signup.newclient)" class="signup-form">

    <section class="signup-field">
        <input type="text" name="firstname" data-ng-model="signup.newclient.firstname" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="50" data-required class="signup-input">
        <label for="first-name" class="signup-label">
            <span class="signup-label-text">Your First Name</span>
        </label>
        <ng-messages for="newClient.firstname.$error" class="signup-messages">
            <ng-message when="required" class="signup-messages-required">Required</ng-message>
            <ng-message when="minlength" class="signup-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="signup-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'signup-messages-valid':newClient.firstname.$valid}" class="signup-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>

    <section class="signup-field">
        <input type="text" name="lastname" data-ng-model="signup.newclient.lastname" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="50" data-required class="signup-input">
        <label for="last-name" class="signup-label">
            <span class="signup-label-text">Your Last Name</span>
        </label>
        <ng-messages for="newClient.lastname.$error" class="signup-messages">
            <ng-message when="required" class="signup-messages-required">Required</ng-message>
            <ng-message when="minlength" class="signup-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="signup-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'signup-messages-valid':newClient.lastname.$valid}" class="signup-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>

    <section class="signup-field">
        <input type="email" name="email" data-ng-model="signup.newclient.email" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-required class="signup-input">
        <label for="email" class="signup-label">
            <span class="signup-label-text">Email To Use With Nicko</span>
        </label>
        <ng-messages for="newClient.email.$error" class="signup-messages">
            <ng-message when="required" class="signup-messages-required">Required</ng-message>
            <p data-ng-if="newClient.email.$error.email" class="signup-messages-generic">Not a valid Email Address</p>
            <p data-ng-class="{ 'signup-messages-valid':newClient.email.$valid}" class="signup-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>

    <section class="signup-field">
        <input type="text" name="password" data-ng-model="signup.newclient.password" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="8" data-ng-maxlength="50" data-required class="signup-input">
        <label for="password" class="signup-label">
            <span class="signup-label-text">Password To Use With Nicko</span>
        </label>
        <ng-messages for="newClient.password.$error" class="signup-messages">
            <ng-message when="required" class="signup-messages-required">Required</ng-message>
            <ng-message when="minlength" class="signup-messages-generic">Too short, this needs to be at least eight(8) characters long.</ng-message>
            <ng-message when="maxlength" class="signup-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'signup-messages-valid':newClient.password.$valid}" class="signup-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>

     <!-- <a href="<?php echo esc_url( site_url( '/details/' ) ); ?>" class="signup-link"> -->
        <button type="submit" data-ng-class="{ 'signup-submit-disabled':newClient.$invalid, 'signup-submit-success':signup.success}" data-button-wait class="signup-submit">All Done: Submit New Account Information</button>
    <!-- </a> -->
<!-- <pre>newClient.firstname.$error = {{newClient.firstname | json}}</pre> -->
</form>

<?php get_footer(); ?>
