<?php
require_once __DIR__ . '/header.php';
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Manage User </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item active">Manage</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <!-- <section class="section" ng-controller="Manager_user">
    <div class="row">
      <div class="col-sm-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Manage User</h5>

       
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fist Name</th>
                  <th scope="col">Last Name </th>
                  <th scope="col">User Name </th>
                  <th scope="col">email</th>
                  <th scope="col">role</th>
                  <th scope="col">operation</th>
                </tr>
              </thead>
              <tbody>

                <tr ng-repeat="user in users">
                  <th scope="row">{{user.id}}</th>
                  <td>{{user.FistName}}</td>
                  <td>{{user.LastName}}</td>
                  <td>{{user.userName}}</td>
                  <td>{{user.email}}</td>
                  <td>{{user.role}}</td>
                  <td></td>
                </tr>
              </tbody>
            </table>
         
          </div>
        </div>


      </div>


  </section> -->
  <?php
  if (isset($_GET['check'])) {
    if ($_GET['check'] == 'true') {

  ?>
      <div class="alert alert-success" role="alert">
        Your information has been successfully changed
      </div>
    <?php  } else if ($_GET['check'] == 'false') {  ?>

      <div class="alert alert-danger" role="alert">
        Your information has been changed failed <a href="/contact" class="alert-link"> please contact us here</a>
      </div>
  <?php
    }
  } ?>
  <div class="table-responsive">
    <table class="table table-bordered" ng-controller="Manager_user">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Fist Name</th>
          <th scope="col">Last Name </th>
          <th scope="col">User Name </th>
          <th scope="col">email</th>
          <th scope="col">role</th>
          <th scope="col">Change</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <!-- ng-repeat table <img src="/assets/img/{{category.hinhdm}}" ng-model="hinhdm">-->
        <tr ng-repeat="user in users" ng-init="showCategory(category)">
          <th scope="row" name="id" ng-model="id">{{user.id}}</th>
          <td>{{user.FistName}}</td>
          <td>{{user.LastName}}</td>
          <td>{{user.userName}}</td>
          <td>{{user.email}}</td>
          <td>{{user.role}}</td>
          <td>
            <button type="button" ng-click="showInfo(category)" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#a{{user.id}}" style="margin-bottom: 20px;">
              Change
            </button>

            <div class="modal fade" id="a{{user.id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                      <span class="fa fa-pen-to-square"></span>
                      Change User
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Form Update
                    <form method="post" enctype="multipart/form-data" action="/admin/ql-user-change" ng-click="showInfo(category)" name="frm">
                      <div class="row">
                        <input type="hidden" name="id" ng-model="id" value="{{user.id}}">
                        <div class="form-group col-sm-12">
                          <label>User name</label>
                          <input class="form-control" ng-model="tendm" name="tendm" placeholder="{{user.userName}}" value="{{user.userName}}" disabled />

                        </div>
                        <div class="form-group col-sm-12">
                          <label>Fist name</label>
                          <input class="form-control" ng-model="FistName" name="FistName" placeholder="{{user.FistName}}" value="{{user.FistName}}" required />
                          <em ng-if="frm.FistName.$invalid" class="text-danger h6">vui lòng nhập Fist Name</em>
                        </div>
                        <div class="form-group col-sm-12">
                          <label>Last name</label>
                          <input class="form-control" ng-model="LastName" name="LastName" placeholder="{{user.LastName}}" value="{{user.LastName}}" required/>
                          <em ng-if="frm.LastName.$invalid" class="text-danger h6">vui lòng nhập Last Name</em>
                        </div>
                        <div class="form-group col-sm-12">
                          <label>Email</label>
                          <input class="form-control" ng-model="email" name="email" placeholder="{{user.email}}" value="{{user.email}}" required/>
                          <em ng-if="frm.email.$invalid" class="text-danger h6">vui lòng nhập email</em>
                        </div>
                        <div class="form-group col-sm-12">
                          <label>Role</label>
                          <input class="form-control" ng-model="role" name="role" placeholder="{{user.role}}" value="{{user.role}}" required/>
                          <em ng-if="frm.role.$invalid" class="text-danger h6">vui lòng nhập role</em>
                        </div>

                        <div class="form-group">
                          <input type="hidden" name="id" value="{{user.id}}">
                          <button class="btn btn-outline-primary" type="submit" name="changeuser" style="margin-top:20px;">
                            <span class="fa-solid fa-file-arrow-down"></span>
                            Cập nhật
                          </button>
                        </div>
                      </div>

                    </form>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="submit" data-bs-dismiss="modal">
                      <span class="fa-solid fa-file"></span>
                      Hủy
                    </button>
                  </div>
                </div>
          </td>
          <td>
            <form method="POST" action="/admin/ql-user" enctype="multipart/form-data">
              <input type="hidden" name="id" value="{{user.id}}">
              <button type="submit" class="btn btn-danger" name="Delete">Delete</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>

</main><!-- End #main -->

<script>
  var app = angular.module('myApp', []);
  app.controller('Manager_user', function($scope) {
    $scope.users = [
      <?php
      foreach ($user as $users) {
        extract($users);
        echo     "{ id: " . $UserID . ",FistName:'" . $FistName . "',LastName:'" . $LastName . "', userName:  '" . $userName . "',email:  '" . $email . "', role:  '" . $role . "' },";
      }
      ?>
    ];
  });
</script>
<?php
require_once __DIR__ . '/footer.php';
?>