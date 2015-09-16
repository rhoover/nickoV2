<script type="text/ng-template" id="clients.html">


  <section class="clients-action">
    <p data-clients-button data-toggle="add" data-ng-class="active" class="clients-action-add">Add A Client</p>
    <p data-clients-button data-toggle="view" class="clients-action-view">View Client List</p>
  </section>

  <section class="clients-data">
    <h2 class="clients-data-header">Client List</h2>
    <div class="clients-data-action">
      <div class="clients-data-action-search">
        <input type="search" name="clientsearch" class="clients-data-action-search-box" data-ng-model="search.$" data-ng-blur="search=null">
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

  <section class="clients-create">
    <p>Add Client Stuff</p>
  </section>


</script>
