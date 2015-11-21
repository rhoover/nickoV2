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
    <p>How about this</p>
    </section>

</script>