<script type="text/ng-template" id="clients.html">

  <section data-clients-button data-subview class="clients-action">
    <p data-clients="addClient" class="clients-action-add">Add A Client</p>
    <p data-clients="viewList" class="clients-action-view">View Client List</p>
  </section>

  <!-- Clients List -->
  <section class="clients-data">

    <section data-ng-if="dashClients.toggle.switch" class="clients-data-list clients-data-animate">
      <h2 class="clients-data-header">Client List</h2>
      <div class="clients-data-action">
        <div class="clients-data-action-search">
          <input type="search" name="clientsearch" class="clients-data-action-search-box" data-ng-model="search.$"><!--  //data-ng-blur="search=null" -->
          <label for="clientsearch" class="clients-data-action-search-label">
            <span class="clients-data-action-search-label-text">Search or Filter</span>
          </label>
        </div>
      </div>
      <div class="clients-data-content">
        <div data-ng-repeat="client in dashClients.clients | filter:search:strict track by client.creationMoment" class="clients-data-content-item">
          <div class="clients-data-content-item-sub">
            <p class="clients-data-content-item-sub-name">{{client.fullname}}</p>
            <p class="clients-data-content-item-sub-jobtype">{{client.jobType.type}}</p>
            <p class="clients-data-content-item-sub-invoice">{{client.invoiceOccurrence.name}}</p>
          </div>
          <div class="clients-data-content-item-sub">
            <p class="clients-data-content-item-sub-location">{{client.company}}<br>{{client.street}}<br>{{client.city}}, {{client.state.abbreviation}}  {{client.zip}}</p>
          </div>
          <div class="clients-data-content-item-sub">
            <p class="clients-data-content-item-sub-contact">{{client.phone}}<br>{{client.email}}</p>
          </div>
          <div class="clients-data-content-item-sub">
              <p class="clients-data-content-item-sub-note">{{client.note}}</p>
          </div>
          <div class="clients-data-content-item-action">
            <div title="Edit Contact Information" data-list-item-edit="{{client.$id}}" class="clients-data-content-item-action-edit">
              <p>Edit Client Info</p>
            </div>
            <div title="Archive Contact Information" data-list-item-archive="{{client.$id}}" class="clients-data-content-item-action-delete">
              <p>Archive Client</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Clients Form -->
    <section data-ng-if="!dashClients.toggle.switch" class="clients-data-create clients-data-animate">

      <h3 class="clients-create-header">Create A New Client</h3>

      <form name="dashClients.newCustomer" novalidate data-ng-model-options="{updateOn: 'blur'}" data-ng-submit="dashClients.createNewCustomer(dashClients.newcustomer)" class="clients-form">

        <!-- Full Name -->
        <fieldset class="clients-form-field">
          <input type="text" name="fullname" data-ng-model="dashClients.newcustomer.fullname" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="50" data-required class="clients-form-input">
          <label for="fullname" class="clients-form-label">
            <span class="clients-form-label-text">Full Name</span>
          </label>
          <ng-messages for="dashClients.newCustomer.fullname.$error" class="clients-form-messages">
            <ng-message when="required" class="clients-form-messages-required">Required</ng-message>
            <ng-message when="minlength" class="clients-form-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="clients-form-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.fullname.$valid}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Company -->
        <fieldset class="clients-form-field">
          <input type="text" name="company" data-ng-model="dashClients.newcustomer.company" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="50" class="clients-form-input">
          <label for="company" class="clients-form-label">
            <span class="clients-form-label-text">Contact Company</span>
          </label>
          <ng-messages for="dashClients.newCustomer.company.$error" class="signup-messages">
            <ng-message when="minlength" class="clients-form-messages-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="clients-form-messages-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.company.$dirty}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Street Address -->
        <fieldset class="clients-form-field">
          <input type="text" name="street" data-ng-model="dashClients.newcustomer.street" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="50" data-required class="clients-form-input">
          <label for="street" class="clients-form-label">
            <span class="clients-form-label-text">Street Address For Billing</span>
          </label>
          <ng-messages for="dashClients.newCustomer.street.$error" class="clients-form-messages">
            <ng-message when="required" class="clients-form-messages-required">Required</ng-message>
            <ng-message when="minlength" class="clients-form-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="clients-form-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.street.$valid}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- City -->
        <fieldset class="clients-form-field-small">
          <input type="text" name="city" data-ng-model="dashClients.newcustomer.city" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="75" data-required class="clients-form-input">
          <label for="city" class="clients-form-label">
            <span class="clients-form-label-text">City</span>
          </label>
          <ng-messages for="dashClients.newCustomer.city.$error" class="clients-form-messages">
            <ng-message when="required" class="clients-form-messages-required">Required</ng-message>
            <ng-message when="minlength" class="clients-form-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="clients-form-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.city.$valid}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- State -->
        <fieldset class="clients-form-field-small">
          <select name="state" data-ng-model="dashClients.newcustomer.state" data-ng-keyup="cancel($event)" data-ng-options="state.name for state in dashClients.states" data-required class="clients-form-select">
            <option value="" ng-if="false"></option>
          </select>
          <ng-messages for="dashClients.newCustomer.state.$error" class="clients-form-messages">
            <ng-message when="required" class="clients-form-messages-required">Required</ng-message>
            <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.state.$valid}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Zip -->
        <fieldset class="clients-form-field-small">
          <input type="text" name="zip" data-ng-model="dashClients.newcustomer.zip" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="75" class="clients-form-input">
          <label for="zip" class="clients-form-label">
            <span class="clients-form-label-text">Zip Code</span>
          </label>
          <ng-messages for="dashClients.newCustomer.zip.$error" class="signup-messages">
            <ng-message when="minlength" class="clients-form-messages-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="clients-form-messages-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.zip.$dirty}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Phone -->
        <fieldset class="clients-form-field-small">
          <input type="text" name="phone" data-ng-model="dashClients.newcustomer.phone" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="75" class="clients-form-input">
          <label for="phone" class="clients-form-label">
            <span class="clients-form-label-text">Phone</span>
          </label>
          <ng-messages for="dashClients.newCustomer.phone.$error" class="signup-messages">
            <ng-message when="minlength" class="clients-form-messages-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="clients-form-messages-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.phone.$dirty}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Email -->
        <fieldset class="clients-form-field">
          <input type="email" name="email" data-ng-model="dashClients.newcustomer.email" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="75" class="clients-form-input">
          <label for="email" class="clients-form-label">
            <span class="clients-form-label-text">Contact Email</span>
          </label>
          <ng-messages for="dashClients.newCustomer.email.$error" class="signup-messages">
            <ng-message when="minlength" class="clients-form-messages-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="clients-form-messages-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.email.$dirty}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Invoicing Frequency -->
        <fieldset class="clients-form-field-small">
          <select name="occurrence" data-ng-model="dashClients.newcustomer.invoiceOccurrence" data-ng-keyup="cancel($event)" data-ng-options="occurrence.name for occurrence in dashClients.occurrences" class="clients-form-select">
            <option value="" ng-if="false"></option>
          </select>
          <ng-messages for="dashClients.newCustomer.occurrence.$error" class="signup-messages">
            <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.occurrence.$dirty}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Job Type -->
        <fieldset class="clients-form-field-small">
          <select name="jobType" data-ng-model="dashClients.newcustomer.jobType" data-ng-keyup="cancel($event)" data-ng-options="jobType.type for jobType in dashClients.jobTypes" class="clients-form-select">
            <option value="" ng-if="false"></option>
          </select>
          <ng-messages for="dashClients.newCustomer.jobType.$error" class="clients-form-messages">
            <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.jobType.$dirty}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>


        <!-- Note -->
        <fieldset class="clients-form-field">
            <input type="text" name="note" data-ng-model="dashClients.newcustomer.note" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="75" class="clients-form-input">
            <label for="note" class="clients-form-label">
                <span class="clients-form-label-text">Customer Note</span>
            </label>
            <ng-messages for="dashClients.newCustomer.note.$error" class="signup-messages">
                <ng-message when="minlength" class="clients-form-messages-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
                <ng-message when="maxlength" class="clients-form-messages-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
                <p data-ng-class="{ 'clients-form-messages-valid':dashClients.newCustomer.note.$dirty}" class="clients-form-messages-hide-valid">Cool, looks good!</p>
            </ng-messages>
        </fieldset>

        <!-- Submit Button-->
        <button type="submit" data-ng-class="{ 'clients-form-submit-disabled':dashClients.newCustomer.$invalid}" data-button-wait class="clients-form-submit">All Done: Submit New Client Information</button>
      </form>
    </section>

  </section>



</script>
