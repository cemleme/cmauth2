              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  @if(count($new_notifications))
                    <span class="label label-warning">
                      {{count($new_notifications)}}
                    </span>
                  @endif
                </a>
                <ul class="dropdown-menu">
                  <li class="header">{{ Lang::choice("cmauth::notifications.youhave", count($new_notifications), ['no'=>count($new_notifications)]) }}</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      @foreach($new_notifications as $notification)
                        <li>
                          <a href="/notifications/{{$notification->id}}">
                            <i class="fa fa-warning text-aqua"></i> {{ $notification->subject }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="footer"><a href="/notifications">{{ trans("cmauth::notifications.viewall") }}</a></li>
                </ul>
              </li>