<nav class="navbar navbar-expand navbar-theme">
  <a class="sidebar-toggle d-flex mr-2">
    <i class="hamburger align-self-center"></i>
  </a>

  <!-- <form class="form-inline d-none d-sm-inline-block">
    <input class="form-control form-control-lite" type="text" placeholder="Search projects...">
  </form> -->

  <div class="navbar-collapse collapse">
    <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle position-relative" href="#" id="messagesDropdown" data-toggle="dropdown">
          <i class="align-middle fas fa-envelope-open"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
          <div class="dropdown-menu-header">
            <div class="position-relative">
              4 New Messages
            </div>
          </div>
          <div class="list-group">
            <a href="#" class="list-group-item">
              <div class="row no-gutters align-items-center">
                <div class="col-2">
                  <img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Michelle Bilodeau">
                </div>
                <div class="col-10 pl-2">
                  <div class="text-dark">Michelle Bilodeau</div>
                  <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                  <div class="text-muted small mt-1">5m ago</div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="row no-gutters align-items-center">
                <div class="col-2">
                  <img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Kathie Burton">
                </div>
                <div class="col-10 pl-2">
                  <div class="text-dark">Kathie Burton</div>
                  <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
                  <div class="text-muted small mt-1">30m ago</div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="row no-gutters align-items-center">
                <div class="col-2">
                  <img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="Alexander Groves">
                </div>
                <div class="col-10 pl-2">
                  <div class="text-dark">Alexander Groves</div>
                  <div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
                  <div class="text-muted small mt-1">2h ago</div>
                </div>
              </div>
            </a>
            <a href="#" class="list-group-item">
              <div class="row no-gutters align-items-center">
                <div class="col-2">
                  <img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Daisy Seger">
                </div>
                <div class="col-10 pl-2">
                  <div class="text-dark">Daisy Seger</div>
                  <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
                  <div class="text-muted small mt-1">5h ago</div>
                </div>
              </div>
            </a>
          </div>
          <div class="dropdown-menu-footer">
            <a href="#" class="text-muted">Show all messages</a>
          </div>
        </div>
      </li> -->
      <li class="nav-item dropdown ml-lg-2">
        <a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown" data-toggle="dropdown">
          <i class="align-middle fas fa-bell"></i>
          <span class="indicator"></span>
        </a>
      </li>
      <li class="nav-item dropdown ml-lg-2">
        <a class="nav-link dropdown-toggle position-relative" href="#" id="userDropdown" data-toggle="dropdown">
          <i class="align-middle fas fa-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{route('engineer.profile')}}"><i class="align-middle mr-1 fas fa-fw fa-user"></i> View Profile</a>
          <!-- <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-comments"></i> Contacts</a>
          <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-chart-pie"></i> Analytics</a>
          <a class="dropdown-item" href="#"><i class="align-middle mr-1 fas fa-fw fa-cogs"></i> Settings</a> -->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout"><i class="align-middle mr-1 fas fa-fw fa-arrow-alt-circle-right"></i> Sign out</a>
        </div>
      </li>
    </ul>
  </div>

</nav>