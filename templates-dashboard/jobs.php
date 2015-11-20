<script type="text/ng-template" id="jobs.html">

  <section data-view-button class="jobs-action">
    <p class="jobs-action-add">Create A New Job</p>
    <p class="jobs-action-view">View Jobs List</p>
  </section>

  <section class="jobs-data">

    <!-- Jobs List -->
    <section data-ng-if="dashJobs.toggle.switch" class="jobs-data-list jobs-data-animate">
      <p>How about that</p>
    </section>

    <!-- Jobs Form -->
    <section data-ng-if="!dashJobs.toggle.switch" class="jobs-data-create jobs-data-animate">
    <p>How about this</p>
    </section>

  </section>
</script>