<script type="text/ng-template" id="home.html">

    <div class="dash-home-hero-jobs">
        <p class="dash-home-hero-header">Todays Jobs</p>
        <div class="dash-home-hero-content-jobs">
            <p data-ng-repeat="job in dashHome.jobs" class="dash-home-hero-jobs-item">
                <span>{{::job.client.fullname}}</span><br />
                <span>{{::job.street}}</span><br />
                <span>{{::job.city}}, {{::job.state.abbreviation}}</span><br />
                <span>{{::job.service.service}}</span>
            </p>
        </div>
    </div>
    <div class="dash-home-hero-invoices">
        <p class="dash-home-hero-header">Past-Due Invoices</p>
        <div class="dash-home-hero-content-invoices"></div>
    </div>
    <div class="dash-home-hero-revenue">
        <p class="dash-home-hero-header">Revenue Snapshot</p>
        <div class="dash-home-hero-content-revenue"></div>
    </div>
    <h2 class="dash-home-notify-header">Field Notifications</h2>
    <div class="dash-home-notify"></div>

</script>