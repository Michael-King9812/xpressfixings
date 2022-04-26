<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand" href="/admin/dashboard" style="background: #eee;">
				<!-- <center> -->
					<img src="/assets/img/avatars/logo.png" style="width: 90px; height: 50px;" class="img-fluid mb-2" alt="Logo" />
				<!-- </center> -->
				<span style="font-weight: bold; margin-left: 15px; color: black;">Dashboard</span>
				
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
					<img src="/assets/img/avatars/avatar.png" class="img-fluid rounded-circle mb-2" alt="Avatar" />
					<div class="font-weight-bold">{{$data->fullname}}</div>
					<small>{{$data->email}}</small>
				</div>

				<ul class="sidebar-nav">
					<!-- <li class="sidebar-header">
						Main
					</li> -->
          <li class="sidebar-item">
						<a class="sidebar-link" href="/engineers/dashboard">
							<i class="align-middle mr-2 fas fa-fw fa-database"></i> <span class="align-middle">Dashboard</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('engineer.orders')}}">
							<i class="align-middle mr-2 fas fa-fw fa-folder"></i> <span class="align-middle">Manage Orders</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('engineer.newOrders')}}">
							<i class="align-middle mr-2 fas fa-fw fa-cart-plus"></i> <span class="align-middle">New Orders</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('engineer.doneOrders')}}">
							<i class="align-middle mr-2 fas fa-fw fa-folder-open"></i> <span class="align-middle">Done Orders</span>
						</a>
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{route('engineer.profile')}}">
							<i class="align-middle mr-2 fas fa-fw fa-cog"></i> <span class="align-middle">Profile</span>
						</a>
					</li>


				</ul>
			</div>
		</nav>