<p class="float-right">
  <a href="#">Back to top</a>
</p>

<p class="pt-4 mt-4">© 2019 Tourier, Inc. All rights reserved.</p>
<!--<p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
<p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.4/getting-started/introduction/">getting started guide</a>.</p> -->


<div class="modal fade bd-example-modal-sm dinamicModal" id="quoteModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="">Are you sure?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        You can contact X by <span class="value1"></span>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  // dinamic modal
  $('.dinamicModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var title = button.data('title') // Extract info from data-* attributes
    var id = button.data('id') // Extract info from data-* attributes
    var value1 = button.data('value1') // Extract info from data-* attributes

    var modal = $(this)
    modal.find('.modal-title').text(title)
    modal.find('.modal-body .title').val(title)
    modal.find('.modal-body .id').val(id)
    modal.find('.modal-body .value1').text(value1)
  });
</script>
