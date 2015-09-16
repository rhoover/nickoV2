<?php
/**
 * The template used for displaying page content in the details page
 *
 Template Name: SignUp Details
 * @package nicko
 */
?>
<?php get_header(); ?>

<h3 class="details-header">Company Details</h3>
<p class="details-text">Excellent, you are good to go.  Congratulations!</p>
<p class="details-text">We aren't sending you an annoying confirmation email, you just registered with NickoLogistics, and that's good enough for us.</p>
<p class="details-text">Let's quickly fill out some details about your company, so you can get right to work managing your work:</p>

<form name="details.clientDetails" novalidate data-ng-model-options="{updateOn: 'blur'}" data-ng-submit="details.createClientDetails(details.clientdetails)" class="signup-form">

    <!-- Company Name -->
    <section class="signup-field">
        <input type="text" name="companyname" data-ng-model="details.clientdetails.companyname" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="50" data-required class="signup-input">
        <label for="company-name" class="signup-label">
            <span class="signup-label-text">Your Company's Name</span>
        </label>
        <ng-messages for="details.clientDetails.companyname.$error" class="signup-messages">
            <ng-message when="required" class="signup-messages-required">Required</ng-message>
            <ng-message when="minlength" class="signup-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="signup-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'signup-messages-valid':details.clientDetails.companyname.$valid}" class="signup-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>

    <!-- Address One -->
    <section class="signup-field">
        <input type="text" name="addressone" data-ng-model="details.clientdetails.addressone" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="75" data-required class="signup-input">
        <label for="address-one" class="signup-label">
            <span class="signup-label-text">Street Address 1</span>
        </label>
        <ng-messages for="details.clientDetails.addressone.$error" class="signup-messages">
            <ng-message when="required" class="signup-messages-required">Required</ng-message>
            <ng-message when="minlength" class="signup-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="signup-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'signup-messages-valid':details.clientDetails.addressone.$valid}" class="signup-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>

    <!-- Address Two -->
    <section class="signup-field">
        <input type="text" name="addresstwo" data-ng-model="details.clientdetails.addresstwo" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="75" class="signup-input">
        <label for="address-two" class="signup-label">
            <span class="signup-label-text">Street Address 2</span>
        </label>
        <ng-messages for="details.clientDetails.addresstwo.$error" class="signup-messages">
            <ng-message when="required" class="signup-messages-required">Required</ng-message>
            <ng-message when="minlength" class="signup-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="signup-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
        </ng-messages>
    </section>

    <!-- City -->
    <section class="signup-field">
        <input type="text" name="city" data-ng-model="details.clientdetails.city" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="75" data-required class="signup-input">
        <label for="city" class="signup-label">
            <span class="signup-label-text">City</span>
        </label>
        <ng-messages for="details.clientDetails.city.$error" class="signup-messages">
            <ng-message when="required" class="signup-messages-required">Required</ng-message>
            <ng-message when="minlength" class="signup-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="signup-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'signup-messages-valid':details.clientDetails.city.$valid}" class="signup-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>

    <!-- State -->
    <section class="signup-field-small">
        <select name="state" data-ng-model="details.clientdetails.state" data-ng-keyup="cancel($event)" data-ng-options="state.name for state in details.states" data-required class="signup-select">
            <option value="" ng-if="false"></option>
        </select>
            <ng-messages for="details.clientDetails.state.$error" class="signup-messages">
            <ng-message when="required" class="signup-messages-required">Required</ng-message>
            <p data-ng-class="{ 'signup-messages-valid':details.clientDetails.state.$valid}" class="signup-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>

    <!-- Zip Code -->
    <section class="signup-field-small">
        <input type="text" name="zip" data-ng-model="details.clientdetails.zip" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="5" data-ng-maxlength="10" data-required class="signup-input">
        <label for="zip" class="signup-label">
            <span class="signup-label-text">Zip Code</span>
        </label>
        <ng-messages for="details.clientDetails.zip.$error" class="signup-messages">
            <ng-message when="required" class="signup-messages-required">Required</ng-message>
            <ng-message when="minlength" class="signup-messages-generic">Too short, this needs to be at least five(5) characters long.</ng-message>
            <ng-message when="maxlength" class="signup-messages-generic">Too long, this needs to be less than ten(10) characters long.</ng-message>
            <p data-ng-class="{ 'signup-messages-valid':details.clientDetails.zip.$valid}" class="signup-messages-hide-valid">Cool, looks good!</p>
        </ng-messages>
    </section>

    <!-- Services Offered -->
    <h4 class="signup-services-header">Company Services</h4>
    <p class="signup-services-text">Choose as many of the following as fit your company:</p>
    <p data-button-click="details.showServicesList()" class="signup-services-button">Select From Available Services</p>
    <section data-ng-form="cdServices"  class="signup-field">
        <div data-ng-class="{ 'signup-services-popup-show':details.show }" class="signup-services-popup">
            <p data-button-click="details.selectAll()" class="signup-services-select">Select All</p>
            <p data-button-click="details.unSelectAll()" class="signup-services-select">Select None</p>
            <span data-ng-repeat="service in details.services track by service.$id" class="signup-services-item">
                <input type="checkbox" name="{{service.$id}}" data-ng-model="details.clientdetails.services[service.$id]" data-ng-true-value=" '{{service.service}}' " data-ng-model-options="{updateOn: 'click'}" id="signup-checkbox" data-ng-class="{'signup-services-item-checkbox-remote':details.remoteCheck}" class="signup-services-item-checkbox">
                <label for="signup-checkbox" class="signup-services-item-label">{{service.service}}</label>
            </span>
        </div>
<!--         <p data-ng-click="details.selectAll()" class="signup-services-select">Select All</p>
        <p data-ng-click="details.unSelectAll()" class="signup-services-select">Select None</p>
        <span data-ng-repeat="service in details.services" class="signup-services-item">
            <input type="checkbox" name="{{service.$id}}" data-ng-model="details.clientdetails.services[service.$id]" data-ng-true-value=" '{{service.service}}' " id="signup-checkbox" class="signup-services-item-checkbox">
            <label for="signup-checkbox" class="signup-services-item-label">{{service.service}}</label>
        </span> -->
    </section>

    <!-- Submit Button -->
         <button type="submit" data-ng-class="{ 'signup-submit-disabled':details.clientDetails.cdServices.$pristine, 'signup-submit-success':details.success}" data-button-wait data-ng-click="switch= 'done' " class="signup-submit">All Done: Submit Company Details</button>
<pre>Services JSON = {{details.clientDetails.cdServices | json}}</pre>
</form>

<?php get_footer(); ?>