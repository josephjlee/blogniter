  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row">

      <!-- Posts Number Card -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Articles</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_post; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Categories</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_category ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-folder-open fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Users</div>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_user; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Visitor</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_visitor; ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-eye fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">

      <!-- Visitor Chart -->
      <div class="col-lg">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Visitor By Month</h6>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="visitorChart"></canvas>
            </div>
            <hr>
            Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <!-- Top Contributor Chart -->
      <div class="col-lg-8">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Top 5 Contributors</h6>
          </div>
          <div class="card-body">
            <div class="chart-bar">
              <canvas id="postAuthorChart"></canvas>
            </div>
            <hr>
            Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
          </div>
        </div>
      </div>

      <!-- Category Chart -->
      <div class="col-lg-4">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Posts By Category</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="chart-pie pt-4">
              <canvas id="categoryChart"></canvas>
            </div>
            <hr>
            Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file.
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-6">

        <!-- Default Card Example -->
        <div class="card mb-4">
          <div class="card-header">
            <h6 class="card-title font-weight-bold text-primary">Welcome to Blogniter Project!</h6>
          </div>
          <div class="card-body">
          Bismillah, I'm determined to be a remarkable developer by perfecting this CMS. Blogniter means a blog that is ignited by Codeigniter. Innallaha ala kulli syaiin qadir.
          </div>
        </div>

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Current Features</h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
              <ul>
                <li>Registering user by their username, email, and password</li>
                <li>Signing in the registered user</li>
                <li>Showing dashboard menu based on the user role</li>
                <li>Functional CRUD system</li>
                <li>Displaying data table with user action buttons dynamically</li>
                <li>Working alert system using Bootstrap alert class</li>
                <li>Displaying the internal app-data on dashboard card</li>
                <li>Display internal data in chart using Chart JS</li>
                <li>Integrate SweetAlert2 alert system</li>
                <li>Display tabular data using DataTable</li>
                <li>Enhanced form validation code</li>
                <li>Simplified view loading</li>
                <li>Functional Dropdown Sidebar Navigation <sup><span class="badge badge-primary">New</span></sup></li>                
                <li>Ajax Controller <sup><span class="badge badge-primary">New</span></sup></li>                
              </ul>
            </div>
          </div>
        </div>             

      </div>

      <div class="col-lg-6">

        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Development Roadmap</h6>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">Integrate Switchery to change default checkbox look</label>
              </li>
              <li class="list-group-item">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">Implement IonAuth login system</label>
              </li>
              <li class="list-group-item">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">Create a single page CRUD using Ajax</label>
              </li>
              <li class="list-group-item">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">Validate form on the client-side using FormValidation</label>
              </li>
            </ul>
          </div>
        </div>

      </div>

    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->