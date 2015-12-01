<div class="modal modal-primary fade" tabindex="-1" role="dialog" id="notificationsModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{ trans("cmauth::notifications.notification") }}</h4>
      </div>
      <div class="modal-body">
          <ol>
          @foreach($modal_notifications as $notification)
            <li><h3>{{$notification->subject}}</h3>{{$notification->body}}</li>
          @endforeach
          </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline" data-dismiss="modal" id="notificationModalKapa">{{ trans("cmauth::notifications.setasread") }}</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->