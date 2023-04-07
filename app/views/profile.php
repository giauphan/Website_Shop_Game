<?php
require_once __DIR__ . '/header.php';
?>
<section class="u-clearfix u-section-1" id="sec-e85a" ng-controller="profile">
    <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
            <div class="u-layout" style="margin-top: 30px;">
                <!-- <div style="text-align: center;">
                    <img style="margin:10px 0 0 0;object-fit: contain;max-width: 100%;" src="/assets/images/contact.png" alt="">
                </div> -->
                <div class="u-layout-row shadow">
                    <div class=" u-container-style u-layout-cell u-shape-rectangle u-size-17 u-layout-cell-2">
                        <div class="rounded shadow-sm flex-shrink-2 p-4 align-self-start" style="background-color:white;margin: 0 auto;" ng-repeat="user in users">
                            <div class="text-center">
                                <img src="/assets/images/a.svg" alt="" class="border rounded-circle" style="width:10em;height:10em">
                            </div>
                            <div class="fs-3 fw-bold mt-3 mb-2 text-center">{{user.userName}}</div>
                            <hr>
                            <div class="align-items-center mb-1">
                                <p style="width: 100%; color: #d63384;">{{user.email}}</p>
                            </div>
                            <div class="text-center mt-2">
                                <a href="/changepassword" style="width: 100%;" class="btn btn-light btn-sm fw-semibold">Change Password</a>
                            </div>
                        </div>

                    </div>
                    <div class="u-align-center-md u-align-center-sm u-align-center-xs u-container-style u-layout-cell u-shape-rectangle u-size-43 u-layout-cell-1">
                        <div class="rounded" style="background-color:white;width: 80%;margin: 0 auto;margin-top: 50px; padding:5%">
                            <!-- key --><?php
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
                            <form action="" method="post">
                                <div ng-repeat="user in users">
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label"> user name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" id="Username" value="{{user.userName}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label"> Fist name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="fistname" type="text" class="form-control" id="Phone" value="{{user.fistname}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label"> Last name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="lastname" type="text" class="form-control" id="Phone" value="{{user.lastname}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">mail</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="mail" type="text" class="form-control" id="Phone" value="{{user.email}}">
                                        </div>
                                    </div>
                                    <!-- button -->
                                    <button type="submit" name="changeUser" style="background-color: #00235B;border:1px solid purple;height: 45px;width: 100%;margin-top: 10px;" class="btn text-white btn-block btn-primary">save edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php
require_once __DIR__ . '/footer.php';
?>
<script>

app.controller('profile', function($scope) {
    $scope.users = [
        <?php
        foreach ($user as $users) {
            extract($users);
            echo     "{ id: " . $UserID . ",fistname:'" . $FistName . "',lastname:'" .  $LastName . "', userName:  '" . $userName . "',email:  '" . $email . "', role:  '" . $role . "' },";
        }
        ?>
    ];
});
</script>