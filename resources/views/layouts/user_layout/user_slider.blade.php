<!--sidebar-menu-->
<div id="sidebar"><a href="{{URL::to('/user/dashbord')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
  <li class="submenu"> <a href="#"><i class=" icon-tint"></i> <span>Your Post</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="{{URL::to('/user/dashbord')}}" >Write Post</a></li>
        <li><a href="{{url::to('/user/view-post')}}">Check Your Post</a></li>
      </ul>
    </li>
    <li><a href="{{Url::to('/user/doner-information')}}"> <i class="icon-search"></i> Donner Info.</a></li>


    <li class="submenu"> <a href="#"><i class="icon icon-pencil"></i> <span>Articel</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="{{url::to('/user/add-content')}}" >Write Articel</a></li>
        <li><a href="{{url::to('/user/view-content')}}">Check Your Articel</a></li>
      </ul>
    </li>
   <!-- Admin Portion  -->
    <li class="submenu"> <a href="#"><i class=" icon-cogs"></i> <span>Area Mannagement</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="{{URL::to('/admin/list-area')}}" >List of Area</a></li>
        <li><a href="{{URL::to('/admin/add-thana')}}">Thana</a></li>
        <li><a href="{{URL::to('/admin/add-district')}}">District</a></li>
        <li><a href="{{URL::to('/admin/add-divison')}}">Divison</a></li>
      </ul>
    </li>
 
<!-- Admin Portion -->
    <li class="submenu"> <a href="#"><i class="icon-bullhorn"></i> <span>Notification Setting</span> <span class="label label-important"></span></a>
      <ul>
        <!-- <li><a href="#" >Dashbord</a></li> -->
        <li><a href="{{URL::to('/admin/add-post-notification')}}">Post</a></li>
        <li><a href="#">Articel</a></li>
        <li><a href="{{URL::to('admin/add-last-donnetion-notification')}}">Last Donnetion Date</a></li>
        <li><a href="#">Hospital</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </li>
<!-- Admin Portion -->
    <li><a href="{{URL::to('/admin/user-info')}}" ><i class="icon-user"></i>Register user info</a></li>

    <li class="submenu"> <a href="#"><i class="icon-plus"></i> <span>Hospital Service</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="{{url::to('/user/service')}}" >Provide Information</a></li>
        <li><a href="{{url::to('/user/view-service')}}">Check Hospital List</a></li>
      </ul>
    </li>


    <li><a href="{{Url::to('/user/information')}}" ><i class="icon-user"></i>About You</a></li>
    <li><a href="{{URL::to('/user/last-donnetion')}}" ><i class="icon-time"></i>Last Donnetion Date</a></li>
    <li><a href="{{URL::to('/user/setting')}}"><i class="icon-cog"></i>Setting</a></li>
    <li><a href="#" ><i class="icon-hand-right"></i>Contact</a></li>
    <li><a href="{{URL::to('/user/logout')}}" ><i class="icon-off"></i>Log out</a></li>
  </ul> 
</div>
<!--sidebar-menu-->  