<?php
/**
 * The template used for displaying page content in the signup page
 *
 Template Name: LogIn
 * @package nicko
 */
?>
<?php get_header(); ?>

<h3 data-write-amazon class="login-header">Log In and Get Some Work Done!</h3>
<form name="loginClient" novalidate data-ng-submit="login.loginClient(login.loginclient)" class="login">
    <section class="login-field">
        <input type="email" name="email" data-ng-model="login.loginclient.email" data-ng-model-options="{updateOn: 'blur'}" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-required class="login-input">
        <label for="email" class="login-label">
            <span class="login-label-text">Email You Are Using Here</span>
        </label>
        <ng-messages for="loginClient.email.$error" class="login-messages">
            <ng-message when="required" class="login-messages-required">Required</ng-message>
            <p data-ng-if="loginClient.email.$error.email" class="login-messages-generic">Not a valid Email Address</p>
            <p data-ng-class="{ 'login-messages-valid':loginClient.email.$valid}" class="login-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>
    <section class="login-field">
        <input type="text" name="password" data-ng-model="login.loginclient.password" data-ng-model-options="{updateOn: 'blur'}" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="8" data-ng-maxlength="50" data-required class="login-input">
        <label for="password" class="login-label">
            <span class="login-label-text">Password You Are Using Here</span>
        </label>
        <ng-messages for="loginClient.password.$error" class="login-messages">
            <ng-message when="required" class="login-messages-required">Required</ng-message>
            <ng-message when="minlength" class="login-messages-generic">Too short, needs to be at least eight(8) characters long.</ng-message>
            <ng-message when="maxlength" class="login-messages-generic">Too long, needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'login-messages-valid':loginClient.password.$valid}" class="login-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>
    <button type="submit" data-ng-class="{ 'login-submit-disabled':loginClient.$invalid, 'login-submit-success':login.success}" data-button-wait class="login-submit">All Done: Log On In!</button>
</form>




<?php get_footer(); ?>