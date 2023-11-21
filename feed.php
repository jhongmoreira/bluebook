<?php
  include("classes/database.php");
  $banco = new BancoDeDados;
?>

<style>

.avatar {
    position: relative;
    display: inline-block;
    width: 40px;
    white-space: nowrap;
    border-radius: 1000px;
    vertical-align: bottom
    
}

.avatar i {
    position: absolute;
    right: 0;
    bottom: 0;
    width: 10px;
    height: 10px;
    border: 2px solid #fff;
    border-radius: 100%
}

.avatar-online i {
    background-color: #4caf50
}

.avatar-off i {
    background-color: #616161
}

.avatar-busy i {
    background-color: #ff9800
}

.avatar-away i {
    background-color: #f44336
}

.avatar-100 {
    width: 100px
}

.avatar-100 i {
    height: 20px;
    width: 20px
}

.avatar-lg {
    width: 50px
}

.avatar-lg i {
    height: 12px;
    width: 12px
}

.avatar-sm {
    width: 30px
}

.avatar-sm i {
    height: 8px;
    width: 8px
}

.avatar-xs {
    width: 20px
}

.avatar-xs i {
    height: 7px;
    width: 7px
}

.list-group-item {
    position: relative;
    display: block;
    padding: 10px 15px;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid transparent;
}
</style>

<div class="row ">
    <div class="col-md-6 mx-auto">
          <ul class="list-group list-group-dividered list-group-full">
            <li class="list-group-item">
              <div class="media">
                <div class="m-1 media-left float-start">
                  <a class="avatar" href="javascript:void(0)">
                    <img src="img/conteudo/logo_exata.png" class="profile-photo-lg" alt="">
                    <i></i>
                  </a>
                </div>
                <div class="media-body">
                  <small class="text-muted float-end">21/11/2023 - 15:28</small>
                  <h4 class="media-heading">Exata São Gotardo</h4><br>
                  <div>Estamos com oportunidade de emprego. Acesse nosso perfil e saiba.</div>
                </div>
              </div>
            </li>
            <hr>
            <li class="list-group-item">
              <div class="media">
                <div class="media-left">
                  <a class="avatar avatar-busy" href="javascript:void(0)">
                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="...">
                    <i></i>
                  </a>
                </div>
                <div class="media-body">
                  <small class="text-muted pull-right">38 minutes ago</small>
                  <h4 class="media-heading">@Scott Sanders</h4>
                  <div>Lorem ipsum Laborum sit laborum cillum proident dolore culpa
                    reprehenderit qui enim labore do mollit in.</div>
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="media">
                <div class="media-left">
                  <a class="avatar avatar-online" href="javascript:void(0)">
                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="...">
                    <i></i>
                  </a>
                </div>
                <div class="media-body">
                  <small class="text-muted pull-right">2 hours ago</small>
                  <h4 class="media-heading">@Nina Wells</h4>
                  <div>Lorem ipsum Culpa mollit ex mollit magna dolore dolore dolore
                    tempor velit magna enim ad dolore dolore dolore.</div>
                </div>
              </div>
            </li>
          </ul>
          <span class="text-info">163K users active</span>
        </div>
      </div>
    </div>
</div>