<script type="text/ng-template" id="jobs.html">

  <section data-view-button class="jobs-action">
    <p class="jobs-action-add">Create A New Job</p>
    <p class="jobs-action-view">View Jobs List</p>
  </section>

    <!-- Jobs List -->
    <section data-ng-if="dashJobs.toggle.switch" class="jobs-data-list jobs-data-animate">
      <h2 class="jobs-data-header">Jobs List</h2>
      <div class="jobs-data-action">
        <div class="jobs-data-action-search">
          <input type="search" name="jobsearch" class="jobs-data-action-search-box" data-ng-model="search.$">
          <label for="jobsearch" class="jobs-data-action-search-label">
              <span class="jobs-data-action-search-label-text">Search or Filter</span>
          </label>
        </div>
      </div>
      <div class="jobs-data-content">
        <div data-ng-repeat="job in dashJobs.jobs | filter:search:strict track by job.creationMoment" class="jobs-data-content-item">
            <div class="jobs-data-content-item-sub">
              <p class="jobs-data-content-item-sub-name">{{job.client.fullname}}</p>
              <p class="jobs-data-content-item-sub-date">{{job.date}}</p>
              <p class="jobs-data-content-item-sub-price">${{job.quote}}</p>
            </div>
            <div class="jobs-data-content-item-sub">
              <p class="jobs-data-content-item-sub-location">{{job.street ? job.street : job.client.street}}<br>{{job.city? job.city : job.client.city}}, {{job.state.abbreviation ? job.state.abbreviation : job.client.state.abbreviation}}  {{job.zip ? job.zip : job.client.zip}}</p>
              <p class="jobs-data-content-item-sub-contact">{{job.client.phone}}<br>{{job.client.email}}</p>
            </div>
            <div class="jobs-data-content-item-sub">
              <p class="jobs-data-content-item-sub-service">{{job.service.service}}</p>
              <p class="jobs-data-content-item-sub-frequency">{{job.frequency.name}}</p>
          </div>
          <div class="jobs-data-content-item-sub">
            <p class="jobs-data-content-item-sub-note">{{job.note}}</p>
          </div>
          <div class="jobs-data-content-item-action">
            <div title="Edit Contact Information" data-list-item-edit="{{job.$id}}" class="jobs-data-content-item-action-edit">
              <p>Edit Job Info</p>
            </div>
              <div title="Archive Contact Information" data-list-item-archive="{{job.$id}}" class="jobs-data-content-item-action-delete">
                <p>Archive Job</p>
              </div>
            </div>
          </div>
      </div>
    </section>

    <!-- Jobs Form -->
    <section data-ng-if="!dashJobs.toggle.switch" class="jobs-data-create jobs-data-animate">

      <h3 class="jobs-create-header">Create A New Job</h3>

      <form name="dashJobs.newJob" novalidate data-ng-model-options="{updateOn: 'blur'}" data-ng-submit="dashJobs.createNewJob(dashJobs.newjob)" class="jobs-form">

        <!-- Job Date    -->
        <fieldset class="jobs-form-field-small">
          <input type="text" format="dddd, MMMM Do YYYY" name="date" data-ng-model="dashJobs.newjob.date"  pikaday="jobDatePicker" data-input-field-display data-prevent-enter data-ng-keyup="cancel($event)" data-required class="jobs-form-input">
          <label for="date" class="jobs-form-label">
            <span class="jobs-form-label-text">Pick A Date</span>
          </label>
          <ng-messages for="dashJobs.newJob.date.$error" class="jobs-form-messages">
            <ng-message when="required" class="jobs-form-messages-required">Required</ng-message>
            <p data-ng-class="{ 'jobs-form-messages-valid':dashJobs.newJob.date.$valid}" class="jobs-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Clients -->
        <fieldset class="jobs-form-field-small">
          <select name="client" data-ng-model="dashJobs.newjob.client" data-ng-keyup="cancel($event)" data-ng-options="client.fullname for client in dashJobs.clients" data-required class="jobs-form-select">
            <option value="" ng-if="false"></option>
          </select>
          <ng-messages for="dashJobs.newJob.client.$error" class="jobs-form-messages">
            <ng-message when="required" class="jobs-form-messages-required">Required</ng-message>
            <p data-ng-class="{ 'jobs-form-messages-valid':dashJobs.newJob.client.$valid}" class="jobs-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Service -->
        <fieldset class="jobs-form-field-small">
          <select name="service" data-ng-model="dashJobs.newjob.service" data-ng-keyup="cancel($event)" data-ng-options="service.service for service in dashJobs.services" data-required class="jobs-form-select">
            <option value="" ng-if="false"></option>
          </select>
          <ng-messages for="dashJobs.newJob.service.$error" class="jobs-form-messages">
            <ng-message when="required" class="jobs-form-messages-required">Required</ng-message>
            <p data-ng-class="{ 'jobs-form-messages-valid':dashJobs.newJob.service.$valid}" class="jobs-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Frequency -->
        <fieldset class="jobs-form-field-small">
          <select name="frequency" data-ng-model="dashJobs.newjob.frequency" data-ng-keyup="cancel($event)" data-ng-options="frequency.name for frequency in dashJobs.frequencies" data-required class="jobs-form-select">
              <option value="" ng-if="false"></option>
          </select>
          <ng-messages for="dashJobs.newJob.frequency.$error" class="jobs-form-messages">
            <ng-message when="required" class="jobs-form-messages-required">Required</ng-message>
            <p data-ng-class="{ 'jobs-form-messages-valid':dashJobs.newJob.frequency.$valid}" class="jobs-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Quote -->
        <fieldset class="jobs-form-field">
          <input type="text" name="quote" data-ng-model="dashJobs.newjob.quote" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="50" data-required class="jobs-form-input">
          <label for="quote" class="jobs-form-label">
            <span class="jobs-form-label-text">Quoted Price (No $ Sign Please)</span>
          </label>
          <ng-messages for="dashJobs.newJob.quote.$error" class="signup-messages">
            <ng-message when="required" class="clients-form-messages-required">Required</ng-message>
            <ng-message when="minlength" class="jobs-form-messages-messages-generic">Too short, this needs to be at least two(2) numbers long.</ng-message>
            <ng-message when="maxlength" class="jobs-form-messages-messages-generic">Too long, this needs to be less than fifty(50) numbers long.</ng-message>
            <p data-ng-class="{ 'jobs-form-messages-valid':dashJobs.newJob.quote.$dirty}" class="jobs-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Instructions -->
        <fieldset class="jobs-form-field">
          <input type="text" name="note" data-ng-model="dashJobs.newjob.note" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="75" class="jobs-form-input">
          <label for="note" class="jobs-form-label">
            <span class="jobs-form-label-text">Job Instructions</span>
          </label>
          <ng-messages for="dashJobs.newJob.note.$error" class="signup-messages">
            <ng-message when="minlength" class="jobs-form-messages-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="jobs-form-messages-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'jobs-form-messages-valid':dashJobs.newJob.note.$dirty}" class="jobs-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <h4 class="jobs-create-header">Fill In Below Here If The Job Location Is Different Than The Billing Address</h4>

        <!-- Street Address -->
        <fieldset class="jobs-form-field-small">
          <input type="text" name="street" data-ng-model="dashJobs.newjob.street" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="50" class="jobs-form-input">
          <label for="street" class="jobs-form-label">
            <span class="jobs-form-label-text">Street Address</span>
          </label>
          <ng-messages for="dashJobs.newJob.street.$error" class="jobs-form-messages">
            <ng-message when="minlength" class="jobs-form-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="jobs-form-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'jobs-form-messages-valid':dashJobs.newJob.street.$dirty}" class="jobs-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- City -->
        <fieldset class="jobs-form-field-small">
          <input type="text" name="city" data-ng-model="dashJobs.newjob.city" data-prevent-enter data-ng-keyup="cancel($event)" data-input-field-display data-ng-minlength="2" data-ng-maxlength="75" class="jobs-form-input">
          <label for="city" class="jobs-form-label">
            <span class="jobs-form-label-text">City</span>
          </label>
          <ng-messages for="dashJobs.newJob.city.$error" class="jobs-form-messages">
            <ng-message when="minlength" class="jobs-form-messages-generic">Too short, this needs to be at least two(2) characters long.</ng-message>
            <ng-message when="maxlength" class="jobs-form-messages-generic">Too long, this needs to be less than fifty(50) characters long.</ng-message>
            <p data-ng-class="{ 'jobs-form-messages-valid':dashJobs.newJob.city.$dirty}" class="jobs-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- State -->
        <fieldset class="jobs-form-field-small">
          <select name="state" data-ng-model="dashJobs.newjob.state" data-ng-keyup="cancel($event)" data-ng-options="state.name for state in dashJobs.states" class="jobs-form-select">
            <option value="" ng-if="false"></option>
          </select>
          <ng-messages for="dashJobs.newJob.state.$error" class="jobs-form-messages">
            <p data-ng-class="{ 'jobs-form-messages-valid':dashJobs.newJob.state.$dirty}" class="jobs-form-messages-hide-valid">Cool, looks good!</p>
          </ng-messages>
        </fieldset>

        <!-- Submit Button-->
        <button type="submit" data-ng-class="{ 'jobs-form-submit-disabled':dashJobs.newJob.$invalid}" data-button-wait class="jobs-form-submit">All Done: Submit New Job Information</button>

      </form>
    </section>

</script>